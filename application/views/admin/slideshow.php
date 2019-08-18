
<div class="content">

    <div class="animated fadeIn">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class='text-primary'>Add Slideshow Image</h4>
                    </div>

                    <div class="card-body">

                        <?php
                            echo form_open(site_url().'/admin/slideshow_add',['id'=>'addImage','enctype'=>'multipart/form-data']);
                        ?>

                        <div class="form-group">
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
                    <h5 class='p-1 text-primary'>Slideshow Images</h5>
                </div>

                <div class="card-body">
                    <table class='table table-responsive table-striped'>
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
                            
                            
                            foreach ($slideshow as $values) {
                                ?>
                                <tr>
                                    <td> <?php echo $values->id; ?> </td>
                                    <td> 
                                        <img src="<?php echo base_url().$values->image; ?>" alt="slideshowimage" style="height:180px;width:256px">
                                        
                                    </td>
                                    <td> 
                                        <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/slideshow_delete/'.$values->id.'/'.$values->image;?>"> <i class='fa fa-trash'></i> Delete</a>
                                        <!-- <button class='btn btn-sm btn-danger' onclick='deleteSlide("<?php echo $values->id; ?>")'>Delete</button> -->
                                    </td>
                                    <td>
                                        <?php if($values->status == 0){?>
                                            <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/slideshow_status_change/1/'.$values->id;?>"><i class="fa fa-thumbs-down mr-1" aria-hidden="true"></i>Disabled</a>
                                            <!-- <button class='btn btn-sm btn-danger' onclick='changeStatus("<?php echo $values->id; ?>",1)'>Disabled</button> -->
                                        <?php }else{?>
                                            <a class='btn btn-success btn-sm' href="<?php echo site_url().'/admin/slideshow_status_change/0/'.$values->id;?>"><i class="fa fa-thumbs-up mr-1" aria-hidden="true"></i>Enabled</a>
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
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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
