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
                  		      	<p class="category">Category: <?php the_category(', '); ?></p>
                			</div>
            			</div>
             		<div class="post-content">
        				<?php the_content('Read the rest of this entry...'); ?>

<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
           			</div>
       			</div>
    		</div>
    	</div>


<?php endwhile; ?>

<div class="pagination">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
</div>

	<?php else : ?>

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