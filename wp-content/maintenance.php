<?php
$protocol = "HTTP/1.0";
if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] )
	$protocol = "HTTP/1.1";
// header( "$protocol 503 Service Unavailable", true, 503 );
header( "Retry-After: 3600" );
?>

<html>
<head>
	<title>RTL CBS | Maintenance</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/maintenance.css'; ?>" />
</head>

<body>
<div class="container">
	<img src="http://operator.rtlcbsasia.com/wp-content/uploads/2016/08/rtl-logo-black-smaller.png" />
	<span>The site is currently under maintenance.</span>
	<span>Come back in a little bit!</span>
</div>
</body>

</html>