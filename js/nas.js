jQuery(document).ready(function($) {

    // Initialize Swiper
    var featuredEvents = new Swiper('.events-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        centerMode: true,
        loop: true,
        speed: 2000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        }
    });

    // Initialize Fancybox for images
    $('.bento-item a.lightbox').fancybox({
        buttons: ['close'],
        loop: true,
        protect: true,
    });

    // Initialize Fancybox for videos (YouTube/Vimeo)
    $('[data-fancybox]').fancybox({
        type: 'iframe',
        iframe: {
            css: {
                width: '80%',
                height: '80%',
            }
        }
    });

    // Function to count up
    function countUp() {
        $('.counter').each(function() {
            var $this = $(this),
                target = parseInt($this.attr('data-target')),
                count = 0,
                increment = target / 100;  // The larger the divisor, the slower the count-up

            // Animate the counter
            var interval = setInterval(function() {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(interval);
                }
                $this.text(Math.ceil(count));  // Update the displayed number
            }, 30);  // Adjust the speed of the count-up (smaller = faster)
        });
    }

    // Function to detect if elements are visible in the viewport
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop(),
            docViewBottom = docViewTop + $(window).height(),
            elemTop = $(elem).offset().top,
            elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    // Trigger count-up when the counter comes into view
    $(window).on('scroll', function() {
        $('.counter').each(function() {
            if (isScrolledIntoView(this)) {
                countUp();
            }
        });
    });

    // Also trigger count-up on page load if counter is already in view
    $(window).on('load', function() {
        $('.counter').each(function() {
            if (isScrolledIntoView(this)) {
                countUp();
            }
        });
    });

    // Typeewriter effect
    var phrases = ["Against Moribund Convention", "Against Tribalism", "For Humanistic Ideals", "For Comradeship & Chivalry"];
    var typingSpeed = 100; // Speed of typing (in milliseconds)
    var deletingSpeed = 50; // Speed of deleting (in milliseconds)
    var delayBetweenPhrases = 2000; // Delay between phrases (in milliseconds)
    var currentPhraseIndex = 0;
    var charIndex = 0;
    var isDeleting = false;

    function type() {
        var currentPhrase = phrases[currentPhraseIndex];
        var typewriterElement = $('#typewriter');
        
        if (isDeleting) {
            // Deleting characters
            typewriterElement.text(currentPhrase.substring(0, charIndex - 1));
            charIndex--;
        } else {
            // Typing characters
            typewriterElement.text(currentPhrase.substring(0, charIndex + 1));
            charIndex++;
        }

        // If the word is fully typed, wait and then start deleting
        if (!isDeleting && charIndex === currentPhrase.length) {
            isDeleting = true;
            setTimeout(type, delayBetweenPhrases); // Pause before deleting
        }
        // If the word is fully deleted, move to the next phrase
        else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length; // Loop through phrases
            setTimeout(type, 500); // Start typing the next phrase
        } else {
            setTimeout(type, isDeleting ? deletingSpeed : typingSpeed); // Adjust speed
        }
    }

    // Start typing when the page is ready
    type();

    // Mobile navigation
    $('.mobile-toggle').click(function() {
        $('.alt-mobile-navigation').toggleClass('open');
        $(this).toggleClass('open');
    });
    // $('.alt-mobile-navigation .fa-xmark').click(function() {
    //     $('.alt-mobile-navigation').removeClass('open');
    //     $(this).removeClass('open');
    // });
});

document.addEventListener('DOMContentLoaded', function () {

    const burger = document.querySelector('.burger');
    const menu = document.querySelector('.mobile-navigation');

    //Navigation
    let menuOpen = false;
    burger.addEventListener("click", () => {
        if (!menuOpen) {
            burger.classList.add("open");
            menuOpen = true;
            menu.classList.add('open');
        } else {
            burger.classList.remove("open");
            menuOpen = false;
            menu.classList.remove('open');
        }
    });



    // ---- TAB FUNCTIONALITY ----
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabLinks.forEach(link => {
        link.addEventListener('click', function() {
            tabLinks.forEach(link => link.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));

            this.classList.add('active');
            const targetId = this.getAttribute('data-target');
            document.getElementById(targetId).classList.add('active');
        });
    });

});

