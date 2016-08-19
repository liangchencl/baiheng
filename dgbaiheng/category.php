<?php 
if (in_category(array(2,3,4,5,8,9,10,11,12,13)) ) {
    get_template_part('produce_list' );
}else {
    get_template_part('news_list' );
}
?>