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
<link type="text/css" rel="stylesheet" href="template/css/post.css?v=1">
    <link rel="stylesheet" type="text/css" href="template/js/mobileSelect/css/mobileSelect.css">
    <script src="template/js/mobileSelect/js/mobileSelect.js" type="text/javascript"></script>
    <script src="template/js/jq_min.211.js" type="text/javascript"></script>
    <script type="text/javascript" src="/template/default/js/layer/mobile/layer.js"></script>
<script language="javascript">
function submitForm(){
if (document.form1.title.value=="") {
        showMsg('����д��Ϣ����!');
document.form1.title.focus();
return false;
}
if (document.form1.endtime.value=="") {
        showMsg('��ѡ����Ч��!');
document.form1.endtime.focus();
return false;
}
if (document.form1.content.value=="") {
        showMsg('����д��Ϣ����!');
document.form1.content.focus();
return false;
}
if (document.form1.contact_who.value=="") {
        showMsg('����д��ϵ��!');
document.form1.contact_who.focus();
return false;
}
if (document.form1.tel.value=="") {
        showMsg('����д��ϵ�绰!');
document.form1.tel.focus();
return false;
}
<? if($iflogin == 0) { ?>
if (document.form1.manage_pwd.value=="") {
        showMsg('����д��������!');
document.form1.manage_pwd.focus();
return false;
}
<?php } ?>

    var formData = new FormData(document.querySelector("#form1"));
    var img_count = $('#pics')[0].files.length;
    var max_count = '<?=$max_img_num?>';
    if (img_count > max_count) {
        showMsg('���ֻ���ϴ� '+max_count+' ���ļ�');
        return false;
    }
    for (i = 0; i < img_count; i++) {
        formData.append('mymps_img_'+i, $('#pics')[0].files[i]);
    }

    layer.open({
        content: '������...',
        type : 2,
        shade: 'background-color: rgba(98,98,98,.8)'
    });
    $.ajax({
        url: 'index.php?mod=post',
        dataType: 'json',
        type: 'POST',
        cache: false,
        data: formData,
        processData: false,
        contentType: false
    }).done(function(res) {
    }).fail(function(res) {
        showMsg('����ʧ��');
    }).success(function (res) {
        console.log(res)
        if (res.state == 'true') {
            window.location.href = 'index.php?mod=category&catid=<?=$catid?>';
        } else {
            showMsg(res.msg);
        }
    });

return false;
}

function showMsg(msg) {
    layer.open({
        content: msg,
        btn: '�ر�'
    });
}
</script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">

<style>
    select{
        display: none;
    }
    .layui-m-layercont p{
        color: black;
    }
