<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<div class="help">
    <a href="index.php?mod=ad&cityid=<?=$city['cityid']?>" style="width: 135px" rel="nofollow">��ҳ��淢��</a>
<a href="index.php?mod=about&cityid=<?=$city['cityid']?>" rel="nofollow">��ϵ����</a>
</div>
<div class="footer" style="background-color:#F2F2F2">
    <p class="footer_02">�����д��Ƿ����н�������޹�˾</p>
</div>
<div style="height: 49px;"></div>
<script type="text/javascript">
/*$(function () {
$("body").swipe( {
swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
var mod = '<?=$mod?>';
var catid = '<?=$catid?>';
if (direction == 'left') {
if(catid == '') {
window.location.href = 'index.php?mod=category&catid=3&cityid=<?=$city['cityid']?>';
} else if (catid == 3) {
window.location.href = 'index.php?mod=category&catid=2&cityid=<?=$city['cityid']?>';
} else if (catid == 2) {
window.location.href = 'index.php?mod=category&catid=4&cityid=<?=$city['cityid']?>';
} else if (catid == 4) {
window.location.href = 'index.php?mod=property&status=N';
}
} else if (direction == 'right') {
if (mod == 'property' || mod == 'login') {
window.location.href = 'index.php?mod=category&catid=4&cityid=<?=$city['cityid']?>';
} else {
if (catid == 4) {
window.location.href = 'index.php?mod=category&catid=2&cityid=<?=$city['cityid']?>';
} else if (catid == 2) {
window.location.href = 'index.php?mod=category&catid=3&cityid=<?=$city['cityid']?>';
} else if (catid == 3) {
window.location.href = 'index.php?mod=index&&cityid=<?=$city['cityid']?>';
}
}
}
},
allowPageScroll:"auto"
});
});*/
</script>