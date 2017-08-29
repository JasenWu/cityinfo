<?php include mymps_tpl('inc_head');?>
    <style type="text/css">
        #address select{
            margin-right: 5px;
        }
    </style>

<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?part=list">��Ϣ��ѯ</a></li>
                <li><a href="?part=edit&id=<?=$row['id']?>" class="current">�༭��Ϣ</a></li>
            </ul>
        </div>
    </div>
</div>
<form method=post onSubmit="return chkform()" name="form1" action="?part=edit&id=<?=$row['id']?>">
<div id="<?=MPS_SOFTNAME?>">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">
<tr class="firstr">
<td colspan="2">
    <div class="left"><a href="javascript:collapse_change('1')">��Ϣ</a></div>
    <div class="right"><a href="javascript:collapse_change('1')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>
</td>
</tr>
<tbody id="menu_1">
<tr>
    <td bgcolor="#F1F5F8">Ӧ�ý�ʱ�䣺</td>
    <td><?=$row['period']?></td>
</tr>
<tr bgcolor="white">
  <td bgcolor="#F1F5F8">��ַ�� </td>
  <td>
      <div id="address">
          <select name="province_id" id="province_id">
              <option value="0">��ѡ��</option>
              <?php foreach ($province_list as $item) : ?>
                  <?php if ($item['provinceid'] == $province['provinceid']) :?>
                      <option value="<?=$item['provinceid']?>" selected><?=$item['provincename']?></option>
                  <?php else :?>
                      <option value="<?=$item['provinceid']?>"><?=$item['provincename']?></option>
                  <?php endif;?>

              <?php endforeach;?>
          </select>
          <select name="city_id" id="city_id">
              <option value="0">��ѡ��</option>
              <?php foreach ($city_list as $item) : ?>
                  <?php if ($item['cityid'] == $city['cityid']) :?>
                    <option value="<?=$item['cityid']?>" selected><?=$item['cityname']?></option>
                  <?php else :?>
                      <option value="<?=$item['cityid']?>"><?=$item['cityname']?></option>
                  <?php endif;?>
              <?php endforeach;?>
          </select>
          <select name="area_id" id="area_id">
              <option value="0">��ѡ��</option>
              <?php foreach ($area_list as $item) : ?>
                  <?php if ($item['areaid'] == $area['areaid']) :?>
                      <option value="<?=$item['areaid']?>" selected><?=$item['areaname']?></option>
                  <?php else :?>
                      <option value="<?=$item['areaid']?>"><?=$item['areaname']?></option>
                  <?php endif;?>
              <?php endforeach;?>
          </select>
          <select name="building_id" id="building_id">
              <option value="0">��ѡ��</option>
              <?php foreach ($building_list as $item) : ?>
                  <?php if ($item['building_id'] == $room['building_id']) :?>
                      <option value="<?=$item['building_id']?>" selected><?=$item['name']?></option>
                  <?php else :?>
                      <option value="<?=$item['building_id']?>"><?=$item['name']?></option>
                  <?php endif;?>
              <?php endforeach;?>
          </select>
          <select name="room_id" id="room_id">
              <option value="0">��ѡ��</option>
              <?php foreach ($room_list as $item) : ?>
                  <?php if ($item['room_id'] == $row['room_id']) :?>
                      <option value="<?=$item['room_id']?>" selected><?=$item['name']?></option>
                  <?php else :?>
                      <option value="<?=$item['room_id']?>"><?=$item['name']?></option>
                  <?php endif;?>
              <?php endforeach;?>
          </select>
      </div>
  </td>
</tr>
<tr bgcolor="white">
    <td width="15%" bgcolor="#F1F5F8">����ѣ� </td>
    <td><input type="text" name="manage_fee" maxlength="32" value="<?=$row['manage_fee']?>"/><br />
</tr>
<tr bgcolor="white">
    <td width="15%" bgcolor="#F1F5F8">��ѣ� </td>
    <td><input type="text" name="electric_fee" maxlength="32" value="<?=$row['electric_fee']?>"/><br />
</tr>
<tr bgcolor="white">
    <td width="15%" bgcolor="#F1F5F8">ˮ�ѣ� </td>
    <td><input type="text" name="water_fee" maxlength="32" value="<?=$row['water_fee']?>"/><br />
</tr>
<tr bgcolor="white">
    <td width="15%" bgcolor="#F1F5F8">�������ã� </td>
    <td><input type="text" name="other_fee" maxlength="32" value="<?=$row['other_fee']?>"/><br />
</tr>
</tbody>
</table>
</div>
<center>
<input type="submit" value="ȷ���ύ" name="<?=CURSCRIPT?>_submit" class="mymps mini" />��
<input type="button" onClick=history.back() value="�� ��" class="mymps mini">
</center>
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