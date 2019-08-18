

    <!--================ Start Home Banner Area =================-->
<!--    
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <img src="<?php echo base_url() ?>img/banner/banner-2.jpg" alt="" srcset="">
              
            </div>
          </div>
        </div>
      </div>
    </section> -->
  <style>
    /* .header_area .navbar{
      background:#fff !important;
    } */
    .bxSlider{
      /* margin-top:160px; */
    }
    .bxSlider ul li img{
      width:100%;
      /* height:100%; */
    }
    .bx-wrapper {
        position: relative;
        margin-bottom: 60px;
        padding: 0;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-box-shadow: 0 0 0px #fff;
        -moz-box-shadow: 0 0 0px #fff;
        box-shadow: 0 0 0px #fff;
        border: 0px solid #fff;
        background: #fff;
        
      }
      b{
        color:#ee529f !important;
      }
      .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 650px !important;
        width:100%
        }
      @media only screen and (max-width:768px){
        .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 450px !important;
        width:100%
        }
      }
      @media only screen and (max-width:500px){
        .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 400px !important;
        width:100%
        }
      }
      @media only screen and (max-width:425px){
        .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 320px !important;
        width:100%
        }
      }
      @media only screen and (max-width:375px){
        .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 280px !important;
        width:100%
        }
      }
      @media only screen and (max-width:325px){
        .bx-wrapper, .bx-viewport, .bx-wrapper img {
        height: 210px !important;
        width:100%
        }
      }
      @media only screen and (max-width:991px){
        #slider_container{
            margin-top: 70px;
        }
      }
  </style>
<div class="container-fluid d-flex justify-content-center" id='slider_container'>

<ul class="bxSlider">
      
      <?php

        foreach ($slideshow as $value) {
          ?>
      <li>
         <img src="<?php echo base_url().$value->image; ?>" alt="slider images" >
      </li>

      <?php
        }

      ?>

    </ul>
  


