<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'before_widget' => '',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div><div class="wrapper"><div class="content">',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'before_widget' => '',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div><div class="wrapper"><div class="content">',
    ));
?>