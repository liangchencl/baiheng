jQuery(document).ready(function($){

//关于我们
function getTop(e)
{
    var offset=e.offsetTop;
    if(e.offsetParent!=null) //只要还有父元素,也就是当前元素不是根节点就继续往上累计元素的高度
        offset+=getTop(e.offsetParent);
    return offset-400;
}
var myBlockTop = getTop(document.getElementById("con2_right"));
var oneDiv=document.getElementById("con2_right");
if(!!window.attachEvent)//ie浏览器下。
{
    window.attachEvent('onscroll',function(){
                    if(document.documentElement.scrollTop>= myBlockTop)
                    {$("#con2_right").addClass("a-fadeinR");}
                    else{$("#con2_right").removeClass("a-fadeinR");}

    });
}
if(!!window.addEventListener)//非ie浏览器下
{
    window.addEventListener("scroll",function(){
        if(document.documentElement.scrollTop>= myBlockTop||document.body.scrollTop>=myBlockTop)
                    {$("#con2_right").addClass("a-fadeinR");}
                    else{$("#con2_right").removeClass("a-fadeinR");}
    });
}


//企业新闻
function getTop(e)
{
    var offset=e.offsetTop;
    if(e.offsetParent!=null) //只要还有父元素,也就是当前元素不是根节点就继续往上累计元素的高度
        offset+=getTop(e.offsetParent);
    return offset-400;
}
var myBlockTop = getTop(document.getElementById("con2_left"));
var oneDiv=document.getElementById("con2_left");
if(!!window.attachEvent)//ie浏览器下。
{
    window.attachEvent('onscroll',function(){
                    if(document.documentElement.scrollTop>= myBlockTop)
                    {$("#con2_left").addClass("a-fadeinL");}
                    else{$("#con2_left").removeClass("a-fadeinL");}

    });
}
if(!!window.addEventListener)//非ie浏览器下
{
    window.addEventListener("scroll",function(){
        if(document.documentElement.scrollTop>= myBlockTop||document.body.scrollTop>=myBlockTop)
                    {$("#con2_left").addClass("a-fadeinL");}
                    else{$("#con2_left").removeClass("a-fadeinL");}
    });
}

});