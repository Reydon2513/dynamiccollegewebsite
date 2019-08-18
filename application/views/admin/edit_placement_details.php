<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit Placement Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/manage_student'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Details List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php
                        echo form_open(site_url().'/admin/update_placement_details',['enctype'=>'multipart/form-data']);
                        foreach ($editdata as $value) {        
                    ?>

                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                    <input type="hidden" name="old_profile" value="<?php echo $value->profile; ?>">

                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" class='form-control' value="<?php echo $value->profile; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" name="name" class='form-control' value="<?php echo $value->name; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class='form-control' cols="30" rows="10" required> <?php echo $value->description; ?> </textarea>
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