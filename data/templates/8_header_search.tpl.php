<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<? if((stristr($_SERVER['HTTP_USER_AGENT'], 'AiYouXin_App'))) { ?>
<script type="text/javascript">



//alert(messagingIframe);

    function iosLocal(key,val){
var messagingIframe = document.createElement('iframe');
messagingIframe.style.display = 'none';
document.documentElement.appendChild(messagingIframe);
        messagingIframe.src = key+":"+val;
    }


var ua = navigator.userAgent.toLowerCase();	
if (/iphone|ipad|ipod/.test(ua)) {
iosLocal("changecity","<? echo $city['cityname'] ? $city['cityname'] : '切换'; ?>");

<? if($mod!='index' && $mod!='category' && !in_array($mod,array('login','member','register','shoucang','mypost')) && $mod!='post') { ?>
iosLocal("changback","back");
<?php } else { ?>
iosLocal("changlogo","logo");
<?php } ?>

}else{
applocal.setMessageInTop("<? echo $city['cityname'] ? $city['cityname'] : '切换'; ?>");
}



</script>
<?php } else { ?>

<!--<img src="/m/template/images/back.png" style="height:32px;width:32px" alt="<?=$mymps_global['SiteName']?>">-->
<div class="header">


<? if($mobile_settings['mobilelogo']) { if($mod!='index' && $mod!='category' && !in_array($mod,array('login','member','register','shoucang','mypost')) && $mod!='post') { ?>
<a class="logo_a" href="#" onclick="window.location.href=document.referrer;">
<img id="back" src="/m/template/images/back.png" style="height:32px;width:32px;" alt="<?=$mymps_global['SiteName']?>">
</a>
<?php } else { ?><a class="logo_a" href="index.php?cityid=<?=$city['cityid']?>"><img src="<?=$mymps_global['SiteUrl']?><?=$mobile_settings['mobilelogo']?>" alt="<?=$mymps_global['SiteName']?>"></a><?php } ?><?php } ?>
<a class="city_a" href="index.php?mod=changecity&cityid=<?=$city['cityid']?>"><? echo $city['cityname'] ? $city['cityname'] : '切换'; ?><i class="filt-arrowwhite"></i></a>
    <div class="search <? echo $mobile_settings['mobilelogo'] ? 'width45' : 'width65'; ?>">
<form action="index.php?" method="get">
        <input name="cityid" type="hidden" value="<?=$city['cityid']?>">
<input name="mod" type="hidden" value="search">
<input class="input_keys" name="keywords" type="text" value="<?=$keywords?>" x-webkit-speech lang="zh-CN" placeholder="输入关键词搜索">
<input class="search_but body_bg" id="qixc" type="submit" value="搜信息">
</form>
</div>
    <? if(!$mobile_settings['mobilelogo']) { ?><div class="h_btn h_post" onclick="javascript:window.location.href='index.php?mod=post&cityid=<?=$city['cityid']?>'" ></div><?php } ?>
</div>

<div style="height: 49px;"></div>


<div class="clearfix"></div>
<div id="contactbar">
<a href="index.php?cityid=<?=$city['cityid']?>" class="bottom_home<? echo $mod=='index' ? '_on' : '';; ?>">首页</a>

<a href="index.php?mod=category&cityid=<?=$city['cityid']?>" class="bottom_index<? echo $mod == 'category' ? '_on' : '';; ?>">分类</a>

<a href="index.php?mod=member&cityid=<?=$city['cityid']?>" class="bottom_member<? echo in_array($mod,array('login','member','register','shoucang','mypost')) ? '_on' : '';; ?>">我的</a>
<a href="index.php?mod=<? if(empty($city['cityid'])) { ?>changecity<?php msetcookie('post',1); ?><?php } else { ?>post<?php } ?>&cityid=<?=$city['cityid']?>" class="bottom_post<? echo $mod == 'post' ? '_on' : '';; ?>">发布</a>
</div>
<script type="text/javascript">
/*
String.prototype.startWith=function(str){
  var reg=new RegExp("^"+str);
  return reg.test(this);
}


var search = window.location.search;
search = search.substring(1);
var isback = false;

if(!search.startWith("cityid") && !search.startWith("mod=post") && !search.startWith("mod=category") && !search.startWith("mod=member")
  && search!=""){
var element = document.getElementById('back');
element.style.display="block";

var logo = document.getElementById('logo');
logo.style.display="none";

isback = true;

}

function gotobackx(){
if(isback){
 
}else{
window.location.href="index.php?cityid=<?=$city['cityid']?>";
}
}
*/

</script>
<?php } ?>