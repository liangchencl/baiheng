<?php
if ( in_category('hy_news') ) {
include(TEMPLATEPATH . '/single_news.php');
}else {
include(TEMPLATEPATH . '/single_project.php');
}
?>