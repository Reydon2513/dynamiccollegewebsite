
<div class="content">

    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class='text-primary'>Upload Your Forms</h4>
                    </div>
                    
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" id="form_upload">
                            <div class="form-group">
                                <label for="form">Choose PDF</label>
                                <input type="file" class="form-control" accept=".pdf" name='form' required>
                            </div>
                            <div class="form-group">
                                <label for="name">Form Name</label>
                                <input type="text" class="form-control" name='form_name' placeholder="Enter form name" required>
                            </div>
                            <div class="form-group">
                                <button class='btn btn-primary btn-sm'>Upload</button>
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
                        <h4 class='text-primary'>Forms List</h4>
                    </div>
                    
                    <div class="card-body" id='forms-list'>
                        <table class="table table-light" id='form-table'>
                            <thead class="thead-light">
                                <tr>
                                    <th> Name</th>
                                    <th> PDF </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($form as $value):
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value->name; ?>
                                    </td>
                                    <td> 
                                        <a href="<?php echo base_url().$value->path; ?>" target="_blank" class='btn btn-warning btn-sm' >Click Here To View The Form</a>    
                                        
                                    </td>
                                    <td>
                                    <button class='btn btn-sm btn-danger' onclick='delete_form("<?php echo $value->id; ?>"," <?php echo $value->path; ?> ")' >Delete</button>
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

$("#form_upload").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."/admin/upload_form" ?>",
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
               $("#forms-list").load("<?php echo site_url().'/admin/form';?> #form-table");
               
            }
        }
    });
})

function delete_form(id,path){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('path',path);
    $.ajax({
        url:"<?php echo site_url()."/admin/delete_form" ?>",
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
                $("#forms-list").load("<?php echo site_url().'/admin/form';?> #form-table");
               
            }
        }
    });
}

</script>
