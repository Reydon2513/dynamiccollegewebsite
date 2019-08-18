  <script src="<?php echo base_url(); ?>js/mixitup.js"></script>
  
  <style>
  .course_head{
    height:200px;
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
                <h2>Gallery</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Gallery</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Gallery Area Started =================-->
<div class="container p-5">
				<h3 class="title_color">Our Gallery</h3>
				<div class="row gallery-item">

          <div class="container text-center p-2">
          <button type="button" data-filter=".mix" class='btn btn-primary btn-sm'>
                  All
                </button>
          <?php
              $colors=array('success','warning','info','danger');
              $i=0;
              $category='';
            foreach ($gallery as $g) {
                if($category!= $g['name']):
            ?>
                <button type="button" data-filter="<?php echo '.'.$g['name'];?>" class='btn btn-<?php echo $colors[$i]; ?> btn-sm'>
                  <?php echo $g['name'];?>
                </button>
            <?php
            $category=$g['name'];
            endif;
            $i++;
              }
            ?>
          </div>
					

					<div class="container col-lg-12 mt-2 d-flex flex-wrap justify-content-center" id="gallery_container">
          <?php

						foreach ($gallery as $g) {
						
					?>
						<a href="<?php echo base_url().$g['image'];?>"class="img-gal mt-2 p-2 mix <?php echo $g['name'];?>">
              <img class="img-fluid" src="<?php echo base_url().$g['image'];?>" alt="gallery" width="220" style="min-height:160px" />  
            </a>
              <?php
              }
            ?>
					</div>

					

				</div>
            </div>
            
    <!--================ Gallery Area Ended =================-->

    <script>
  
  document.title="GALLERY | BALAKRISHNA";
    
    $(document).ready(function(){
      var mixer = mixitup($("#gallery_container"));
    })


</script>
