    <div id="sidebar">
    	<div id="ads">
            <div class="title">
            	<h3>Adverts</h3>
            </div>
            <div class="wrapper">
           		<div class="content">
            		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
            		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
            		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
         			<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
            		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
            		<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/125.png" alt="" /></a>
        		</div>
        	</div>
        </div>
    	
        <div id="left">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Left Sidebar") ) : ?>

           	<div class="title">
           		<h3>Categories</h3>
           	</div>
            <div class="wrapper">
        	    <div class="content">
        			 <ul>
            			<?php wp_list_categories('title_li='); ?>
					</ul>
            	</div>
			</div>



<?php wp_list_bookmarks('title_before=<div class="title"><h3>&title_after=</h3></div><div class="wrapper"><div class="content">&category_before=&category_after=</div></div>'); ?>


<?php endif; ?>

        </div>
        
        <div id="right">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Sidebar") ) : ?>

        	<div class="title">
            	<h3>Archives</h3>
       		</div>
            <div class="wrapper">
           		<div class="content">
        			 <ul>
            			<?php wp_get_archives(); ?>
            		</ul>
            	</div>
			</div>
            
            <div class="title">
            	<h3>Meta</h3>
            </div>
            <div class="wrapper">
            	<div class="content">
        			 <ul>
            			<?php wp_register(); ?>

					<li><?php wp_loginout(); ?></li>

					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>

					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>

					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>

					<?php wp_meta(); ?>
            		</ul>
            	</div>
			</div>
<?php endif; ?>
        </div>
    </div>