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
                <div class="search_result">
                    <h4>你搜索的结果如下：</h4>
                    <ul>
                        <?php $posts = query_posts($query_string . '&orderby=date&showposts=15'); ?>
                        <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                      <li>
                        <a href="<?php the_permalink() ?>">
                            <h4 class="clearfix"><span class="pull-left"><?php the_title(); ?></span><b class="pull-right"><?php the_date_xml(); ?></b></h4>
                        </a>
                    </li>
                   </div>
                     <?php endwhile; ?>
                       <?php else : ?>
                     <div class="sousu_2">
                        <h2>对不起！没有找到你想要的内容</h2>
                     </div>
                  <?php endif; ?>
                   </ul>
                </div>
                <div align="center"></div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>