<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit Extracurricular Activity</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/list_extra_curricular'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Activities List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php
                        foreach ($editdata as $value) {
                           
                        echo form_open(site_url().'/admin/update_extracurricular',['enctype'=>'multipart/form-data']);
                    ?>
                    <input type="hidden" name="id" class='form-control' value="<?php echo $value->id; ?>">
                    <input type="hidden" name="old_logo" class='form-control' value="<?php echo $value->logo; ?>">

                    <div class="form-group">
                        <label for="logo">Activity Logo</label>
                        <input type="file" name="logo" class='form-control' value="<?php echo $value->logo; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" name="name" class='form-control' value="<?php echo $value->name; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class='form-control' cols="30" rows="10" required> 
                        <?php echo $value->activity; ?>
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-floppy-o'></i> Save</button>
                    </div>

                    <?php
                        echo form_close();
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>