<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>FAQ</h5>
                </div>
                <div class="card-body">
                    <form id="add_faq" method="post" class='form'>
                        
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control" name='answer' required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='add'> <i class='fa fa-plus-circle'></i> Add</button>
                            <!-- <button type="submit" class='btn btn-warning btn-sm d-none' id='save' ><i class='fa fa-floppy-o'></i>Save</button> -->
                        </div>
                    </form>

                    <form id="update_faq" method="post" class='form d-none'>
                        <input type="hidden" name="id" class='id'>
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control question" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <input type="text" class="form-control answer" name='answer' required>
                        </div>
                        <div class="form-group">
                            <!-- <button type="submit" class='btn btn-primary btn-sm' id='add'> <i class='fa fa-plus-circle'></i> Add</button> -->
                            <button type="submit" class='btn btn-warning btn-sm' id='save' ><i class='fa fa-floppy-o mr-1'></i>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>FAQ List</h5>
                </div>
                <div class="card-body" id="faq_list">
                    <table class="table table-light" id='faq_table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($faq as $value):
                            ?>
                            <tr>
                            <td> <?php echo $value->question; ?> </td>
                            <td> <?php echo $value->answer; ?> </td>
                            <td>
                            <button class='btn btn-primary btn-sm' onclick="edit('<?php echo $value->id ?>')" >Edit</button>
                             <?php
                                if($value->status == 0){
                             ?> 
                                <button class='btn btn-danger btn-sm' onclick="status('<?php echo $value->id ?>','1')" >Disabled</button>
                             <?php
                                }
                                else{
                             ?>
                                <button class='btn btn-success btn-sm' onclick="status('<?php echo $value->id ?>','0')" >Enabled</button>
                             <?php 
                            }
                            ?> 
                            <button class='btn btn-danger btn-sm' onclick="delete_faq('<?php echo $value->id ?>')" >Delete</button>
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


<script>

$("#add_faq").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);

    formdata.append("action","add_faq");
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            // console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                swal("Done !!", data['msg'], "success");
                $("#faq_list").load('<?php echo site_url().'/admin/faq';?> #faq_table')
            }
        }
    });

});


$("#update_faq").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    formdata.append("action","update_faq");
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            // console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                $("#save").addClass("d-none");  
                $("#add").removeClass("d-none");
                $("#add_faq").removeClass('d-none');
                $("#update_faq").addClass("d-none");
                swal("Done !!", data['msg'], "success");
                $("#faq_list").load('<?php echo site_url().'/admin/faq';?> #faq_table')
            }
        }
    });

});


function edit(id){

    var formdata=new FormData();
    formdata.append("id",id);
    $.ajax({
        url:"<?php echo site_url()."/admin/edit" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                $(".answer").val(data['answer']);
                $(".question").val(data['question']);
                $('.id').val(data['id']);
                $("#save").removeClass("d-none");
                $("#add").addClass("d-none");
                $("#add_faq").addClass('d-none');
                $("#update_faq").removeClass("d-none");
                
                
                // swal("Done !!", data['msg'], "success");
                // $("#faq_list").load('<?php echo site_url().'/admin/faq';?> #faq_table')
            }
        }
    });

}


function status(id,status){
    var formdata=new FormData();
    formdata.append("action","status");
    formdata.append("id",id);
    formdata.append('status',status);
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                
                swal("Done !!", data['msg'], "success");
                $("#faq_list").load('<?php echo site_url().'/admin/faq';?> #faq_table')
            }
        }
    });
}

function delete_faq(id){
    var formdata=new FormData();
    formdata.append("action","delete_faq");
    formdata.append("id",id);
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                
                swal("Done !!", data['msg'], "success");
                $("#faq_list").load('<?php echo site_url().'/admin/faq';?> #faq_table')
            }
        }
    });
}
</script>

