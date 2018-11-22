<!--Copyright-->

<div class="copyright">
  <div class="container">
    <div class="col-md-12 text-center">
        <ul class="text-center">         
          <li class=""><a href="<?= base_url(); ?>site/faq">FAQ</a></li>
          <li><a href="<?= base_url(); ?>site/term_of_use">Terms of use</a></li>
          <li><a href="<?= base_url(); ?>site/privacy_policy">Privacy</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="<?= base_url(); ?>site/contact-us">Contact us</a></li>
          <li><a href="#">info@bizworks.com</a></li>
          <li><a href="#">+91-2938293382</a></li>
          <li><a href="#">C-52, Noida, India</a></li>
        </ul>
  </div>
  </div>
</div>

<style type="text/css">
  
</style>

<!-- cancelPromptModal -->
<div id="choosePromptModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="fa fa-thumbs-o-up"></i>
        </div>        
        <h4 class="modal-title">What would you like?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Get premium expert help! </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Public Forum</button>
        <button type="button" class="btn btn-success cancelNowBtn">Expert Help</button>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap's JavaScript --> 
<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script> 

<!-- Revolution Slider --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script> 

<!-- Owl carousel --> 
<script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.js"></script> 
<!-- Custom js --> 
<script src="<?php echo base_url(); ?>assets/frontend/js/script.js"></script>


<script>
$(document).ready(function() {
    $('#logoCarousel').carousel({
        interval: 3000
    });

// get started now bnt
$(".getStartedBtn").click(function(){


$('#choosePromptModal').modal('show');


});

});
</script>

</body>
</html>