<?php
 ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-center">
            Training Sessions
        </h1>
        <div class="col-md-10 col-md-offset-1">
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
                        echo '  <tr>
                        <th>'.$training -> getName().'</th>
						<th>'.$training -> getNbPlace().'</th>
						<th>'.$training -> getDate().'</th>
						<th>'.substr($training -> getStart(),0,-3).'</th>
                        <th>'.$training -> getDuration().'</th>
                        <th>'.$training -> getType().'</th>
                        <th><a href="#" id="book" class="delbutton btn btn-success" title="Click To Book">Book</a></th>
                        </tr>';
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
        
<script type="text/javascript">
/*$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "Functions/deleteBooking.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});*/
$('#home').removeClass('active');
$('#myBookings').removeClass('active');
$('#settings').removeClass('active');
$('#logout').removeClass('active');
$('#training').addClass('active'); 
</script>