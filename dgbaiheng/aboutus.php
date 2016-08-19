<?php
/*
Template Name:关于我们
*/
?>
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
        <div class="right_title"> <span class="right_name">关于我们</span> 
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
        <div class="right_con">
            <div class="pb">
                <div class="pagebox">
                    <div class="pagepp">
                        <p><?php
                            $article_id = 17; //页面的ID
                            echo get_post($article_id)->post_content;
                        ?></p>
                    </div>
                    <div align="center"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>