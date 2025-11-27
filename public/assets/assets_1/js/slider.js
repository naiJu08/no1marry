
  var swiper = new Swiper('.mySwiper-1', {
  slidesPerView: 4,
  spaceBetween: 10,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,    
  },
  navigation: {
    nextEl: '.swiper-button-next-1',
    prevEl: '.swiper-button-prev-1',
  },
  breakpoints: {
    210: {
      slidesPerView: 1,
    },
    420: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },
});

var swiper = new Swiper('.mySwiper', {
  slidesPerView: 4,
  spaceBetween: 10,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,    
  },
  navigation: {
    nextEl: '.swiper-button-next-2',
    prevEl: '.swiper-button-prev-2',
  },
  breakpoints: {
    210: {
      slidesPerView: 1,
    },
    420: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },
});
