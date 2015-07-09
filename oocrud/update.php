<?php
    require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	


    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError   = null; 
	$emailError  = null; 
	$mobileError = null;
        // keep track post values
        $name    = $_POST['aname']; 
	$address = $_POST['address'];
        $lng     = $_POST['lng']; 
	$lat     = $_POST['lat'];
        $typ     = 'rx'; 
	$signal  = $_POST['signal'];
        $email   = $_POST['email']; 
    
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         /* if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        } */
        // update data
        if ($valid) {
            $dateit = date('Y-m-d H:i:s');
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $q=$pdo->prepare("UPDATE markers SET name=?, address=?, lat=?, lng=?, typ=?, sig=?, em=?, tstamp=? WHERE id=?");
	/*	$q->bindParam(1, $name);
                $q->bindParam(2, $address);
                $q->bindParam(3, $lat); 
		$q->bindParam(4, $lng);
                $q->bindParam(5, $typ); 
		$q->bindParam(6, $signal);
                $q->bindParam(7, $email); 
		$q->bindParam(8, $dateit);
                $q->bindParam(9, $id); 
       */
	    $q->execute(array($name,$address,$lat,$lng,$typ,$signal,$email,$dateit,$id));
	    //$q->execute();
            Database::disconnect();
            header("Location: index.php");
        }
    }
	 else {
		$pdo     = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql     = "SELECT * FROM markers where id = ?";
		$q       = $pdo->prepare($sql);
		$q->execute(array($id));
		$data    = $q->fetch(PDO::FETCH_ASSOC);
		$name    = $data['name'];
		$address = $data['address'];
		$lat     = $data['lat'];
		$lng     = $data['lng'];
		$typ     = $data['typ'];
		$signal  = $data['sig'];
		$email   = $data['em'];
		Database::disconnect();
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Report</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="aname" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="address" type="text"  placeholder="Address" value="<?php echo !empty($address)?$address:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Latitude</label>
                        <div class="controls">
                            <input name="lat" type="text"  placeholder="Latitude" value="<?php echo !empty($lat)?$lat:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Longitude</label>
                        <div class="controls">
                            <input name="lng" type="text"  placeholder="Longitude" value="<?php echo !empty($lng)?$lng:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Signal</label>
                        <div class="controls">
                            <input name="signal" type="text"  placeholder="Signal" value="<?php echo !empty($signal)?$signal:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body>
</html>

