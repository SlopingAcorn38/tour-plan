$(document).ready(function () {
  new Swiper(".hotel-slider", {
    loop: !0,
    navigation: {
      nextEl: ".hotel-slider__button--next",
      prevEl: ".hotel-slider__button--prev",
    },
    effect: "coverflow",
  }),
    new Swiper(".reviews-slider", {
      loop: !0,
      navigation: {
        nextEl: ".reviews-slider__button--next",
        prevEl: ".reviews-slider__button--prev",
      },
    }),
    $(".parallax-window").parallax({ imageSrc: "img/newsletter-bg.jpeg" }),
    $(".menu-button").on("click", function () {
      $(".navbar-bottom").toggleClass("navbar-bottom--visible");
    });
  var e = $('[data-toggle="modal"]'),
    a = $(".modal__close");
  e.on("click", function () {
    var e = $(this).attr("data-href");
    $(e).find(".modal__overlay").addClass("modal__overlay--visible"),
      $(e).find(".modal__dialog").addClass("modal__dialog--visible");
  }),
    a.on("click", function (e) {
      e.preventDefault();
      var a = $(".modal__overlay"),
        o = $(".modal__dialog");
      a.removeClass("modal__overlay--visible"),
        o.removeClass("modal__dialog--visible");
    }),
    $(document).keydown(function (e) {
      if (27 == e.keyCode) {
        e.preventDefault();
        var a = $(".modal__overlay"),
          o = $(".modal__dialog");
        a.removeClass("modal__overlay--visible"),
          o.removeClass("modal__dialog--visible");
      }
    }),
    $(".form").each(function () {
      $(this).validate({
        errorClass: "invalid",
        messages: {
          name: {
            required: "Please specify your name",
            minlength: "Name should be at least 2 symbols long",
          },
          email: {
            required: "We need your email address to contact you",
            email:
              "Your email address must be in the format of name@domain.com",
          },
          phone: { required: "Please type the phone" },
        },
      });
    }),
    $(".mask").mask("+7 (000) 000-00-00"),
    AOS.init({ disable: "mobile" });
});
