<?php 
include mymps_tpl('inc_head');
$admindir = getcwdOL();
?>
    <style type="text/css">
        #address select{
            margin-right: 5px;
        }
    </style>
    <div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
        <div class="mpstopic-category">
            <div class="panel-tab">
                <ul class="clearfix tab-list">
                    <li><a href="?part=add" class="current">��Ϣ¼��</a></li>
                    <li><a href="?part=list">��Ϣ��ѯ</a></li>
                </ul>
            </div>
        </div>
    </div>
<script type='text/javascript' src='js/calendar.js'></script>
<form action="?part=add" method="post">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
  <tr class="firstr">
  	<td colspan="2">�����շ���Ϣ</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td style="background-color:#f1f5f8; width:40%">��ַ</td>
    <td>
        <div id="address">
            <select name="province_id" id="province_id">
                <option value="0">��ѡ��</option>
                <?php foreach ($province_list as $item) : ?>
                    <option value="<?=$item['provinceid']?>"><?=$item['provincename']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </td>
  </tr>
    <tr bgcolor="#ffffff">
        <td style="background-color:#f1f5f8">Ӧ��ʱ�䣺</td>
        <td>&nbsp;<input name="period" style="width:100px;" class="txt" value="<?=date('Ym')?>" onclick="popUpCalendar(this, this, &quot;yyyymm&quot;)"> </td>
    </tr>
  <tr bgcolor="#ffffff">
    <td style="background-color:#f1f5f8; width:40%">�����</td>
    <td>&nbsp;<input name="manage_fee" class="text" value=""></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td style="background-color:#f1f5f8; width:40%">���</td>
    <td>&nbsp;<input name="electric_fee" class="text" value=""></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td style="background-color:#f1f5f8; width:40%">ˮ��</td>
    <td>&nbsp;<input name="water_fee" class="text" value=""></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td style="background-color:#f1f5f8; width:40%">��������</td>
    <td>&nbsp;<input name="other_fee" class="text" value=""></td>
  </tr>
</table>
</div>
<center><input type="submit" value="�� ��" class="mymps large" /></center>
<div class="clear" style="margin-bottom:5px"></div>
</form>
<form action="?part=list" method="post">
<input name="url" type="hidden" value="<?=GetUrl()?>">
</form>
    <script type="text/javascript" src="./js/jquery.3.1.1.min.js"></script>
<script type="application/javascript">
    $(function () {
        $('#province_id').change(function () {
            var that = $(this);
            var data = {"do" : "city", "province_id" : $('#province_id').val()};
            $.post('/address.php', data, function (rsp) {
                var str = select_tpl('city', rsp);
                that.nextAll().remove();
                $('#address').append(str);
            }, 'json')
        });

        $(document).on('change', '#city_id', function () {
            var that = $(this);
            var data = {"do" : "area", "city_id" : $(this).val()};
            $.post('/address.php', data, function (rsp) {
                var str = select_tpl('area', rsp);
                that.nextAll().remove();
                $('#address').append(str);
            }, 'json')
        });

        $(document).on('change', '#area_id', function () {
            var that = $(this);
            var data = {"do": "building", "area_id": $(this).val()};
            $.post('/address.php', data, function (rsp) {
                var str = select_tpl('building', rsp);
                that.nextAll().remove();
                $('#address').append(str);
            }, 'json')
        });

        $(document).on('change', '#building_id', function () {
            var that = $(this);
            var data = {"do": "room", "building_id": $(this).val()};
            $.post('/address.php', data, function (rsp) {
                var str = select_tpl('room', rsp);
                that.nextAll().remove();
                $('#address').append(str);
            }, 'json')
        });

        function select_tpl(type, data) {
            var tpl = '<select name="'+type+'_id" id="'+type+'_id">';
            tpl += '<option value="">��ѡ��</option>';
            $.each(data, function (i,v) {
                tpl += '<option value="'+ v.id+'">'+ v.name+'</option>';
            });
            tpl += '</select>';
            return tpl;
        }
    })
</script>
<?php mymps_admin_tpl_global_foot();?>