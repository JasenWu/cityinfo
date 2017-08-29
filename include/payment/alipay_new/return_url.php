<?php
define('IN_MYMPS', true);
define('IN_ADMIN',true);
define('CURSCRIPT','payend');

require_once dirname(__FILE__).'/../../../include/global.php';
require_once MYMPS_DATA.'/config.php';
require_once MYMPS_DATA.'/config.db.php';
require_once MYMPS_INC.'/db.class.php';
require_once MYMPS_INC."/member.class.php";;

if(!$member_log->chk_in()) {
    $url = $mymps_global['SiteUrl']."/".$mymps_global['cfg_member_logfile']."?url=".urlencode(GetUrl());
    if (!pcclient()) {
        $url = $mymps_global['SiteUrl']."/m/index.php?mod=login&url=".urlencode(GetUrl());
    }
    write_msg("", $url);
}
require_once("config.php");

if (!pcclient()) {
    define( "WAP", true );
    define( "CURSCRIPT", "wap" );
    define( "IN_MYMPS", true );
    define( "IN_SMT", true );
    require_once MYMPS_ROOT."/m/common.fun.php";
    require_once MYMPS_INC.'/payment/alipay_new/wap/wappay/service/AlipayTradeService.php';
} else {
    require_once MYMPS_INC.'/payment/alipay_new/web/pagepay/service/AlipayTradeService.php';
}

$arr=$_GET;
unset($arr['act'],$arr['type']);
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

/* ʵ����֤���̽����̻��������У�顣
1���̻���Ҫ��֤��֪ͨ�����е�out_trade_no�Ƿ�Ϊ�̻�ϵͳ�д����Ķ����ţ�
2���ж�total_amount�Ƿ�ȷʵΪ�ö�����ʵ�ʽ����̻���������ʱ�Ľ���
3��У��֪ͨ�е�seller_id������seller_email) �Ƿ�Ϊout_trade_no��ʵ��ݵĶ�Ӧ�Ĳ��������е�ʱ��һ���̻������ж��seller_id/seller_email��
4����֤app_id�Ƿ�Ϊ���̻�����
*/
if($result) {
	//�̻�������
	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//֧�������׺�
	$trade_no = htmlspecialchars($_GET['trade_no']);
    $row=$db->getRow("SELECT * FROM {$db_mymps}payrecord WHERE orderid='$out_trade_no'");
    if (!empty($row)) {
        if (pcclient()) {
            write_msg("֧���ɹ�",$mymps_global['SiteUrl']."/member/index.php?m=pay&ac=record");
        } else {
            redirectmsg('֧���ɹ�', $mymps_global['SiteUrl']."/m/index.php?mod=member");
        }
    }

} else {
    if (pcclient()) {
        write_msg("֧��ʧ��",$mymps_global['SiteUrl']."/member/index.php?m=pay&ac=record");
    } else {
        redirectmsg('֧��ʧ��', $mymps_global['SiteUrl']."/m/index.php?mod=member");
    }
}

is_object($db) && $db->Close();
$mymps_global = NULL;
