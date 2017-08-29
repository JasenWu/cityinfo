<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>发布信息 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/post.css">
<script src="template/js/jq.min.js"></script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<?php include mymps_tpl('header_search'); ?>
<dl class="business exp">
    <dt class="house">选择下级地区</dt>
    <dd>
    <?php if(is_array($street_list)){foreach($street_list as $mymps) { ?>      <a href="index.php?mod=post&catid=<?=$catid?>&cityid=<?=$cityid?>&areaid=<?=$areaid?>&streetid=<?=$mymps['streetid']?>"><?=$mymps['streetname']?></a>
    <?php }} ?>
    </dd>
</dl>
<script type="text/javascript">
(function () {
    $('.business dt').bind('click', function () {
        var <?=$this?> = $(this).parent();
        if (<?=$this?>.hasClass('exp')) {
            <?=$this?>.removeClass('exp');
        } else {
            var scrollTop = document.body.scrollTop;
            <?=$this?>.addClass('exp');
            window.scrollTo(0, scrollTop);
        }
    });
}());
</script>
<?php include mymps_tpl('footer'); ?>
</body>
</html>