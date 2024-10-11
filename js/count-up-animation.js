document.addEventListener('DOMContentLoaded', function () {
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