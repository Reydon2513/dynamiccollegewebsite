
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h3 class="current_course" style="color:white">Courses</h3>
                <div class="page_link">
                  <a href="<?php echo site_url()."/home/index" ?>">Home</a>
                  <a href="##">Academics</a>
                  <a href="<?php echo site_url()."/home/courses" ?>">Courses Offered </a>
                  <a href="##" class="current_course"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->



    <!--================View Course Area =================-->
    <?php
      foreach ($course as $value) {
    ?>
<section class="container mt-5 mb-3 text-center">
    <div class="col-lg-12 col-md-12 blog_details">
        
        <h2><?php 
        $course_name=$value->name;
        echo $value->name; ?></h2>
        <p class="excert">
        <?php echo $value->summary; ?>
        </p>
        <p class="excert text-justify">
        <?php echo $value->description; ?>
        </p>
        <div>
            <a href="<?php echo base_url().$value->syllabus; ?>" target="download" class="primary-btn2 mb-3 mb-sm-0">Download Syllabus</a>
            <a href="<?php echo site_url()."/home/courses" ?>" class="primary-btn2 mb-3 mb-sm-0">Back To Course List</a>
        </div>
    </div>
</section>

  <script>
  $(".current_course").html('<?php echo $course_name; ?>');
  </script>
<?php
  }
?>
    <!--================View Course Area =================-->
    <!--================ Staff List Area Ended =================-->

<script>
  
  document.title="COURSES | BALAKRISHNA";

</script>
