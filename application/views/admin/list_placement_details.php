<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Placement Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/add_student'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus-circle mr-2'></i>Add a Placement Detail
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Student Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($students as $values) {
                                        ?>
                                        <tr>
                                            <td> <img src="<?php echo base_url().$values->profile; ?>" alt="logo" height="64" width="64"> </td>
                                            <td> <?php echo $values->name; ?> </td>
                                            <td> <?php echo $values->description; ?> </td>
                                            <td>
                                                <a class='btn btn-info btn-sm' href="<?php echo site_url().'/admin/student_edit/'.$values->id;?>"><i class='fa fa-pencil mr-1'></i>Edit</a>
                                                <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/student_delete/'.$values->id;?>"><i class='fa fa-trash mr-1'></i>Delete</a>
                                            </td>
                                            <td> 
                                                
                                                <?php if($values->status == 0){?>
                                                    <a  class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/student_status_change/1/'.$values->id;?>"><i class='fa fa-thumbs-down mr-1'></i>Disabled</a>
                                                   
                                                <?php }else{?>
                                                    <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/student_status_change/0/'.$values->id;?>"><i class='fa fa-thumbs-up mr-1'></i>Enabled</a>
                                                  
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