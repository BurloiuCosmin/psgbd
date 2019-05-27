<?php
// Create connection to Oracle
$conn = oci_connect("MARIUTA", "MARIUTA", "//localhost:1521");
if (!$conn) {
   $m = oci_error();
   echo $m['message'] . "\n";
}
else {
   print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);

 