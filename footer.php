</main>

<footer>
    <div class="uk-container uk-text-center">
        <div class="logo-wrapper">
            <a href="/" class="footer-logo"><img src="<?php echo get_template_directory_uri() . "/images/nas-centered-logo-dark.png" ?>" alt="NAS logo"></a>
        </div>
        
        <div class="footer-logo-links">
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/wole-soyinka-lectures-logo.png" ?>" alt="wole soyinka lectures">
            </a>
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/ralph-opara-lectures-logo.png" ?>" alt="ralph opara lectures">
            </a>
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/nas-citizens-summit.png" ?>" alt="NAS citizens summit">
            </a>
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/nas-medical-mission.png" ?>" alt="NAS medical mission">
            </a>
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/nas-street-child.png" ?>" alt="NAS street child">
            </a>
            <a href="" target="_blank" class="footer-image-link">
                <img src="<?php echo get_template_directory_uri() . "/images/nas-charity-redball.png" ?>" alt="NAS charity redball">
            </a>
        </div>

        <small class="uk-text-center">
            &copy; <?php echo date("Y"); ?> National Association of Seadogs - Pyrates Confraternity - All rights reserved.
        </small>
    </div>
</footer>

<?php get_template_part('/components/chatbot'); ?>


<?php wp_footer(); ?>
</body>
</html>