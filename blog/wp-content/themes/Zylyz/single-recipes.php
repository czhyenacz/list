<?php get_header(); ?>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="rpostmeta">Posted by <?php the_author(); ?> on <?php the_time('M - j - Y'); ?> under  <?php the_category(', '); ?> </div>
<div class="entry">

<div class="recipedata clearfix">
<div class="reciphead"> <span>Ingredients</span> </div>
	<div class="ingred">
		<?php $ingred=get_post_meta($post->ID, 'wtf_ingred', true); echo $ingred; ?>
	</div>
	<?php
	if ( has_post_thumbnail() ) { ?>
	<img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=200&amp;w=200&amp;zc=1" alt=""/>
		<?php } else { ?>
	<img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" />
<?php } ?>

</div>
<div class="recipfoot">
<span>Cuisine: <?php echo get_the_term_list( $post->ID, 'cuisine', '', ' ', '' ); ?></span><span> Cooking time: <?php $cooktime=get_post_meta($post->ID, 'wtf_cooktime', true); echo $cooktime; ?> mins </span> <span> Serving: <?php $serving=get_post_meta($post->ID, 'wtf_serving', true); echo $serving; ?> people</span> 
 </div>
<?php the_content('Read the rest of this entry &raquo;'); ?>
<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


<div class="singleinfo">
Meal: <?php echo get_the_term_list( $post->ID, 'meal', '', ' ', '' ); ?> Food type: <?php echo get_the_term_list( $post->ID, 'food', '', ' ', '' ); ?>
</div>

</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>