<style>
.section_gap1{
  padding:1px 0px;
}
.footer_info{
  margin-top:25px !important;
}
.sitemap{
  max-width:100%;
}
.sitemap iframe{
  width:100% !important;
  
}
.footer-area .footer-bottom {
    margin-top: 0px !important; 
}
.footer-area .footer-bottom .footer-social {
    text-align: left;
    /* padding: 10px; */
}
.footer_gallery{
  display:none;
}
.footer-area .single-footer-widget h4 {
    color: #ffffff;
    margin-bottom: 10px !important;
}
</style>

<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap1">
      <div class="container footer_info">
        <div class="row">
          <div class="col-lg-3 c-lg-6 single-footer-widget">
            <h4> <i class='fa fa-font-awesome'></i> Forms</h4>
            <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();" class='h-75'>
            
            <ul>

              <?php
                foreach ($forms as $value) {
                
              ?>

              <!--<li><a href="<?php echo site_url()."/home/viewnews/".$n->id; ?>">-->
              <!--<?php //echo $n->title?>-->
              <!--</a></li>-->
              
              <!--<li><a href="<?php echo site_url().'/home/viewevent/'.$n->id ;?>">-->
              <!--  <?php echo $n->name ?>-->
              <!--</a></li>-->
              
              <li><a href="<?php echo base_url().$value->path; ?>" target="_blank">
                <?php echo $value->name ?>
              </a></li>

              <?php
                }
              ?>


              <!-- <li><a href="#">Manage Reputation</a></li>
              <li><a href="#">Power Tools</a></li>
              <li><a href="#">Marketing Service</a></li> -->
            </ul>
            </marquee>
          </div>

          <div class="col-lg-3  single-footer-widget contact">
            <h4>Contact Us</h4>
            <ul>
              <?php
                  foreach ($contactus as $details) {
                    
              ?>

              <li>

                <a href="#">
                    <?php echo $details->address; ?>
                </a>

              </li>

              <li>

                <a href="##">
                    <?php echo $details->mailid; ?>
                </a>

              </li>


              <li>

                <a href="#">
                    <?php echo $details->phonenumber1; ?>
                </a>

              </li>

              <li>

                <a href="#">
                    <?php echo $details->phonenumber2; ?>
                </a>

              </li>
     
              <?php
                }
              ?>
            </ul>
          </div>
          
          <?php
            foreach ($contactus as $details) {
              
          ?>

          <div class="col-lg-6 c-lg-9 single-footer-widget">
            <h4>Sitemap</h4>
            <div class='sitemap' id="sitemap_container">
                
            <?php echo $details->sitemap; ?>
            </div>
          </div>

        </div>
        <script>
        if($(window).width() > 991){
          $("#sitemap_container").addClass("ml-5");
          $("#footer_content").addClass("text-center");
        }
        </script>
<!-- <hr class='w-100'> -->
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="https://anjanainfotech.in" target="_blank">Anjana Infotech</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social" style="text-align: end;">
            <a href="<?php echo $details->facebook; ?>" target="_blank"><i class="ti-facebook"></i></a>
            <a href="<?php echo $details->twitter; ?>" target="_blank"><i class="ti-twitter"></i></a>
            <a href="<?php echo $details->linkedin; ?>" target="_blank"><i class="ti-linkedin"></i></a>
          </div>
        </div>
          <?php
            }
          ?>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/popper.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>js/owl-carousel-thumb.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>js/mail-script.js"></script>
<script  src="<?php echo base_url(); ?>lib/magnific-popup.js" defer></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="<?php echo base_url(); ?>js/gmaps.min.js"></script>
<script src="<?php echo base_url(); ?>js/theme.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/init/datatables-init.js"></script>
<script src="<?php echo base_url(); ?>lib/lib/moment.min.js"></script>
<script src="<?php echo base_url(); ?>lib/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>js/aos.js"></script>
<script src="<?php echo base_url(); ?>vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>js/owl-carousel-thumb.min.js"></script>


<?php
    foreach ($info as  $details) {
      $name=$details->name;
    }
  ?>

    
<script>
  // AOS.init(
  // {
  //   delay: 50,
  //   duration: 1500,
  //   }
  //   ); 
  

  $("#footer_content").removeClass("col-lg-6");
  $(document).ready(function() {

    $('#gallery_container').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Loading !!',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return '<small><?php echo $name; ?></small>';
        }
      }
    });

});
            
  
  function active_course() {
    if ($(".active_course").length) {
      $(".active_course").owlCarousel({
        loop: true,
        margin: 20,
        items: 3,
        nav: true,
        autoplay: 2000,
        smartSpeed: 1500,
        dots: true,
        responsiveClass: true,
        thumbs: true,
        thumbsPrerendered: true,
        navText: ["<img src='<?php echo base_url();?>img/prev.png'>", "<img src='<?php echo base_url();?>img/next.png'>"],
        responsive: {
          0: {
            items: 1,
            margin: 0
          },
          991: {
            items: 2,
            margin: 30
          },
          1200: {
            items: 3,
            margin: 30
          }
        }
      });
    }
  }
  active_course();

</script>
<script>
      $(window).resize(function(){
        if($(window).width() >=992 && $(window).width() <= 1024){
          $("#colleg-info").removeClass("w-50");
          $("#colleg-info").addClass("w-25");
        }else{
          $("#colleg-info").addClass("w-50");
          $("#colleg-info").removeClass("w-25");
        }
      })
      if($(window).width() >=992 && $(window).width() <= 1024){
          $("#colleg-info").removeClass("w-50");
          $("#colleg-info").addClass("w-25");
        }else{
          $("#colleg-info").addClass("w-50");
          $("#colleg-info").removeClass("w-25");
        }
    </script>
</body>
</html>