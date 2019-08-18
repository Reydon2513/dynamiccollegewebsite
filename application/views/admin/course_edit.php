<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit a Course</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/course'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Course List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                <?php   
                        foreach ($course as $values) {
                            
                        echo form_open(site_url().'/admin/course_update',['enctype'=>'multipart/form-data']);
                    ?>
                    <div class="form-group">
                        <label for="graduation">Graduation</label>
                        <select name="graduation" id="graduation" required class='form-control'>
                            <option value="" style="display:none">Choose Graduation</option>
                            <option value="UG">UG</option>
                            <option value="PG">PG</option>
                            <option value="M.Phil">M.Phil</option>
                        </select>
                        
                    </div>
                    <input type="hidden" name="id" value="<?php echo $values->id; ?>">
                    <input type="hidden" name="syllabusoldpath" value="<?php echo $values->syllabus; ?>">
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" name="name" class='form-control' value="<?php echo $values->name; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input type="text" name="summary" class='form-control' value="<?php echo $values->summary; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <!-- <input type="text" name="department" class='form-control'> -->
                        <textarea name="description" class='form-control' cols="30" rows="10"> <?php echo $values->description; ?></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="syllabus">Syllabus</label>
                        <input type="file" name="syllabus" class='form-control' value="<?php echo $values->syllabus; ?>">
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