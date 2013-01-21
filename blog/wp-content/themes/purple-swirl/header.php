<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://gmpg.org/xfn/11">
    <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<link href="<?php bloginfo('stylesheet_url'); ?>" media="screen,projection,tv" rel="stylesheet" type="text/css" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>

<div id="page-wrap">

	<div id="header-wrap">
    	<div id="header">
<div id="logo">
    		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
        	<p><?php bloginfo('description'); ?></p>
</div>
 <div id="search">
             <form action="<?php bloginfo('url'); ?>/" method="get">
             <input name="s" type="text" class="field" /><input value="Search!" type="submit" class="button" /></form>
             </div>
        </div>
    </div>
    
    <ul id="menu">
<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
    	<?php wp_list_pages('title_li=&depth=1'); ?>
    </ul>