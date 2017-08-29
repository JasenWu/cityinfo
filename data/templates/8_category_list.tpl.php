<?php if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://zhideyao.cn*/

?>

<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><?=$cat['catname']?> - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/list.css">
    <link type="text/css" rel="stylesheet" href="template/css/filter.css">
    <script src="template/js/jq.js"></script>
<script src="template/js/jq.min.js"></script>
    <link rel="stylesheet" type="text/css" href="template/css/scrollbar.css">
<script src="template/js/scrollbar.js"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="body_div">

    
<?php include mymps_tpl('header_search'); ?>
<div id="mask" onclick="maskHide();"></div>

<div class="dl_nav">
<span><a href="index.php?cityid=<?=$cityid?>">首页</a><font class="raquo"></font><a href="index.php?mod=category&cityid=<?=$cityid?>">本地信息</a>
        <?php if(is_array($parentcats)){foreach($parentcats as $mymps) { ?>        <font class="raquo"></font><a href="index.php?mod=category&cityid=<?=$cityid?>&catid=<?=$mymps['catid']?>"><?=$mymps['catname']?></a>
        <?php }} ?>
        </span>
</div>

<div class="filtate-outter">

    <div class="list-filtrate">
        <section class="filtrate-nav">
            <ul>
            	<? if($cat_list) { ?>
                <li class="filter_li" id="filter_catid"> <a href="javascript:filterShow('catid');">分类<i class="filt-arrow"></i></a> </li>
                <?php } ?>
                <li class="filter_li" id="filter_areaid"> <a href="javascript:filterShow('areaid');">区域<i class="filt-arrow"></i></a> </li>
        <?php if(is_array($mymps_extra_model)){foreach($mymps_extra_model as $mymps) { ?>                <li class="filter_li" id="filter_<?=$mymps['identifier']?>"> <a href="javascript:filterShow('<?=$mymps['identifier']?>');"><? echo cutstr($mymps['title'],4); ?><i class="filt-arrow"></i></a> </li>
                <?php }} ?>
            </ul>
        </section>
        <div class="filt-container">
        
            <?php if(is_array($cat_list)){foreach($cat_list as $k => $mymps) { ?>            <div class="filt-open" id="filter-catid">
                <div class="warpper box-flex1 bg-white" data-key="district" style="height: 286px;">
                    <ul class="">
                    	<li <? echo $mymps['catid'] == $catid ? 'class="active"' : '';; ?>><a href="index.php?mod=category&catid=<?=$mymps['catid']?>&cityid=<?=$cityid?>">不限</a></li>
                        <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $u => $w) { ?>                        <li <? echo $w['catid'] == $catid ? 'class="active"' : '';; ?>><a href="index.php?mod=category&catid=<?=$w['catid']?>&cityid=<?=$cityid?>"><?=$w['catname']?></a></li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
            <?php }} ?>
            
            <? if($city['cityid']) { ?>
            <div class="filt-open" id="filter-areaid">
                <div class="warpper box-flex1 bg-white" data-key="district" style="height: 400px; overflow-style:marquee-block">
                    <ul class="">
                    	<li class="<? echo $areaid == 0 ? 'active' : '';; ?>"><a href="index.php?mod=category&cityid=<?=$city['cityid']?>&catid=<?=$catid?>">不限</a></li>
                    <?php if(is_array($city['area'])){foreach($city['area'] as $k => $mymps) { ?>                        <? if($mymps['street']) { ?>
                        <li class="zone <? echo $mymps['areaid'] == $areaid ? 'active' : '';; ?>" id="zone_<?=$mymps['areaid']?>"><a href="javascript:showChild(<?=$mymps['areaid']?>);"><?=$mymps['areaname']?></a><i class="filt-arrow"></i></li>
                        <?php } else { ?>
                        <li class="zone <? echo $mymps['areaid'] == $areaid ? 'active' : '';; ?>" id="zone_<?=$mymps['areaid']?>"><a href="index.php?mod=category&catid=<?=$catid?>&cityid=<?=$city['cityid']?>&areaid=<?=$mymps['areaid']?>"><?=$mymps['areaname']?></a></li>
                        <?php } ?>
                        <?php }} ?>
                    </ul>
                </div>
                <?php if(is_array($city['area'])){foreach($city['area'] as $k => $mymps) { ?>                <div class="f_box_inner bg-white" id="showChild_<?=$mymps['areaid']?>" <? if($mymps['areaid'] == $areaid) { ?>style="display:block;"<?php } ?>>
                <ul>
                	<li class="<? echo $streetid == 0 ? 'active' : '';; ?>"><a href="index.php?mod=category&cityid=<?=$city['cityid']?>&catid=<?=$catid?>&areaid=<?=$mymps['areaid']?>">不限</a></li>
                <?php if(is_array($mymps['street'])){foreach($mymps['street'] as $u => $w) { ?>                    <li class="<? echo $w['streetid'] == $streetid ? 'active' : '';; ?>"><a href="index.php?mod=category&cityid=<?=$city['cityid']?>&catid=<?=$catid?>&areaid=<?=$mymps['areaid']?>&streetid=<?=$w['streetid']?>"><?=$w['streetname']?></a></li>
                   	<?php }} ?>
                </ul>
                </div>
<?php }} ?>
            </div>
            <?php } else { ?>
             <div class="filt-open" id="filter-areaid">
                <div class="warpper box-flex1 bg-white" data-key="district" style="height: 286px;">
                    <ul class="">
                        <?php if(is_array($hotcities)){foreach($hotcities as $k => $mymps) { ?>                        <li><a href="index.php?mod=category&catid=<?=$catid?>&cityid=<?=$mymps['cityid']?>"><?=$mymps['cityname']?></a></li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
            <?php } ?><?php if(is_array($mymps_extra_model)){foreach($mymps_extra_model as $mymps) { ?>            <div class="filt-open" id="filter-<?=$mymps['identifier']?>">
                <div class="warpper box-flex1 bg-white" data-key="district" style="height: 286px;">
                    <ul class="">
                        <?php if(is_array($mymps['list'])){foreach($mymps['list'] as $c) { ?>                        <li <? if($c['select'] == 1) { ?>class="active"<?php } ?>><a href="<?=$c['uri']?>"><?=$c['name']?></a></li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
<?php }} ?>
           
        </div>
    </div>
</div>
<script>
    function showChild(id){
        $('.f_box_inner').hide();
        $('#showChild_'+id).show();
        $('#showChild_'+id).mCustomScrollbar({theme:"minimal-dark"});
        $('#showChild_'+id).prev(".warpper").removeClass("bg-white");
        $('#showChild_'+id).prev(".warpper").addClass("bg-gray");
        $('#showChild_'+id).prev(".warpper").find("li").removeClass("active");
        $(".zone").removeClass("active");
        $('#zone_'+id).addClass("active");
    }
    function showClassChild(id){
        $('.f_box_inner').hide();
        $('#showClassChild_'+id).show();
        $('#showClassChild_'+id).mCustomScrollbar({theme:"minimal-dark"});
        $('#showClassChild_'+id).prev(".warpper").removeClass("bg-white");
        $('#showClassChild_'+id).prev(".warpper").addClass("bg-gray");
        $('#showClassChild_'+id).prev(".warpper").find("li").removeClass("active");
        $('.class_db').removeClass("active");
        $('#class_'+id).addClass("active");
    }
    function filterShow(id){
        $('.filter_li').removeClass('select');
        $('#filter_'+id).addClass('select');
        $('.filt-open').hide();
        $('#filter-'+id).addClass("two_col");
        $('#filter-'+id).show();
        $('.filtrate-nav').addClass("click_filtrate_nav");
        $('.filt-container').addClass("click_filt_container");
        $('#mask').css({"height":"3119px","display":"block"});
    }
    $(document).ready(
            function(){
                $('.warpper').mCustomScrollbar({theme:"minimal-dark"});
            }
    );
    function maskHide(){
        $('#mask').hide();
        $('.filt-open').hide();
        $('.filtrate-nav').removeClass("click_filtrate_nav");
        $('.filt-container').removeClass("click_filt_container");
    }
</script>

<? if(!$distance) { ?>
<li class="nearbyinfo" onclick="nearby(0.5,'','')">
    <span style=" margin-right: 4px"><img src="template/images/icon_location.png" height="20" style="vertical-align:middle;"></span>
    <span id="nearby">查看附近的信息</span>
</li>
<?php } else { ?>
<ul class="distance-filter" <? if(!$distance) { ?>style="display: none;"<?php } ?>>
<li><a data-distance="500" <? if($distance == '0.5') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(0.5,'','')">500米</a></li>
    <li><a data-distance="1000" <? if($distance == '1') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(1,'','')">1000米</a></li>
    <li><a data-distance="3000" <? if($distance == '3') { ?>class="current"<?php } ?>href="javascript:" onclick="nearby(3,'','')">3000米</a></li>
    <li><a data-distance="5000" <? if($distance == '5') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(5,'','')">5000米</a></li>
</ul>
<?php } ?>
<input type="hidden" id="distanceInput" value="">
<script>
    function nearby(distance,la,ln){

        var lat = la;
        var lng = ln;
        document.getElementById('distanceInput').value = distance;
        if(lat=='' && lng==''){
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }else{
            var obj = new Object();
            obj.lat = lat;
            obj.lng = lng;
            showPosition(obj,1);
        }
    }

    function showPosition(position)
    {

        var url = location.search; //获取url中"?"符后的字串
        var theRequest = '';
        var ic = 0;
        var idistance = 0;

        var lat = 0;
        var lng = 0;

        if(arguments[1]==1){
            lat = position.lat;
            lng = position.lng;
        }else{
            lat = position.coords.latitude;
            lng =  position.coords.longitude;
        }

        var distance = document.getElementById('distanceInput').value==''?0.5:document.getElementById('distanceInput').value;
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {
                var k = strs[i].split("=")[0];
                var v = strs[i].split("=")[1];
                if(k!=''){
                    if(k=='lat'){
                        ic++;
                        v = lat;
                    }
                    if(k=='lng'){
                        ic++;
                        v = lng;
                    }
                    if(k=='distance'){
                        idistance++;
                        v = distance;
                    }
                    theRequest+=k+'='+v+'&';
                }

            }
        }
        if(ic<2){
            theRequest+='lat='+lat+'&lng='+lng;
        }
        if(idistance==0){

            theRequest+='&distance='+distance;
        }
        var stringArray = theRequest.split('')
        if(stringArray[theRequest.length-1]=='&'){
            stringArray[theRequest.length-1] = '';
            theRequest = stringArray.join('');
        }
        location.href = 'index.php?'+theRequest;

    }
</script>

<div class="infolst_w">
<ul class="list-info">
        <?php if(is_array($info_list)){foreach($info_list as $mymps) { ?>    		<li>
                <a href="index.php?mod=information&id=<?=$mymps['id']?>">
                <? if($mymps['img_path']) { ?>
<img class="thumbnail" src="<?=$mymps_global['SiteUrl']?><?=$mymps['img_path']?>" alt="<?=$mymps['title']?></strong>">
<?php } else { ?>
<img class="thumbnail" src="template/images/noimg.gif" alt="nopic">
<?php } ?>
<dl>
<dt class="tit" style="<? echo $mymps['ifred'] == 1 ? 'color:red;' : ''; echo $mymps['ifbold'] == 1 ? 'font-weight:bold;' : ''; ?>"><?=$mymps['title']?>&nbsp;<? if($mymps['img_path']) { ?><sapn style="background:#339966; color:#FFFFFF; font-size:14px; padding:0 2px;text-align:center;"><?=$mymps['img_count']?>图</sapn><?php } echo $mymps['upgrade_type'] > 1 ? '<span class="ico ding"></span>' : '';; ?></dt>
<dd class="attr"><span><? echo cutstr(clear_html($mymps['content']),50); ?></span></dd>
<dd class="attr pr5">
                    <?php if(is_array($mymps['extra'])){foreach($mymps['extra'] as $w) { ?>                    <? if(strexists($w,'元')) { ?>
                    <span class="price">
                    <? echo substr($w,0,1) === '0' ? ' 面议 ' : $w; ?>                    </span>
                    <?php } ?>
                    <?php }} ?>
                    <span class="lvzi"><? echo get_format_time($mymps['begintime']); ?></span>
                    <span>阅<?=$mymps['hit']?></span>
</dd>
</dl>
                </a>
    		</li>
        <?php }} else {{ ?>
        <div style="padding:50px 0; text-align:center;color:#999; background-color:#ffffff;">没有找到<?=$cat['catname']?>相关信息记录！ <a href="javascript:history.back(-1);">返回</a></div>
<?php }} ?>
</ul>  
</div>

    <? if($info_list) { ?>
<div class="pager">
    <?=$pageview?>
</div>
<?php } ?>
<?php include mymps_tpl('footer'); ?>
</div>
</body>
</html>