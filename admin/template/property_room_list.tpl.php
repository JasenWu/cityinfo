<? include mymps_tpl('inc_head')?>
<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?part=list" class="current">������Ϣ</a></li>
                <li><a href="?part=add">���ӷ���</a></li>
            </ul>
        </div>
    </div>
</div>
<form action="?" method="get">
    <div id="<?=MPS_SOFTNAME?>">
        <table border="0" cellspacing="0" cellpadding="0" class="vbm">
            <tr class="firstr">
                <td colspan="2">����</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td style="background-color:#f1f5f8; width:40%">����</td>
                <td>&nbsp;<input name="name" class="text" value="<?php echo $name; ?>"></td>
            </tr>
        </table>
    </div>
    <center><input type="submit" value="�� ��" class="mymps large" /></center>
    <div class="clear" style="margin-bottom:5px"></div>
</form>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
      <td>���</td>
      <td>����</td>
      <td>��ַ</td>
      <td>����ʱ��</td>
      <td>����ʱ��</td>
      <td>����</td>
    </tr>
<?php foreach($list as $item) :?>
  <tr>
  <td width="40"><?=$item['room_id']?></td>
  <td><?=$item['name']?></td>
  <td><?=get_address($item['building_id'], 'building')?></td>
  <td><?=date('Y-m-d H:i:s', $item['time_created'])?></td>
  <td><?=date('Y-m-d H:i:s', $item['time_updated'])?></td>
  <td>
      <a href="?part=edit&room_id=<?=$item['room_id']?>">�༭</a> /
      <a href="?part=del&room_id=<?=$item['room_id']?>" onClick="if(!confirm('ȷ��Ҫɾ���÷�����'))return false;">ɾ��</a>
  </td>
</tr>
<?php endforeach;?>
</table>
<div class="pagination"><?php echo page2();?></div>
</div>
<?=mymps_admin_tpl_global_foot()?>