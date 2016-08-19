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
            <div class="right_name">行业新闻</div>
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
            <ul class="news">
<!--                 <li><a href="#" title="立式磨机结构和工作原理分析" target="_blank">立式磨机结构和工作原理分析</a><span>2016-03-02</span>
                </li>
                <li><a href="#" title="立式磨机操作中的三大注意事项" target="_blank">立式磨机操作中的三大注意事项</a><span>2016-03-02</span>
                </li>
                <li><a href="#" title="立磨机节能减排促进我国水泥行业发展" target="_blank">立磨机节能减排促进我国水泥行业发展</a><span>2016-03-02</span>
                </li> -->
                <?php while (have_posts()) : the_post(); ?>
                    <li class="clearfix">
                        <!-- <div class="category_list_right">
                            <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                            <h5>分类： <span><?php the_category(', ') ?></span>    标签： <span><?php the_tags('', ', ', ''); ?></span>  发布日期：<span><?php the_time("Y-m-d"); ?></span></h5>
                        </div>
                        <div class="read_more text-right"><a href="<?php the_permalink() ?>">阅读全文<i class="fa fa-angle-double-right"></i></a></div> -->
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a><span><?php the_time("Y-m-d"); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="page_navi"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>