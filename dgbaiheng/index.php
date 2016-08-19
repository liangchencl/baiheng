<?php
/*
Template Name:首页
*/
?>
<?php get_header(); ?>
        <div class="marquee"> <span>最新公告：</span> 
            <marquee><?php the_field('notice','options');?></marquee>
            <div class="search">
                <form id="search" name="search" class="" role="search" action="<?php bloginfo('siteurl'); ?>" method="get">
                    <input id="kws" type="text" id="s" name="s" class="form-control text" placeholder="搜一搜……">
                    <input type="submit" title="搜索" class="btn" value="">
                </form>
            </div>
        </div>
        <div class="con1_bg">
            <div class="con1">
                <div class="con1_title">
                    <p>产品展示</p> <a href="/dgbaiheng/?cat=2" title="查看更多产品展示" target="_blank">查看更多>></a> 
                </div>
                <ul class="con1_list">                    
                    <?php $recent = new WP_Query("cat=2&showposts=8"); while($recent->have_posts()) : $recent->the_post();?>
                        <li>
                            <div>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="pro_img" target="_blank">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                                        <img src="<?php timthumb($thumbnail_image_url[0],226,170); ?>">
                                    <?php } else {?>
                                        <img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/timthumb.jpg" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                                <p><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="con2">
            <div class="con2_left a-fadeinL" id="con2_left">
                <div class="con2_title1">
                    <p>行业新闻</p> <a href="/dgbaiheng/?cat=1" title="查看更多企业新闻" target="_blank">查看更多>></a> 
                </div>
                <ul class="news_list">
                    <?php $recent = new WP_Query("cat=1&showposts=3"); while($recent->have_posts()) : $recent->the_post();?>
                        <li>
                            <div class="news_date"> <span><?php the_time('d'); ?></span> 
                                <div class="syllcs"><?php the_time('Y-m'); ?></div>
                            </div>
                            <p><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></p>
                            <?php
                                if(is_singular()){the_content();}else{
                                $pc=$post->post_content;
                                $st=strip_tags(apply_filters('the_content',$pc));
                                if(has_excerpt())
                                    the_excerpt();
                                elseif(function_exists('mb_strimwidth'))
                                    echo'<div class="news_con">'
                                    .mb_strimwidth($st,0,90,' ...')
                                    .'</div>';
                                else the_content();
                            }?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="con2_right a-fadeinR" id="con2_right">
                <div class="con2_title2">关于我们</div>
                <div class="con2_about" style="height:270px;">
                    <div class="con2_img">
                        <img src="<?php the_field('aboutus_img',17);?>" alt="关于我们" class="thumbnail lazy" style="display: block;width:163px;height:119px">
                    </div>
                    <p>
                    <?php
                        $article_id = 17; //页面的ID
                        echo get_post($article_id)->post_content;
                    ?>
                    </p>

                </div> <a href="/dgbaiheng/?page_id=17" title="查看更多关于我们" class="more" target="_blank">查看更多 >></a>
            </div>
        </div>
        <div class="con3_bg">
            <div class="con3">
                <div class="con3_title">
                    <p>热销产品</p> <a href="/dgbaiheng/?cat=2" title="查看更多制造能力" target="_blank">查看更多>></a> 
                </div>
                <ul class="con3_list">
                    <?php  query_posts('showposts=8&cat=2&orderby=rand');
                        while(have_posts()) : the_post();
                    ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="热销产品" target="_blank">
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                                    <img src="<?php timthumb($thumbnail_image_url[0],226,170); ?>" class="thumbnail lazy" style="display: block;">
                                <?php } else {?>
                                    <img class="img-responsive thumbnail lazy" src="<?php bloginfo('template_url'); ?>/images/timthumb.jpg" alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </a>
                            <div class="con3_border">
                                <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>

            </div>
        </div>
        <div class="con4_bg">
            <div class="con4">
                <div class="con4_left">
                    <p class="con4_title">友情链接</p>
                    <ul class="links">
                        <?php wp_list_bookmarks('orderby=link_id&categorize=0&category='.get_option('friendly_link').'&title_li='); ?>
                    </ul>
                </div>
                <div class="con4_contact">
                    <p class="address">地址：<?php the_field('addresss','options');?></p>
                    <p class="zip">邮箱：<?php the_field('email','options');?></p>
                    <p class="tel">电话：<?php the_field('phonenumber','options');?></p>
                    <p class="fax">Q Q：<?php the_field('qq','options');?></p>
                </div>
            </div>
        </div>


<?php get_footer(); ?>