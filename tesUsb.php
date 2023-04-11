<?php
exec("mode COM3 BAUD=9600 PARITY=N data=8 stop=1 xon=off");

$fp = fopen ("COM3", "w");
fwrite($fp, "\r");
fwrite($fp, "buka4\n");
fclose($fp);
if (!$fp) {
   echo "Not open";
} else {
   echo "Open";
}

?>