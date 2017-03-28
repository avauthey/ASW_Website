<?php
/**
 * Created by Chris
 * Modified by Chris the 16/03/17
 */
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            My Bookings
        </h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info"> Name </th>
                        <th class="info">Date</th>
                        <th class="info"> Start time </th>
                        <th class="info"> Duration </th>
                        <th class="info">Type of training</th>
                        <th class="info">Option</th>
                    </tr>
                    <?php
                  
                    foreach($array as $idTraining){
                        $training = new Training($idTraining['id']);
                        echo '  <tr>
                        <th>'.$training -> getName().'</th>
                        <th>'.$training -> getDate().'</th>
                        <th>'.substr($training -> getStart(),0,-3).'</th>
                        <th>'.$training -> getDuration().'</th>
                        <th>'.$training -> getType().'</th>
                        <th><a href="#" id="'.$training -> getId().'"  class="delbutton btn btn-danger" title="Click To Delete">Delete</a></th>
                          
                    </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal to show to ask to delete the booking -->
<div class="modal fade" id="modalAsk" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <p class="text-center" style="font-size:20px">Do you really want to delete this booking?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" class="delbuttonConfirm btn btn-success" id="btnConfirm">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal to show if the deletion is good -->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Booking Deleted</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 col-md-offset-5">
              <img src="Images/iconTick.png">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="indexUser.php?page=myBooking" role="button" class="btn btn-success" id="btnConfirm">Ok</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function() {
    $(".delbutton").click(function(){
    
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        console.log(del_id);
        var idUser = '<?php echo $user -> getId();?>';
        console.log(idUser);
        //Built a url to send
        $('#modalAsk').modal('show');
        $(".delbuttonConfirm").click(function(){
        
             $.ajax({
               type: "POST",
               url: "Functions/deleteBooking.php",
               //data: info,
               data: {params:{'id': del_id,'idUser': idUser }},
               success: function(answer){
                console.log(answer);
                if(answer == 1){
                    $('#modalConfirm').modal('show');
                }
               }
             });
        })

    });

});
$('#home').removeClass('active');
$('#training').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#myBookings').addClass('active'); 
</script>