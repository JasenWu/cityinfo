<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?=$mymps_global['SiteUrl']?>/m/index.php?mod=category&catid=<?=$catid?>&cityid=<?=$cityid?>");</script>
<meta name="keywords" content="<?=$cat['keywords']?>" />
<meta name="description" content="<?=$cat['description']?>" />
<title><?=$page_title?></title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.head_<?=$mymps_global['head_style']?>.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/category.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/pagination2.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/hover_bg.js" type="text/javascript"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?> <?=$mymps_global['screen_cat']?> bodybg<?=$mymps_global['cfg_tpl_dir']?><?=$mymps_global['bodybg']?>"><link href="<?=$mymps_global['SiteUrl']?>/template/default/css/home.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.current{
background-color: #00AFF0;
}
</style>
<div class="header">
<div class="head">
<div class="head_top">
<ul>
<a href="<?=$mymps_global['SiteUrl']?>/desktop.php" target="_blank" title="点击右键，选择“目标另存为”，将此快捷方式保存到桌面即可">保存到桌面</a>　
</ul>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/javascript.php?part=iflogin&cityid=<?=$city['cityid']?>"></script>
</div>
<div class="logo"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>" width="180" height="70" /></div>
<div class="area">
<a href="<?=$mymps_global['SiteUrl']?>/changecity.php">
<? if($city['cityname']) { ?><h1><?=$city['cityname']?></h1><?php } else { ?><h1>总站</h1><?php } ?>
<span><img src="<?=$mymps_global['SiteUrl']?>/template/default/images/index/up.png" width="20" height="20" /></span>
</a>
</div>
<div class="search">
<form method="get" action="<?=$mymps_global['SiteUrl']?>/search.php?" id="searchForm" target="_blank">
<input name="cityid" value="<?=$city['cityid']?>" type="hidden"/>
<input style="padding: 0;" type="text" class="ser_txt" name="keywords" id="searchheader" onmouseover="hiddennotice('searchheader');" x-webkit-speech lang="zh-CN" />
<input type="submit" name="button" id="button" value="提交"  class="ser_btn"/>
</form>
</div>
<div class="head_btn">
<h1><a href="<?=$mymps_global['SiteUrl']?>/delinfo.php">修改/删除信息</a></h1>
<h2><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?cityid=<?=$cityid?>&catid=<? echo $catid?$catid:$info['catid']; ?>">免费发布信息</a></h2>

</div>

</div>
<div class="nav">
<ul>
<li><a href="<?=$city['domain']?>" id="index" <? if(empty($cat['catid'])) { ?>class="current"<?php } ?>>首页</a></li><?php $navurl_header = mymps_get_navurl('header',9); ?><?php if(is_array($navurl_header)){foreach($navurl_header as $k => $mymps) { ?><li><a <? if($mymps['flag'] == $cat['catid'] || $mymps['flag'] == $cat['parentid']) { ?>class="current"<?php } ?> target="<?=$mymps['target']?>" id="<?=$mymps['flag']?>" href="<? if($mymps['flag'] != 'outlink' && $mymps['flag'] != 'news') { ?><?=$city['domain']?><?php } ?><?=$mymps['url']?>"><font color="<?=$mymps['color']?>"><?=$mymps['title']?></font><sup class="<?=$mymps['ico']?>"></sup></a></li>
<?php }} ?>
<li id="mob"><a href="#" >手机APP下载</a></li>
</ul>

</div>
</div>



<div id="dialogBg"></div>
<div id="dialog" class="animated">
<div style="height:18px"></div>
<div class="dialogTop" style="position:absolute;height:8px;right:5px; top:-10px;">

<a href="javascript:;" class="claseDialogBtn" ><strong><b>×</b></strong></a>
</div>
<div class="index_view_ad" id="ad_view"></div>
</div>

<script type="text/javascript">
$('#mob').click(function(){
$('#dialogBg').fadeIn(300);
$('#dialog').removeAttr('class').addClass('animated bounceIn').fadeIn();
$('#ad_view').html("<div style='text-align:center'><img src='/images/QRcodexx.png' alt='' style='text-align:center'/></div><br /><br /><div style='text-align:center'>请用手机扫描二维码 <a href='/app/download.php' target='_blank'>下载APP</a></div>");
    });
    //关闭弹窗
$('.dialogTop').click(function(){
$('#dialogBg').fadeOut(300,function(){
$('#dialog').addClass('bounceOutUp').fadeOut();
});
});





