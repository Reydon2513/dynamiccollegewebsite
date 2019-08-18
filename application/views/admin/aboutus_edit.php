
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit Aboutus Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/aboutus';?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Aboutus Details
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/aboutus_update',['id'=>'addImage','enctype'=>'multipart/form-data']);
                        foreach ($editdata as $value) {
                           
                        
                    ?>
                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $value->image; ?>">
                    
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" class="form-control" name='image' value="<?php echo $value->image; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name='title' value="<?php echo $value->heading; ?>" required>
                    </div>


                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" cols="30" rows="10">
                        <?php echo $value->paragraph; ?>
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
