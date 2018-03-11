<?php
/**
  * Author: Eng/ Ahmed ALaa El Din
  * Description : use this sample code to test the connection with RTT oracle database
  * and the configuration is passed to the variable as i recived and if some thing wrong
  * you can edit it easily
*/

// Host Info
$tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.21.33.50)(PORT = 1521))
        (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = ARSYSTEM)))'; 
 // database user name
 $database_username ='CMREPORT';
 //database password
 $database_passwrod ='readonly';

$conn=oci_connect($database_username,$database_passwrod,$tnsname);
if($conn)
	echo "Connection succeded";
else
{
	echo "Connection failed";
    $err = oci_error();
	trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);	
}

	

?>