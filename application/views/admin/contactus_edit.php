
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5>Add Contact Details</h5>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/contact_add',['id'=>'addImage','enctype'=>'multipart/form-data']);
                        foreach ($details as $value) {
                            
                    ?>
                    
                    <div class="form-group">
                        <label for="mailid">Mail ID</label>
                        <input type="email" class="form-control" name='mailid' value="<?php echo $value->mailid; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="number1">Ph.No 1</label>
                        <input type="text" class="form-control" name='number1' value="<?php echo $value->phonenumber1; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="number2">Ph.No 2</label>
                        <input type="text" class="form-control" name='number2' value="<?php echo $value->phonenumber2; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name='facebook'  value="<?php echo $value->facebook;?>">
                    </div>


                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name='twitter'  value="<?php echo $value->twitter;?>">
                    </div>


                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" name='linkedin'  value="<?php echo $value->linkedin;?>">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->address; ?>
                        </textarea>
                    </div>
                    

                    <div class="form-group">
                        <label for="sitemap">Sitemap</label>
                        <textarea name="sitemap" class="form-control" cols="30" rows="10" required>
                        <?php echo $value->sitemap; ?>
                        </textarea>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm fa fa-upload'>Save</button>
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
