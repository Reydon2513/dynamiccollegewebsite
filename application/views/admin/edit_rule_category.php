
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                <h4 style="float:left" class='text-primary'>Edit Rule Category</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/add_rule_category'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus mr-2'></i>Add Category
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" id="category">
                    <?php 
                    foreach ($category as $value):
                    ?>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input name="category" class="form-control" value="<?php 
                                if(isset($value->category)){
                                    echo $value->category;
                                }
                            ?>" required />
                            
                    
                    </div>
                    <input type="hidden" name="id" value="<?php echo $value->id ?>">
                    <?php
                    endforeach;
                    ?>
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-floppy-o'></i> Save</button>
                    </div>
                    </form>
                </div>

            </div>


        </div>

    </div>

</div>

</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-primary">Categories List</h5>
                    </div>
                    <div class="card-body" id='categories_list'>
                        <table class="table table-light" id='categories_table'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($category_list as $value):
                                ?>
                                <tr>
                                    <td>
                                    <?php
                                    echo $value->category;
                                    ?>
                                    </td>
                                    <td>
                                    <a class='btn btn-primary btn-sm' href="<?php echo site_url()."/admin/category_edit/".$value->id; ?>">Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick="delete_category('<?php echo $value->id ?>')">Delete</button>
                                    </td>
                                </tr>
                                <?php
                                
                                endforeach;
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>





<script>
$("#category").on("submit",function(e){
    e.preventDefault();
        var formdata=new FormData(this);
        formdata.append("action","edit_rule_category");
        $.ajax({
            url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
            type:"POST",
            data:formdata,
            processData:false,
            contentType:false,
            success:function(response){
                console.log(response);
                var temp=JSON.parse(response);
                if(temp['error']==0){
                    swal("Success !!", temp['msg'], "success");
                    $("#categories_list").load('<?php echo site_url()."/admin/add_rule_category" ?> #categories_table');
                }else{  
                    swal("Error !!", temp['msg'], "error");
                }
            }
        });
    
    
});

function delete_category(id){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append("action","delete_category");
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            if(temp['error']==0){
                swal("Success !!", temp['msg'], "success");
                $("#categories_list").load('<?php echo site_url()."/admin/add_rule_category" ?> #categories_table');
            }else{  
                swal("Error !!", temp['msg'], "error");
            }
        }
    });
}
</script>
