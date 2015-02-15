<?php
function url($file) {
	return '/projects/three-peaks/' . $file;
}

global $tracker;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>"/>
		<meta name="viewport" content="width=device-width"/>
		<title><?php
			if (is_tag()) {
				single_tag_title('Tagged: #');
			} elseif (is_404()) {
				echo('404: Nothing Found');
			} else {
				wp_title('');
			}
			?></title>

		<!-- ANTI CLICKJACK -->
		<style id="antiClickjack" type="text/css">
			body {
				display: none !important;
			}
		</style>
		<script type="text/javascript">
			if (self === top) {
				var antiClickjack = document.getElementById("antiClickjack");
				antiClickjack.parentNode.removeChild(antiClickjack);
			} else {
				top.location = self.location;
			}
		</script>
		<!-- END ANTI CLICKJACK -->

		<link href="<?= url('css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= url('css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
		<link href="<?= url('css/basic.css'); ?>" rel="stylesheet">
		<link href="<?= url('css/extra.css'); ?>" rel="stylesheet">
		<?php if ($tracker): ?><link href="<?= url('css/tracker.css'); ?>" rel="stylesheet"><?php endif; ?>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<?php if ($tracker) {
		echo('<body>');
	} else { ?>
	<body <?php body_class(); ?>>

		<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= url(''); ?>">Three Peaks Challenge 2015</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?= url('info'); ?>">What's All This?</a></li>
						<li><a href="<?= url('charities'); ?>">Charities</a></li>
						<li><a href="<?= url('donate'); ?>">Donate Now</a></li>
						<li><a href="<?= url('tracker'); ?>">Live Tracker</a></li>
						<li><a href="<?= url('contact'); ?>">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<header class="intro-header" style="background-image: url('<?= url('img/headers/snowdon-2012-' . rand(1, 4) . '.jpg'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
						<div class="site-heading">
							<h1>Three Peaks Challenge 2015</h1>
							<hr class="small">
							<span class="subheading">3 mountains, 3 countries &amp; 3 charities.<br/>3km ascent &amp; 25mi walking.<br/>24 hours.</span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<?php } ?>