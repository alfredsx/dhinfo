<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 xoops.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  @package xoops_version.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id: xoops_version.php 91 2014-04-19 20:09:50Z alfred $

if (!defined('XOOPS_ROOT_PATH'))
	die("XOOPS_ROOT_PATH not defined!");

// read the Name of the Folder
$infoname = basename(dirname(__FILE__));
$langname = strtoupper($infoname);

$modversion['name']		  		  	= constant('_MI_' . $langname . '_NAME');
$modversion['version']			  	= 2.7;
$modversion['author']     			= 'Dirk Herrmann';
$modversion['description']			= constant('_MI_' . $langname . '_DESC');
$modversion['credits'] = "The SIMPLE-XOOPS Project";
$modversion['help'] = 'page=help';
$modversion['license']     			= 'GNU GPL 2.0';
$modversion['license_url'] 			= "www.gnu.org/licenses/gpl-2.0.html/";
$modversion['official'] = 1;
$modversion['image']		  		= "images/logo.gif";
$modversion['dirname']				= $infoname;

$modversion['author_realname'] = "Dirk Herrmann";
$modversion['author_email'] = "dhsoft@users.sourceforge.net";
$modversion['status_version'] = "2.7";

//about
$modversion['release_date'] = '2019/05/07';
$modversion["module_website_url"] = "www.simple-xoops.de/";
$modversion["module_website_name"] = "SIMPLE-XOOPS";
$modversion["module_status"] = "BETA 4";
$modversion['min_php'] = "7.0";
$modversion['min_xoops'] = "2.5.7";
$modversion['min_admin'] = '1.2';
$modversion['min_db'] = array('mysql'=>'5.5', 'mysqli'=>'5.5');
$modversion['system_menu'] = 1;

$modversion['dirmoduleadmin'] 		= '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        		= 'Frameworks/moduleclasses/icons/16';
$modversion['icons32']        		= 'Frameworks/moduleclasses/icons/32';

$modversion['onInstall']			= "sql/update.php";
$modversion['onUpdate']				= "sql/update.php";

// Tables created by sql file (without prefix!)
$modversion['tables'][0]			= $infoname;
$modversion['tables'][1]			= $infoname . "_cat";
$modversion['tables'][2]			= $infoname . "_bak";

// Admin things
$modversion['hasAdmin']				= 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']			= "admin/menu.php";

// Smarty
//$modversion['use_smarty']			= 1;

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] 		= "include/search.inc.php";
$modversion['search']['func'] 		= $infoname . "_search";

$modversion['hasMain'] = 1;

$infomod_handler = xoops_gethandler('module');
$infomodul = $infomod_handler->getByDirname($infoname);
include_once dirname(__FILE__) . "/include/constants.php";
include_once dirname(__FILE__) . "/include/function.php";