</style>
<?php include mymps_tpl('header_search'); ?>
    <form id="form1" method="post" enctype="multipart/form-data" action="javascript:;" name="form1"  onSubmit="return submitForm();">
    <input name="areaid" type="hidden" value="<?=$areaid?>">
    <input name="cityid" type="hidden" value="<?=$cityid?>">
    <? if(empty($child)) { ?><input name="catid" type="hidden" value="<?=$catid?>"><?php } ?>
    <input name="streetid" type="hidden" value="<?=$streetid?>">
    <input name="action" type="hidden" value="post">
    <input type="hidden" value="<?=$mixcode?>" name="mixcode"/>
    <input type="hidden" id="lat" name="lat" value="">
    <input type="hidden" id="lng" name="lng" value="">
        <ul class="list">		
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>���</span></div>
                <div class="inputs"><?=$catname?> &nbsp;&nbsp;&nbsp;<a href="index.php?mod=post&areaid=<?=$areaid?>&streetid=<?=$streetid?>&cityid=<?=$cityid?>">(��ѡ)</a></div>
            </li>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>������</span></div>
                <div class="input"><?=$areaname?> &nbsp;&nbsp;&nbsp;<a href="index.php?mod=post&catid=<?=$catid?>&cityid=<?=$cityid?>">(��ѡ)</a></div>
            </li>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>���⣺</span></div>
                <div class="input"><input name="title" type="text" size="26" value="" /></div>
            </li>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>��Ч�ڣ�</span></div>
                <div class="inputs"><? echo GetInfoLastTime('','endtime','wap'); ?></div>
            </li>
            
            <?php if(is_array($show_mod_option)){foreach($show_mod_option as $mymps) { ?>            <li class="item">
                <div class="title"><span><? if($mymps['required'] == 1) { ?><font style="color:#FF0000;">* </font><?php } ?><?=$mymps['title']?></strong>��</span></div>
                <div class="inputs"><?=$mymps['value']?></div>
            </li>
            <?php }} ?>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>���ݣ�</span></div>
                <div class="input"><textarea name="content" style="width:100%; height:70px;"></textarea></div>
            </li>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>��ϵ�ˣ�</span></div>
                <div class="input"><input name="contact_who" type="text" size="26" value="<?=$contact_who?>" /></div>
            </li>
            
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>��ϵ�绰��</span></div>
                <div class="input"><input name="tel" type="text" size="26" value="<?=$tel?>" /></div>
            </li>
            
            <li class="item">
                <div class="title"><span>��ϵQQ��</span></div>
                <div class="input"><input name="qq" type="text" size="26" value="<?=$qq?>" /></div>
            </li>

<? if($upload_img) { ?>
            <li class="item">
                <div class="title"><span>�����Ƭ��</span></div>
                <div style="margin-left: 6rem">
                    <input type="file" name="pics" id="pics" multiple />
                </div>
                <!--<div class="dropzones" id="dpzs" style="border: none;min-height: 2rem;padding: 0px;margin-left: 5rem"></div>-->
            </li>
            <?php } if($mobile_settings['authcode'] == 1) { ?>
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>��֤�룺</span></div>
                <div class="input"><input name="checkcode" type="text" size="26" /><img src="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_authcodefile']?>?mod=m" alt="�����壬����ˢ��" width="70" height="25" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'"/></div>
            </li>
            <?php } ?>
            
            <? if($iflogin == 0) { ?>
            <li class="item">
                <div class="title"><span><font style="color:#FF0000;">* </font>�������룺</span></div>
                <div class="input"><input name="manage_pwd" type="text" size="26" value="<?=$manage_pwd?>" />�����޸�/ɾ������Ϣ&nbsp;</div>
            </li>
            <?php } ?>
        </ul>
        <div class="post"><input type="submit" name="button" id="button" value="�������" /></div>
      </form>
<?php include mymps_tpl('footer'); ?>
<select name="h" id="hide">
    <option value=""></option>
</select>
<link rel="stylesheet" href="/template/default/js/layer/skin/default/layer.css">
<script>
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(showPosition);
    }else{

    }

    function showPosition(position)
    {
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lng").value = position.coords.longitude;

    }
    $(function () {
        $('select').each(function (i,v) {
            var option = [];
            $.each($(v).find('option'),function (j,t) {
                var tmp = {
                    'id' : $(t).val(),
                    'value' : $(t).text()
                }
                option.push(tmp);
            });


            var id = 'm_select_'+i;
            var tid = 'm_select_h_'+i;
            var txt = option[0].value;
            var name = $(v).attr('name');
            option.splice(0,1);

            var default_val = '';
            if (name == 'catid') {
                default_val =option[0].id;
            }
            $('<div id='+id+'>'+txt+'</div><input type="hidden" id="'+tid+'" name="'+name+'" value="'+default_val+'">').appendTo($(v).parent());
            $(v).remove();
            new MobileSelect({
                trigger: '#'+id,
                title: txt,
                wheels: [
                    {data:option}
                ],
                callback:function(indexArr, data){
                    $('#'+tid).val(data[0].id);
                }
            });
        });
    });

</script>
</body>
</html>