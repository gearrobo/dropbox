<?php 

exec("mode COM4 BAUD=9600 PARITY=N data=8 stop=1 xon=off");


$fp = fopen ("com4", "w");
sleep(2);
fwrite($fp, "\r");
fwrite($fp, "tutup\n");
fclose($fp);
if (!$fp) {
   // echo "Not open";
} else {
   // echo "Open";
}


header('location:index.php');
