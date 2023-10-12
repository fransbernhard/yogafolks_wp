'use strict'
/* global require */

const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const babel = require('gulp-babel');
const newer = require('gulp-newer');

const paths = {
    style: {
        src: 'app/sass/',
        output: 'dist/',
    },
    script: {
        src: 'app/js/**/*.js',
        output: 'dist/',
    },
    img: {
        src: 'app/img/**/*',
        output: 'dist/img/',
    }
};

gulp.task('CSS', () => {
    return gulp.src(paths.style.src + 'style.scss')
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer())
      .pipe(rename({ suffix: '.min' }))
      .pipe(gulp.dest(paths.style.output))
});

gulp.task('JS', () => {
    return gulp.src(paths.script.src)
        .pipe(newer(paths.script.output))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(paths.script.output))
        .on('error', error => {
            console.error('' + error);
        })
});

gulp.task('IMAGES', (done) => {
    return gulp.src(paths.img.src)
        .pipe(newer(paths.img.output))
        .pipe(cache(imagemin({
            optimizationLevel: 3,
            progressive: true,
            interlaced: true
        })))
        .pipe(gulp.dest(paths.img.output))
        .on('end', done); 
});

gulp.task('WATCH', () => {
    gulp.watch(paths.style.src + '**/*.scss', gulp.series('CSS'));
    gulp.watch(paths.script.src, gulp.series('JS'));
});

gulp.task('default', gulp.series('CSS', 'JS', 'IMAGES', 'WATCH')); 