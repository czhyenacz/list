<?php get_header(); ?>

<div id="casing">

<?php include (TEMPLATEPATH . '/lib/nivoslider.php'); ?>	

<?php
if(get_option('zyl_home') == "Recipes") { ?>	
<?php include (TEMPLATEPATH . '/lib/recipehome.php'); ?>
<?php } else { ?>
<?php include (TEMPLATEPATH . '/lib/homeblog.php'); ?>
<?php } ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>