<?php

$verz="1.0";
$comPort = "/dev/ttyACM0"; /*change to correct com port */

?>

<?php
	if (isset($_POST["rcmd"])) {
		$rcmd = $_POST["rcmd"];
		switch ($rcmd) {
			case ON:
				echo "ON";
				$fp =fopen($comPort, "w");
				fwrite($fp, "1");
				fclose($fp);
				break;
			case OFF:
				echo "OFF";
				$fp =fopen($comPort, "w");
				fwrite($fp, "0");
				fclose($fp);
				break;
		}
	}
?>
<html>
<body>
	
<center><h1>Arduino from PHP Example</h1><b>Version <?php echo $verz; ?></b></center>
<form method="post" action="<?php echo $PHP_SELF;?>">
<input type="submit" value="ON" name="rcmd">
<input type="submit" value="OFF" name="rcmd">
</form>
</body>
</html>