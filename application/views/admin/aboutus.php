
<div class="content" id='addaboutus'>

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12" >

            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Add Aboutus Details</h4>
                    <div class='text-right'>
                        <a href="#listaboutus" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-down mr-2'></i>View Aboutus Details
                        </a>
                    </div>
                </div>

                <div class="card-body" >

                    <?php
                        echo form_open(site_url().'/admin/aboutus_add',['enctype'=>'multipart/form-data']);
                    ?>
                    
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" class="form-control" name='image' required>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name='title' required>
                    </div>


                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-floppy-o'></i> Save</button>
                        <button type="reset" class='btn btn-danger btn-sm'> <i class='fa fa-times'></i> Reset</button>
                    </div>


                    <?php
                        echo form_close();
                    ?>

                </div>

            </div>


        </div>

    </div>

</div>

</div>

<div class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 style="float:left" class='text-primary'>Aboutus Details</h4>
                <div class='text-right'>
                    <a href="#addaboutus" class='btn btn-primary btn-sm'>
                        <i class='fa fa-arrow-circle-up mr-2'></i>Add Aboutus Details
                    </a>
                </div>
            </div>

            <div class="card-body text-center">
                <table class='table table-responsive' id='listaboutus'>
                    <thead>
                        <tr>
                            
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        foreach ($aboutus as $values) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo base_url().$values->image; ?>" alt="image" height="128" width="128"> </td>
                                <td> <?php echo $values->heading; ?> </td>
                                <td> <?php echo $values->paragraph; ?> </td>
                                
                                <td> 
                                    <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/aboutus_details_edit/'.$values->id; ?>"> <i class='fa fa-pencil mr-1'></i> Edit</a>
                                    <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/aboutus_details_delete/'.$values->id; ?>"> <i class='fa fa-trash mr-1'></i>Delete</a>
                                </td>

                                <td>
                                    <?php
                                        if($values->status == 0){
                                    ?>
                                    <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/aboutus_details_status/1/'.$values->id; ?>"> <i class='fa fa-thumbs-down mr-1'></i> Disabled</a>
                                    <?php
                                        }else{
                                    ?>
                                    <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/aboutus_details_status/0/'.$values->id; ?>"> <i class='fa fa-thumbs-up mr-1'></i>Enabled</a>
                                    <?php
                                        }
                                    ?>

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
<script>

// $("#addImage").on('submit',function( event ){
//     event.preventDefault();

//     $.ajax({
//         url:"<?php echo site_url().'/admin/slideshow_add'; ?>",
//         type:"POST",
//         processData:false,
//         contentType:false,
//         data:new FormData($("#addImage")),
//         success:function(response){
//             console.log(response);
//         }
//     });

// })

// function deleteSlide(id){
//     $.ajax({
//         url:"<?php echo site_url().'/admin/slideshow_delete/'; ?>"+id,
//         type:"POST",
//         processData:false,
//         contentType:false,
//         success:function(response){
//             console.log(response);
//         }
//     });
// }

</script>
