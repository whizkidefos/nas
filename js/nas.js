// Sleek Slider
jQuery(document).ready(function($) {
    $('.events-carousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,
        // centerMode: true,
        // centerPadding: '20px',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            }
        ]
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
});

console.log('Console message from line 13 after sleek slider');

document.addEventListener('DOMContentLoaded', function () {

    const burger = document.querySelector('.burger');
    const menu = document.querySelector('.mobile-navigation');

    console.log('Console message from line 2 before burger menu');

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

    console.log('Console message from line 15 after burger menu');

    // Banner Swiper
    const swiper = new Swiper('.bannerSwiper', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        speed: 5000,
        animation: true,
        effect: 'fade',
        loop: true,
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

    // ---- TYPEWRITER EFFECT ----
    const titles = ["Innovators", "Leaders", "Thinkers", "Changemakers"]; // Text to rotate
    let currentTitleIndex = 0;
    let charIndex = 0;
    const typewriterElement = document.getElementById("typewriter");
    const typingSpeed = 100;
    const deletingSpeed = 50;
    const delayBetweenTitles = 2000;

    function typeTitle() {
        const currentTitle = titles[currentTitleIndex];
        
        if (charIndex < currentTitle.length) {
            typewriterElement.textContent += currentTitle.charAt(charIndex);
            charIndex++;
            setTimeout(typeTitle, typingSpeed); // Type next character
        } else {
            setTimeout(deleteTitle, delayBetweenTitles); // After typing, wait before deleting
        }
    }

    function deleteTitle() {
        const currentTitle = titles[currentTitleIndex];
        
        if (charIndex > 0) {
            typewriterElement.textContent = currentTitle.substring(0, charIndex - 1);
            charIndex--;
            setTimeout(deleteTitle, deletingSpeed); // Delete next character
        } else {
            currentTitleIndex = (currentTitleIndex + 1) % titles.length; // Move to the next title
            setTimeout(typeTitle, 500); // Start typing the next title after deleting
        }
    }

    // Start the typewriter effect
    typeTitle();

    // ---- COUNT-UP FUNCTIONALITY ----
    const counters = document.querySelectorAll('.number');
    const speed = 200; // Adjust the speed of the count-up

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };

        const startCounting = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(counter); // Stop observing after counting finishes
                }
            });
        };

        const observer = new IntersectionObserver(startCounting, {
            threshold: 0.5 // 50% of the section needs to be visible
        });

        observer.observe(counter);
    });

});

