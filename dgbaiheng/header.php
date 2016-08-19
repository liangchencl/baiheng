<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php
    if (function_exists('is_tag') && is_tag()) {
       single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
    elseif (is_archive()) {
       wp_title(''); echo ' Archive - '; }
    elseif (is_search()) {
       echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
    elseif (!(is_404()) && (is_single()) || (is_page())) {
       wp_title(''); echo ' - '; }
    elseif (is_404()) {
       echo 'Not Found - '; }
    if (is_home()) {
       bloginfo('name'); echo ' - '; bloginfo('description'); }
    else {
        bloginfo('name'); }
    if ($paged>1) {
       echo ' - page '. $paged; }
?>
</title>
<meta name="description" content="<?php the_field('description','options');?>">
<meta name="keywords" content="<?php the_field('keywords','options');?>">
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/ico.ico" type="image/x-icon" />
<link href="<?php bloginfo('template_url'); ?>/css/animation.css" type="text/css" rel="stylesheet">
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.min.js"></script>
<!-- <script src="<?php bloginfo('template_url'); ?>/js/lb.js"></script> -->
<script src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
</head>
<body>

<div class="top_bg">
    <div class="top">
        <div class="logo_bg">
            <a href="<?php bloginfo('url'); ?>" title="东莞市大朗百亨五金配件" class="logo a-fadein">
                <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="东莞市大朗百亨五金配件" title="东莞市大朗百亨五金配件">
            </a>
        </div>
        <div class="lxdh">
            <img src="<?php bloginfo('template_url'); ?>/images/toptel.png" class="top_tel a-swing" alt="<?php the_field('phonenumber','options');?>">
            <div class="lxdhtxt">
                <p>咨询电话</p> <span><?php the_field('phonenumber','options');?></span> 
            </div>
        </div>
    </div>
</div>
<?php wp_nav_menu(
    array(
    'theme_location'  => '', //指定显示的导航名，如果没有设置，则显示第一个
    'container'       => 'div', //最外层容器标签名
    'container_class' => 'nav_bg', //最外层容器class名
    'menu_class'      => 'nav', //ul标签class
     ));
?>
<div class="banner">
    <p class="shadow"></p>
    <div class="bannerbg">
        <a rel="nofollow" href="<?php bloginfo('url'); ?>">
            <img class="a-fadeinR" src="<?php bloginfo('template_url'); ?>/images/ban.png">
        </a>
    </div>
</div>