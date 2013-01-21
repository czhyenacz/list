
<div id="content">

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('post_type=recipes'.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	

<div class="post clearfix" id="post-<?php the_ID(); ?>">
<?php
	if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=200&amp;w=200&amp;zc=1" alt=""/></a>
		<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>
<div class="cover">
	<div class="title">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div>
	<div class="recipemeta">
		<span class="cooktime"> Cooking time: <?php $cooktime=get_post_meta($post->ID, 'wtf_cooktime', true); echo $cooktime; ?> mins </span> <span class="serve"> Serving: <?php $serving=get_post_meta($post->ID, 'wtf_serving', true); echo $serving; ?> people</span>
	</div>
	<div class="entry">
		<?php wpe_excerpt('wpe_excerptlength_recipe', ''); ?>
		<div class="clear"></div>
	</div>
</div>
</div>

<?php endwhile; ?>

<div class="clear"></div>

<?php getpagenavi(); ?>

<?php $wp_query = null; $wp_query = $temp;?>
   
</div>