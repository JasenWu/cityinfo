<?php

if ( !defined( "WAP" ) )
{
    exit( "FORBIDDEN" );
}
$userid = isset( $_GET['userid'] ) ? mhtmlspecialchars( $_GET['userid'] ) : "";
$row['prelogo'] = $row['prelogo'] ? $row['prelogo'] : "/images/noavatar_small.gif";
$row['prelogo'] = $mymps_global['SiteUrl'].$row['prelogo'];
if ( $iflogin == 1 )
{
    $user = $db->get_one("select * from ".$db_mymps."member where userid='{$s_uid}'");
    $show_name = $s_uid;
    if (!empty($user) && !empty($user['nickname'])) {
        $show_name = $user['nickname'];
    }
    $loginfo = "<a class=\"u_name fl\">��ӭ��</a><a href=\"index.php?mod=member&userid=".$s_uid."\" class=\"u_name fl\">".$show_name."</a> <a href=\"index.php?mod=login&action=logout&returnurl=".$returnurl."\" class=\"exit58\">��ȫ�˳�</a>";
    $loginfopost = "<a class=\"u_name fl\">��ӭ,</a><a href=\"index.php?mod=member&userid=".$s_uid."\" class=\"u_name fl\"><b>".$s_uid."</b></a>   &nbsp;&nbsp;<a href=\"index.php?mod=login&action=logout&returnurl=".$returnurl."\" class=\"exit58\">�˳�</a>";
    $loginfomypost = "<a href=\"index.php?mod=mypost&userid=".$s_uid."\" class=\"my_publish\">".�ҵķ���."</a>";
    $loginfomyshoucang = "<a href=\"index.php?mod=shoucang&userid=".$s_uid."\" class=\"my_collect\">".�ҵ��ղ�."</a>";
    $loginfoproperty = "<a href=\"index.php?mod=property&userid=".$s_uid."\" class=\"my_collect\">".��ҵ�ɷ�."</a>";
}
else
{
    $loginfo = "<a href=\"index.php?mod=login&cityid=".$cityid."&returnurl=".$returnurl."\" class=\"logn_btn\">��¼</a> <a href=\"index.php?mod=register&cityid=".$cityid."\" class=\"logn_btn\">ע��</a>";
    $loginfopost = "<div class=\"d3\"><a href=\"index.php?mod=login&cityid=".$cityid."&returnurl=".$returnurl."\">��¼</a></div> <div class=\"d4\"><a href=\"index.php?mod=register&cityid=".$cityid."\">ע��</a></div>";
    $loginfomypost = "<a href=\"index.php?mod=login&returnurl=".$returnurl."\" class=\"my_publish\">�ҵķ���</a>";
    $loginfomyshoucang = "<a href=\"index.php?mod=login&returnurl=".$returnurl."\" class=\"my_collect\">�ҵ��ղ�</a>";
    $loginfoproperty = "<a href=\"index.php?mod=login&returnurl=".$returnurl."\" class=\"my_collect\">��ҵ�ɷ�</a>";
}
include( mymps_tpl( "member" ) );
?>
