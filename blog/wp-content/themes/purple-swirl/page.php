<?php get_header(); ?>
    
	<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    	<div class="post">
    		<div class="title">
      		  	<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
       		 </div>
      		<div class="post-wrap">
        		<div class="content">
        			<div class="info">
<?php if (function_exists('get_avatar')) { ?><div class="gravatar"><?php echo get_avatar( get_the_author_email(), '50' ); ?></div><?php } ?>
                			<div class="content">
                				<p class="author">Author: <b><?php the_author(); ?></b></p><br />
                				<p class="date">Posted on: <b><?php the_time('jS F Y'); ?></b></p>
                 	            <p class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a></p>
                			</div>
            			</div>
             		<div class="post-content">
        				<?php the_content(); ?>

<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
           			</div>
       			</div>
    		</div>
    	</div>


<?php endwhile; else : ?>

    	<div class="post">
    		<div class="title">

      		  	<h3>Page Not Found</h3>
       		 </div>
      		<div class="post-wrap">

             		<div class="post-content">
        				<p>Sorry, but you are looking for something that is not here.</p>
           			</div>
       			</div>
    		</div>

	<?php endif; ?>
    
	
	</div>
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>