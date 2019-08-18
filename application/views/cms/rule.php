
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>College Rules</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Rules</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


<!--================Rules Area Started =================-->

<div class="container p-3 mt-5">

    <div class="row">
        
        <div class="col-lg-12">
                <?php
                    $i=1;
                    $heading='';
                    foreach ($rule as $value):
                ?>  
                    <h5>
                    <?php 
                      if($heading != $value->category){
                        echo $value->category; 
                        $heading=$value->category;
                        $i=1;
                      }
                    ?>
                    </h5>
                    <p class="text-justify ml-4 mt-2">
                        <?php echo $i.'.'.' '.$value->rule."<br>"; 
                            $i++;
                        ?>
                    </p>
                <?php
                    endforeach;
                ?>
          </div>

    </div>

</div>



    
<!--================Rules Area Ended =================-->

<script>
  
  document.title="RULES | BALAKRISHNA";

</script>

