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
                                <th class="info"> Class </th>
                                <th class="info">Date</th>
                                <th class="info"> Duration </th>
                                <th class="info">Type</th>
                                <th class="info">Option</th>
                            </tr>
                            <?php
                          
                            foreach($array as $idTraining){
                                $training = new Training($idTraining['id']);
                                echo '  <tr>
                                <th>'.$training -> getName().'</th>
                                <th>'.$training -> getDate().'</th>
                                <th>'.$training -> getDuration().'</th>
                                <th>'.$training -> getType().'</th>
                                <th><a href="#" id="delete" class="delbutton btn btn-danger" title="Click To Delete">Delete</a></th>
                            </tr>';
                            }
                            ?>
                        </table>
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

});
</script>