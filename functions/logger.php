<?php
// log activity to a file

   function logToFile($filename, $type, $message)
   { 
   /* types / Category of Log Message
    0 - Debug
    1 - Info
    2 - Warning
    3 - Error
    4 - Crash
    */
   // open file
   $fd = fopen($filename, "a");
   // append date/time and type to message
   $logString = "[" . date("Y/m/d h:i:s", mktime()) . "] " . "\t<" . $type .">\t" . $message; 
   // write string
   fwrite($fd, $logString . "\n");
   // close file
   fclose($fd);
   }

?>
