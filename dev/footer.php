        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-md-4">
                        <div class="logo-foter">
                            <a href="index.html" title=""><img src="assets/images/logo-footer.png" alt=""></a>
                        </div>
                    </div>
                    <!-- End Logo -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="ul-ft">
                            <ul>
                                <li><a href="about.html" title="">About</a></li>
                                <li><a href="blog.html" title="">Blog</a></li>
                                <li><a href="fqa.html" title="">FQA</a></li>
                                <li><a href="careers.html" title="">Carrers</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="ul-ft">
                            <ul>
                                <li><a href="contact.html" title="">Contact Us</a></li>
                                <li><a href="#" title="">Privacy Policy</a></li>
                                <li><a href="#" title="">Term of Service</a></li>
                                <li><a href="#" title="">Security</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Footer Currency, Language -->
                    <div class="col-sm-6 col-md-4">
                        <!-- Language -->
                        <!-- <div class="currency-lang-bottom dropdown-cn float-left">
                            <div class="dropdown-head">
                                <span class="angle-down"><i class="fa fa-angle-down"></i></span>
                            </div>
                            <div class="dropdown-body">
                                <ul>
                                    <li class="current"><a href="#" title="">English</a></li> 
                                    <li><a href="#" title="">English</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- End Language -->
                         
                        <!--CopyRight-->
                        <p class="copyright">
                            © 2018 <!-- BookYourChoice™ --> tabcii.com All rights reserved.
                        </p>
                        <!--CopyRight-->
                    </div>
                    <!-- End Footer Currency, Language -->
                </div>
            </div>
        </footer>
        <!-- End Footer -->      
    </div>
  
    <script src="assets/js/library/jquery-ui.min.js"></script>
    <script src="assets/js/library/bootstrap.min.js"></script>
    <script src="assets/js/library/owl.carousel.min.js"></script>
    <script src="assets/js/library/parallax.min.js"></script>
    <script src="assets/js/library/jquery.nicescroll.js"></script>
    <script src="assets/js/library/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/library/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/library/SmoothScroll.js"></script>
    <script src="assets/js/library/jquery.form.min.js"></script>
    <script src="assets/js/library/jquery.validate.min.js"></script>
    <!-- End Library JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Main Js -->
    <script src="assets/js/script.js"></script>
    <!-- End Main Js -->
    <script type="text/javascript">
    $(document).ready(function() {
        $(".modl-item").click(function () {
        $(".modl-item").removeClass("active");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).addClass("active");   
        });
    });

$(document).ready(function() {

$('.datePicker').datepicker({
    format: 'mm/dd/yyyy',
    todayHighlight: true,
    autoclose: true,
    startDate:'today'
});
});
</script>


</body>
</html>
