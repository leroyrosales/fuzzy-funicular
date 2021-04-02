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

  // Primary Navigation
  let navToggle = document.getElementById("js-nav-toggle");
  let navWrapper = document.getElementById("ut-main_menu-wrapper");

  navToggle.addEventListener("click", function() {
    navWrapper.classList.toggle("active");
  })

  // Primary Navigation - mobile
  let subNavIcon = document.querySelectorAll('.subnav-trigger');

  subNavIcon.forEach(function(icon) {
    icon.addEventListener("click", function() {
      icon.classList.toggle("icon--open");
      icon.nextElementSibling.classList.toggle("open");
    })
  })

  // Alert Banner
  let AlertBanner = document.getElementById("alert-banner");

  if( AlertBanner ) { announcementBar(); }

  function announcementBar() {
    let closeBanner = document.getElementById("alert-banner__close-btn");
    let bannerText = document.getElementById("alert-banner__text").textContent;

    if (localStorage.getItem("ut-banner-data") != bannerText) {
      // If different, reset hide bar value for local storage.
      localStorage.setItem("ut-banner", "false");
    }

    if(localStorage.getItem("ut-banner") == "true") {
      // If false, remove the bar container.
      AlertBanner.remove();
    } else {
      // If true, remove hide class.
      AlertBanner.classList.remove("d-none");
    }

    closeBanner.addEventListener("click", function() {
      AlertBanner.remove();
      localStorage.setItem("ut-banner-data", bannerText);
      localStorage.setItem("ut-banner", "true");
    });
  }

  // Accordions
  let panels = document.querySelectorAll(".panel");

  panels.forEach(function(panel) {
    let heading = panel.querySelector(".panel-heading");

    heading.addEventListener("click", function() {
      heading.classList.toggle("panel-heading--open");
    });

  });

})(jQuery);
