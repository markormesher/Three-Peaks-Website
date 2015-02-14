<?php
if (isset($_POST)) {
	foreach ($_POST as $k => $v) {
		$_POST[$k] = filter_var(trim($v), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	}
}

get_header();

if (have_posts()) {
	$first = true;
	while (have_posts()) {
		the_post();
		if (!$first) echo('<hr/>');
		?>
		<div class="post-preview">
			<a href="<?php the_permalink(); ?>" title="<? the_title(); ?>">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<h3 class="post-subtitle"><?= get_post_meta(get_the_ID(), 'subtitle', true); ?></h3>
			</a>
			<p class="post-meta">Written by <?php the_author_posts_link(); ?> on <?php the_time('jS F @ H:i'); ?></p>
		</div>
	<?php
		$first = false;
	}
} else {
	echo('<p>Sorry, there are no posts matching your search.</p>');
}

get_footer();