</script><div class="body1000">
<div class="clear"></div>
<div class="location">
<?=$location?>
</div>
<div class="clear"></div>
<div class="wrapper"><div id="select">
<? if($cat_list) { ?>
<dl class='fore' id='select-brand'>
<dt>栏目分类：</dt>
<dd>
<div class='content'>
    <?php if(is_array($cat_list)){foreach($cat_list as $mymps) { ?><div><a href="<?=$city['domain']?><?=$mymps['uri']?>" <? if($mymps['catid'] == $cat['catid']) { ?>class="curr"<?php } ?> title="<?=$city['cityname']?><?=$mymps['catname']?>">不限</a></div>
        <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $w) { ?><div><a href="<?=$city['domain']?><?=$w['uri']?>" <? if($w['catid'] == $cat['catid']) { ?>class="curr"<?php } ?> title="<?=$city['cityname']?><?=$w['catname']?>"><?=$w['catname']?></a></div>
        <?php }} ?>
<?php }} ?>
</div>
</dd>
</dl>
    <?php } ?>
    <?php if(is_array($mymps_extra_model)){foreach($mymps_extra_model as $mymps) { ?><dl>
<dt><?=$mymps['title']?>：</dt>
<dd>
    <?php if(is_array($mymps['list'])){foreach($mymps['list'] as $w) { ?><div><a href="<?=$city['domain']?><?=$w['uri']?>" <? if($w['select'] == 1) { ?>class="curr"<?php } ?>><?=$w['name']?></a></div>
<?php }} ?>
    </dd>
</dl>
<?php }} ?>
    <? if($area_list) { ?>
<dl>
<dt>区域查找：</dt>
<dd>
    <?php if(is_array($area_list)){foreach($area_list as $mymps) { ?><div><a href="<?=$city['domain']?><?=$mymps['uri']?>" <? if($mymps['select'] == 1) { ?>class="curr"<?php } ?>><?=$mymps['areaname']?></a></div>
<?php }} ?>
</dd>
</dl>
<?php } ?>
    <? if($street_list) { ?>
<dl>
<dt></dt>
<dd>
        <?php if(is_array($street_list)){foreach($street_list as $mymps) { ?><div><a href="<?=$city['domain']?><?=$mymps['uri']?>" <? if($mymps['select'] == 1) { ?>class="curr"<?php } ?>><?=$mymps['streetname']?></a></div>
<?php }} ?>
</dd>
</dl>
<?php } ?>
    <? if(!$cityid && $hotcities) { ?>
<dl>
<dt>热门分站</dt>
<dd>
<div><a href="#" class="curr">不限</a></div>
        <?php if(is_array($hotcities)){foreach($hotcities as $mymps) { ?><div><a href="<?=$mymps['domain']?><?=$cat['caturi']?>"><?=$mymps['cityname']?></a></div>
<?php }} ?>
<div><a href="<?=$mymps_global['SiteUrl']?>/changecity.php">更多 &raquo;</a></div>
</dd>
</dl>
<?php } ?>
<dl class="lastdl">
<form method="get" action="<?=$mymps_global['SiteUrl']?>/search.php?" target="_blank">
<input name="cityid" value="<?=$city['cityid']?>" type="hidden">
<input name="mod" value="information" type="hidden">
<input name="catid" value="<?=$cat['catid']?>" type="hidden">
<input name="areaid" value="<?=$areaid?>" type="hidden">
<input name="streetid" value="<?=$streetid?>" type="hidden">
<input name="keywords" type="text" value="" class="searchinput" id="searchbody" onmouseover="hiddennotice('searchbody');"/>
<input type="submit" value="搜本类" class="<?=$mymps_global['head_style']?>_searchsubmit" />
</form>
</dl>
</div></div>
<div class="clear"></div>
<div style="body1000">
<div class="<?=$mymps_global['head_style']?>_listhd">
<div class="listhdleft">
<div><a href="#" class="currentr"><span></span><?=$cat['catname']?>信息</a></div>
</div>
<div class="listhdcenter">
信息总数：<span><?=$rows_num?></span> ，您知道吗？置顶发布的信息可使成交率提高50%！
</div>
<div class="listhdright">
<a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?catid=<?=$cat['catid']?>&cityid=<?=$city['cityid']?>" target="_blank">免费发布<?=$city['cityname']?><?=$cat['catname']?>信息>></a>
</div>
</div>
<div class="clear5"></div>
<div id="ad_intercatdiv"></div>
<div class="infolists">
<div class="list_zpqz">
<div id="ad_interlistad_top"></div>
<ul>
        <?php if(is_array($info_list)){foreach($info_list as $mymps) { ?><div class="hover <? if($mymps['upgrade_type']>1) { ?>ding<?php } ?>">
<span class="ltitle">
<a href="<?=$mymps['uri']?>" target="_blank" style="<? if($mymps['ifred'] == 1) { ?>color:red;<?php } ?> <? if($mymps['ifbold'] == 1) { ?>font-weight:bold;<?php } ?>"><?=$mymps['title']?></a><? if($mymps['img_count']) { ?><span class="img_count"><?=$mymps['img_count']?>图</span><?php } if($mymps['info_level'] == 2) { ?><span class="tuijian">推荐</span><?php } if($mymps['certify'] == 1) { ?><span class="certify">认证</span><?php } ?>
</span>
        <span class="ltime"><? echo get_format_time($mymps['begintime']); ?></span>
        <span class="larea"><?=$mymps['areaname']?></span>
<span class="lsalary"><? if($mymps['day_salary']) { ?><?=$mymps['day_salary']?><?php } else { ?><?=$mymps['salary']?>元<?php } ?></span>
        <span class="lcompany"><? echo cutstr($mymps['company'],28); ?>&nbsp;</span>
</div>
<?php }} ?>
</ul>
<!--栏目列表页尾部广告开始-->
<div id="ad_interlistad_bottom"></div>
<!--栏目列表页尾部广告结束-->
</div>
<div class="clear"></div>
<div class="pagination2"><?=$pageview?></div>
<div class="clear"></div>
<div class="totalpost"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?catid=<?=$cat['catid']?>&cityid=<?=$city['cityid']?>" target="_blank">马上发布一条<?=$city['cityname']?><?=$cat['catname']?>信息&raquo;</a></div>
</div>
</div>
    <div class="clear"></div>
