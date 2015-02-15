<?php
// is this the tracker page
the_post();
$content = get_the_content();
$tracker = false;
if (strpos($content, '<!--tracker page-->') !== false) {
	// uncomment when ready!
	//$tracker = true;
}

// carry on as normal
get_header();

// special tracker output?
if ($tracker) {
	?>
	<div id="tracker"></div>
	<div id="back">
		<p><a href="<?= url(''); ?>">Back to Main Site</a></p>
	</div>
	<div id="info">
		<p><?php
			mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			mysql_select_db(DB_NAME);
			$last = mysql_query('SELECT MAX(logged_at) FROM tracker_points;');
			$last = mysql_fetch_array($last, MYSQL_NUM);
			if ($last[0] > 0) {
				echo('Last log at: ' . date('jS M, H:i:s', $last[0]));
			}
			?></p>
	</div>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVOJZqteLwWLqf2YMuXzbefKEgs-ZwoRw">
	</script>
	<script type="text/javascript">
		var trackerPoints = [
			<?php
				$spots = mysql_query('SELECT * FROM tracker_points ORDER BY logged_at ASC');
				while ($s = mysql_fetch_array($spots, MYSQL_ASSOC)) {
					$parts = explode(',', $s['location']);
					echo('new google.maps.LatLng(' . $parts[0] . ', ' . $parts[1] . '),' . "\n");
				}
				?>
		];

		function initialize() {
			var mapOptions = {
				center: {
					lat: 54.6580928,
					lng: -3.3814229
				},
				zoom: 7
			};
			var map = new google.maps.Map(document.getElementById('tracker'), mapOptions);
			var path = new google.maps.Polyline({
				path: trackerPoints,
				geodesic: true,
				strokeColor: '#FF0000',
				strokeOpacity: 1.0,
				strokeWeight: 5
			});

			path.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
<?php
} else {
	echo('<h1>' . get_the_title() . '</h1>');
	echo('<hr/>');
	echo($content);
}
?>
<?php
get_footer();
