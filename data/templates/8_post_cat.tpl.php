<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>������Ϣ - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/post.css">
<script src="template/js/jq.js"></script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<?php include mymps_tpl('header_search'); ?><?php if(is_array($categories)){foreach($categories as $mymps) { ?><dl class="business">
    <dt class="house"><i class="ico" style="background-image:url(<?=$mymps_global['SiteUrl']?>/<?=$mymps['icon']?>);"></i>����<?=$mymps['catname']?>��Ϣ</dt>
    <dd <? if($catid) { ?>style="display:block"<?php } ?>>
        <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $c) { ?>        <a href="index.php?mod=post&catid=<?=$c['catid']?>&cityid=<?=$cityid?>&areaid=<?=$areaid?>&streetid=<?=$streetid?>"><?=$c['catname']?></a>
        <?php }} ?>
    </dd>
</dl>
<?php }} ?>
    
<script type="text/javascript">
    (function () {
        $('.business dt').bind('click', function () {
            var _this = $(this).parent();
            if (_this.hasClass('exp')) {
                _this.removeClass('exp');
            } else {
                var scrollTop = document.body.scrollTop;
                _this.addClass('exp');
                window.scrollTo(0, scrollTop);
            }
        });
    }());
</script>
<?php include mymps_tpl('footer'); ?>
</body>
</html>