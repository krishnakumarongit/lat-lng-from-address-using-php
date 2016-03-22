<?php
if(isset($_POST['mapdata']) && $_POST['mapdata'] !="" ){
	$address = urlencode($_POST['mapdata']);
	$mapdata = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false');
	$mapdata = json_decode($mapdata, true);
	if ( $mapdata['status'] = 'OK' && isset($mapdata['results']) && count($mapdata['results']) > 0 ) {
	  echo 'Address :'.$_POST['mapdata'].'<br />';
	  echo 'Latitude :'.$mapdata['results'][0]['geometry']['location']['lat'].'<br />';
	  echo 'Longitude :'.$mapdata['results'][0]['geometry']['location']['lng'].'<br />';
	  echo '<img src="http://maps.googleapis.com/maps/api/staticmap?center='.urlencode($address).'&zoom=16&scale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true">'.'<br />';
	}
}
?>
<html>
<head>
<title>Latitude and longitude from address using php</title>
</head>
<body>
<form method="post" action="">
<textarea name="mapdata" style="width:300px;height:100px;" placeholder="country,state,city,pin"></textarea>
<br />
<input type="submit" value="submit">
</form>
</body>
</html>
