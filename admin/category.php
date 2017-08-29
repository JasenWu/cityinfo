<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/
class GetPingYing { 
    private $pylist = array( 
'a'=>-20319, 
'ai'=>-20317, 
'an'=>-20304, 
'ang'=>-20295, 
'ao'=>-20292, 
'ba'=>-20283, 
'bai'=>-20265, 
'ban'=>-20257, 
'bang'=>-20242, 
'bao'=>-20230, 
'bei'=>-20051, 
'ben'=>-20036, 
'beng'=>-20032, 
'bi'=>-20026, 
'bian'=>-20002, 
'biao'=>-19990, 
'bie'=>-19986, 
'bin'=>-19982, 
'bing'=>-19976, 
'bo'=>-19805, 
'bu'=>-19784, 
'ca'=>-19775, 
'cai'=>-19774, 
'can'=>-19763, 
'cang'=>-19756, 
'cao'=>-19751, 
'ce'=>-19746, 
'ceng'=>-19741, 
'cha'=>-19739, 
'chai'=>-19728, 
'chan'=>-19725, 
'chang'=>-19715, 
'chao'=>-19540, 
'che'=>-19531, 
'chen'=>-19525, 
'cheng'=>-19515, 
'chi'=>-19500, 
'chong'=>-19484, 
'chou'=>-19479, 
'chu'=>-19467, 
'chuai'=>-19289, 
'chuan'=>-19288, 
'chuang'=>-19281, 
'chui'=>-19275, 
'chun'=>-19270, 
'chuo'=>-19263, 
'ci'=>-19261, 
'cong'=>-19249, 
'cou'=>-19243, 
'cu'=>-19242, 
'cuan'=>-19238, 
'cui'=>-19235, 
'cun'=>-19227, 
'cuo'=>-19224, 
'da'=>-19218, 
'dai'=>-19212, 
'dan'=>-19038, 
'dang'=>-19023, 
'dao'=>-19018, 
'de'=>-19006, 
'deng'=>-19003, 
'di'=>-18996, 
'dian'=>-18977, 
'diao'=>-18961, 
'die'=>-18952, 
'ding'=>-18783, 
'diu'=>-18774, 
'dong'=>-18773, 
'dou'=>-18763, 
'du'=>-18756, 
'duan'=>-18741, 
'dui'=>-18735, 
'dun'=>-18731, 
'duo'=>-18722, 
'e'=>-18710, 
'en'=>-18697, 
'er'=>-18696, 
'fa'=>-18526, 
'fan'=>-18518, 
'fang'=>-18501, 
'fei'=>-18490, 
'fen'=>-18478, 
'feng'=>-18463, 
'fo'=>-18448, 
'fou'=>-18447, 
'fu'=>-18446, 
'ga'=>-18239, 
'gai'=>-18237, 
'gan'=>-18231, 
'gang'=>-18220, 
'gao'=>-18211, 
'ge'=>-18201, 
'gei'=>-18184, 
'gen'=>-18183, 
'geng'=>-18181, 
'gong'=>-18012, 
'gou'=>-17997, 
'gu'=>-17988, 
'gua'=>-17970, 
'guai'=>-17964, 
'guan'=>-17961, 
'guang'=>-17950, 
'gui'=>-17947, 
'gun'=>-17931, 
'guo'=>-17928, 
'ha'=>-17922, 
'hai'=>-17759, 
'han'=>-17752, 
'hang'=>-17733, 
'hao'=>-17730, 
'he'=>-17721, 
'hei'=>-17703, 
'hen'=>-17701, 
'heng'=>-17697, 
'hong'=>-17692, 
'hou'=>-17683, 
'hu'=>-17676, 
'hua'=>-17496, 
'huai'=>-17487, 
'huan'=>-17482, 
'huang'=>-17468, 
'hui'=>-17454, 
'hun'=>-17433, 
'huo'=>-17427, 
'ji'=>-17417, 
'jia'=>-17202, 
'jian'=>-17185, 
'jiang'=>-16983, 
'jiao'=>-16970, 
'jie'=>-16942, 
'jin'=>-16915, 
'jing'=>-16733, 
'jiong'=>-16708, 
'jiu'=>-16706, 
'ju'=>-16689, 
'juan'=>-16664, 
'jue'=>-16657, 
'jun'=>-16647, 
'ka'=>-16474, 
'kai'=>-16470, 
'kan'=>-16465, 
'kang'=>-16459, 
'kao'=>-16452, 
'ke'=>-16448, 
'ken'=>-16433, 
'keng'=>-16429, 
'kong'=>-16427, 
'kou'=>-16423, 
'ku'=>-16419, 
'kua'=>-16412, 
'kuai'=>-16407, 
'kuan'=>-16403, 
'kuang'=>-16401, 
'kui'=>-16393, 
'kun'=>-16220, 
'kuo'=>-16216, 
'la'=>-16212, 
'lai'=>-16205, 
'lan'=>-16202, 
'lang'=>-16187, 
'lao'=>-16180, 
'le'=>-16171, 
'lei'=>-16169, 
'leng'=>-16158, 
'li'=>-16155, 
'lia'=>-15959, 
'lian'=>-15958, 
'liang'=>-15944, 
'liao'=>-15933, 
'lie'=>-15920, 
'lin'=>-15915, 
'ling'=>-15903, 
'liu'=>-15889, 
'long'=>-15878, 
'lou'=>-15707, 
'lu'=>-15701, 
'lv'=>-15681, 
'luan'=>-15667, 
'lue'=>-15661, 
'lun'=>-15659, 
'luo'=>-15652, 
'ma'=>-15640, 
'mai'=>-15631, 
'man'=>-15625, 
'mang'=>-15454, 
'mao'=>-15448, 
'me'=>-15436, 
'mei'=>-15435, 
'men'=>-15419, 
'meng'=>-15416, 
'mi'=>-15408, 
'mian'=>-15394, 
'miao'=>-15385, 
'mie'=>-15377, 
'min'=>-15375, 
'ming'=>-15369, 
'miu'=>-15363, 
'mo'=>-15362, 
'mou'=>-15183, 
'mu'=>-15180, 
'na'=>-15165, 
'nai'=>-15158, 
'nan'=>-15153, 
'nang'=>-15150, 
'nao'=>-15149, 
'ne'=>-15144, 
'nei'=>-15143, 
'nen'=>-15141, 
'neng'=>-15140, 
'ni'=>-15139, 
'nian'=>-15128, 
'niang'=>-15121, 
'niao'=>-15119, 
'nie'=>-15117, 
'nin'=>-15110, 
'ning'=>-15109, 
'niu'=>-14941, 
'nong'=>-14937, 
'nu'=>-14933, 
'nv'=>-14930, 
'nuan'=>-14929, 
'nue'=>-14928, 
'nuo'=>-14926, 
'o'=>-14922, 
'ou'=>-14921, 
'pa'=>-14914, 
'pai'=>-14908, 
'pan'=>-14902, 
'pang'=>-14894, 
'pao'=>-14889, 
'pei'=>-14882, 
'pen'=>-14873, 
'peng'=>-14871, 
'pi'=>-14857, 
'pian'=>-14678, 
'piao'=>-14674, 
'pie'=>-14670, 
'pin'=>-14668, 
'ping'=>-14663, 
'po'=>-14654, 
'pu'=>-14645, 
'qi'=>-14630, 
'qia'=>-14594, 
'qian'=>-14429, 
'qiang'=>-14407, 
'qiao'=>-14399, 
'qie'=>-14384, 
'qin'=>-14379, 
'qing'=>-14368, 
'qiong'=>-14355, 
'qiu'=>-14353, 
'qu'=>-14345, 
'quan'=>-14170, 
'que'=>-14159, 
'qun'=>-14151, 
'ran'=>-14149, 
'rang'=>-14145, 
'rao'=>-14140, 
're'=>-14137, 
'ren'=>-14135, 
'reng'=>-14125, 
'ri'=>-14123, 
'rong'=>-14122, 
'rou'=>-14112, 
'ru'=>-14109, 
'ruan'=>-14099, 
'rui'=>-14097, 
'run'=>-14094, 
'ruo'=>-14092, 
'sa'=>-14090, 
'sai'=>-14087, 
'san'=>-14083, 
'sang'=>-13917, 
'sao'=>-13914, 
'se'=>-13910, 
'sen'=>-13907, 
'seng'=>-13906, 
'sha'=>-13905, 
'shai'=>-13896, 
'shan'=>-13894, 
'shang'=>-13878, 
'shao'=>-13870, 
'she'=>-13859, 
'shen'=>-13847, 
'sheng'=>-13831, 
'shi'=>-13658, 
'shou'=>-13611, 
'shu'=>-13601, 
'shua'=>-13406, 
'shuai'=>-13404, 
'shuan'=>-13400, 
'shuang'=>-13398, 
'shui'=>-13395, 
'shun'=>-13391, 
'shuo'=>-13387, 
'si'=>-13383, 
'song'=>-13367, 
'sou'=>-13359, 
'su'=>-13356, 
'suan'=>-13343, 
'sui'=>-13340, 
'sun'=>-13329, 
'suo'=>-13326, 
'ta'=>-13318, 
'tai'=>-13147, 
'tan'=>-13138, 
'tang'=>-13120, 
'tao'=>-13107, 
'te'=>-13096, 
'teng'=>-13095, 
'ti'=>-13091, 
'tian'=>-13076, 
'tiao'=>-13068, 
'tie'=>-13063, 
'ting'=>-13060, 
'tong'=>-12888, 
'tou'=>-12875, 
'tu'=>-12871, 
'tuan'=>-12860, 
'tui'=>-12858, 
'tun'=>-12852, 
'tuo'=>-12849, 
'wa'=>-12838, 
'wai'=>-12831, 
'wan'=>-12829, 
'wang'=>-12812, 
'wei'=>-12802, 
'wen'=>-12607, 
'weng'=>-12597, 
'wo'=>-12594, 
'wu'=>-12585, 
'xi'=>-12556, 
'xia'=>-12359, 
'xian'=>-12346, 
'xiang'=>-12320, 
'xiao'=>-12300, 
'xie'=>-12120, 
'xin'=>-12099, 
'xing'=>-12089, 
'xiong'=>-12074, 
'xiu'=>-12067, 
'xu'=>-12058, 
'xuan'=>-12039, 
'xue'=>-11867, 
'xun'=>-11861, 
'ya'=>-11847, 
'yan'=>-11831, 
'yang'=>-11798, 
'yao'=>-11781, 
'ye'=>-11604, 
'yi'=>-11589, 
'yin'=>-11536, 
'ying'=>-11358, 
'yo'=>-11340, 
'yong'=>-11339, 
'you'=>-11324, 
'yu'=>-11303, 
'yuan'=>-11097, 
'yue'=>-11077, 
'yun'=>-11067, 
'za'=>-11055, 
'zai'=>-11052, 
'zan'=>-11045, 
'zang'=>-11041, 
'zao'=>-11038, 
'ze'=>-11024, 
'zei'=>-11020, 
'zen'=>-11019, 
'zeng'=>-11018, 
'zha'=>-11014, 
'zhai'=>-10838, 
'zhan'=>-10832, 
'zhang'=>-10815, 
'zhao'=>-10800, 
'zhe'=>-10790, 
'zhen'=>-10780, 
'zheng'=>-10764, 
'zhi'=>-10587, 
'zhong'=>-10544, 
'zhou'=>-10533, 
'zhu'=>-10519, 
'zhua'=>-10331, 
'zhuai'=>-10329, 
'zhuan'=>-10328, 
'zhuang'=>-10322, 
'zhui'=>-10315, 
'zhun'=>-10309, 
'zhuo'=>-10307, 
'zi'=>-10296, 
'zong'=>-10281, 
'zou'=>-10274, 
'zu'=>-10270, 
'zuan'=>-10262, 
'zui'=>-10260, 
'zun'=>-10256, 
'zuo'=>-10254 
    ); 
    //ȫ��ƴ�� 
    public function getAllPY($chinese, $delimiter = '', $length = 0) { 
       $py = $this->zh_to_pys($chinese, $delimiter); 
       if($length) { 
           $py = substr($py, 0, $length); 
       } 
       return $py; 
    } 
    //ƴ���׸���ĸ 
    public function getFirstPY($chinese){ 
       $result = '' ; 
       for ($i=0; $i<strlen($chinese); $i++) { 
           $p = ord(substr($chinese,$i,1)); 
           if ($p>160) { 
              $q = ord(substr($chinese,++$i,1)); 
              $p = $p*256 + $q - 65536; 
           } 
           $result .= substr($this->zh_to_py($p),0,1); 
       } 
       return $result ; 
    } 

  
    //-------------------����תƴ��--------------------------------// 
    private function zh_to_py($num, $blank = '') { 
       if($num>0 && $num<160 ) { 
           return chr($num); 
       } elseif ($num<-20319||$num>-10247) { 
           return $blank; 
       } else { 
           foreach ($this->pylist as $py => $code) { 
              if($code > $num) break; 
              $result = $py; 
           } 
           return $result; 
       } 
    } 

  
    private function zh_to_pys($chinese, $delimiter = ' ', $first=0){ 
       $result = array(); 
       for($i=0; $i<strlen($chinese); $i++) { 
           $p = ord(substr($chinese,$i,1)); 
           if($p>160) { 
              $q = ord(substr($chinese,++$i,1)); 
              $p = $p*256 + $q - 65536; 
           } 
           $result[] = $this->zh_to_py($p); 
           if ($first) { 
              return $result[0]; 
           } 
       } 
       return implode($delimiter, $result); 
    } 
} 
function info_typemodels( $modid = "" )
{
	global $db;
	global $db_mymps;
	$sql = "SELECT id,name,displayorder FROM `".$db_mymps."info_typemodels` ORDER BY displayorder ASC";
	$opt = $db->getall( $sql );
	foreach ( $opt as $k => $value )
	{
		$mymps .= "<option value=\"".$value[id]."\"";
		$mymps .= $modid == $value[id] ? "selected style=\"background-color:#6EB00C;color:white\"" : "";
		$mymps .= ">".$value[name]."</option>";
	}
	return $mymps;
}

