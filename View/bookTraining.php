<?php
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            Training Sessions
        </h1>
        <div class="col-md-2">
            <h4> Filter</h4>
            <label for="">Name</label>
            <select id="nameTraining" class="form-control">
                <option value="--">Select Training Session</option>
                <?php
                    $query = $bdd -> prepare('SELECT DISTINCT(name) FROM Training');
                    $query -> execute();
                    $arrayName = $query -> fetchAll();
                    foreach ($arrayName as $name) {
                        echo '<option value="'.$name["name"].'">'.$name["name"].'</option>';
                    }
                ?>
            </select>
            <label for="">Type</label>
            <select id="typeTraining" class="form-control">
                <option value="--">Select a type</option>
                <?php
                    $query = $bdd -> prepare('SELECT DISTINCT(type) FROM Training');
                    $query -> execute();
                    $arrayName = $query -> fetchAll();
                    foreach ($arrayName as $name) {
                        echo '<option value="'.$name["type"].'">'.$name["type"].'</option>';
                    }
                ?>
            </select>
            <label for="">Date</label>
            <input type="date" class="form-control" data-date-inline-picker="true" /></br>
            <button id="search" name="search" class="btn btn-primary">Search</button></br>
        </div>
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="info">Name</th>
                        <th class="info">Number of Remaining Places</th>
                        <th class="info">Date of Session</th>
						<th class="info">Start Time</th>
                        <th class="info">Duration</th>
                        <th class="info">Type of Training</th>
						<th class="info">Option</th>
                    </tr>
                    <?php
                    
					// var_dump($data2);
                    foreach($data2 as $idTraining){
                        $training = new Training($idTraining['id']);
                        if($user -> getHasPaid() == 0){
                            $button = '<a href="#" id="'.$training -> getId().'" class="bookbutton btn btn-success" disabled title="click to book">Book</a>';
                        }
                        else {
                            if($training -> getNbPlace() == 0){
                                $button = '<a href="#" id="'.$training -> getId().'" class="bookbutton btn btn-success" data-toggle="tooltip" data-placement="top" title="Fully booked, sorry." disabled title="click to book">Book</a>';
                            }
                            else{
                                $button = '<a href="#" id="'.$training -> getId().'" class="bookbutton btn btn-success" title="click to book">Book</a>';
                            }
                            
                        }
                        echo '  <tr>
                        <th>'.$training -> getName().'</th>
						<th>'.$training -> getNbPlace().'</th>
						<th>'.$training -> getDate().'</th>
						<th>'.substr($training -> getStart(),0,-3).'</th>
                        <th>'.$training -> getDuration().'</th>
                        <th>'.$training -> getType().'</th>
                        <th>'.$button.'</th>
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
        <h4 class="modal-title">Book</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-9 col-md-offset-2">
              <p class="text-center" style="font-size:25px">Do you want to book this Training?</p>
              <?php
                    
                    echo  '<p class="text-center" style="font-size:20px">
                            Membership number : '.$user ->getCardNumber().'</br>
                            First name : '.$user ->getFirstName().'</br>
                            Last name : '.$user ->getLastName().'</br>
                            Email : '.$user ->getEmail().'</br>
                            Phone : '.$user ->getPhone().'</br></p>';
              ?>
              
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" class="bookbuttonConfirm btn btn-success" id="btnConfirm">Yes</a>
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
        <h4 class="modal-title">Booking Made</h4>
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
    $(".bookbutton").click(function(){
    
        //Save the link in a variable called element
        var element = $(this);
        
        //Find the id of the link that was clicked
        var del_id = element.attr("id");
        console.log(del_id);
        var idUser = '<?php echo $user -> getId();?>';
        console.log(idUser);
        //Built a url to send
        $('#modalAsk').modal('show');
        $(".bookbuttonConfirm").click(function(){
        
             $.ajax({
               type: "POST",
               url: "Functions/makeBooking.php",
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

$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	  $('#tt1').tooltip('show');
	});
$('#home').removeClass('active');
$('#myBookings').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#training').addClass('active'); 
</script>