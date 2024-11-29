<?php get_header(); ?>

<header class="default-page-header">
    <div class="uk-container">
        <h1><?php the_title(); ?></h1>
    </div>
</header>

<section class="contact-page">
    <div class="uk-container">
        <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
        <div class="" uk-grid>
            <div class="uk-width-1-3@m">
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p>
                        <strong>Address: </strong> 
                        <?php if ( $address = get_field( 'address', 'options' ) ) : ?>
                            <?php echo esc_html( $address ); ?>
                        <?php endif; ?>
                    </p>
                    <p>
                        <strong>Phone: </strong>
                        <?php if ( $phone_number = get_field( 'phone_number', 'options' ) ) : ?>
                            <?php echo $phone_number; ?>
                        <?php endif; ?>
                    </p>
                    <p>
                        <strong>Email: </strong>
                        <?php if ( $email_address = get_field( 'email_address', 'options' ) ) : ?>
                            <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-2-3@m">
                <div class="contact-form">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.0094273400136!2d7.3492035!3d9.1536204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104dd8d37f591d57%3A0xd383de7b1719f16b!2sNAS%20Anchor%20Point!5e0!3m2!1sen!2suk!4v1729005833706!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php get_footer(); ?>