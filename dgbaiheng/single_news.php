<?php get_header(); ?>

<div class="subpage">
    <div class="left a-fadeinL">
        <p class="left_title">关于我们</p>
        <div class="ny_zblb1">
            <ul class="clearfix left_nav">
                <li class=""><a href="/dgbaiheng/?page_id=17">关于我们</a></li>
                <li class=""><a href="/dgbaiheng/?page_id=15">联系我们</a></li>
            </ul>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <div class="right a-fadeinR">
        <div class="right_title">
            <div class="right_name">企业新闻</div>
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
            <div class="view">
                 <h1><?php the_title(); ?></h1> 
                <p class="datetime">添加时间：<?php the_time('Y-m-d H:i') ?>  由：<?php the_author() ?> 发布在：<?php the_category(', ') ?>分类下，</p>
                <p class="border2"></p>
                <div class="newswz">
                    <?php the_content(); ?>
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

                <p class="border2"></p>
                <div class="xiangguan">
                    <h3><span>相关信息<font>Related information</font></span></h3>
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