<div class="colorfoot">
    <? if($hotcities) { ?>
    <div class="cateintro relate">
    <div class="introleft"><?=$cat['catname']?>相关分站</div>
    <div class="introright">
    <?php if(is_array($hotcities)){foreach($hotcities as $mymps) { ?>    <a href='<?=$mymps['domain']?><?=$cat['caturi']?>' target="_blank"><?=$mymps['cityname']?><?=$cat['catname']?></a>
    <?php }} ?>
    </div>
    </div>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="cateintro">
        <div class="introleft"><?=$city['cityname']?><?=$cat['catname']?>频道</div>
        <div class="introright"><?=$city['cityname']?><?=$cat['catname']?>频道为您提供<?=$city['cityname']?><?=$cat['catname']?>信息，在此有大量<?=$city['cityname']?><?=$cat['catname']?>信息供您选择，您可以免费查看和发布<?=$city['cityname']?><?=$cat['catname']?>信息。</div>
    </div>
    <? if($friendlink) { ?>
    <div class="clearfix"></div>
    <div class="cateintro">
    <div class="introleft">友情链接</div>
    <div class="introflink">
    <?php if(is_array($friendlink)){foreach($friendlink as $mymps) { ?>    <a href='<?=$mymps['url']?>' target='_blank'><?=$mymps['name']?></a>
    <?php }} ?>
    <a href="<?=$city['domain']?><?=$about['friendlink_uri']?>" target="_blank">更多</a>
    </div>
    </div>
    <?php } ?>
</div><div class="footsearch <?=$mymps_global['head_style']?>">
<ul>
<form method="get" action="<?=$mymps_global['SiteUrl']?>/search.php?" name="footsearch" target="_blank">
<input name="cityid" value="<?=$city['cityid']?>" type="hidden">
<input name="mod" value="information" type="hidden">
<input name="keywords" type="text" class="footsearch_input" id="searchfooter" onmouseover="hiddennotice('searchfooter');" x-webkit-speech lang="zh-CN">
<input type="submit" value="信息快速搜索" class="footsearch_submit">
<input type="button" onclick="window.open('<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>?cityid=<?=$city['cityid']?>')" class="footsearch_post" value="免费发布信息">
</form>
</ul>
</div>
<div class="clear"></div>
<!-- 页尾通栏广告开始-->
<div id="ad_footerbanner"></div>
<!-- 页尾通栏广告结束-->
<!--广告处理部分开始-->
<? if($advertisement['type']['floatad'] || $advertisement['type']['couplead']) { ?>
<div align="left"  style="clear: both;">
    <script src="<?=$mymps_global['SiteUrl']?>/template/global/floatadv.js" type="text/javascript"></script>
<? if($advertisement['type']['couplead']) { ?>
    <script type="text/javascript">
<?=$adveritems[$advertisement['type']['couplead']['0']]?>theFloaters.play();
    </script>
    <?php } ?>
    <? if($advertisement['type']['floatad']) { ?>
    <script type="text/javascript">
        <?=$adveritems[$advertisement['type']['floatad']['0']]?>theFloaters.play();
    </script>
    <?php } ?>
</div>
<?php } ?>
<div style="display: none" id="ad_none">
<!--头部通栏广告-->
<? if($advertisement['type']['headerbanner']) { ?>
<div class="header" id="ad_header_none"><?php $countheaderbanner = count($advertisement['type']['headerbanner']);$i=1; ?><?php if(is_array($advertisement['type']['headerbanner'])){foreach($advertisement['type']['headerbanner'] as $mymps) { if($adveritems[$mymps]) { ?><div class="headerbanner" <? if($countheaderbanner == $i) { ?>style="margin-right:0;"<?php } ?>><?=$adveritems[$mymps]?></div><?php } ?><?php $i=$i+1; ?><?php }} ?>
</div>
<?php } ?>
<!--首页分类间广告--><?php if(is_array($advertisement['type']['indexcatad'])){foreach($advertisement['type']['indexcatad'] as $k => $mymps) { ?><div class="indexcatad" id="ad_indexcatad_<?=$k?>_none"><?=$adveritems[$mymps['0']]?></div>
<?php }} ?>
<!--栏目信息列表间广告-->
<? if($advertisement['type']['interlistad']['top']) { ?>
<div id="ad_interlistad_top_none">
<ul class="interlistdiv"><?php if(is_array($advertisement['type']['interlistad']['top'])){foreach($advertisement['type']['interlistad']['top'] as $mymps) { if($adveritems[$mymps]) { ?><li class="hover"><?=$adveritems[$mymps]?></li><?php } ?>
<?php }} ?>
</ul>
</div>
<?php } if($advertisement['type']['interlistad']['bottom']) { ?>
<div id="ad_interlistad_bottom_none">
<ul class="interlistdiv"><?php if(is_array($advertisement['type']['interlistad']['bottom'])){foreach($advertisement['type']['interlistad']['bottom'] as $mymps) { if($adveritems[$mymps]) { ?><li class="hover"><?=$adveritems[$mymps]?></li><?php } ?>
<?php }} ?>
</ul>
</div>
<?php } ?>
<!--栏目侧边广告-->
<? if($advertisement['type']['intercatad']) { ?>
<div class="intercatdiv" id="ad_intercatdiv_none"><?php if(is_array($advertisement['type']['intercatad'])){foreach($advertisement['type']['intercatad'] as $mymps) { ?><div class="intercatad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } if($advertisement['type']['topbanner']) { ?>
<div class="topbanner" id="ad_topbanner_none"><?php if(is_array($advertisement['type']['topbanner'])){foreach($advertisement['type']['topbanner'] as $mymps) { ?><div class="topbannerad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } if($advertisement['type']['footerbanner']) { ?>
<div class="footerbanner" id="ad_footerbanner_none"><?php if(is_array($advertisement['type']['footerbanner'])){foreach($advertisement['type']['footerbanner'] as $mymps) { ?><div class="footerbannerad"><?=$adveritems[$mymps]?></div>
<?php }} ?>
</div>
<?php } ?>
</div>
<!--广告处理部分结束-->
<div class="footabout">
<a href="http://zhideyao.cn/" target="_blank">值得要交易平台</a><?php $navurl_foot = mymps_get_navurl('foot',30); ?><?php $counturlnav = count($navurl_foot);$i=1; ?>    <?php if(is_array($navurl_foot)){foreach($navurl_foot as $k => $mymps) { ?><a <? if($counturlnav == $i) { ?>class="backnone"<?php } ?> href="<?=$mymps['url']?>" style="color:<?=$mymps['color']?>" target="<?=$mymps['target']?>"><?=$mymps['title']?><sup class="<?=$mymps['ico']?>"></sup></a><?php $i=$i+1; ?>    <?php }} ?>
</div>
<div class="debuginfo none_<?=$mymps_mymps['debuginfo']?>">
Powered by <i><strong><a href="http://zhideyao.cn" target="_blank">Mymps</a></strong></i> <em><a href="http://zhideyao.cn" target="_blank"><?=MPS_VERSION?></a></em> <?=$mymps_global['SiteStat']?> 
<? if($cachetime) { ?>
This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } else { ?><?php $mtime = explode(' ', microtime());$totaltime = number_format(($mtime['1'] + $mtime['0'] - $mymps_starttime), 6); echo 'Processed in '.$totaltime.' second(s) , '.$db->query_num.' queries'; ?><?php } ?>
</div>
<div class="footcopyright">
&copy; <?=$mymps_global['SiteName']?> <a href="http://www.miibeian.gov.cn" target="_blank"><?=$mymps_global['SiteBeian']?></a>
</div>
<p id="back-to-top"><a href="#top"><span></span></a></p>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/addiv.js"></script>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/selectoption.js"></script>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/scrolltop.js"></script></div>
</body>
</html>