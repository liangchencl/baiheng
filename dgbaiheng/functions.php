<?php
// 开启特色图像功能
add_theme_support('post-thumbnails');

// 开启友情链接
add_filter( 'pre_option_link_manager_enabled', '__return_true' );


register_nav_menus(
array(
'header-menu' => __( '导航自定义菜单' ),
'footer-menu' => __( '底部自定义菜单' )
)
);


// 加速优化之精简头部代码
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
remove_action( 'wp_head', 'rel_canonical' ); //移除文章页面链接
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口

// 后台屏蔽各种提示
add_action('admin_menu','wp_hide_nag');
function wp_hide_nag() {
     remove_action( 'admin_notices', 'update_nag', 3 );
}
add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); // 关闭核心提示
add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示
add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;")); // 关闭主题提示
remove_action('admin_init', '_maybe_update_core');    // 禁止 WordPress 检查更新
remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
remove_action('admin_init', '_maybe_update_themes');  // 禁止 WordPress 更新主题


//开启后台小工具菜单
if (function_exists('register_sidebar')){
 register_sidebar(array(
 ));}

// gravatar图像问题

function duoshuo_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'duoshuo_avatar', 10, 3 );

//禁用Googlefont
class Disable_Google_Fonts {
        public function __construct() {
                add_filter( 'gettext_with_context', array( $this, 'disable_open_sans' ), 888, 4 );
        }
        public function disable_open_sans( $translations, $text, $context, $domain ) {
                if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
                        $translations = 'off';
                }
                return $translations;
        }
}
$disable_google_fonts = new Disable_Google_Fonts;

/*添加主题选项over*/



/**
*站点图片裁切处理函数
*此处引用timthumb.php图片裁切文件。
*参数信息：
*$src,图片地址
*$w,裁切后图片宽度
*$h,裁切后图片高度
*$zc,是否裁切，1为裁切，0为只缩放不裁切。默认1。
*/
if(!function_exists('timthumb')){
    function timthumb($src,$w,$h,$zc=1){
        if($src){
            $src=str_replace(home_url(),'',$src);
        }else{
            $src="/wp-content/themes/".get_stylesheet()."/images/baiheng.jpg";
        }
        echo "/wp-content/themes/".get_stylesheet()."/timthumb.php?src=".$src."&w=".$w."&h=".$h."&zc=".$zc;
    }
}

/**
*   主题设置
*   page_title      (字符串) 显示在页面中的标题
*   menu_title      (字符串) 用于显示在侧边导航栏的标题，留空则默认与page_title相同。
*   menu_slug       (字符串) 页面别名，用于引用当前页面，默认为一个url menu_slug友好的版本。(必须值，且唯一). 页面链接：/wp-admin/admin.php?page=menu_slug
*   capability      (字符串) 用于指定当前菜单的功能，默认值为edit_posts，如果需要了解更多可以查看网址：http://codex.wordpress.org/Roles_and_Capabilities
*   position        (数字|字符串) 用于控制当前菜单的位置。如果两个菜单的值相同的话，其中一个可能会被覆盖，导致只显示一个菜单！
*   parent_slug     (字符串) 父级的别名，如果定义此项，这个菜单将会成为子菜单。
*   icon_url        (字符串) 菜单图标，默认为WordPress自带样式，可在https://developer.wordpress.org/resource/dashicons中选择，值为图标后面的dashicons-xx
*   redirect        (布尔值) 设置为true，则将父页面重定向到第一个子菜单，设置为false，则父菜单单独为一个页面。
*   post_id         (数字|字符串) 此post_id用于保存和加载数据，可以为数字也可以为字符串，默认为options。
*   autoload        (布尔值)  是否在WordPress启东市自动加载。默认flase。
*/

    $iton_options = array(
        'page_title' => '主题设置',
        'menu_title' => '主题设置',
        'menu_slug' => 'iton-options',
        'capability' => 'edit_posts',
        'position' => 999,
        'parent_slug' => '',
        'icon_url' => 'dashicons-admin-home',
        'redirect' => false,
        'post_id' => 'options',
        'autoload' => false,
    );
    $iton_menu = array(
        'page_title' => '高级设置',
        'menu_title' => '',
        'menu_slug' => 'pai-menu',
        'capability' => 'edit_posts',
        'position' => 1,
        'parent_slug' => 'iton-options',
        'icon_url' => '',
        'redirect' => true,
        'post_id' => 'iton_menu',
        'autoload' => false,
    );
    acf_add_options_page($iton_options);
    acf_add_options_sub_page($iton_menu);


// 获取当前分类下面的子分类
function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时,循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类(往上爬)
}
return$this_category->term_id; // 返回根分类的id号
}



//后台登陆数学验证码
function myplugin_add_login_fields() {
//获取两个随机数, 范围0~9
$num1=rand(0,9);
$num2=rand(0,9);
//最终网页中的具体内容
    echo "<p><label for='math' class='small'>验证码</label><br /> $num1 + $num2 = ?<input type='text' name='sum' class='input' value='' size='25' tabindex='4'>"
."<input type='hidden' name='num1' value='$num1'>"
."<input type='hidden' name='num2' value='$num2'></p>";
}
add_action('login_form','myplugin_add_login_fields');
function login_val() {
$sum=$_POST['sum'];//用户提交的计算结果
switch($sum){
//得到正确的计算结果则直接跳出
case $_POST['num1']+$_POST['num2']:break;
//未填写结果时的错误讯息
case null:wp_die('错误: 请输入验证码.');break;
//计算错误时的错误讯息
default:wp_die('错误: 验证码错误,请重试.');
}
}
add_action('login_form_login','login_val');


// 去掉后台编辑文章添加图片时图片自带的链接
function wpc_imagelink_setup() {
  $image_set = get_option( 'image_default_link_type' );
  if ($image_set !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'wpc_imagelink_setup', 10);

// 上传图片自动重新命名
add_filter( 'wp_handle_upload_prefilter', 'custom_upload_name' );
function custom_upload_name( $file )
{
if ( !$ext )
$ext = ltrim(strrchr($file['name'], '.'), '.');
$file['name'] = date("YmdHis").rand(10,99).'.'.$ext;
return $file;
}

?>