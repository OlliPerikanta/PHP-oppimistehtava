  function openNav() {
      document.getElementById("myNav").style.height = "100%";
  }

  function closeNav() {
      document.getElementById("myNav").style.height = "0%";
  }

  $(document).ready(function () {
      $(".section1 > div:gt(0)").hide();

      setInterval(function () {
          $('.section1 > div:first')
              .fadeOut(1000)
              .next()
              .fadeIn(1000)
              .end()
              .appendTo('.section1');
      }, 10000);

  });

  $(document).ready(function () {


      $('.navbar-light .navbar-nav .nav-link').click(function (e) {
          var linkHref = $(this).attr('href');
          $('html, body').animate({
              scrollTop: $(linkHref).offset().top
          }, 1000);
          e.preventDefault();
      });

  });
