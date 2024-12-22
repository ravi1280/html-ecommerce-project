var swiper = new Swiper(".slide-content", {
    slidesPerView: 4,
    spaceBetween: 5,
    loop: true,
    centerSlide:'true',
    fade:'true',
    grabCursor:'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets:"true",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints:{
        0:{
            slidesPerView:1,
        },
        815:{
            slidesPerView:2,
        },
        1170:{
          slidesPerView:3,
      },
        1500:{
            slidesPerView:4,
        }
    }
  });