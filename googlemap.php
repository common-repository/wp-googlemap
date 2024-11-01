<?php

 		global $wpdb; 
		$maps_list = $wpdb->get_results("SELECT * FROM `wp_googlemap_mapdetail` WHERE 1");
		$width = $maps_list[0]->width."px";
		$height = $maps_list[0]->height."px";
		$latitude = $maps_list[0]->latitude;
		$longitude = $maps_list[0]->longitude;
	
	
	
?>



<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBRsR01t239w1zqGChMvVORseZFmv5yJOw&sensor=false"></script>
		
		<script>

		 function initialize(){
			var myCenter= new google.maps.LatLng('<?php echo $latitude;?>','<?php echo $longitude;?>');
		     var marker;
			
			var mapProp = {
			center:myCenter,
			 zoom:5,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  
			 var map=new google.maps.Map(document.getElementById("googleMap")
			  ,mapProp);
			  
							  var marker=new google.maps.Marker({
				  position:myCenter,
				  animation:google.maps.Animation.BOUNCE,
				  title:"Click to zoom"
				  });

				marker.setMap(map);
			  
				 google.maps.event.addListener(marker,"click",function() {
				  map.setZoom(9);
				  map.setCenter(marker.getPosition());
				  });
				  
		 }	
			google.maps.event.addDomListener(window, "load", initialize);
			
         </script> 								
		
		
		
		<div id="googleMap" style="color:black;text-align:center;width:<?php echo $width;?>;height:<?php echo $height;?>">	                   	
	    </div>

