<section class="join-cta-section">
    <div class="uk-container">
        <div class="join-cta-content">
            <article>
                <h4>Become a Member</h4>
                <p>
                    Have you edentified the constrainsts militating against the attainment of a just society?
                    <span class="hashtag">#JoinHandsWithLikeMinds</span>
                </p>
            </article>
            <?php
                // Get the application status and links from ACF
                $application_status = get_field('application_status', 'option');
                $open_page_link = get_field('applications_open_link', 'option');
                $closed_page_link = get_field('applications_closed_link', 'option');

                // Set the link based on the selected status
                if ($application_status == 'open') {
                    $join_link = $open_page_link;
                } else {
                    $join_link = $closed_page_link;
                }
            ?>
            <a href="<?php echo esc_url($join_link); ?>" class="nas-btn">Join us</a>
        </div>
    </div>
</section>