<?php include mymps_tpl('inc_head_jq');
$admindir = getcwdOL();
?>
<script type="text/javascript" src="../include/datepicker/datepicker.js"></script>
<link rel="stylesheet" href="../include/datepicker/ui.css">
<script language='javascript'>
$(function(){
	$("#datepicker1").datepicker();
	$("#datepicker2").datepicker();
});
</script>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
  <tr class="firstr">
  	<td colspan="2">��ϸ����</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td id="menu_tip">
    	<form action="payrecord.php" method="get">
        <input name="url" value="<?php echo GetUrl();?>" type="hidden" />
		ʱ���<input id="datepicker1" name="starttime" type="text" class="text" style="width:80px;" value="<?php echo GetTime($rstarttime,'Y-m-d'); ?>"> - <input id="datepicker2" style="width:80px;" name="endtime" type="text" class="text" value="<?php echo GetTime($rendtime,'Y-m-d'); ?>"> 
		�ؼ��� <input name="keywords" type="text" class="text" value="<?php echo $keywords; ?>">    
        <select name="action" id="action">
            <option value="1" <?php if($action == '1') echo 'selected'; ?>>������</option>
            <option value="2" <?php if($action == '2') echo 'selected'; ?>>�����</option>
            <option value="3" <?php if($action == '3') echo 'selected'; ?>>���IP</option>
			<option value="4" <?php if($action == '4') echo 'selected'; ?>>��ע</option>
          </select> 
		<input name=submit1 type=submit id="submit12" value=���� class="gray">
         </form>
    </td>
  </tr>
</table>
</div>
<div class="clear"></div>
<form action="?part=list" method="post">
<input name="url" type="hidden" value="<?=GetUrl()?>">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr style="font-weight:bold; background-color:#dff6ff">
    <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> ɾ?</td>
      <td>������</td>
      <td>�����</td>
      <td>�ֻ���</td>
      <td>���</td>
      <td>���ʱ��</td>
      <td>���IP</td>
      <td>��ע</td>
      <td>�ӿ�</td>
    </tr>
    <?php
	$list = is_array($list) ? $list : array();
	foreach($list as $list){
	?>
    <tr bgcolor="white">
        <td><input type='checkbox' name='delids[]' value='<?=$list[id]?>' class='checkbox' id="<?=$list[id]?>"></td>
        <td><?=$list['orderid']?></td>
        <td>
            <a href="javascript:void(0);" onclick="setbg('<?=MPS_SOFTNAME?>��Ա����',400,110,'../box.php?part=member&userid=<?=$list['userid']?>&admindir=<?=$admindir?>')">
                <?php
                    if (empty($list['openid'])) {
                        echo $list['userid'];
                    } else {
                        echo $list['nickname'];
                    }
                ?>
            </a>
        </td>
        <td>
            <?=$list['mobile']?>
        </td>
        <td><em><font color="red"><?=$list[money]?></font></em></td>
        <td><?=GetTime($list[posttime])?></td>
        <td align="left"><?=$list[payip]?></td>
        <td align="left"><?=$list[paybz]?></td>
        <td align="left"><?=$list[type]?></td>
    </tr>
    <?php }?>

</table>
</div>
<center><input type="submit" value="�� ��" class="mymps large" name="<?=CURSCRIPT?>_submit"/><div class="clear"></div></center>
</form>
<div class="pagination"><?=page2()?></div>
<?php mymps_admin_tpl_global_foot();?>