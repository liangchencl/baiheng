<?php get_header(); ?>

<div class="subpage">
    <div class="left a-fadeinL">
        <p class="left_title">产品分类</p>
        <div class="ny_zblb1">
            <ul class="clearfix left_nav">
                <?php
                    wp_list_categories("child_of=".get_category_root_id(the_category_ID(false))."&depth=0&hide_empty=0&title_li=");
                ?>
            </ul>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <div class="right a-fadeinR">
        <div class="right_title">
            <div class="right_name">产品分类</div>
            <div class="fast">你现在的位置：<a  class="white white_hover" href="<?php bloginfo('url'); ?>"> 首页</a> &raquo;
                <?php
                if( is_single() ){
                $categorys = get_the_category();
                $category = $categorys[0];
                echo( get_category_parents($category->term_id,true,' &raquo; ') );
                the_title();
                } elseif ( is_page() ){
                the_title();
                } elseif ( is_category() ){
                single_cat_title();
                } elseif ( is_tag() ){
                single_tag_title();
                } elseif ( is_day() ){
                the_time('Y年Fj日');
                } elseif ( is_month() ){
                the_time('Y年F');
                } elseif ( is_year() ){
                the_time('Y年');
                } elseif ( is_search() ){
                echo $s.' 的搜索结果';
                }
                ?> 
            </div>
        </div>

<?php if(have_posts()) : ?> 
<?php while(have_posts()) : the_post(); ?> 

        <div class="right_con">
            <div class="cp_conter">
                <div class="cptjsk">
                    <h2 style="text-align: center;margin-bottom: 8px;"><?php the_title(); ?></h2>
                    <p class="datetime" style="margin-bottom: 25px;">添加时间：<?php the_time('Y-m-d H:i') ?>  由：<?php the_author() ?> 发布在：<?php the_category(', ') ?>分类下，</p>
                    <div class="cppic">
                        <!-- <img id="zoom_06" src="<?php bloginfo('template_url'); ?>/images/20160302163009.jpg" style="display: block;width: 300px;"> -->
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                            <img src="<?php timthumb($thumbnail_image_url[0],300,242); ?>">
                        <?php } else {?>
                            <img src="<?php bloginfo('template_url'); ?>/images/20160302163009.jpg" alt="<?php the_title(); ?>" style="display: block;width: 300px;" />
                        <?php } ?>
                    </div>
                    <div class="cpinfo">
                        <div class="cpindox"><span>产品名称：</span>
                            <div class="cpinfoshuc">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </div>
                        <div class="cpindox"><span>品号：</span>
                            <div class="cpinfoshuc">
                                <?php the_field('produce_num');?>
                            </div>
                        </div>
                        <div class="cpindox"><span>通用机型：</span>
                            <div class="cpinfoshuc">
                                <?php the_field('produce_machine');?>
                            </div>
                        </div>
                        <div class="cpindox"><span>原厂编号：</span>
                            <div class="cpinfoshuc">
                                <?php the_field('produce_from');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="cpxxmsbox">
                     <h3><span>详细描述<font>Description</font></span></h3> 
                    <p>
                        <?php the_content(); ?>
                    </p>
                </div>

                <div class="single_pagination">
                    <ul class="clearfix">
                        <li class="pull-left">
                            上一篇：<?php previous_post_link('%link'); ?>
                        </li>
                        <li class="pull-right">
                          下一篇：<?php next_post_link('%link'); ?>
                        </li>
                    </ul>
                </div>

                <div class="xiangguan">
                    <h3><span>相关产品<font>Related information</font></span></h3> 
                    <ul class="clearfix cat_li">
                        <?php $rand_posts = get_posts('numberposts=5&orderby=date');
                            foreach($rand_posts as $post):?><li>
                                <a href="<?php the_permalink(); ?>" target="_blank"> <?php echo mb_strimwidth(get_the_title(), 0, 50); ?></a>
                            </li>    
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>

<?php endwhile; ?> 
<?php endif;  wp_reset_postdata(); wp_reset_query();?>


    </div>
</div>

<?php get_footer(); ?>