if (xoops_isActiveModule($infoname) === true) {
	//Modul ist aktiv
	include_once dirname(__FILE__) . "/class/infotree.php";
	$id = $cat = $pid = $i = 0;

	$config_handler = xoops_gethandler('config');
	$infoperm_handler = xoops_gethandler('groupperm');
	$InfoModulConfig = $config_handler->getConfigsByCat(0, $infomodul->getVar('mid'));
	$seo = (!empty($InfoModulConfig[$infoname . '_seourl']) && $InfoModulConfig[$infoname . '_seourl'] > 0) ? intval($InfoModulConfig[$infoname . '_seourl']) : 0;
	$info_tree = new InfoTree($GLOBALS['xoopsDB']->prefix($infoname), "info_id", "parent_id");
	$groups = (is_object($GLOBALS['xoopsUser'])) ? $GLOBALS['xoopsUser']->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
	$show_info_perm = $infoperm_handler->getItemIds('InfoPerm', $groups, $infomodul->getVar('mid'));
	//$mod_isAdmin = (is_object($GLOBALS['xoopsUser']) && $GLOBALS['xoopsUser']->isAdmin()) ? true : false;

	if ((/*$mod_isAdmin || */in_array(constant('_CON_' . $langname . '_CANCREATE'), $show_info_perm)) && $InfoModulConfig[$infoname . '_createlink'] == 1) {
		$modversion['sub'][$i]['name'] = constant('_MI_' . $langname . '_CREATESITE');
		$modversion['sub'][$i]['url'] = 'submit.php';
		$i++;
	}

	$cP = array();
	$sub = array();
	xoops_load('XoopsCache');
	$para = readSeoUrl($_GET, $seo);
	$id 	= intval($para['id']);
	$pid 	= intval($para['pid']);
	$key = $key = $infoname . "_" . "home";
	if ( !$cP = XoopsCache::read($key) ) {
		$cP = $info_tree->getChildTreeArray($pid, 'blockid', array(), $InfoModulConfig[$infoname.'_trenner'] , '');
		XoopsCache::write($key,$cP);
	}
	if ($id > 0 ) {
		$first = $info_tree->getFirstId($id);
		$key = $GLOBALS['xoopsModule']->getVar('dirname') . "_" . "home-".$first;
		if ( !$sub = XoopsCache::read($key) ) {
			$sub = $info_tree->getAllChildId($first);
			XoopsCache::write($key,$sub);
		}
	}

	foreach ($cP as $l => $tcontent) {
		$visible	= 0;
		$vsgroup	= explode (",", $tcontent['visible_group']);
		$vscount	= count($vsgroup)-1;
		while ($vscount > -1) {
			if (in_array($vsgroup[$vscount], $groups)) $visible = 1;
			$vscount--;
		}

		if ($tcontent['st'] != 1 || $tcontent['submenu'] == 0) $visible = false;

		$data = array();
		if ($visible == 1) {
			if ($tcontent['parent_id'] != 0 && $tcontent['parent_id'] != $id) {
				if (!in_array(intval($tcontent['info_id']), $sub)) continue;
			}

			$prefix = (!empty($tcontent['prefix'])) ? $tcontent['prefix'] : '';
			$modversion['sub'][$i]['name'] = $prefix . $tcontent['title'];
			$mode = array("seo"=>$seo, "id"=>$tcontent['info_id'], "title"=>$tcontent['title'], "dir"=>$infoname, "cat"=>$tcontent['cat']);
			$ctURL = str_replace(XOOPS_URL . "/modules/" . $infoname . "/", "", makeSeoUrl($mode)); //FIX for MainMenu
			$modversion['sub'][$i]['url'] = $ctURL;
			$i++;
		}
	}
	unset($cP);
}
unset($infomod_handler);

// Templates
$modversion['templates'][1]['file'] 	    = $infoname.'_index.html';
$modversion['templates'][1]['description']  = constant('_MI_'.$langname.'_TEMPL1');

$i = 0;
// Blocks
$modversion['blocks'][$i]['file'] 			= "info_navigation.php";
$modversion['blocks'][$i]['name'] 			= constant('_MI_'.$langname.'_BLOCK1');
$modversion['blocks'][$i]['description'] 	= constant('_MI_'.$langname.'_BLOCK1_DESC');
$modversion['blocks'][$i]['show_func'] 		= "info_block_nav";
$modversion['blocks'][$i]['edit_func'] 		= "info_navblock_edit";
$modversion['blocks'][$i]['options'] 		= $infoname."|1|dynamisch";
$modversion['blocks'][$i]['template'] 		= $infoname.'_nav_block.html';
$modversion['blocks'][$i]['can_clone']		= true;
$i++;

$modversion['blocks'][$i]['file'] 			= "info_freiblock.php";
$modversion['blocks'][$i]['name'] 			= constant('_MI_'.$langname.'_BLOCK2');
$modversion['blocks'][$i]['description'] 	= constant('_MI_'.$langname.'_BLOCK2_DESC');
$modversion['blocks'][$i]['show_func'] 		= "info_freiblock_show";
$modversion['blocks'][$i]['edit_func'] 		= "info_freiblock_edit";
$modversion['blocks'][$i]['options'] 		= $infoname."|0";
$modversion['blocks'][$i]['template'] 		= $infoname.'_freiblock.html';
$modversion['blocks'][$i]['can_clone']		= true;
$i++;

$i = 0;
$modversion['config'][$i]['name'] 			= $infoname.'_editors';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF1';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF1_DESC';
$modversion['config'][$i]['formtype'] 		= 'yesno';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] 		= 1;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_createlink';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF2';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF2_DESC';
$modversion['config'][$i]['formtype'] 		= 'yesno';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] 		= 1;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_printer';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF3';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF3_DESC';
$modversion['config'][$i]['formtype'] 		= 'yesno';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] 		= 1;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_last';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF4';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF4_DESC';
$modversion['config'][$i]['formtype'] 		= 'select';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['options'] 		= array('_MI_'.$langname.'_LASTD1'=>1,
													'_MI_'.$langname.'_LASTD2'=>2,
													'_MI_'.$langname.'_LASTD3'=>3,
													'_MI_'.$langname.'_LASTD4'=>4);
