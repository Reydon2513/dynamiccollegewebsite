

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                   

                    <h4 style="float:left" class='text-primary'>Add a Course</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/course'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>View Courses
                        </a>
                    </div>
                </div>
                <div class="card-body">
                <?php
                        echo form_open(site_url().'/admin/course_add',['enctype'=>'multipart/form-data']);
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

                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" name="name" class='form-control' required>
                    </div>
                    
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <input type="text" name="summary" class='form-control' required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <!-- <input type="text" name="department" class='form-control'> -->
                        <textarea name="description" class='form-control' cols="30" rows="10" required></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="syllabus">Syllabus</label>
                        <input type="file" name="syllabus" class='form-control' required>
                    </div>                    

                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-plus-circle'></i> Add Course</button>
                        <button type="reset" class='btn btn-danger btn-sm'> <i class='fa fa-times'></i> Reset</button>
                    </div>

                    <?php
                        echo form_close();
                        if(isset($error)){
                            if($error == 0){
                                echo '<script>alert("'.$msg.'") </script>';
                            }else if($error ==1){
                                echo '<script>alert("'.$msg.'") </script>';
                            }
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>