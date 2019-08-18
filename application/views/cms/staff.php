
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Our Staff</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Academics</a>
                  <a href="##">Staff</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================ Staff List Area Started =================-->

    
    <style>
    .card{
        display:inline-block;
        transition:.3s;
    }
    .card:hover{
        cursor:pointer;
        box-shadow:.5px .5px 5px 5px #f1f1f1;
    }
    li:hover{
        cursor:pointer;
    }
    </style>



<!--================ Staff List Area  Started=================-->
<section class="trainer_area mt-5">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Our Expert Staff</h2>
              <p>
              A good teacher, like a good entertainer first must hold his audience's attention, then he can teach his lesson.

              </p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center d-flex align-items-center">

        <?php
                foreach ($staff as $details) {        
            ?>
          
        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">

            <div class="thumb d-flex justify-content-center">
              <img class="img-fluid card-thumb" src="<?php echo base_url().$details->profile; ?>" alt="staff" />
            </div>

            <div class="meta-text text-center">
              <h4><?php echo $details->name; ?>
              </h4>
              <p><?php echo $details->age; ?></p>
              <p class="designation"><?php echo $details->designation; ?></p>
              
              <div class="mb-4">
                <p>
                  Department Of <?php echo $details->department; ?>. <?php echo $details->description; ?>
                </p>
              </div>
              
            </div>

          </div>

          

        <?php
              }
          ?>
      </div>
    </section>


<!--================ Staff List Area Ended =================-->

<script>
  
  document.title="STAFF | BALAKRISHNA";

</script>