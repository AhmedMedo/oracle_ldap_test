<?php
/**
  * Please open functions.php to check for configrations used
*/
include 'functions.php';

echo "I will try to establish a connection with oracle database <br>";
Oracle_connection_test();


echo "I will try to connect with AD <br>";
test_ldap_stc();

// HI
echo "string";

?>
