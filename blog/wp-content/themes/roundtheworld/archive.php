<?php 
	global $SMTheme;
	get_header(); 
?>
<div id='content'>
	<div class='container clearfix'>

		
		
			<?php get_sidebar('right'); ?>
			<?php get_sidebar('left'); ?>
		
		<div class="main_content">
		
			<h2 class="page-title"><?php
		
				   /* If this is a daily archive */ 
				   if (is_day()) { printf( $SMTheme->_( 'dailyarchives' ), get_the_date() ); 
					
					/* If this is a monthly archive */ 
					} elseif (is_month()) { printf( $SMTheme->_( 'monthlyarchives' ), get_the_date('F Y') );
					  
					/* If this is a yearly archive */ 
					} elseif (is_year()) { printf( $SMTheme->_( 'yearlyarchives' ), get_the_date('Y') );
					
					/* If this is a general archive */ 
					} else { echo $SMTheme->_( 'blogarchives' ); } 
			?></h2>
			
			
			
			<?php get_template_part('theloop'); ?>
			
			<?php get_template_part('navigation'); ?>
                    
        </div><!-- #content -->
	</div>
</div>
<?php get_footer(); ?>