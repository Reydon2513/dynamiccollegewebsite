<style>
iframe{
  max-width:100% !important;
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
                <h2>Panorama</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Panorama</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->



    <!--================ News Area Started =================-->

    <section class="container text-center">
    <div class="col-lg-12 p-3">  
        <div class="feature-img text-center">
            <?php
            foreach ($panorama as $value){
                echo $value->iframe;
            }
            ?>
        </div>
    </div>
</section>

    <!--================ News Area Ended ================-->


    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="PANORAMA | BALAKRISHNA";

</script>

