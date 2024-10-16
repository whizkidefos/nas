<?php
// Get the current page URL and title
$url = urlencode(get_permalink());
$title = urlencode(get_the_title());

?>
    
    <div class="social-share-container">
        <h3>Share this post</h3>
        <ul class="social-share-list">
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" class="share-link facebook">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </li>
            <li>
                <a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $url; ?>" target="_blank" class="share-link twitter">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" class="share-link linkedin">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
            </li>
            <li>
                <a href="https://api.whatsapp.com/send?text=<?php echo $title . '%20' . $url; ?>" target="_blank" class="share-link whatsapp">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </li>
            <li>
                <a href="#" id="copyLinkButton" class="share-link copy-link nas-cta">
                    <i class="fas fa-link"></i> Copy Link
                </a>
            </li>
        </ul>
    </div>
    <?php
    
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyLinkButton = document.getElementById('copyLinkButton');
        copyLinkButton.addEventListener('click', function (e) {
            e.preventDefault();
            const url = window.location.href;
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = url;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Show a confirmation message
            alert('URL copied to clipboard!');
        });
    });
</script>