(function ($) {

  "use strict";

  const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      type: 'progressbar',
    },
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

  // Mobile button
  let navToggler = document.getElementById('navbar-toggler');
  let mobileNav = document.getElementById('navbarMobileMenu')

  navToggler.addEventListener('click', (e) => {
    e.preventDefault()
    if(mobileNav.style.left === '-80vw') {
      mobileNav.style.left = 0
      e.target.classList.remove('fa-bars')
      e.target.classList.add('fa-times')
    } else {
      mobileNav.style.left = '-80vw'
      e.target.classList.remove('fa-times')
      e.target.classList.add('fa-bars')
    }
  })


  // Alert Banner
  let AlertBanner = document.getElementById("alert-banner");

  if( AlertBanner ) { announcementBar(); }

  function announcementBar() {
    let closeBanner = document.getElementById("alert-banner__close-btn");
    let bannerText = document.getElementById("alert-banner__text").textContent;

    if (localStorage.getItem("embrand-banner-data") != bannerText) {
      // If different, reset hide bar value for local storage.
      localStorage.setItem("embrand-banner", "false");
    }

    if(localStorage.getItem("embrand-banner") == "true") {
      // If false, remove the bar container.
      AlertBanner.remove();
    } else {
      // If true, remove hide class.
      AlertBanner.classList.remove("d-none");
    }

    closeBanner.addEventListener("click", function() {
      AlertBanner.remove();
      localStorage.setItem("embrand-banner-data", bannerText);
      localStorage.setItem("embrand-banner", "true");
    });
  }

})(jQuery);
