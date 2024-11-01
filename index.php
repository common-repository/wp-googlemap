<?php
/*
Plugin Name: Customised Advanced Googlemap 
Plugin URI: 
Description: Showing Google Map with customize latitude,longitude,width and height,you can show any location in  world with the help of our plugin just put the shortcode and set width and height for the map you want to see.
Version: 1.1
Author: Ajit singh shekhawat
Author URI: 
*/
session_start();
global $wpdb;

function your_css() {
wp_register_style('your_css', plugins_url('style.css',__FILE__ ));
wp_enqueue_style('your_css');

}
add_action( 'init','your_css');


register_activation_hook(__FILE__,'googlemap_install');

register_deactivation_hook(__FILE__ , 'googlemap_uninstall' );

function googlemap_install()
{
    global $wpdb;
	
    $table1 = "wp_googlemap_mapdetail";

    $table1_install = "
 CREATE TABLE IF NOT EXISTS $table1 (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 
"; 

    $wpdb->query($table1_install);
    
}

function googlemap_uninstall()
{
     global $wpdb;
     $table1 = "wp_googlemap_mapdetail";
     $uninstall_table1 = "drop table if exists $table1";
     $wpdb->query($uninstall_table1);  
   
     
}

function googlemap_detail(){
    include 'googlemap.php';
    
}
			  
add_action('admin_menu','googlemap_admin_menu');

function googlemap_admin_menu(){   
	add_menu_page("Manage googlemap","Manage googlemap",'8',__FILE__,"map_user2",""); 
	add_submenu_page(__FILE__,'details','details','8','details','map_users');	
}
			
function map_user2(){ 
	include 'manage_user.php';
}

function map_users(){
     include 'add_user.php';
}

	
	add_shortcode("googlemap","googlemap_detail");
	 
  
?>