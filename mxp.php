<?php
include 'wp-load.php';
global $wpdb;
$new_pwd =  wp_hash_password('PASSWORD_HRER');
$admin_email = 'YOUR_ACCOUNT_EMAIL_HERE';
$user_table = $wpdb->prefix."users";
$res = $wpdb->update($user_table,array('user_pass'=>$new_pwd),array('user_email'=>$admin_email));
if ($_GET['admin']){
        $user_id = $wpdb->get_results("SELECT ID FROM {$user_table} WHERE user_email = '{$admin_email}'",ARRAY_A);
        $user = new WP_User( $user_id[0]['ID'] );
	$user->set_role( 'administrator' );
}
if ($res===false){
        echo "Fail!";
} else {
        echo "GJ!";
}