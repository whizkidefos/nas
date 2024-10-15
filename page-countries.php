<?php get_header(); ?>

<section class="countries">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m" uk-grid>
            <div class="">
                <div class="continent-box uk-text-center">
                    <h2>Europe</h2>
                    <p>Europe is a continent located entirely in the Northern Hemisphere and mostly in the Eastern Hemisphere. It comprises the westernmost part of Eurasia and is bordered by the Arctic Ocean to the north, the Atlantic Ocean to the west, the Mediterranean Sea to the south, and Asia to the east.</p>
                    <a href="<?php echo site_url('/europe'); ?>" class="nas-btn-yellow">View Countries and Details</a>
                </div>
            </div>
            <div class="">
                <div class="continent-box uk-text-center">
                    <h2>Asia</h2>
                    <p>Asia is Earth's largest and most populous continent, located primarily in the Eastern and Northern Hemispheres. It shares the continental landmass of Eurasia with the continent of Europe and the continental landmass of Afro-Eurasia with both Europe and Africa.</p>
                    <a href="<?php echo site_url('/asia'); ?>" class="nas-btn-yellow">View Countries and Details</a>
                </div>
            </div>
            <div class="">
                <div class="continent-box uk-text-center">
                    <h2>Africa</h2>
                    <p>Africa is the world's second-largest and second-most populous continent, after Asia in both cases. At about 30.3 million km² including adjacent islands, it covers 6% of Earth's total surface area and 20% of its land area.</p>
                    <a href="<?php echo site_url('/africa'); ?>" class="nas-btn-yellow">View Countries and Details</a>
                </div>
            </div>
            <div class="">
                <div class="continent-box uk-text-center">
                    <h2>The Americas</h2>
                    <p>The Americas, which are also collectively called America, are a landmass comprising the totality of North and South America. The Americas make up most of the land in Earth's Western Hemisphere and comprise the New World.</p>
                    <a href="<?php echo site_url('/the-americas'); ?>" class="nas-btn-yellow">View Countries and Details</a> 
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>