<style>
#calendar {
    width: 100%;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}

</style>
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>
<div class="content">

<div class="animated fadeIn">

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-primary'>Choose Active Year</h4>
                </div>
                
                <div class="card-body" id="choose_active_year">
                <form  method="post" id="select_active_year">
                    <div class="form-group">
                        <?php
                            foreach ($active_batch as $value):
                        ?>
                        <span>Current Active Year : </span>
                        <strong class='text-info' id="activeyear">
                        <?php 
                            $start_month=explode("-",$value->start);
                            $end_month=explode("-",$value->end);
                            echo get_month_name($start_month[1])."-".$start_month[0]." to ".get_month_name($end_month[1])."-".$end_month[0];
                            endforeach;
                        ?>
                        </strong>
                    </div>
                    <div class="form-group">
                        <select name="active_year" id="active_year" class="form-control">
                            <option class='d-none' value='0'>Choose Year</option>
                            <?php
                                foreach ($batch as $value):
                            ?>
                            <option value="<?php echo $value->id ?>">
                            <?php  
                                $start_month=explode("-",$value->start);
                                $end_month=explode("-",$value->end);
                                echo get_month_name($start_month[1])."-".$start_month[0]." to ".get_month_name($end_month[1])."-".$end_month[0];
                            ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary btn-sm'> Submit</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="col-lg-7" >

            <div class="card">
                <div class="card-header">
                    <h4 class='text-primary'>Add Batch</h4>
                </div>

                <div class="card-body" >

                    <form method="post" id='add_batch'>
                    
                        <div class="row">
                        

                            <div class="form-group ml-3">
                                <input type="text" class="form-control starting_date" name='starting_date' placeholder="Starting Date" required>
                            </div>

                            <div class="form-group ml-3">
                                <input type="text" class="form-control starting_date" name='ending_date' placeholder="Ending Date" required>
                            </div>

                            <div class="form-group ml-3">
                                <button type="submit" class='btn btn-primary btn-sm'> <i class='fa fa-plus'></i> Add</button>
                            </div>


                        
                        </div>


                    <?php
                        echo form_close();
                    ?>

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
                        <h5 class='text-primary'>Upload CSV File</h5>
                     </div>
                      <div class="card-body">
                            
                            <form id="csv_upload" method="post" enctype="multipart/form-data" >

                                    <div class="form-group text-center">
                                        <p class='text-dark'>Your CSV File's data must be in the following syntax.</p>
                                        <p>First Column : Title Of Your Event. </p>
                                        <p>Second Column : Starting Date Of Your Event. (D-M-Y) </p>
                                        <p>Third Column : Ending Date Of Your Event. (D-M-Y) </p>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="csv" id="csv" class='form-control' accept=".csv">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id='csv_upload_btn' class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                        <img src="<?php echo base_url()."img/pre15.gif" ?>" alt="ajaxpreloader" height="52" width="52" id='ajax_preloader' class='invisible'>
                                    </div>

                            </form>
                      
                      </div>
                 </div>
            
            </div>
        
        </div>
    
    </div>


</div>

<?php
function get_month_name($month_number){
    $months=array(
        '01'=>"Jan",
        '02'=>"Feb",
        '03'=>"Mar",
        '04'=>"Apr",
        '05'=>"May",
        '06'=>"Jun",
        '07'=>"Jul",
        '08'=>"Aug",
        '09'=>"Sep",
        '10'=>"Oct",
        '11'=>"Nov",
        '12'=>"Dec"
    );
    if($month_number <= 12 && $month_number > 0){
        return $months[$month_number];
    }else{
        return -1;
    }
}
?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class='text-primary'>Batch List</h5>
                    </div>
                    <div class="card-body" id="batchlistview">
                    
                <table class="table table-light" id="batchlist">
                    <thead class="thead-light">
                        <tr>
                            <th>Batch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($batch as $value):
                        ?>
                        <tr>
                            <td> 
                            <?php  
                                $start_month=explode("-",$value->start);
                                $end_month=explode("-",$value->end);
                                echo get_month_name($start_month[1])."-".$start_month[0]." to ".get_month_name($end_month[1])."-".$end_month[0];
                            ?>  
                            </td>


                            <td>
                            <!-- <button type="submit" class='btn btn-primary btn-sm' onclick="edit_batch('<?php echo $value->id ?>')" >Edit</button> -->
                            <button type="submit" class='btn btn-danger btn-sm' onclick="delete_batch('<?php echo $value->id ?>')" >Delete</button>
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
       
                <div class="col-lg-7" >
                    <div class="card">

                        <div class="card-header">
                            <h5 class='text-primary'>Add Event</h5>
                        </div>
                        <div class="card-body">
                            <div class="response"></div>
                            <div id='calendar'></div>
                        </div>

                    </div>
                </div>
           </div>
    </div>