</div>

    <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
    </div> -->

    <!--================ End Home Banner Area =================-->

    
   <!--================ Start About Area =================-->
   <?php
      foreach ($aboutus as $details) {
        
   ?>
   <section class="about_area mb-3">
      <div class="container">
        <div class="row h_blog_item">
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="<?php echo base_url().$details->image;?>" alt="aboutus" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <h4>
                  <?php echo $details->heading; ?>
                </h4>
                <p class="text-justify">
                  <?php echo $details->paragraph; ?>
                </p>
                
                <a class="primary-btn" href="<?php echo site_url().'/home/aboutus'?>">
                  View More <i class="ti-arrow-right ml-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      }
    ?>
    <!--================ End About Area =================-->



     <!--================ Start Feature Area =================-->
     <section class="feature_area section_gap_top">

      <div class="container">

        <div class="row justify-content-center" >
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Our Mission And Vision</h2>
              <p>
                Success is not final,failure is not fatal,It is the courage to continue that counts !!
                <?php
                  foreach ($textcontent as $text) {
                ?>
              </p>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature" >
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Our Mission</h4>
                <p class="text-justify" >
                  <?php
                    echo $text->mission;
                  ?>
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" >
            <div class="single_feature">
              <div class="icon">
              <img src="<?php echo base_url()."img/left-quote.png" ?>" alt="quote" width="52" height="45">
              </div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Our Quote</h4>
                <p class="text-justify">
                <?php
                    echo $text->quotes;
                  ?>
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" >
            <div class="single_feature">
              <div class="icon">
                <span class="flaticon-earth"></span>
              </div>
                <div class="desc">
                  <h4 class="mt-3 mb-2">Our Vision</h4>
                  <p class="text-justify">
                  <?php
                    echo $text->vision;
                  ?>
                  </p>
                  <?php
                  
                    }
                  ?>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->



<!--================ Start Popular Courses Area =================-->
<div>

      <div class="container">

        <div class="row justify-content-end">

        <div class="col-lg-6">
              

            <div class="single_feature" >
              
                <div class="desc">
                  <div class="icon">
                  <?php
                    foreach ($info as  $details) {
                      $logo=$details->logo;
                  ?>
                    <img src="<?php echo base_url().$details->logo;?>" alt="balakrishna college logo" width="84" height="72">
                    <?php
                      }
                    ?>
                  </div>
                  <h4 class="mt-3 mb-2">College Craft</h4>
                  <p class="text-justify">
                    <?php
                    foreach ($craft as $value):
                      echo $value->craft;
                    ?>

                    <?php
                      endforeach;
                    ?>
                  </p>
                  
              </div>
            </div>

        
                    
        </div>

          <div class="col-lg-6">
            <div class="main_title">
              <h2 class="mb-3">Our Popular Courses</h2>
                <p>
                  Education is the passport to the future, for tomorrow belongs to those who prepare for it today !!
                </p>
                
              <div class="single_course mt-4" >
              
                <div class="course_content text-left">
                 
                  <h4 class="mb-3">
                    <a href="<?php echo site_url()."/home/viewcourse_by_graduation/UG"; ?>">
                        UG Courses
                    </a>
                  </h4>
                  <p>
                    View Our Under Graduation Courses
                  </p>
                  
                </div>

              
              </div>


              <div class="single_course mt-4" >
              
                <div class="course_content text-left">
                 
                  <h4 class="mb-3">
                    <a href="<?php echo site_url()."/home/viewcourse_by_graduation/PG"; ?>">
                        PG Courses
                    </a>
                  </h4>
                  <p>
                  View Our Post Graduation Courses
                  </p>
                  
                </div>
                

              </div>
              <a class="primary-btn mt-2" href="<?php echo site_url().'/home/courses'?>">
          View All <i class="ti-arrow-right ml-1"></i>
        </a>
              
            </div>
            
          </div>
        <!-- </div> -->
        
        <!-- <div class="row" id="course_lists"> -->



              
          
              
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="container text-right">
        <a class="primary-btn" href="<?php echo site_url().'/home/courses'?>">
          View All <i class="ti-arrow-right ml-1"></i>
        </a>
    </div> -->

    </div>

    

    
    <!--================ End Popular Courses Area =================-->











    


























    
    <!-- =================Events Area Started =================== -->
<!-- 
    <div class="events_area" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3 text-white">Upcoming Events</h2>
              <p>
              The only way to do great work is to love what you do !!
              </p>
            </div>
          </div>
        </div> 
        <div class="row">
          
          <?php

                foreach ($events as $event) {
                
            ?>
        
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="<?php echo base_url().$event->image?>" alt="event" />
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><span>
                  <?php echo $event->date;?>
                  </span> 
                  
                  </div>

                  <div class="time-location">
                    <p>
                      <span class="ti-time mr-2"></span> 
                      <?php echo $event->time;?>
                    </p>
                    <p>
                      <span class="ti-location-pin mr-2"></span><?php echo $event->place;?>
                    </p>
                  </div>
                </div>
                <p>
                  <?php echo $event->summary;?>
                </p>
                <a href="<?php echo site_url().'/home/viewevent/'.$event->id ;?>" class="primary-btn rounded-0 mt-3">View Details</a>
              </div>
            </div>
          </div>
          
          <?php
            }
          ?>
          
          <div class="col-lg-12">
            <div class="text-center pt-lg-5 pt-3">
              <a href="<?php echo site_url().'/home/events'?>" class="event-link">
                View All Event <img src="img/next.png" alt="" />
              </a>
            </div>
          </div>

        </div>
      </div>
    </div> -->




    <!-- =================Events Area Started =================== -->




    <!-- ================= Gallery Area Started =================== -->


    <div class="popular_courses mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 >Our Gallery </h2>
              <p>
                A Picture is a Poem Without Words !!
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
                
              <?php

                foreach ($gallery as $image) {
                  
                
              ?>
                
              <div class="single_course">
                <div class="course_head">
                  <img style="height:200px" class="img-fluid" src="<?php echo base_url().$image->image;?>" alt="balakrishna gallery" />
                </div>
              </div>

              <?php
                }
              ?>


          </div>
        </div>
      </div>
    </div>

    <div class="container text-center">
        <a class="primary-btn" href="<?php echo site_url().'/home/gallery'?>">
          View All <i class="ti-arrow-right ml-1"></i>
        </a>
    </div>

  </div>
    <!-- ================= Gallery Area Ended =================== -->








<script>

$(document).ready(function(){
      $(".bxSlider").bxSlider({
        infiniteLoop:true,
        responsive:true,
        randomStart:true,
        mode:'horizontal',
        auto:true,
        controls:false,
        
      });
    });
var nextButton=document.querySelectorAll("img[src='img/next.png']");
var prevButton=document.querySelectorAll("img[src='img/prev.png']");

for(let i=0;i<nextButton.length;i++){
  nextButton[i].src="<?php echo base_url(); ?>"+"img/next.png";
  prevButton[i].src="<?php echo base_url(); ?>"+"img/prev.png";
}
 
$(".courses").removeClass("owl-carousel active_course");

</script>