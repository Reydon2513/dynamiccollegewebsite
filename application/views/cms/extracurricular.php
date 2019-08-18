<style>
.feature-img img{
    max-height: 150px;
    /* max-width: 300px; */
}
</style>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h3 class='text-white'>Extra Curricular Activities</h3>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Academics</a>
                  <a href="##">Extra Curricular Activities</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Extra Curricular Activity Started =================-->
    <?php
      foreach ($activity as $details) {
    ?>
    <section class="container mt-5 text-center">
    <div class="col-lg-12">  
        <div class="feature-img text-center">
            <img class="img-fluid" src="<?php echo base_url().$details->logo;?>" alt="logo">
        </div>
    </div>
    <div class="col-lg-12 col-md-12 blog_details">
        <h2>
        <?php echo $details->name;?>
        </h2>
        <p class="excert text-justify">
          <?php echo $details->activity;?>
        </p>
       
    </div>
</section>
<hr>
<?php
      }
?>
    <!--================Extra Curricular Activity Ended =================-->


    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="EXTRACURRICULAR ACTIVITY | BALAKRISHNA";

</script>