<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<div class="navi">
    <li class="cate <? if($mod == 'index') { ?>selected<?php } ?>" tab="index"><a href="index.php?cityid=<?=$cityid?>">��ҳ</a></li>
    <li class="cate <? if($mod == 'category') { ?>selected<?php } ?>" tab="info"><a href="index.php?mod=category&cityid=<?=$cityid?>">������Ϣ</a></li>
    <li class="cate <? if($mod == 'news') { ?>selected<?php } ?>" tab="news"><a href="index.php?mod=news&cityid=<?=$cityid?>">��վ����</a></li>
    <li class="cate <? if($mod == 'corp') { ?>selected<?php } ?>" tab="corp"><a href="index.php?mod=corp&cityid=<?=$cityid?>">�̼ҵ���</a></li>
</div>
<div class="clearfix"></div>