<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps������Ϣϵͳ
�ٷ���վ��http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
    
<?php include mymps_tpl('header'); ?>
    <meta name="keywords" content="<?=$mymps_global['SiteName']?>"/>
    <meta name="description" content="<?=$mymps_global['SiteName']?>�ֻ���"/>
    <title><?=$mymps_global['SiteName']?>-�ֻ���</title>
    <link type="text/css" rel="stylesheet" href="template/css/global.css">
    <link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/index.css">
    <? if(!$cityid && !$lat) { ?>
    <script>
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        }

        function showPosition(position)
        {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            var replaceuri = '<?=$mymps_global['SiteUrl']?>/m/index.php?lat='+lat+'&lng='+lng;window.location.replace(replaceuri);
        }
    </script>
    <?php } ?>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<?php include mymps_tpl('header_search'); ?>

<?php include mymps_tpl('navigation'); ?>
<style type="text/css">
    #iSlider-wrapper {
        width: 100%;
        height: 10rem;
        overflow: hidden;
        position: relative;
    }

    #iSlider-wrapper ul {
        list-style: none;
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
    }

    #iSlider-wrapper li {
        position: absolute;
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        list-style: none;
    }

    #iSlider-wrapper li img {
        max-width: 100%;
        max-height: 100%;
    }

</style>
<div class="index-category">
    <div class="index_slider">
        <div class="index_slider-wrap">
            <div class="page">
                <?php if(is_array($categories)){foreach($categories as $k => $mymps) { ?>                <? if($mymps['catid'] != 5 ) { ?>
                <a href="index.php?mod=category&catid=<?=$mymps['catid']?>&cityid=<?=$city['cityid']?>" class="item food"><div class="icon"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['icon']?>"></div><? echo cutstr($mymps['catname'],4); ?></a>
                <?php } ?>
                <?php }} ?>
                <a href="index.php?mod=property&status=N" class="item food"><div class="icon"><img src="<?=$mymps_global['SiteUrl']?>/template/default/images/index/icon_fang.gif"></div>��ҵ</a>
            </div>
        </div>
    </div>
</div>
<div class="" id="iSlider-wrapper">
    <?php $focus = mymps_get_focus('index',3,$city['cityid']);
        $focus_list = array();
        if (empty($focus)):
        $focus = mymps_get_focus('index',3);
        endif;
        foreach($focus as $f) :
            $temp = array(
                'content' => $f['image']
            );
            array_push($focus_list, $temp);
            unset($temp);
        endforeach;
        $focus_list = json_encode($focus_list);
     ?></div>
<div class="clearfix"></div>
<div id="tab_01" class="newsct">
    <div class="select_03 select_03_<?=$mymps_global['cfg_tpl_dir']?> tab-hd">
        <ul>
            <li class="item current current1"><a href="javascript:void(0);">ͷ��ͷ��</a></li>
            <?php $ifnews = ifplugin('news'); ?>            <? if($ifnews) { ?><!--<li class="item current2"><a href="javascript:void(0);">������Ѷ</a></li>--><?php } ?>
            <? if($mymps_global['cfg_if_corp'] == 1) { ?><li class="item current3"><a href="javascript:void(0);">�Ƽ��̼�</a></li><?php } ?>

        </ul>
    </div>
    <div>
        <ul class="list_normal first_bold tab-cont">
            <?php $index_topinfo = mymps_get_infos(10,NULL,3,NULL,NULL,NULL,NULL,NULL,$city['cityid']); ?>            <?php if(is_array($index_topinfo)){foreach($index_topinfo as $k => $mymps) { ?>            <li style="<? if($mymps['ifbold'] == 1) { ?>font-weight:bold;<?php } if($mymps['ifred'] == 1) { ?>color:red;<?php } ?>">
                <a href="index.php?mod=category&catid=<?=$mymps['catid']?>" class="cat">[<?=$mymps['catname']?>]</a>
                <a href="index.php?mod=information&id=<?=$mymps['id']?>"><? echo cutstr($mymps['title'],30); ?></a>
                <span class="jian"></span>
            </li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=category" class="comn-submit gray btn_block">���������ϢƵ��</a></div>
        </ul>
        <? if($ifnews) { ?>
        <ul class="list_normal first_bold tab-cont" style="display:none;">
            <?php $news = mymps_get_news(6); ?>            <?php if(is_array($news)){foreach($news as $k => $mymps) { ?>            <li style="<? if($mymps['is_commend'] == 1) { ?>color:red;<?php } ?>">
                <font class="time">[<? echo GetTime($mymps['begintime'],'m-d'); ?>]</font>
                <a href="index.php?mod=news&id=<?=$mymps['id']?>&cityid=<?=$cityid?>"><?=$mymps['title']?></a><span class="jian"></span>
            </li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=news&cityid=<?=$cityid?>" class="comn-submit gray btn_block">����������ѶƵ��</a></div>
        </ul>
        <?php } ?>
        <? if($mymps_global['cfg_if_corp'] == 1) { ?>
        <?php $members = mymps_get_members(!$cityid ? 6 : NULL,NULL,NULL,NULL,2,NULL,NULL,$cityid); ?>        <ul class="list_normal first_bold tab-cont" style="display:none;">
            <?php if(is_array($members)){foreach($members as $k => $mymps) { ?>            <li><img src="<?=$mymps['prelogo']?>" class="img"> <a href="index.php?mod=store&id=<?=$mymps['id']?>"><?=$mymps['tname']?></a><span class="jian"></span></li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=corp" class="comn-submit gray btn_block">�����̼ҵ���Ƶ��</a></div>
        </ul>
        <?php } ?>

    </div>

</div>
<script src="template/js/jq_min.211.js"></script>
<script src="template/js/index.js"></script>
<link rel="stylesheet" href="template/js/islider/iSlider.css">
<script src="template/js/islider/iSlider.min.js"></script>
<script type="text/javascript" src="/template/default/js/jquery.SuperSlide.2.1.1.js"></script>
<script>
    (function($){
        var list = $('#content').find('.cell');
        if(list.length > 0){

            var txt = '';
            $('#content').find('.cell').each(function(i){
                if(i === 0){
                    txt += '<li class="active">1</li>';
                }else{
                    txt += '<li>'+(i+1)+'</li>';
                }
            });
            $('#indicator').html(txt);
            var w_w = $(window).width();
            setTimeout(function(){new C_Scroll({container:'slide',content:'content',ct:'indicator',size:w_w,intervalTime:5000,lazyIMG:!!0});},20);
            setTimeout(function(){$('#slide').show();},20);
        }
        IDC.tabADS($('#tab_01'));
        //$(".focusBox").slide({ mainCell:".pic",effect:"left", autoPlay:true, delayTime:600, trigger:"click"});
        var list = <?=$focus_list?>;

        var S = new iSlider(document.getElementById('iSlider-wrapper'), list, {
            isAutoplay: 1,
            isLooping: 1,
            isOverspread: 1,
            animateTime: 800
        });
    })(jQuery);
</script>
<?php include mymps_tpl('footer'); ?>
</body>
</html>