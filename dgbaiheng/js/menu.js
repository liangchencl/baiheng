jQuery(document).ready(function($){

	/*arguments*/	
	var topNav = $( '.nav_bg ul.nav>li' );
	var subNav = $( '.nav_bg .sub-menu>li' );
	
	/*have sub menu background*/
	$( '.nav_bg .sub-menu li:has(.sub-menu)>a' ).addClass('sub');
	
	/*top nav*/
	$( topNav ).mouseenter( function(){
    // alert(1)
		$( this ).find( '>ul.sub-menu' ).fadeIn( 100 );
	} );
	$( topNav ).mouseleave( function(){
		$( this ).find( '>ul.sub-menu' ).fadeOut( 100 );
	} );
	
	/*sub nav*/
	$( subNav ).mouseenter( function(){
		$( this ).css( 'background-color','#3889c7' ).find( '>ul.sub-menu' ).css( 'display','block' );
	} );
	$( subNav ).mouseleave( function(){
		$( this ).css( 'background','none' ).find( '>ul.sub-menu' ).css( 'display','none' );
	} );	
	
});

//二级伸缩菜单
$(function () {
	$(".ny_zblb1 ul li").click(function(){
		var thisSpan=$(this);
		$(".ny_zblb1 ul li ul").prev("a").removeClass("cur");
		$("ul", this).prev("a").addClass("cur");
		$(this).children("ul").slideDown("fast");
		$(this).siblings().children("ul").slideUp("fast");
	})
});


//划线
$({property: 0}).animate({property: 100}, {
                duration: 800,
                step: function() {
                    var percentage = Math.round(this.property);

                    $('#progress').css('width',  percentage+"%");

                     if(percentage == 100) {
                            $("#progress").addClass("done");//完成，隐藏进度条
                        }
                }
});

//totop
function gotoTop(acceleration,stime) {
   acceleration = acceleration || 0.1;
   stime = stime || 10;
   var x1 = 0;
   var y1 = 0;
   var x2 = 0;
   var y2 = 0;
   var x3 = 0;
   var y3 = 0; 
   if (document.documentElement) {
       x1 = document.documentElement.scrollLeft || 0;
       y1 = document.documentElement.scrollTop || 0;
   }
   if (document.body) {
       x2 = document.body.scrollLeft || 0;
       y2 = document.body.scrollTop || 0;
   }
   var x3 = window.scrollX || 0;
   var y3 = window.scrollY || 0;
 
   // 滚动条到页面顶部的水平距离
   var x = Math.max(x1, Math.max(x2, x3));
   // 滚动条到页面顶部的垂直距离
   var y = Math.max(y1, Math.max(y2, y3));
 
   // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
   var speeding = 1 + acceleration;
   window.scrollTo(Math.floor(x / speeding), Math.floor(y / speeding));
 
   // 如果距离不为零, 继续调用函数
   if(x > 0 || y > 0) {
       var run = "gotoTop(" + acceleration + ", " + stime + ")";
       window.setTimeout(run, stime);
   }
}

// 固定层
function buffer(a,b,c){var d;return function(){if(d)return;d=setTimeout(function(){a.call(this),d=undefined},b)}}(function(){function e(){var d=document.body.scrollTop||document.documentElement.scrollTop;d>b?(a.className="div1 div2",c&&(a.style.top=d-b+"px")):a.className="div1"}var a=document.getElementById("float");if(a==undefined)return!1;var b=0,c,d=a;while(d)b+=d.offsetTop,d=d.offsetParent;c=window.ActiveXObject&&!window.XMLHttpRequest;if(!c||!0)window.onscroll=buffer(e,150,this)})();