<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<meta name="keywords" content="<?=$mymps_global['SiteName']?>,手机版,切换分站"/>
<meta name="description" content="<?=$mymps_global['SiteName']?>手机版切换分站"/>
<title>切换分站-<?=$mymps_global['SiteName']?>-手机版</title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/changecity.css">
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<?php include mymps_tpl('header_search'); ?>
<div class="city_box">
    <h3>热门城市<span class="local-city"><? if($city['cityname']) { ?>目前定位城市：<?=$city['cityname']?><?php } else { ?>请选择您当前所在城市<?php } ?></span></h3>
    <ul class="city_lst hot">
    <?php if(is_array($hotcities)){foreach($hotcities as $mymps) { ?>    <li><a href="index.php?mod=index&cityid=<?=$mymps['cityid']?>"><?=$mymps['cityname']?></a></li>
    <?php }} ?>
    </ul>
    <h3>按<? echo $mymps_global['cfg_cityshowtype'] == 'province' ? '所在省份' : '首字母';; ?>查找</h3>
    <ul class="letters_lst">
    <?php if(is_array($cities)){foreach($cities as $k => $mymps) { ?>    <li><a href="#<?=$k?>"><?=$k?></a></li>
    <?php }} ?>
    </ul>
    <?php if(is_array($cities)){foreach($cities as $k => $mymps) { ?>    <a name="<?=$k?>"></a>
    <h4><p><span><?=$k?></span><? if($mymps_global['cfg_cityshowtype'] != 'province') { ?>(以<?=$k?>为开头的城市名)<?php } ?></p></h4>
    <ul class="city_lst">
    <?php if(is_array($mymps)){foreach($mymps as $u => $w) { ?>    <li> <a href="index.php?mod=index&cityid=<?=$w['cityid']?>" <? if($w['ifhot'] == 1) { ?>style="color:red;text-decoration:underline;"<?php } ?>><?=$w['cityname']?></a></li>
    <?php }} ?>
    </ul>
    <?php }} ?>  
<?php include mymps_tpl('footer'); ?>
</div>

</body>
</html>