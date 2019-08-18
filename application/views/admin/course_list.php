<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Course List</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/course_manage'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus-circle mr-2'></i>Add a Course
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Summary</th>
                                    <th>Description</th>
                                    <th>Syllabus</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($course as $values) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $values->name; ?> </td>
                                            <td> <?php echo $values->summary; ?> </td>
                                            <td> <?php echo $values->description; ?> </td>
                                            <td> <a href="<?php echo base_url().$values->syllabus?>" class='text-info' target="_blank">Click Here To View Syllabus</a></td>
                                            <td> 
                                                <a class='btn btn-primary btn-sm' href="<?php echo site_url().'/admin/course_edit/'.$values->id;?>"> <i class='fa fa-pencil mr-1'></i> Edit</a>
                                               
                                           
                                                <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/course_delete/'.$values->id;?>"> <i class='fa fa-trash mr-1'></i> Delete</a>
                                               
                                            
                                                <?php if($values->status == 0){?>
                                                    <a  class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/course_status_change/1/'.$values->id;?>"> <i class='fa fa-thumbs-down mr-1'></i>Disabled</a>
                                                   
                                                <?php }else{?>
                                                    <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/course_status_change/0/'.$values->id;?>"> <i class='fa fa-thumbs-up mr-1'></i>Enabled</a>
                                                  
                                                <?php }?>
                                            </td>
                                        </tr>
                                    
                                    <?php
                                    }   

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
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>