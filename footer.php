<?php
    $socialList = get_field('social', 'option');
    $links = get_field('footer_link')
?>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="footer__column footer__column--left">
            <a 
                class="footer__logo"
                href="<?= get_site_url(); ?>"
            >
                <img 
                    class="footer__logo-image" 
                    src="<?= get_template_directory_uri() . "/dist/img/logo.png"; ?>"
                />
            </a>
            <div class="footer__adress">
                <p class="footer__adress--street">Åsögatan 166</p>
                <p>116 32 Stockholm</p>
                <p class="footer__adress--org-nr">Org nr: 559248-3928</p>
            </div>
        </div>
        <div class="footer__column footer__column--middle">
            <a 
                class="footer__link footer__link--mail" 
                href="mailto:hello@yogafolks.se"
            >hello@yogafolks.se</a>
            <a 
                class="footer__link footer__link--terms" 
                href="<?= get_template_directory_uri() . "/pdf/terms-and-agreements-2021.pdf";?>"
            >Terms & Conditions</a>
            <a 
                class="footer__link footer__link--privacy" 
                href="<?= get_template_directory_uri() . "/pdf/GDPR-terms-nov-2020.pdf";?>"
            >Privacy Policy</a>
        </div>
        <div class="footer__column footer__column--right">
            <?php foreach($socialList as $item): ?>
                <a
                    href="<?php echo $item['url']; ?>"
                    class="social__item social__item--<?= $item['media']; ?>"
                    target="_blank">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    
</footer>
<?php wp_footer(); ?>
</body>
</html>
