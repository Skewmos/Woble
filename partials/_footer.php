<!-- Footer -->
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright Woble 2017 - 2018 | tous droits réservés.</a></p>
</footer>

<!-- Jquery -->
<script src="assets/js/jquery.js"></script>
<!-- JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Parsley -->
  <script  type="text/javascript">
  $(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });

    $(window).scroll(function() {
      $(".slideanim").each(function(){
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
      });
    });
  })
  </script>
  <!-- Parsley -->
  <script src="libraries/parsley/parsley.js"></script>
  <!-- Parsley language -->
  <script src="libraries/parsley/i18n/fr.js"></script>
  <script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
  </script>
 </body>
</html>
