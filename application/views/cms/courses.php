
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Courses Offered</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Academics</a>
                  <a href="##">Courses Offered</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->



    <!--================Course Area =================-->
    
<section class="container mt-5 mb-3 d-flex flex-wrap">
<?php
      foreach ($courses as $details) {
    ?>
    <div class="col-lg-6 blog_details">
        <h2><?php echo $details->name;?></h2>
        <p class="excert">
        <?php echo $details->summary;?>
        </p>

        <div>
            <a href="<?php echo site_url()."/home/viewcourse/".$details->id; ?>" target="_blank" class="primary-btn2 mb-3 mb-sm-0">View More</a>
        </div>
    </div>
    <?php
      }
?>
</section>

    <!--================Course Area =================-->

    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="COURSES | BALAKRISHNA";

</script>