define( "CURSCRIPT", "category" );
require_once( dirname( __FILE__ )."/global.php" );
require_once( MYMPS_INC."/db.class.php" );
require_once( dirname( __FILE__ )."/include/color.inc.php" );
require_once( dirname( __FILE__ )."/include/ifview.inc.php" );

$PingYing = new GetPingYing(); 
if ( !defined( "IN_ADMIN" ) || !defined( "IN_MYMPS" ) )
{
	exit( "Access Denied" );
}
if ( $admin_cityid )
{
	write_msg( "��û��Ȩ�޷��ʸ�ҳ��" );
}
$part = $part ? $part : "list";
$cat_color = $color;
if ( !submit_check( CURSCRIPT."_submit" ) )
{
	require_once( MYMPS_DATA."/html_type.inc.php" );
	if ( $part == "list" )
	{
		chk_admin_purview( "purview_��Ϣ����" );
		$f_cat = cat_list( "category", 0, 0, false );
		$here = "��Ϣ�����б�";
		include( mymps_tpl( "category_list" ) );
	}
	else
	{
		if ( $part == "edit" )
		{
			include( MYMPS_DATA."/category_tpl.inc.php" );
			include( MYMPS_DATA."/information_tpl.inc.php" );
			$cat = $db->getrow( "SELECT * FROM ".$db_mymps."category WHERE catid = '{$catid}'" );
			$here = "�༭��Ϣ����";
			$cat['description'] = $cat['description'] ? de_textarea_post_change( $cat['description'] ) : "";
			include( mymps_tpl( "category_edit" ) );
		}
		else
		{
			if ( $part == "add" )
			{
				include( MYMPS_DATA."/category_tpl.inc.php" );
				include( MYMPS_DATA."/information_tpl.inc.php" );
				chk_admin_purview( "purview_��ӷ���" );
				$maxorder = $db->getone( "SELECT MAX(catorder) FROM ".$db_mymps."category" );
				$maxorder += 1;
				$here = "�����Ϣ����";
				include( mymps_tpl( "category_add" ) );
			}
			else
			{
				if ( $part == "del" )
				{
					if ( empty( $catid ) )
					{
						write_msg( "û��ѡ���¼" );
					}
					mymps_delete( "category", "WHERE ".get_children( $catid, "catid" ) );
					mymps_delete( "information", "WHERE ".get_children( $catid, "catid" ) );
					clear_cache_files( "category_option_static" );
					clear_cache_files( "category_pid_releate" );
					clear_cache_files( "category_tree" );
					clear_cache_files( "category_dir" );
					write_msg( "ɾ����Ϣ���� ".$catid." �ɹ�", "category.php?part=list", "Mymps" );
				}
			}
		}
	}
}
else if ( $part == "list" )
{
	if ( is_array( $catorder ) )
	{
		foreach ( $catorder as $key => $value )
		{
			$db->query( "UPDATE `".$db_mymps."category` SET catorder = '{$value}' WHERE catid = ".$key );
		}
	}
	if ( is_array( $if_viewids ) )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET if_view = '1' " );
		foreach ( $if_viewids as $key )
		{
			$db->query( "UPDATE `".$db_mymps."category` SET if_view = '2' WHERE catid = ".$key );
		}
	}
	else
	{
		$db->query( "UPDATE `".$db_mymps."category` SET if_view = '1' " );
	}
	foreach ( array( "option_static", "pid_releate", "tree", "dir" ) as $range )
	{
		clear_cache_files( "category_".$range );
	}
	write_msg( "��Ϣ������³ɹ���", "?part=list", "record" );
}
else if ( $part == "add" )
{
	$catname = explode( "\r\n", trim( $catname ) );
	$template = empty( $template ) ? "list" : trim( $template );
	$template_info = empty( $template_info ) ? "info" : trim( $template_info );
	$usecoin = isset( $usecoin ) ? intval( $usecoin ) : 0;
	if ( empty( $catname ) || !is_array( $catname ) )
	{
		write_msg( "����д��������" );
	}
	if ( empty( $catorder ) )
	{
		$sql = "SELECT MAX(catorder) FROM ".$db_mymps."category";
		$maxorder = $db->getone( $sql );
		$catorder = $maxorder;
	}
	if ( is_array( $catname ) )
	{
		foreach ( $catname as $key => $value )
		{
			$value = trim( $value );
			++$catorder;
			$len = strlen( $value );
			if ( 30 < $len )
			{
				write_msg( "������������2����30���ַ�֮��" );
			}
			$db->query( "INSERT INTO ".$db_mymps."category (catname,usecoin,if_view,parentid,modid,catorder,if_upimg,if_mappoint,dir_type,template,template_info) VALUES ('{$value}','{$usecoin}','{$isview}','{$parentid}','{$modid}','{$catorder}','{$if_upimg}','{$if_mappoint}','{$dir_type}','{$template}','{$template_info}')" );
			$insert_id = $db->insert_id( );
			if ( $parentid == 0 )
			{
				if ( $dir_type == 1 )
				{
					$html_dir = "/".$insert_id."/";
				}
				else
				{
					if ( $dir_type == 2 )
					{
						$html_dir = "/".$PingYing->getAllPY( $value )."/";
						$dir_typename = $PingYing->getAllPY( $value );
					}
					else
					{
						if ( $dir_type == 3 )
						{
							$html_dir = "/".$PingYing->getAllPY( $value, 1 )."/";
							$dir_typename = $PingYing->getAllPY( $value, 1 );
						}
					}
				}
			}
			else
			{
				$row = $db->getrow( "SELECT * FROM `".$db_mymps."category` WHERE catid = '{$parentid}'" );
				if ( $dir_type == 1 )
				{
					$html_dir = ( $row['html_dir'] ? $row['html_dir'] : "/" ).$insert_id."/";
				}
				else if ( $dir_type == 2 )
				{
					$html_dir = ( $row['html_dir'] ? $row['html_dir'] : "/" ).$PingYing->getAllPY( $value )."/";
					$dir_typename = $PingYing->getAllPY( $value );
				}
				else if ( $dir_type == 3 )
				{
					$html_dir = ( $row['html_dir'] ? $row['html_dir'] : "/" ).$PingYing->getAllPY( $value, 1 )."/";
					$dir_typename = $PingYing->getAllPY( $value, 1 );
				}
			}
			$db->query( "UPDATE `".$db_mymps."category` SET dir_typename='{$dir_typename}',html_dir = '{$html_dir}' WHERE catid = '{$insert_id}'" );
		}
		foreach ( array( "option_static", "pid_releate", "tree", "dir" ) as $range )
		{
			clear_cache_files( "category_".$range );
		}
		$nav_path = "��ҵ���� &raquo ���ӷ���";
		$message = "�ɹ����ӷ���";
		$after_action = "<a href='?part=add'><u>�������ӷ���</u></a>\r\n\t\t\t&nbsp;&nbsp;<a href='?part=list'><u>�����ӷ������</u></a>";
		show_message( $nav_path, $message, $after_action );
	}
	else
	{
		write_msg( "��Ϣ�������ʧ�ܣ��밴��ʽ��д" );
	}
}
else if ( $part == "edit" )
{
	$template = empty( $template ) ? "list" : trim( $template );
	$usecoin = isset( $usecoin ) ? intval( $usecoin ) : 0;
	if ( empty( $catname ) )
	{
		write_msg( "����д��Ϣ��������" );
	}
	if ( $catid == $parentid )
	{
		write_msg( "������Ϣ���಻��Ϊ�Լ���" );
	}
	$len = strlen( $catname );
	if ($len < 2 || 30 < $len )
	{
		write_msg( "��Ϣ������������2����30���ַ�֮��" );
	}
	if ( $parentid != 0 )
	{
		$row = $db->getrow( "SELECT catname,html_dir FROM `".$db_mymps."category` WHERE catid = '{$parentid}'" );
	}
	$description = $description ? textarea_post_change( $description ) : "";
	if ( $dir_type == 4 )
	{
		if ( !$mydir )
		{
			write_msg( "����д�Զ���Ŀ¼����" );
		}
		if ( $parentid == 0 )
		{
			$html_dir = "/".$mydir."/";
		}
		else
		{
			$html_dir = $row['html_dir'].$mydir."/";
		}
	}
	else if ( $parentid == 0 )
	{
		if ( $dir_type == 1 )
		{
			$html_dir = "/".$catid."/";
		}
		else
		{
			if ( $dir_type == 2 )
			{
				$html_dir = "/".$PingYing->getAllPY( $catname )."/";
			}
			else
			{
				if ( $dir_type == 3 )
				{
					$html_dir = "/".$PingYing->getAllPY( $catname, 1 )."/";
				}
			}
		}
	}
	else if ( $dir_type == 1 )
	{
		$html_dir = $row['html_dir'].$catid."/";
	}
	else if ( $dir_type == 2 )
	{
		$html_dir = $row['html_dir'].$PingYing->getAllPY( $catname )."/";
	}
	else if ( $dir_type == 3 )
	{
		$html_dir = $row['html_dir'].$PingYing->getAllPY( $catname, 1 )."/";
	}
	if ( $mydir && 1 < $db->getone( "SELECT COUNT(catid) FROM `".$db_mymps."category` WHERE dir_typename = '{$mydir}' AND dir_typename != ''" ) )
	{
		write_msg( "��ָ����Ŀ¼��".$mydir."�Ѵ��ڣ��뻻һ�����ƣ�" );
		exit( );
	}
	$db->query( "UPDATE `".$db_mymps."information` SET dir_typename = '{$mydir}' WHERE catid = '{$catid}'" );
	$db->query( "UPDATE ".$db_mymps."category SET catname='{$catname}',icon='{$icon}',usecoin='{$usecoin}',if_view = '{$isview}',color='{$fontcolor}',title='{$title}',keywords='{$keywords}',description='{$description}',parentid='{$parentid}',modid='{$modid}',catorder='{$catorder}',dir_type = '{$dir_type}', dir_typename = '{$mydir}', html_dir = '{$html_dir}' ,if_upimg='{$if_upimg}',if_mappoint='{$if_mappoint}',template='{$template}',template_info='{$template_info}' WHERE catid = '{$catid}'" );
	if ( $children_mod == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET modid = '{$modid}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_tpl == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET template = '{$template}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_tplinfo == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET template_info = '{$template_info}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_upload == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET if_upimg = '{$if_upimg}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_map == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET if_mappoint = '{$if_mappoint}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_des == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET description = '{$description}' WHERE ".get_children( $catid, "catid" ) );
	}
	if ( $children_usecoin == "1" )
	{
		$db->query( "UPDATE `".$db_mymps."category` SET usecoin = '{$usecoin}' WHERE ".get_children( $catid, "catid" ) );
	}
	foreach ( array( "option_static", "pid_releate", "tree", "dir" ) as $range )
	{
		clear_cache_files( "category_".$range );
	}
	$nav_path = "��ҵ���� &raquo �༭��ҵ";
	$message = "�ɹ��༭��Ϣ���� ".$catname;
	$after_action = "<a href='?part=add'><u>�������ӷ���</u></a>\r\n\t\t&nbsp;&nbsp;<a href='?part=edit&catid=".$catid."'><u>���±༭����ҵ</u></a>&nbsp;&nbsp;<a href='?part=list#{$catid}'><u>�����ӷ������</u></a>";
	show_message( $nav_path, $message, $after_action );
}
if ( is_object( $db ) )
{
	$db->close( );
}
$db = $mymps_global = $part = $action = $here = NULL;
?>
