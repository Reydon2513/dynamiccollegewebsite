
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 class='text-primary'>Add Text Content</h4>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/text_content_add',['id'=>'addImage','enctype'=>'multipart/form-data']);
                        foreach($text as $value){
                    ?>
                    
                    
                    <div class="form-group">
                        <label for="mission">Mission</label>
                        <textarea name="mission" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->mission;?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="vision">Vision</label>
                        <textarea name="vision" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->vision;?>
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <textarea name="quote" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->quotes;?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="college_craft">College Craft</label>
                        <textarea name="college_craft" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->craft;?>
                        </textarea>
                    </div>
                    
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-floppy-o'></i> Save</button>
                    </div>

                    <?php
                        }
                        echo form_close();
                    ?>

                </div>

            </div>


        </div>

    </div>

</div>

</div>

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


