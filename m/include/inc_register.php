<?php

if (CURSCRIPT != "wap") {
    exit("FORBIDDEN");
}
if ($mobile_settings['register'] != 1) {
    errormsg("��վ�ֻ����ѹر�ע�Ṧ�ܣ�����ע�ᣬ��� " . $mymps_global[SiteUrl] . " ��ҳ���ٽ���ע�ᣡ");
}
if ($action == "register") {
    include(MYMPS_ROOT . "/member/include/common.func.php");
    $userid = isset($_POST['userid']) ? mhtmlspecialchars($_POST['userid']) : "";
    $mobile = isset($_POST['mobile']) ? mhtmlspecialchars($_POST['mobile']) : "";
    $userpwd = isset($_POST['userpwd']) ? mhtmlspecialchars($_POST['userpwd']) : "";
    $reuserpwd = isset($_POST['reuserpwd']) ? mhtmlspecialchars($_POST['reuserpwd']) : "";
    $email = isset($_POST['email']) ? mhtmlspecialchars($_POST['email']) : "";
    $agreergpermit = isset($_POST['agreergpermit']) ? mhtmlspecialchars($_POST['agreergpermit']) : "";
    $mixcode = isset($_POST['mixcode']) ? mhtmlspecialchars($_POST['mixcode']) : "";
    if (!$mixcode && $mixcode != md5($cookiepre)) {
        errormsg("ϵͳ�ж�������·����ȷ��");
    }
    $checkcode = isset($_POST['checkcode']) ? mhtmlspecialchars($_POST['checkcode']) : "";
    if ($mobile_settings['authcode'] == 1 && !mymps_chk_randcode($checkcode)) {
        redirectmsg("��֤����������뷵����������", "index.php?mod=register");
    }
    if ($agreergpermit != 1) {
        redirectmsg("������ͬ���������ݷ���ע��", "index.php?mod=register");
    }
    if (PASSPORT_TYPE == "ucenter") {
        require(MYMPS_ROOT . "/uc_client/client.php");
        if ($activation && ($activeuser = uc_get_user($activation))) {
            list($uid, $userid) = $activeuser;
        } else {
            $user = $db->getrow("SELECT id,userid FROM `" . $db_mymps . "member` WHERE userid = '{$userid}'");
            if (uc_get_user($userid) && !$user['userid']) {
                redirectmsg("���û�����ע�ᣬ�����µ�¼", $mymps_global[SiteUrl] . "/m/index.php?m=login");
            }
            $uid = uc_user_register($userid, $userpwd, $email);
            if ($uid <= 0) {
                if ($uid == -1) {
                    errormsg("�û������Ϸ�");
                } else if ($uid == -2) {
                    errormsg("����������ע��Ĵ���");
                } else if ($uid == -3) {
                    errormsg("�û����Ѿ�����");
                } else if ($uid == -4) {
                    errormsg("Email ��ʽ����");
                } else if ($uid == -5) {
                    errormsg("Email ������ע��");
                } else if ($uid == -6) {
                    errormsg("�� Email �Ѿ���ע��");
                } else {
                    errormsg("δ����");
                }
            } else {
                $userid = trim($userid);
                $userpwd = trim($userpwd);
                $email = trim($email);
            }
        }
    }
    $rs = CheckUserID($userid, "�û���");
    if ($rs != "ok") {
        redirectmsg($rs, "index.php?mod=register");
    }
    if ($userpwd != $reuserpwd) {
        redirectmsg("��������������벻��ͬ���뷵����������", "index.php?mod=register");
    }
    if (20 < strlen($userid) || strlen($userid) < 3) {
        redirectmsg("�û�������3-20���ַ�!", "index.php?mod=register");
    }

    if (strlen($userpwd) < 5) {
        redirectmsg("����û������������(��������3���ַ�)��������ע��!", "index.php?mod=register");
    }
    if (!is_email($email)) {
        //redirectmsg( "Email��ʽ����ȷ��", "index.php?mod=register" );
    }
    if ($db->getone("SELECT id FROM `" . $db_mymps . "member` WHERE userid = '{$userid}' ")) {
        redirectmsg("��ָ�����û��� " . $userid . " �Ѵ��ڣ���ʹ�ñ���û���!", "index.php?mod=register");
    }
    $p_code = mgetcookie('p_code' . $mobile);
    if (empty($code) || $code != intval($p_code) - 100) {
        redirectmsg("��֤�벻��ȷ", "index.php?mod=register");
    }
    member_reg($userid, md5($userpwd), '', $safequestion, $safeanswer, '', '', '', $mobile);
    $member_log->in($userid, md5($userpwd), "on", "noredirect");
    redirectmsg("��ϲ! ���Ѿ�ע��ɹ�", "index.php?mod=member&cityid=" . $cityid);
} elseif ($action == 'code') {
    if (mgetcookie('t_code')) {
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;

        if (empty($phone)) {
            exit('error');
        }
        if ($db->getone("SELECT id FROM `" . $db_mymps . "member` WHERE userid = '{$phone}' OR mobile='{$phone}'")) {
            exit('has');
        }
        require_once MYMPS_ROOT . '/include/Sms.php';
        $code = mt_rand(100000, 999999);
        //$msg = sprintf('����ʢ���񡿡���%s������Ϊ�����ֻ���֤�롣��Ǳ��˲���������ԡ�', mt_rand(100000, 999999));
        //$msg = sprintf('������֤����:��%s�����벻Ҫ����֤��й©�������ˡ��´ε�¼���ʹ���http://1.cndnss.net', $code);
        $msg = sprintf('������֤����:��%s�����벻Ҫ����֤��й©�������ˡ�', $code);
        $r = Sms::send($phone, $msg);
        if ($r) {
            msetcookie('p_code' . $phone, $code + 100);
            exit('ok');
        }
        exit('error');
    }
    exit('error');
} else {
    msetcookie('t_code', md5(time()), 86400);
    $mixcode = md5($cookiepre);
    include(mymps_tpl("member_register"));
}
?>
