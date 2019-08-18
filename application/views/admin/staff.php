<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Staff</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/staff'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus-circle mr-2'></i>Add Staff
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            
                            foreach ($staff as $values) {
                                ?>
                                <tr>
                                    <td> 
                                        <img src="<?php echo base_url().$values->profile; ?>" alt="avatar" style="height:64px;width:64px">
                                    </td>
                                    <td> 
                                        <?php echo $values->name; ?> 
                                    </td>
                                    <td> 
                                        <?php echo $values->age; ?> 
                                    </td>
                                    <td> 
                                        <?php echo $values->designation; ?> 
                                    </td>
                                    <td> 
                                        <?php echo $values->department; ?> 
                                    </td>
                                    <td> 
                                        <?php echo $values->description; ?> 
                                    </td>
                                    <td> 
                                        <a class='btn btn-info btn-sm' href="<?php echo site_url().'/admin/staff_edit/edit/'.$values->id.'/2';?>"> <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit</a>
                                        <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/staff_edit/delete/'.$values->id.'/2';?>"> <i class="fa fa-trash mr-1" aria-hidden="true"></i> Delete</a>
                                    
                                        <?php if($values->status == 0){?>
                                            <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/staff_edit/status/'.$values->id.'/1';?>>"> <i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i> Disabled</a>
                                            <!-- <button class='btn btn-sm btn-danger' onclick='changeStatus("<?php echo $values->id; ?>",1)'>Disabled</button> -->
                                        <?php }else{?>
                                            <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/staff_edit/status/'.$values->id.'/0';?>"> <i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i> Enabled</a>
                                            <!-- <button class='btn btn-sm btn-success' onclick='changeStatus("<?php echo $values->id; ?>",0)'>Enabled</button> -->
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

