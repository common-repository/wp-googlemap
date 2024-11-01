<?php

global $wpdb;


if(isset($_POST['submit'])){

     $latitude = sanitize_text_field( $_POST['lat'] );
     
	 
	 $longitude = sanitize_text_field( $_POST['lng'] );
     
	 
	 $width = sanitize_text_field( $_POST['width'] );
     
	 
	 $height = sanitize_text_field( $_POST['height'] );
     
	 
	 
     $map_list = $wpdb->get_results("SELECT * FROM `wp_googlemap_mapdetail`");
	 
     $count = count($map_list);
      
	 if($count == 1){
	 $wpdb->update(
	 'wp_googlemap_mapdetail',
	  array(
	  'latitude'=> $latitude,
	  'longitude'=> $longitude,
	  'width'=> $width,
	  'height'=> $height
	  ),
	  array('id'=>1)
	  
	 );
      }else{
		  
         $wpdb->query($wpdb->prepare("INSERT INTO `wp_googlemap_mapdetail`(`latitude`,`longitude`,`width`, `height`) VALUES( %d, %d, %d, %d)", $latitude,$longitude,$width,$height));
                    
		}
    }

$users_list = $wpdb->get_results("SELECT * FROM `wp_googlemap_mapdetail` WHERE 1");

$latitudex = $users_list[0]->latitude;

$longitudex = $users_list[0]->longitude;

$widthx = $users_list[0]->width;
		
$heightx = $users_list[0]->height;

?>
<h2>Gooogle Map Details </h2> 
<form method="POST" id="editform">
  <h3><strong>Address</strong></h3><input name="formatted_address" type="text" value="" class="address"><br><br>
  <h3><strong>Latitude</strong></h3><input name="lat" type="text" value="<?php echo $latitudex;?>"><br><br>
  <h3><strong>Longitude</strong></h3><input name="lng" type="text" value="<?php echo $longitudex;?>"><br><br>
  <h3><strong>width</strong></h3> <input id="width" type="text" name="width" value="<?php echo $widthx;?>"><br><br>
  <h3><strong>height</strong></h3> <input id="height" type="text" name="height" value="<?php echo $heightx;?>"><br><br>
  <input type="submit" name="submit"value="Save"><br>
</form>



<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBRsR01t239w1zqGChMvVORseZFmv5yJOw&sensor=false"></script>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
		
		
		
		<script src="<?php echo plugins_url('wp-googlemap');?>/jquery.geocomplete.js"></script>
		
		<script>



        jQuery(".address").geocomplete({ details: "form" });


      </script>
	  



		
			


