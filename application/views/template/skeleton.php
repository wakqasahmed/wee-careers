<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en" ng-app> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en" ng-app> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"ng-app> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app="weeCareers"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>" />
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="author" content="<?php echo $author ?>" />

<link rel="stylesheet" href="<?php echo base_url(CSS."font-awesome.min.css");?>">
<link rel="stylesheet" href="<?php echo base_url(CSS."font-awesome-ie7.min.css");?>">

<link rel="stylesheet" href="<?php echo base_url(CSS."bootstrap.min.css");?>">
<link rel="stylesheet" href="<?php echo base_url(CSS."bootstrap-theme.min.css");?>">
<link rel="stylesheet" href="<?php echo base_url(CSS."style.min.css");?>">

<?php if($this->lang->lang() == "ar") { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS."bootstrap-rtl.min.css"); ?>">
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.4/angular.min.js"></script>
<script src="<?php echo base_url(JS."ui-bootstrap-tpls-0.11.2.min.js");?>"></script>

<!-- extra CSS-->
<?php foreach($css as $c):?>
<link rel="stylesheet" href="<?php echo base_url().CSS.$c?>">
<?php endforeach;?>

<!-- extra fonts-->
<?php foreach($fonts as $f):?>
<link href="http://fonts.googleapis.com/css?family=<?php echo $f?>" rel="stylesheet" type="text/css">
<?php endforeach;?>

<script src="<?php echo base_url(JS."libs/modernizr-2.6.1-respond-1.1.0.min.js");?>"></script>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url(IMAGES.'ico/favicon.ico');?>">
<link rel="apple-touch-icon" href="<?php echo base_url(IMAGES.'ico/apple-touch-icon-precompresse.png');?>">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(IMAGES.'ico/apple-touch-icon-57x57-precompressed.png');?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(IMAGES.'ico/apple-touch-icon-72x72-precompressed.png');?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(IMAGES.'ico/apple-touch-icon-114x114-precompressed.png');?>">

</head>
<body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url(JS."libs/jquery-1.9.1.min.js");?>"><\/script>')</script>    
	<?php echo $body ?>
	<script src="<?php echo base_url(JS."libs/underscore-min-1.4.4.js");?>"></script>
	<script src="<?php echo base_url(JS."plugins.js");?>"></script>
	<script src="<?php echo base_url(JS."script.js");?>"></script> 
    <?php /*       
        <script src="<?php echo base_url(JS."less.min.js");?>"></script>
*/ ?>
	<!-- extra js-->
	<?php foreach($javascript as $js):?>
	<script defer src="<?php echo base_url().JS.$js?>"></script>
	<?php endforeach;?>

	<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
