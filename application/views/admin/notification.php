<div class="content">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="card col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Send a Notification</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url().'/admin/send_notification'; ?>" method="post">
                        <div class="form-group">
                            <label for="title">Subject</label>
                            <input type="text" class="form-control" name='subject' placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class='form-control' id="message" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class='btn btn-primary btn-sm'> <i class='fa fa-send'></i> Send</button>
                        </div>
                        </form>
                        <?php
                        
                            if(isset($error)){
                                if($error == 0){
                            ?>
                                <script>  
                                    window.onload=function(){
                                        swal("Done !!", "<?php echo $msg;?>", "success");
                                    }
                                  
                                </script>
                            <?php
                                    
                                }else if($error ==1){
                            ?>
                                <script>

                                    window.onload=function(){
                                        swal("Error !!", "<?php echo $msg;?>", "error");
                                    }
                                
                                </script>
                            <?php
                                    
                                }
                            }
                           
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>