$modversion['config'][$i]['default'] 		= constant('_MI_'.$langname.'_LASTD1');
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_showrblock';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF5';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF5_DESC';
$modversion['config'][$i]['formtype'] 		= 'select';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['options'] 		= array('_MI_'.$langname.'_NONE'    => 0,
													'_MI_'.$langname.'_RECHTS'	=> 1,
													'_MI_'.$langname.'_LINKS'		=> 2,
													'_MI_'.$langname.'_BEIDE'   => 3);
$modversion['config'][$i]['default'] 		= 1;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_shownavi';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF6';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF6_DESC';
$modversion['config'][$i]['formtype'] 		= 'select';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['options'] 		= array('_MI_'.$langname.'_PAGESNAV'  => 1,
												'_MI_'.$langname.'_PAGESELECT'=> 2,
												'_MI_'.$langname.'_PAGESIMG'  => 3);
$modversion['config'][$i]['default'] 		= 1;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_linklist';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF7';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF7_DESC';
$modversion['config'][$i]['formtype'] 		= 'yesno';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] 		= 0;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_seourl';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF8';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF8_DESC';
$modversion['config'][$i]['formtype'] 		= 'select';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['options'] 		= array('_NONE'				=> 0,
													'REWRITING MODUL'	=> 1,
													'WRAPPER'			=> 2);
$modversion['config'][$i]['default'] 		= 0;
$i++;

$modversion['config'][$i]['name'] 			= $infoname.'_trenner';
$modversion['config'][$i]['title'] 			= '_MI_'.$langname.'_CONF9';
$modversion['config'][$i]['description'] 	= '_MI_'.$langname.'_CONF9_DESC';
$modversion['config'][$i]['formtype'] 		= 'select';
$modversion['config'][$i]['valuetype'] 		= 'text';
$modversion['config'][$i]['options'] 		= array('&#160;'	=> '&#160;',
													'-'			=> '-',
													'&#8226;'	=> '&#8226;',
													'&#8594;'	=> '&#8594;',
													'&#8658;'	=> '&#8658;',
													'&#10138;'	=> '&#10138;',
													'&#10140;'	=> '&#10140;',
													'&#10173;'	=> '&#10173;'
													);
$modversion['config'][$i]['default'] = '&#160;';
$i++;

$modversion['config'][$i]['name'] = $infoname . '_cols';
$modversion['config'][$i]['title'] = '_MI_' . $langname . '_CONF_COLS';
$modversion['config'][$i]['description']  	= '_MI_' . $langname . '_CONF_COLS_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] 	  	= 'int';
$modversion['config'][$i]['default'] = 80;
$i++;

$modversion['config'][$i]['name'] = $infoname . '_rows';
$modversion['config'][$i]['title'] = '_MI_' . $langname . '_CONF_ROWS';
$modversion['config'][$i]['description']	= '_MI_' . $langname . '_CONF_ROWS_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] = 20;
$i++;

$modversion['config'][$i]['name'] = $infoname . '_width';
$modversion['config'][$i]['title'] = '_MI_' . $langname . '_CONF_WIDTH';
$modversion['config'][$i]['description']	= '_MI_' . $langname . '_CONF_WIDTH_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] = 99;
$i++;

$modversion['config'][$i]['name'] = $infoname . '_height';
$modversion['config'][$i]['title'] = '_MI_' . $langname . '_CONF_HEIGHT';
$modversion['config'][$i]['description']	= '_MI_' . $langname . '_CONF_HEIGHT_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] = 300;
$i++;

$modversion['config'][$i]['name'] = $infoname . '_maxfilesize';
$modversion['config'][$i]['title'] = '_MI_' . $langname . '_CONF_MAXFILESIZE';
$modversion['config'][$i]['description']	= '_MI_' . $langname . '_CONF_MAXFILESIZE_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] 		= 'int';
$modversion['config'][$i]['default'] = 2;
$i++;

// Breadcrumbs
$modversion['config'][$i]['name']        	= $infoname . '_breadcrumbs';
$modversion['config'][$i]['title']       	= '_MI_' . $langname . '_BREADCRUMBS';
$modversion['config'][$i]['description'] 	= '_MI_' . $langname . '_BREADCRUMBS_DESC';
$modversion['config'][$i]['formtype']    	= 'yesno';
$modversion['config'][$i]['valuetype']   	= 'int';
$modversion['config'][$i]['default']     	= 1;
$i++;

unset($i);

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] 		= 'content';
$modversion['comments']['pageName'] 		= XOOPS_URL . '/modules/' . $infoname . '/index.php';
