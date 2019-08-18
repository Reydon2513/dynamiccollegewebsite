<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit Infrastructure Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/manage_news'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Infrastructures List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php
                        echo form_open(site_url().'/admin/update_news',['enctype'=>'multipart/form-data']);
                        foreach ($editdata as $value) {
                         
                    ?>
                    
                   <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                   <input type="hidden" name="old_image" value="<?php echo $value->image; ?>">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class='form-control' value="<?php echo $value->image; ?>">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class='form-control' value="<?php echo $value->title; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input type="hidden" name="summary" class='form-control' value="<?php echo $value->summary; ?>" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" name="date" class='form-control' value="<?php //echo //$value->date; ?>" required>
                    </div> -->
<!-- 
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class='form-control' value="<?php //echo $value->time; ?>" required>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class='form-control' value="<?php //echo //$value->location; ?>" required>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class='form-control' cols="30" rows="10" required>  
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