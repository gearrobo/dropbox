<?php
exec("mode COM3 BAUD=9600 PARITY=N data=8 stop=1 xon=off");

$fp = fopen ("COM3", "w");
if (!$fp) {
   echo "Not open";
} else {
   echo "Open";
   fwrite($fp, "1");
    fclose($fp);
}