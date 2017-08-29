<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define("CURSCRIPT", "property_building");
require_once(dirname(__FILE__) . "/global.php");
require_once(MYMPS_INC . "/db.class.php");
if (!defined("IN_ADMIN") || !defined("IN_MYMPS")) {
    exit("Access Denied");
}
require_once('../plugin/property/include/Constants.php');
require_once('../plugin/property/include/functions.php');
$part = $part ? trim($part) : "list";
$id = isset($id) ? intval($id) : "";
chk_admin_purview(Constants::PURVIEW_BUILDING);

if (!submit_check(CURSCRIPT . "_submit")) {
    if ($part == "list") {
        $params = [];
        $where = ' WHERE 1=1 ';
        if (!empty($name)) {
            $where .= " AND name = '" . $name . "'";
            $params['name'] = $name;
        }

        if (!empty($params)) {
            $param = http_build_query($params) . '&';
        }

        $query = $db->query("SELECT * FROM `" . $db_mymps . "building` " . $where);
        $rows_num = $db->num_rows($query);
        $per_page = 20;
        $pages_num = ceil($rows_num / $per_page);
        $page = empty($page) ? 1 : $page;
        $offset = ($page - 1) * $per_page;



        $list = $db->getAll("SELECT * FROM `" . $db_mymps . "building`" . $where . " ORDER BY display_order ASC LIMIT $offset,{$per_page}");
    } elseif ($part == 'edit') {
        $building = $db->get_one('SELECT * FROM ' . $db_mymps . 'building WHERE building_id=' . $building_id);
        $area = $db->get_one("SELECT * FROM `" . $db_mymps . "area` WHERE `areaid` = " . $building['area_id']);
        $city = $db->get_one("SELECT * FROM `" . $db_mymps . "city` WHERE `cityid` = " . $area['cityid']);
        $province = $db->get_one("SELECT * FROM `" . $db_mymps . "province` WHERE `provinceid` = " . $city['provinceid']);
        $area_list = $db->getAll("SELECT * FROM `" . $db_mymps . "area` WHERE `cityid` = " . $area['cityid'] . " ORDER BY displayorder ASC");
        $city_list = $db->getAll("SELECT * FROM `" . $db_mymps . "city` WHERE `provinceid` = " . $city['provinceid'] . " ORDER BY displayorder ASC");

    } elseif ($part == 'del') {

        $db->query('DELETE FROM ' . $db_mymps . 'building WHERE building_id=' . $building_id);
        $res = $db->affected_rows();
        if ($res > 0) {
            write_msg('�����ɹ�', '??part=list');
        }

        write_msg('����ʧ��', '??part=list');

    }
    $here = "��ҵ��Ϣ¼��";
    $province_list = $db->getall("SELECT * FROM `" . $db_mymps . "province` ORDER BY displayorder ASC");
    include(mymps_tpl("property_building_" . $part));
} elseif ($part == 'add') {

    if (mb_strlen($name) > 32) {
        write_msg('С�����Ʋ��ܳ���32���ַ�');
    } elseif (empty($province_id)) {
        write_msg('��ѡ��ʡ��');
    } elseif (empty($city_id)) {
        write_msg('��ѡ����');
    } elseif (empty($area_id)) {
        write_msg('��ѡ����');
    }

    $building = $db->get_one('SELECT * FROM ' . $db_mymps . 'building WHERE area_id=' . $area_id . ' AND `name` = "'. $name .'"');
    if (!empty($building)) {
        write_msg('��С���Ѿ�����');
    }

    $now = time();
    $db->query("INSERT INTO " . $db_mymps . "building (area_id,name,time_created,time_updated) VALUES ('{$area_id}','{$name}','{$now}','{$now}')");
    $res = $db->affected_rows();

    if ($res > 0) {
        write_msg("����С���ɹ�");
    } else {
        write_msg("����С��ʧ��");
    }

} elseif ($part == 'edit') {

    if (mb_strlen($name) > 32) {
        write_msg('С�����Ʋ��ܳ���32���ַ�');
    } elseif (empty($province_id)) {
        write_msg('��ѡ��ʡ��');
    } elseif (empty($city_id)) {
        write_msg('��ѡ����');
    } elseif (empty($area_id)) {
        write_msg('��ѡ����');
    }

    $now = time();
    $building = $db->get_one('SELECT * FROM ' . $db_mymps . 'building WHERE area_id=' . $area_id . ' AND `name` = "'. $name .'"');
    if (!empty($building)) {
        write_msg('��С���Ѿ�����');
    }
    $db->query("UPDATE " . $db_mymps . "building SET `area_id`='{$area_id}',`name`='{$name}',`time_updated`={$now} WHERE `building_id` = " . $building_id);
    $res = $db->affected_rows();

    if ($res > 0) {
        write_msg("�޸�С���ɹ�");
    } else {
        write_msg("�޸�С��ʧ��");
    }

} else {

}
unset($status);
if (is_object($db)) {
    $db->close();
}
$db = $mymps_global = $part = $action = $here = NULL;
?>
