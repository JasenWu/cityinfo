<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>�̼ҵ��� - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/corpall.css">
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="body_div">

    
<?php include mymps_tpl('header_search'); ?>

<?php include mymps_tpl('navigation'); ?>
    <?php $i =1; ?>    <?php if(is_array($ypcategory)){foreach($ypcategory as $mymps) { ?>    <div class="navv">
    <div class="nav_tt nav_ttbg1">&nbsp; 
    <span class="lico ico<?=$i?>"></span>
    <a href="index.php?mod=corp&catid=<?=$mymps['corpid']?>&cityid=<?=$cityid?>"><?=$mymps['corpname']?><i class="filt-arrowright"></i></a>
    </div>
    <div class="big_dl sale">
        <ul>
            <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $c) { ?>            <li class="one_third"><a href="index.php?mod=corp&catid=<?=$c['corpid']?>&cityid=<?=$cityid?>"><? echo cutstr($c['corpname'],8); ?></a></li>
            <?php }} ?>
        </ul>
    </div>
    </div>
    <?php $i=$i+1; ?>    <?php }} ?>
<?php include mymps_tpl('footer'); ?>
</div>
</body>
</html>