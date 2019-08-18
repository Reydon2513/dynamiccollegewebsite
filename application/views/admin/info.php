
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 class='text-primary'>Add College Info</h4>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/info_add',['id'=>'addImage','enctype'=>'multipart/form-data']);
                        foreach ($info as $value) { 
                    ?>
            
                    <div class="form-group">
                        <label for="logo">College Logo</label>
                        <input type="file" name="logo" required class="form-control" value="<?php echo $value->logo; ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">College Name</label>
                        <input type="text" class="form-control" name='name' value="<?php echo $value->name; ?>"  required>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="10">
                        <?php echo $value->description; ?>
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
<!-- 
<div class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class='p-1 text-primary'>Contact Details</h5>
            </div>

            <div class="card-body text-center">
                <table class='table table-responsive'>
                    <thead>
                        <tr>
                            
                            <th>Address</th>
                            <th>Sitemap</th>
                            <th>Mail Id</th>
                            <th>Ph.No 1</th>
                            <th>Ph.No 2</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        foreach ($details as $values) {
                            ?>
                            <tr>
                                <td> <?php echo $values->address; ?> </td>
                                <td> <?php echo $values->sitemap; ?> </td>
                                <td> <?php echo $values->mailid; ?> </td>
                                <td> <?php echo $values->phonenumber1; ?> </td>
                                <td> <?php echo $values->phonenumber2; ?> </td>

                                
                                <td> 
                                    <a class='btn btn-danger btn-sm' href="<?php echo site_url().'/admin/contact_details_edit'?>">Edit</a>
                                    
                                </td>
                                
                            </tr>
                           
                        <?php
                        }   

                        if(isset($error)){
                            if($error == 0){
                                echo '<script>alert("'.$msg.'") </script>';
                            }else if($error ==1){
                                echo '<script>alert("'.$msg.'") </script>';
                            }
                        }
                        
                       
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div> -->
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
