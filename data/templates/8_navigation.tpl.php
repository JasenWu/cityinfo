<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<div class="navi">
    <li class="cate <? if($mod == 'index') { ?>selected<?php } ?>" tab="index"><a href="index.php?cityid=<?=$cityid?>">首页</a></li>
    <li class="cate <? if($mod == 'category') { ?>selected<?php } ?>" tab="info"><a href="index.php?mod=category&cityid=<?=$cityid?>">分类信息</a></li>
    <li class="cate <? if($mod == 'news') { ?>selected<?php } ?>" tab="news"><a href="index.php?mod=news&cityid=<?=$cityid?>">网站新闻</a></li>
    <li class="cate <? if($mod == 'corp') { ?>selected<?php } ?>" tab="corp"><a href="index.php?mod=corp&cityid=<?=$cityid?>">商家店铺</a></li>
</div>
<div class="clearfix"></div>