<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Add a Staff</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/staff_manage'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>View Staffs List
                        </a>
                    </div>
                </div>
                

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/staff_add',['enctype'=>'multipart/form-data']);
                    ?>

                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" class='form-control' required>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class='form-control' required>
                    </div>
                    

                    <div class="form-group">
                        <label for="age">Qualification</label>
                        <input type="text" name="age" id="age" class='form-control' required>
                    </div>
                    

                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class='form-control' required>
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" name="department" class='form-control' required>
                    </div>

                    <div class="form-group">
                        <label for="email">Mail ID</label>
                        <input type="email" class='form-control' name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <!-- <input type="text" name="department" class='form-control'> -->
                        <textarea name="description" class='form-control' cols="30" rows="10"></textarea>
                    </div>
                    

                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-plus-circle'></i> Add Staff</button>
                        <button type="reset" class='btn btn-danger btn-sm'> <i class='fa fa-times'></i> Reset</button>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // function validate(){
    //     var age=document.getElementById('age').value;
    //     if(isNaN(age)){
    //         alert("Invalid Age !!");
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }
</script>