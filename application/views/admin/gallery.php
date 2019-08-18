
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                <h4 style="float:left" class='text-primary'>Add Gallery Images</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/add_gallery_category'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus-circle mr-2'></i>Add Category
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/gallery_add',['enctype'=>'multipart/form-data']);
                    ?>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class='form-control' required>
                            <option value="" style="display:none">Choose Category</option>
                            <?php
                                foreach ($options as $value):
                            ?>
                            <option value="<?php echo $value["id"] ?>"> 
                                <?php echo $value['name'] ?>
                            </option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input type="file" name="image" class='form-control'>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-upload'></i> Upload Image</button>
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
<style>
th,td{
    width:20%;
}
</style>
<div class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class='p-1 text-primary'>Gallery Images</h5>
            </div>

            <div class="card-body text-center">
                <table class='table table-responsive'>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        foreach ($gallery as $values) {
                            ?>
                            <tr>
                                <td> <?php echo $values->id; ?> </td>
                                <td> 
                                    <img src="<?php echo base_url().$values->image; ?>" alt="galleryimage" style="height:180px;width:270px">
                                </td>
                                <td> 
                                    <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/gallery_delete/'.$values->id.'/'.$values->image;?>"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete</a>
                                    <!-- <button class='btn btn-sm btn-danger' onclick='deleteSlide("<?php echo $values->id; ?>")'>Delete</button> -->
                                </td>
                                <td>
                                    <?php if($values->status == 0){?>
                                        <a  class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/gallery_status_change/1/'.$values->id;?>"> <i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i>Disabled</a>
                                        <!-- <button class='btn btn-sm btn-danger' onclick='changeStatus("<?php echo $values->id; ?>",1)'>Disabled</button> -->
                                    <?php }else{?>
                                        <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/gallery_status_change/0/'.$values->id;?>"><i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i>Enabled</a>
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

<script>

// $("#addImage").on('submit',function( event ){
//     event.preventDefault();

//     $.ajax({
//         url:"<?php echo site_url().'/admin/gallery_add'; ?>",
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
//         url:"<?php echo site_url().'/admin/gallery_delete/'; ?>"+id,
//         type:"POST",
//         processData:false,
//         contentType:false,
//         success:function(response){
//             console.log(response);
//         }
//     });
// }

</script>
