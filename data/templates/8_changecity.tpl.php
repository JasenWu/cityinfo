<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<meta name="keywords" content="<?=$mymps_global['SiteName']?>,�ֻ���,�л���վ"/>
<meta name="description" content="<?=$mymps_global['SiteName']?>�ֻ����л���վ"/>
<title>�л���վ-<?=$mymps_global['SiteName']?>-�ֻ���</title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/changecity.css">
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<?php include mymps_tpl('header_search'); ?>
<div class="city_box">
    <h3>���ų���<span class="local-city"><? if($city['cityname']) { ?>Ŀǰ��λ���У�<?=$city['cityname']?><?php } else { ?>��ѡ������ǰ���ڳ���<?php } ?></span></h3>
    <ul class="city_lst hot">
    <?php if(is_array($hotcities)){foreach($hotcities as $mymps) { ?>    <li><a href="index.php?mod=index&cityid=<?=$mymps['cityid']?>"><?=$mymps['cityname']?></a></li>
    <?php }} ?>
    </ul>
    <h3>��<? echo $mymps_global['cfg_cityshowtype'] == 'province' ? '����ʡ��' : '����ĸ';; ?>����</h3>
    <ul class="letters_lst">
    <?php if(is_array($cities)){foreach($cities as $k => $mymps) { ?>    <li><a href="#<?=$k?>"><?=$k?></a></li>
    <?php }} ?>
    </ul>
    <?php if(is_array($cities)){foreach($cities as $k => $mymps) { ?>    <a name="<?=$k?>"></a>
    <h4><p><span><?=$k?></span><? if($mymps_global['cfg_cityshowtype'] != 'province') { ?>(��<?=$k?>Ϊ��ͷ�ĳ�����)<?php } ?></p></h4>
    <ul class="city_lst">
    <?php if(is_array($mymps)){foreach($mymps as $u => $w) { ?>    <li> <a href="index.php?mod=index&cityid=<?=$w['cityid']?>" <? if($w['ifhot'] == 1) { ?>style="color:red;text-decoration:underline;"<?php } ?>><?=$w['cityname']?></a></li>
    <?php }} ?>
    </ul>
    <?php }} ?>  
<?php include mymps_tpl('footer'); ?>
</div>

</body>
</html>