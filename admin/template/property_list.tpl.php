<? include mymps_tpl('inc_head')?>
<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?part=add">��Ϣ¼��</a></li>
                <li><a href="?part=list" class="current">��Ϣ��ѯ</a></li>
            </ul>
        </div>
    </div>
</div>
<form name="form_mymps" action="?part=list" method="post">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
      <td>���</td>
      <td>Ӧ��ʱ��</td>
      <td>�۸�</td>
      <td>��ַ</td>
      <td>����ʱ��</td>
      <td>����ʱ��</td>
      <td>����</td>
    </tr>
<?php foreach($list as $item) :?>
  <tr>
  <td width="40"><?=$item['id']?></td>
  <td><?=$item['period']?></td>
  <td><?=$item['manage_fee']+$item['electric_fee']+$item['water_fee']+$item['other_fee']?></td>
  <td><?=get_address($item['room_id'], 'room')?></td>
  <td><?=date('Y-m-d H:i:s', $item['time_created'])?></td>
  <td><?=date('Y-m-d H:i:s', $item['time_updated'])?></td>
  <td>
      <a href="?part=edit&id=<?=$item['id']?>">�༭</a> /
      <a href="?part=copy&id=<?=$item['id']?>">����</a> /
      <a href="?part=del&id=<?=$item['id']?>" onClick="if(!confirm('ȷ��Ҫɾ������Ϣ��'))return false;">ɾ��</a>
  </td>
</tr>
<?php endforeach;?>
</table>
<div class="pagination"><?php echo page2();?></div>
</div>
</form>
<?=mymps_admin_tpl_global_foot()?>