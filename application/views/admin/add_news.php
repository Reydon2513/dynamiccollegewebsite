<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Add Infrastructure Details</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/manage_news'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>View Infrastructure Details
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php
                        echo form_open(site_url().'/admin/do_add_news',['enctype'=>'multipart/form-data']);
                    ?>
                    
                   
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class='form-control' required>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class='form-control' required>
                    </div>

                    <div class="form-group">
                        <!--<label for="summary">Summary</label>-->
                        <input type="hidden" name="summary" class='form-control' required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="date">Date</label>
                        <input type="text" name="date" class='form-control' required>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class='form-control' required>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class='form-control' required>
                    </div> -->
                    
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