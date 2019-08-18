
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
                  <a href="##">Events</a>
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
        <div class="row d-flex justify-content-center">
          
          <?php

                foreach ($events as $event) {
                
            ?>
        
          <div class="col-lg-6 col-md-6">
            <div class="single_event position-relative">
              <div class="event_thumb">
                <img src="<?php echo base_url().$event->image?>" alt="event images" />
              </div>
              <div class="event_details">
                <div class="d-flex mb-4">
                  <div class="date"><span>
                  <?php 
                  $event_name=$event->name;
                  echo $event->name;?>
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
                <p class='text-dark mt-2'>
                  <?php echo $event->summary;?>
                </p>
                <p class='text-dark mt-2 text-justify'>
                  <?php echo $event->description;?>
                </p>
            </div>
                <div class='mb-4'>
                    <a href="<?php echo site_url()."/home/events" ?>" class="primary-btn2 mb-3 mb-sm-0">Back To Events List</a>
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

    <script>
  
  document.title="<?php echo $event_name; ?> | BALAKRISHNA";

</script>