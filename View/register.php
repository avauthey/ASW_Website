<div class="row">
    <div class="col-md-12">
        <h1 class="text-center"> Contact form </h1>
		<div class="col-md-12">
		    <div class="col-md-8 col-md-offset-3">
    			<form class="form-horizontal" method="post"  enctype="multipart/form-data">
    			 	<div class="form-group">
    			 	    <div class="col-sm-2">
    				        <label class="control-label">First Name </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
        				    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['firstName']); ?>">
        				    <?php echo "<p class='text-danger'>$errFirstName</p>";?>
    				    </div>
    				</div>
    				<div class="form-group">   
				        <div class="col-sm-2">
    				       <label class="control-label">Last Name </label><font color="red">*</font>
				        </div>
				        <div class="col-sm-7">
        				    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['firstName']); ?>">
        				    <?php echo "<p class='text-danger'>$errFirstName</p>";?>
        				</div>
    				</div>
    			    <div class="form-group">
    			        <div class="col-sm-2">
    				        <label class="control-label">Mail </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
    				        <input name="email" id="mail" type="email" class="form-control" placeholder="email@ex.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
    				        <?php echo "<p class='text-danger'>$errEmail</p>";?>
    				    </div>
    				</div>
    			    <div class="from-group">
    			        <div class="col-sm-2">
    				        <label class="control-label">Phone </label><font color="red">*</font>
    				    </div>
    				    <div class="col-sm-7">
    				        <input type="text" name="phone" id="phone" class="form-control" placeholder="0606060606" value="<?php echo htmlspecialchars($_POST['phone']);?>">
    				        <?php echo "<p class='text-danger'>$errPhone</p>";?>
    				    </div>
    				</div>
    				<div class="form-group">
    				    <div class="col-sm-2">
                		    <label class="control-label">Password</label><font color="red">*</font>
            		    </div>
                		<div class="col-sm-7">  
            			    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
            			    <?php echo "<p class='text-danger'>$errPassword</p>";?>
                	    </div>
                	</div>
                	<div class="from-group">
    				    <label class="control-label">Confirm Password</label><font color="red">*</font>
    				    <input type="password" name="confirm" id="confirm" class="form-control" >
    				    <?php echo "<p class='text-danger'>$errConfirm</p>";?>
    				</div>
    				</br>
    		    	<button id="submit" name="submit" class="btn btn-success" type="submit">Register</button></br>
    		    	<?php echo $result; ?> 
    			</form></br>
    		</div>
		</div>
    </div>
</div>