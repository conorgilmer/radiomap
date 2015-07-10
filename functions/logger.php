<?php
/* log activity to a file

You have to have write access to the log file you chose to use

   Types / Category of Log Message
    0 - Debug
    1 - Info
    2 - Warning
    3 - Error
    4 - Crash
    */


// [YYYY/MM/DD HH:MM:SS]	<Type>	Message
   function basiclogToFile($filename, $type, $message)
   { 
   // open file
   $fd = fopen($filename, "a");
   // append date/time and type to message
   $logString = "[" . date("Y/m/d h:i:s", mktime()) . "] " . "\t<" . $type .">\t" . $message; 
   // write string
   fwrite($fd, $logString . "\n");
   // close file
   fclose($fd);
   }

// [YYYY/MM/DD HH:MM:SS]	Type	<System>	Message
   function logToFile($filename, $system, $type, $message)
   { 
   // open file
   $fd = fopen($filename, "a");
   // append date/time and type to message
   $logString = "[" . date("Y/m/d h:i:s", mktime()) . "] " ."\t<" .$system .">\t".  $type ."\t" . $message; 
   // write string
   fwrite($fd, $logString . "\n");
   // close file
   fclose($fd);
   }

?>
