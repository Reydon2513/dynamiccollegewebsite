<style>
.img{
  max-height:300px;
  max-width:300px;
}
.fc-title{
    color:#fff !important;
}
</style>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Calender</h2>
                <div class="page_link">
                  <a href="<?php echo site_url().'/home/index'?>">Home</a>
                  <a href="##">Calender</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->


<!--================About Area =================-->

<div class="container mt-4 mb-4"> 
    
    <div class="row">
    
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Calender View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">List View</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">
        
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="col-lg-12 mt-2 d-flex justify-content-center">  
                <div class="col-lg-8">
                    <div id='calendar'></div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    
            <div class="col-lg-12 mt-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Days List View</h5>
                    </div>
                    <div class="card-body" style="max-height:530px;overflow:auto;">
                        <table class="table table-light" id="bootstrap-data-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Event Name</th> 
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dates as $value):
                                ?>
                                <tr>
                                
                                <td><?php echo $value->title;?></td>
                                <td>
                                    <?php echo date_format(date_create($value->start),"d-M-Y");?>
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


    <!--================About Area =================-->


  <script>
  
    document.title="CALENDER | BALAKRISHNA";
    
    
$(document).ready(function(){

    $('#bootstrap-data-table-export').DataTable();

    var calendar = $('#calendar').fullCalendar({
        editable: false,
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
        selectable: false,
        selectHelper: false,
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
                            swal("Error !!", temp['msg'], "danger");
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
        
        editable: false,
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
                                swal("Error !!", temp['msg'], "danger");
                            }
                        }
                    });
                },
                
        eventClick: function (event) {
            event.preventDefault();
            var deleteMsg = false;
            // var deleteMsg = confirm("Do you really want to delete?");
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
                            swal("Error !!", temp['msg'], "danger");
                        }
                        
                    }
                });
            }
        }

    });
    

})


  </script>
