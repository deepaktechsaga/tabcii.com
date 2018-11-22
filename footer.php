        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-md-4">
                        <div class="logo-foter">
                            <a href="http://tabcii.com/" title=""><img src="assets/images/logo-footer.png" alt="logo-footer"></a>
                        </div>
                    </div>
                    <!-- End Logo -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-4">
                        <div class="ul-ft">
                            <ul>
                                <li><a href="about.php" title="">About</a></li>
                                <li><a href="#" title="">Blog</a></li>
                                <li><a href="#" title="">FQA</a></li>
                                <li><a href="#" title="">Carrers</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Navigation Footer -->
                    <div class="col-xs-6 col-sm-3 col-md-4">
                        <div class="ul-ft">
                            <ul>
                                <li><a href="contact.php" title="">Contact Us</a></li>
                                <li><a href="privacy-policy.php" title="">Privacy Policy</a></li>
                                <li><a href="term-service.php" title="">Term of Service</a></li>
                                <li><a href="#" title="">Security</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation Footer -->
                    <!-- Footer Currency, Language -->
                    <div class="col-sm-6 col-md-12">
                        
                         
                       
                        <p class="copyright">
                            © 2018 <a href="http://tabcii.com"> tabcii.com </a> All rights reserved.
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js

"></script>
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

        $('.datePicker').datepicker({
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
        startDate:'today'
        });
    });

</script>

<script>

$( document ).ready(function() {
    

    // BOOTSTRAP TIMEPICKER
    // =================================================================
    // Require Bootstrap Timepicker
    // http://jdewit.github.io/bootstrap-timepicker/
    // =================================================================
    $('#demo-tp-com').timepicker();



    // BOOTSTRAP TIMEPICKER - COMPONENT
    // =================================================================
    // Require Bootstrap Timepicker
    // http://jdewit.github.io/bootstrap-timepicker/
    // =================================================================
    $('#demo-tp-textinput').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });

});
</script>
</body>
</html>
