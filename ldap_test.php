<?php
/********************** Test Ldap and works with a test ldap server *******************/

 function test_ldap(){
	$ldapconfig['host'] = 'ldap.forumsys.com';//CHANGE THIS TO THE CORRECT LDAP SERVER
	$ldapconfig['port'] = '389';
	$ldapconfig['basedn'] = 'cn=read-only-admin,dc=example,dc=com';//CHANGE THIS TO THE CORRECT BASE DN
	$ldapconfig['usersdn'] = 'cn=read-only-admin';//CHANGE THIS TO THE CORRECT USER OU/CN
	$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
	ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);
	//$dn="uid=".$username.",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
	$password='password';
	if ($bind=ldap_bind($ds, $ldapconfig['basedn'], $password)) {
	  echo("Login correct");//REPLACE THIS WITH THE CORRECT FUNCTION LIKE A REDIRECT;
	  $filter="(|(sn=einstein*)(givenname=einstein*))";
	$justthese = array("ou", "sn", "givenname", "mail");
	 $x= ldap_search($ds,$ldapconfig['basedn'],$filter,$justthese);
	 echo "Search result is " . $x . "<br />";
	}
}

 function test_stc(){
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



test_ldap();



?>
