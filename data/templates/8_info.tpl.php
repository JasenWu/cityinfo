<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><?=$row['title']?> - <?=$row['catname']?> - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/info.css">
    <script src="template/js/jq_min.js"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="body_div">
<?php include mymps_tpl('header_search'); ?>
 
<div class="dl_nav">
<span><a href="index.php">��ҳ</a><font class="raquo"></font><a href="index.php?mod=category&cityid=<?=$city['cityid']?>">������Ϣ</a>
        <?php if(is_array($parentcats)){foreach($parentcats as $mymps) { ?>        <font class="raquo"></font><a href="index.php?mod=category&catid=<?=$mymps['catid']?>&cityid=<?=$city['cityid']?>"><?=$mymps['catname']?></a>
        <?php }} ?>
        </span>
</div>

<div class="detail">	
<div class="tit_area">
<h1 class="tit"><?=$row['title']?></h1>
<div class="status_bar">
<span class="date"><i class="ico"></i><? echo GetTime($row['begintime']); ?></span>
<span class="browse_num">���������<span id="totalcount" ><?=$row['hit']?></span>��</span>
<a rel="nofollow" href="<?=$mymps_global['SiteUrl']?>/box.php?part=wap_shoucang&infoid=<?=$row['id']?>" class="btn_Favorite"><i class="ico"></i>�ղ�</a>
</div>
</div>
<? if($row['image']) { ?>
<div class="image_area_w">
<div class="image_area">
<ul>
                <?php if(is_array($row['image'])){foreach($row['image'] as $mymps) { ?><li><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['prepath']?>" ref="<?=$mymps_global['SiteUrl']?><?=$mymps['path']?>" width="220" height="155" /></li>
<?php }} ?>
</ul>
<div class="panel_num"></div>
</div>
</div>
<?php } ?>
        <? if($row['extra']) { ?>
<ul class="attr_info" style="margin-top:0;">
        <?php if(is_array($row['extra'])){foreach($row['extra'] as $mymps) { ?><li>
<span class="attrName2"  style="<? if(strexists($mymps['value'],'Ԫ')) { ?>color:#ff7800;<?php } ?>"><?=$mymps['title']?>��</span>
<span class="attrVal"  style="<? if(strexists($mymps['value'],'Ԫ')) { ?>color:#ff7800;font-weight:bold;font-size:20px;<?php } ?>"><? if(substr($mymps['value'],0,1) === '0') { ?>����<?php } else { ?><?=$mymps['value']?><?php } ?></span>
</li>
<?php }} ?>
</ul>
<?php } ?>

    	<? if($row['usecoin'] > 0 && $iflogin != 1) { ?>
        <ul class="attr_info bottom gray">
<span class="attrVal mfico">
<li>
<p class="mt10">
<a href="javascript:alert('����û�е�¼�����ȵ�¼��');" class="fangico"><i></i>�鿴����Ϣ��ϵ��ʽ���ȵ�¼</a>
</p>
</li>
</span>
</ul>
        <?php } else { ?>
<ul class="attr_info bottom gray">
<span class="attrVal mfico">
            	<? if($row['qq']) { ?>
<li>
<span class="attrName">��ϵ Q Q��</span>
<span class="attrVal"> <?=$row['qq']?></span>
</li>
<?php } ?>
<li>
<span class="attrName">��ϵ�绰��</span>
<span class="attrVal"><a class="fred" href="tel:<?=$row['tel']?>"><?=$row['tel']?></a>&nbsp;&nbsp;<?=$row['contact_who']?></span>
</li>
<li>
<p class="mt10">
<a href="tel:<?=$row['tel']?>" class="fangico dianhua"><i></i>����绰</a>
                        <a href="sms:<?=$row['tel']?>" class="fangico duanxin"><i></i>������ѯ</a>
</p>
</li>
</span>
</ul>
        <?php } ?>

<div class="detail-tit">��ϸ����</div>
<div class="detail_txt_che">
<?=$row['content']?>
<br />��ϵ��ʱ����˵����<?=$mymps_global['SiteName']?>�����ġ�
</div>

<div class="detail-tit">�Ƽ���Ϣ</div>
<div class="follow">
<ul>
            <?php if(is_array($relevant)){foreach($relevant as $mymps) { ?><li><a href="index.php?mod=information&id=<?=$mymps['id']?>"><? echo cutstr($mymps['title'],26); ?></a><span><? echo get_format_time($mymps['begintime']); ?></span></li>
<?php }} ?>
</ul>

<div class="more" style="margin-top:20px;">
<a style="text-align: center;position: relative" href="index.php?mod=category&catid=<?=$row['catid']?>&cityid=<?=$city['cityid']?>">�鿴����<?=$row['catname']?>&gt;&gt;</a>
</div>
</div>
</div>

<div id="viewBigImagebg"></div>
<div id="viewBigImage">
<div class="bigimg_topbar">
<div class="btn_back"><span>����</span></div>
<div class="bigimg_num"><span class="curr_img">1</span>/<span class="total_img">9</span></div>
</div>
<div class="bigimg_box"><ul></ul></div>
</div>

<script src="template/js/slide.js"></script>
<div style="display:none"><script src="template/js/history.js"></script></div>
<?php include mymps_tpl('footer'); ?>
</div>
</body>
</html>