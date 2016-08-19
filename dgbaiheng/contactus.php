<?php
/*
Template Name:联系我们
*/
?>
<?php get_header(); ?>

<style>
    .banner {display: none;}

</style>
<style type="text/css">
        body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
        #allmap{width:100%;height:600px;}
    </style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZhHLSMudbemzvPm1lkCfocTT1GDX0smx"></script>


<div id="allmap"></div>

<div class="lxabout">
	<div id="lxabout" class="">
	    <h3>东莞百亨五金配件<br>专注行业十余年！</h3>
	    <p>本公司创建于1998年，专业批发、零售慢走丝、快走丝线切割机配件及耗材，有徕通、日本沙迪克、三菱、苏三光、庆鸿、亚特、法兰克、西部、夏米尔、阿奇、兄弟等机台配件耗材，及打孔机、火花机零配件消耗品，其中有过滤器、树脂、钻石眼模、除锈剂、导电块、绝缘板、铜管、铜线等耗材、还有快走丝用的钼丝、乳化油、导轮、快走丝导电块……我们以优质的产品、良好的服务、实惠的价格、一颗感恩的心赢得了客户的信任与支持。在新发展时期，我们将一如既往，始终坚持以客户满意度为目标，我司凭着“客户至上，质量第一，信誉第一”的服务方针，不断摸索，开拓创新，相信我们的服务将会让您满意！衷心欢迎各新老客户惠顾..</p>
        <a target="_blank" rel="nofollow" href="#">咨询我们</a>
	    <a href="#" target="_blank">了解更多</a>
	</div>
</div>

<script type="text/javascript" src="http://developer.baidu.com/map/custom/stylelist.js"></script>


<script type="text/javascript">
var map = new BMap.Map("allmap");
var point = new BMap.Point(113.964621,22.936821);
var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
    map.centerAndZoom(point, 15);
    // map.enableScrollWheelZoom();
    map.disableScrollWheelZoom() ;   //启用滚轮放大缩小，默认禁用
    var opts = {
      width : 200,     // 信息窗口宽度
      height: 100,     // 信息窗口高度
      title : "东莞市大朗百亨五金配件" , // 信息窗口标题
      enableMessage:true,//设置允许信息窗发送短息
    }
    var infoWindow = new BMap.InfoWindow("地址：东莞市大朗水口管理区金朗南路30号", opts);  // 创建信息窗口对象
    marker.addEventListener("click", function(){
        map.openInfoWindow(infoWindow,point); //开启信息窗口
    });
    map.openInfoWindow(infoWindow,point); //开启信息窗口
</script>

<?php get_footer(); ?>