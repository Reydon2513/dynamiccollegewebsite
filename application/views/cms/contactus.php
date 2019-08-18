
    
    <style>
    .sitemap{
      max-width:100%;
    }
    .sitemap iframe{
      width:100% !important;
    }
    .contact{
      display:none;
    }

    .c-lg-9{
      -ms-flex: 0 0 60%;
      flex: 0 0 60%;
      max-width:60% !important;
    }
    .c-lg-6{
      -ms-flex: 0 0 40%;
      flex: 0 0 40%;
      max-width:40% !important;
    }
    @media only screen and (max-width:991px){
        .c-lg-9{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width:100% !important;
      }
      .c-lg-6{
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width:100% !important;
    }
    }
    .section_gap {
      padding: 50px 0;
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
                <h2>Contact Us</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


<!--================Contact Area =================-->
<section class="contact_area section_gap">
      <div class="container text-center">
          <!-- <div class="sitemap">
      <?php
          foreach ($contactus as $details) {
            echo $details->sitemap;
      ?>
      </div> -->
<!-- 
      <div class="row">
      <div class="col-lg-9">
            <form
              class="row contact_form"
              action="<?php echo site_url()."/home/mail"?>"
              method="post"
              id="contactForm"
              
            >
              <div class="col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="subject"
                    name="subject"
                    placeholder="Enter Subject"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'"
                    required=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea
                    required
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Enter Message"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Message'"
                    
                  ></textarea>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" value="submit" class="btn primary-btn">
                  Send Message
                </button>
              </div>
            </form>
          </div>
          

      </div>
 -->
          <div class="row d-flex justify-content-center" >
            
          <div class="col-lg-6">
          <h3>Send us your query anytime !!</h3>
                <form action="<?php echo site_url()."/home/mail"?>" class='mt-5' method="post">

                  <div class="form-group">
                  <input type="text" class="form-control" name='name' placeholder="Enter name" pattern="[a-zA-Z\s\.]+" required>
                  </div>
                  <div class="form-group">
                  <input type="email" class="form-control" name='email' placeholder="Enter email address" required>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name='number' placeholder="Enter mobile number" pattern="[0-9]{10}" maxlength="10" required>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name='subject' placeholder="Enter subject" required>
                  </div>
                  <div class="form-group">
                  <textarea name="message" placeholder='Enter message' class='form-control' cols="30" rows="5" required></textarea>
                  </div>
                  <div class="form-group">
                  <button type="submit" value="submit" class="btn primary-btn">
                    Send Message
                  </button>
                  </div>
                </form>
            </div>
          </div>

        <div class="row mt-5 d-flex justify-content-center">
          <div class="col-lg-6 text-justify">
            <div class="contact_info">
              <div class="info_item mt-2">
                <i class="ti-home"></i>
                <h6><?php echo $details->address;?></h6>
                
              </div>
              <div class="info_item mt-2">
                <i class="ti-headphone"></i>
                <h6><a href="#"><?php echo $details->phonenumber1;?></a></h6>
                
              </div>
              <div class="info_item mt-2">
                <i class="ti-email"></i>
                <h6><a href="#"><?php echo $details->mailid;?></a></h6>
                <!-- <p>Send us your query anytime!</p> -->
              </div>
            </div>
          </div>

          
        </div>

        <?php
          }

          if(isset($error)){
              if($error == 0){
                echo "<script> alert('".$msg."') </script>";
                echo "<script> console.log('".$msg."') </script>";
              }else{ 
                echo "<script> alert('".$msg."') </script>";
                echo "<script> console.log('".$msg."') </script>";
              }
          }
        ?>
      </div>
    </section>
    <!--================Contact Area =================-->

<script>
  document.title="CONTACTUS | BALAKRISHNA";
  $(document).ready(function(){
    $("#footer_content").removeClass("col-lg-6");
    $("#footer_content").addClass("col-lg-9");
  })
  
  
</script>
