<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Add Placement Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/manage_student'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>View Placement Details
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php
                        echo form_open(site_url().'/admin/do_add_placement',['enctype'=>'multipart/form-data']);
                    ?>
                    
                   
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" class='form-control' required>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" name="name" class='form-control' required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class='form-control' cols="30" rows="10" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-plus'></i> Save</button>
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