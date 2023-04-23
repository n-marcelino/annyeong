window.addEventListener("scroll", function () {
    var header = document.querySelector(".header");
    header.classList.toggle("scrolled", window.scrollY > 0);
});

$(document).ready(function() {

    $('.logo-image').attr('src', '/images/Annyeong.png');

    $(window).scroll(function() {

      if ($(this).scrollTop() > 10) {
        $('.logo-image').attr('src', '/images/Annyeong 2.png');
      } else {
        $('.logo-image').attr('src', '/images/Annyeong.png');
      }
    });
  });

