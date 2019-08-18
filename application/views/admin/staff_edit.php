<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Edit a Staff</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/staff_manage'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-arrow-circle-left mr-2'></i>Back To Staffs List
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <?php
                        echo form_open(site_url().'/admin/staff_update',['enctype'=>'multipart/form-data']);
                        foreach ($editdata as $val){
                    ?>

                    <input type="hidden" name="id"  value="<?php echo $val->id; ?>" >
                    <input type="hidden" name="oldprofilepath"  value="<?php echo $val->profile; ?>" >

                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" class='form-control' value="<?php echo $val->profile; ?>" >
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class='form-control' value="<?php echo $val->name; ?>" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="age">Qualification</label>
                        <input type="text" name="age" id="age" class='form-control' value="<?php echo $val->age; ?>" required>
                    </div>
                    

                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class='form-control' value="<?php echo $val->designation; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" name="department" class='form-control' value="<?php echo $val->department; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Mail ID</label>
                        <input type="email" class='form-control' name="email" id="email" value="<?php echo $val->mailid; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <!-- <input type="text" name="department" class='form-control' required> -->
                        <textarea name="description" cols="30" rows="10" class='form-control'><?php echo $val->description; ?></textarea>
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