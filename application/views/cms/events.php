        
    
    
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Latest Events</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Latest Events</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================ Events Area Started =================-->

    <section class="container mt-5 text-center">
    <div class="col-lg-12">  
        <div class="feature-img text-center">








            
    <div>
      <div class="container">
        <div class="row">
          
          <?php

                foreach ($events as $event) {
                
            ?>
        
          <div class="col-lg-6 col-md-6"> 
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="<?php echo base_url().$event->image?>" alt="event" class='img-fluid event_image' />
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><span>
                  <?php echo $event->name;?>
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
                  <?php echo $event->date;?>
                </p>
              </div>
                <p class='text-dark mt-2 text-justify'>
                  <?php echo $event->description;?>
                </p>
            </div>
          </div>
          
          <?php
            }
          ?>
          
        </div>
      </div>
    </div>







        </div>
    </div>
   
</section>

    <!--================ Events Area Ended ================-->


    <!--================ Staff List Area Ended =================-->
<style>
.mb-150{
    margin-bottom:150px !important;
}
.single_event {
    margin-bottom: 60px !important;
}
.date span{
        font-size:16px!important;
    }
    .event_image{
        height:330px;
    }
@media only screen and (max-width:415px){
    .single_event .event_details {
        background: rgba(0, 35, 71, 0.5);
        position: absolute;
        top: 0px;
        right: 0px;
        width: 275px;
        padding: 10px 25px!important;
        color: #ffffff;
    }
    
}
@media only screen and (max-width:425px){
    .event_image{
        height:300px;
    }
}
@media only screen and (max-width:375px){
    .event_image{
        height:270px;
    }
}
@media only screen and (max-width:320px){
    .event_image{
        height:210px;
    }
}
@media only screen and (max-width:365px){
    .single_event .event_details {
        background: rgba(0, 35, 71, 0.5);
        position: absolute;
        top: 0px;
        right: 0px;
        width: 255px !important;
        padding: 5px 15px !important;
        color: #ffffff;
    }
}
@media only screen and (max-width:991px){
    .date span{
        font-size:12px!important;
    }
}
</style>
<script>
  
  document.title="EVENTS | BALAKRISHNA";
    if($(window).width <353)
    {
        $(".single_event").addClass("mb-150");
    }
</script>