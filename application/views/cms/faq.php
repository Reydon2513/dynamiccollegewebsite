
    <style>
    .faq{
        width:75%;
        height:280px;
    }
    @media only screen and (max-width:425px){
        .faq{
            width:100%;
            height:210px;
        }
        .name{
          font-size:16px;
        }
    }
    @media only screen and (max-width:375px){
        .faq{
            width:100%;
            height:200px;
        }
        .name{
          font-size:14px;
        }
        .question{
          font-size:14px;
        }
    }
    @media only screen and (max-width:320px){
        .faq{
            width:100%;
            height:190px;
        }
        .name{
          font-size:12px;
        }
        .question{
          font-size:12px;
        }
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
                <h5 class='text-light'>Frequently Asked Questions</h5 >
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">FAQs</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <div class="container-fluid text-center mt-5">
        <img src="<?php echo base_url()."img/f-a-q.jpg" ?>" class='faq' alt="faq" >
    </div> -->
    <!--================End Home Banner Area =================-->


<!--================Rules Area Started =================-->

<div class="container p-3 mt-5">

    <div class="row d-flex justify-content-center" >
        
        <div class="col-lg-10">
                <?php
                    $i=1;
                    foreach ($faq as $value):
                      // echo "<h6>Question</h6>";
                ?>  
                    <h5 class='bg-light p-2 question'>
                    <?php 
                        echo  "<span class='name'>". $i. ' . ' ."</span>".$value->question;
                        $i++;
                        // echo "<h6>Answer</h6>";
                    ?>
                    </h5>
                    <p class="ml-5 mt-2">
                        <?php echo $value->answer; ?>
                    </p>
                    <hr>
                <?php
                    endforeach;
                ?>
          </div>

    </div>

</div>



    
<!--================Rules Area Ended =================-->

<script>
  
  document.title="FAQs | BALAKRISHNA";

</script>

