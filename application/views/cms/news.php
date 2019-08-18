
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Infrastructure</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Infrastructure</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->



    <!--================ News Area Started =================-->

  <?php

    foreach ($news as $key => $details) {

  ?>

    <section class="container mt-5 text-center">
    <div class="col-lg-12">  
        <div class="feature-img text-center">
            <img class="img-fluid" src="<?php echo base_url().$details->image?>" alt="news_image">
        </div>
    </div>
    <div class="col-lg-12 col-md-12 blog_details">
        <h2>
        <?php echo $details->title;?>
        </h2>
        <p class="excert text-justify">
        <?php echo $details->description;?>
        </p>
    </div>
</section>
<?php
  }
?>
    <!--================ News Area Ended ================-->


    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="INFRASTRUCTURE | BALAKRISHNA";

</script>

