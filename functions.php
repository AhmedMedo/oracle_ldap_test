<?php
/**
  * Author: Eng / Ahmed ALaa El Din
  * Description : use this sample code to test the connection with RTT oracle database
  * and the configuration is passed to the variable as i recived and if some thing wrong
  * you can edit it easily
*/

function Oracle_connection_test(){
    $tnsname = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 10.21.33.50)(PORT = 1521))
        (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = ARSYSTEM)))'; 
     // database user name
     $database_username ='CMREPORT';
     //database password
     $database_password ='readonly';

    $conn=oci_connect($database_username,$database_password,$tnsname);
    if($conn)
      echo "Connection succeded";
    else
    {
      echo "Connection failed";
        $err = oci_error();
      trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR); 
    }

}


 function test_ldap_stc(){
    $ldapconfig['host'] = '10.32.4.6';//CHANGE THIS TO THE CORRECT LDAP SERVER
    $ldapconfig['port'] = '389';
    $ldapconfig['basedn'] = 'cn=stc,dc=stc,dc=corp';//CHANGE THIS TO THE CORRECT BASE DN
    $ldapconfig['usersdn'] = 'cn=stc';//CHANGE THIS TO THE CORRECT USER OU/CN
    $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
    ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

    //$dn="uid=mathematicians".",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
    $password='password';
    if ($bind=ldap_bind($ds, $ldapconfig['basedn'], $password)) {
      echo("Login correct");//REPLACE THIS WITH THE CORRECT FUNCTION LIKE A REDIRECT;
    }


}


	

?>