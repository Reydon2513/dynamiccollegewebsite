
<div class="content">

<div class="animated fadeIn">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 style="float:left" class='text-primary'>Add College Rule</h4>
                    <div class='text-right'>
                        <a href="<?php echo site_url().'/admin/add_rule_category'?>" class='btn btn-primary btn-sm'>
                            <i class='fa fa-plus-circle mr-2'></i>Add Category
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form  method="post" id="rule">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class='form-control' required>
                            <option value="" style="display:none">Choose Category</option>
                            <?php
                            foreach ($category as $value):
                            ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rule">Rule</label>
                        <textarea name="rule"  class="form-control" cols="10" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-plus'></i> Add</button>
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
                        <h5 class="text-primary">Rules List</h5>
                    </div>
                    <div class="card-body" id='rules_list'>
                        <table class="table table-light"  id='rules_table'>
                            <thead class="thead-light" >
                                <tr>
                                    <th>Rule</th>
                                    <th>Category ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                    foreach ($rule as $value):
                                ?>
                                <tr>
                                    <td>
                                    <?php
                                    echo $value->rule;
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    echo $value->cat_id;
                                    ?>
                                    <td>
                                    <a class='btn btn-primary btn-sm' href="<?php echo site_url()."/admin/rule_edit/".$value->id; ?>">Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick="delete_rule('<?php echo $value->id ?>')">Delete</button>
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
$("#rule").on("submit",function(e){
    e.preventDefault();
        var formdata=new FormData(this);
        formdata.append("action","add_rule");
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
                    $("#rules_list").load('<?php echo site_url()."/admin/rule" ?> #rules_table');
                }else{  
                    swal("Error !!", temp['msg'], "error");
                }
            }
        });
    
    
});

function delete_rule(id){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append("action","delete_rule");
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
                $("#rules_list").load('<?php echo site_url()."/admin/rule" ?> #rules_table');
            }else{  
                swal("Error !!", temp['msg'], "error");
            }
        }
    });
}
</script>
