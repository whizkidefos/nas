// const swiper = new Swiper('.swiper', {
//     // Optional parameters
//     direction: 'vertical',
//     loop: true,
  
//     // If we need pagination
//     pagination: {
//       el: '.swiper-pagination',
//     },
  
//     // Navigation arrows
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
  
//     // And if we need scrollbar
//     scrollbar: {
//       el: '.swiper-scrollbar',
//     },
// });

const swiper = new Swiper(".bannerSwiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
    },
    speed: 7000,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});