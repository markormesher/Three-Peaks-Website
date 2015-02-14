<?php
get_header();
the_post();
?>
	<h1><?php the_title(); ?></h1>
	<h5>Written by <?php the_author_posts_link(); ?> | <?php the_time('jS F @ H:i'); ?></h5>
	<hr/>
	<?php the_content(); ?>
<?php
get_footer();
