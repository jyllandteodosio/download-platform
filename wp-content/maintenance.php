<?php
$protocol = "HTTP/1.0";
if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] )
	$protocol = "HTTP/1.1";
// header( "$protocol 503 Service Unavailable", true, 503 );
header( "Retry-After: 3600" );
?>

<html>
<head>
	<title>Blue Ant Media | Maintenance</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/maintenance.css'; ?>" />
	<meta name="robots" index="noindex,follow"> 
</head>

<body>
<div class="container">
	<div class="notice">
		<img src="http://operator.operator.blueantmedia.com.com/wp-content/uploads/2016/08/rtl-logo-black-smaller.png" />
		<h1>The site is currently under maintenance</h1>
		<span>Come back in a little bit!</span>
	</div>
</div>
</body>

</html>