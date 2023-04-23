window.addEventListener("scroll", function () {
    var header = document.querySelector(".header");
    header.classList.toggle("scrolled", window.scrollY > 0);
});

$(document).ready(function() {

    $('.logo-image').attr('src', '/images/Annyeong.png');

    $(window).scroll(function() {

      if ($(this).scrollTop() > 50) {
        // Apply a different logo image if the user has scrolled 50 pixels or more
        $('.logo-image').attr('src', '/images/Annyeong 2.png');
      } else {
        // Revert to the default logo image if the user has scrolled less than 50 pixels
        $('.logo-image').attr('src', '/images/Annyeong.png');
      }
    });
  });