</div>





<script>

$(document).ready(function(){

    $(".starting_date").pickadate({format: 'yyyy-mm-dd'});

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "<?php echo site_url()."/admin/calender_event/fetch" ?>",
        <?php
            foreach ($active_batch as $value):   
        ?>
        validRange: {
            start: '<?php echo $value->start; ?>',
            end: '<?php echo $value->end; ?>'
        },
        <?php
            endforeach;   
        ?>
        displayEventTime: false,
        eventRender: function (event, element, view) {
            // console.log(event);
            // console.log(element);
            // console.log(view);
            // event.allDay=true;
            // console.log(event.allDay)
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
  
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                $.ajax({
                    url: '<?php echo site_url()."/admin/calender_event/add" ?>',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        console.log(data);
                        var temp=JSON.parse(data);
                        if(temp['error'] == 0){
                            swal("Done !!", temp['msg'], "success");
                        }else{
                            swal("Error !!", temp['msg'], "error");
                        }
                        // displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                    $.ajax({
                        url: '<?php echo site_url()."/admin/calender_event/edit" ?>',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            // displayMessage("Updated Successfully");
                            console.log(response);
                            var temp=JSON.parse(response);
                            if(temp['error'] == 0){
                                swal("Done !!", temp['msg'], "success");
                            }else{
                                swal("Error !!", temp['msg'], "error");
                            }
                        }
                    });
                },
                
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url()."/admin/calender_event/delete" ?>",
                    data: "&id=" + event.id,
                    success: function (response) {
                        console.log(response);
                        var temp=JSON.parse(response);
                        if(temp['error'] == 0){
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            swal("Done !!", temp['msg'], "success");
                        }else{
                            swal("Error !!", temp['msg'], "error");
                        }
                        
                    }
                });
            }
        }

    });
    

})

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}

$("#add_batch").on("submit",function( e ){
    e.preventDefault();
    var formdata=new FormData(this);
    formdata.append("action","add_batch");
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
                $("#batchlistview").load("<?php echo site_url()."/admin/calender" ?> #batchlist");
                $("#choose_active_year").load("<?php echo site_url()."/admin/calender" ?> #select_active_year");
            }
        }
    });
    
})


$("#select_active_year").on("submit",function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    formdata.append("action","select_active_year");
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
                
            }else{
                swal("Done !!", data['msg'], "success").then(function(){
                    location.reload();
                }); 
                // $("#activeyear").load("<?php echo site_url()."/admin/calender" ?> #activeyear");
            }
        }
    });
})

function delete_batch(id){
    var formdata=new FormData();
    formdata.append("action","delete_batch");
    formdata.append("id",id);
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                swal("Error !!", data['msg'], "warning");
            }else{
                swal("Done !!", data['msg'], "success");
                $("#batchlistview").load("<?php echo site_url()."/admin/calender" ?> #batchlist");
                $("#choose_active_year").load("<?php echo site_url()."/admin/calender" ?> #select_active_year");
            }
        }
    });
}


$("#csv_upload").on("submit",function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    formdata.append("action","csv_upload");
    $.ajax({
        url:"<?php echo site_url()."/admin/ajaxhandler" ?>",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $("#ajax_preloader").removeClass('invisible');
            $("#ajax_preloader").addClass('visible');
            $("#csv_upload_btn").attr('disabled',true);
        },
        complete:function(){
            $("#ajax_preloader").removeClass('visible');
            $("#ajax_preloader").addClass('invisible');
            $("#csv_upload_btn").attr('disabled',false);
        },
        success:function(response){
            console.log(response);
            var data=JSON.parse(response);
            console.log("%c Response","color:green;font-weight:bold");
            console.log(data);
            if(data['error'] == 1){
                $("#csv_upload_btn").attr('disabled',false);    
                swal("Error !!", data['msg'], "warning");
            }else{
                swal("Done !!", data['msg'], "success").then(function(){
                    location.reload();
                });
            }
        }
    });
})

</script>