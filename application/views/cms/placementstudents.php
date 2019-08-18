
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Placement Details</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Academics</a>
                  <a href="##">Placement Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================ Placement Students Area Started =================-->

    
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


<section class="trainer_area mt-5">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Placement Details</h2>
              <!-- <p>
                Replenish man have thing gathering lights yielding shall you
              </p> -->
            </div>
          </div>
        </div>

        <div class="row justify-content-center d-flex align-items-center">

        <?php
                foreach ($placement_students as $details) {
            ?>

        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid card-thumb" src="<?php echo base_url().$details->profile; ?>" alt="student" />
            </div>
            <div class="meta-text text-sm-center">
              <h4><?php echo $details->name; ?></h4>
              
              <div class="mb-4">
                <p>
                  <?php echo $details->description; ?>
                </p>
              </div>
              
            </div>
          </div>

       

          <?php
                }
            ?>

      </div>
    </section>




    <!--================ Placement Students Area Ended =================-->

    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="PLACEMENT DETAILS | BALAKRISHNA";

</script>