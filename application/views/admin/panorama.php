<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Panorama 
                </div>
                <div class="card-body">
                        <?php
                                foreach ($panorama as $value):
                            ?>
                    <form action="<?php echo site_url().'/admin/panorama_add' ?>" method="post">
                        <div class="form-group">
                            <label for="panorama">Paste Your IFrame Tag Here</label>
                            <textarea name="iframe" cols="30" rows="10" class='form-control' required>
                            
                            
                                    <?php if(isset($value->iframe)){echo $value->iframe;} ?>
                            
                            
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary btn btn-sm">
                            <i class='fa fa-pencil mr-1'></i>Update</button>
                            <?php 
                                if($value->status == 0){
                                    ?>
                                    
                            <a href="<?php echo site_url().'/admin/panorama_status/1' ?>" class='btn btn-danger btn-sm'>
                            
                            <i class='fa fa-thumbs-down mr-1'></i>   Disabled</a>
                                   
                                    <?php
                                }else{
                            ?>
                            <a href="<?php echo site_url().'/admin/panorama_status/0' ?>" class='btn btn-success btn-sm'>
                            
                            <i class='fa fa-thumbs-up mr-1'></i>Enabled</a>
                                <?php
                            }?>
                        </div>

                        
                    </form>
                    <?php
                            endforeach;
                            ?>

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