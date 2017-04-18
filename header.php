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
//  @package index.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id $

require_once __DIR__ . "/../../mainfile.php";

$module_name = basename( dirname( __FILE__ )) ;

if (empty($xoopsModule) || !is_object($xoopsModule) ) {
  $module_handler   = xoops_getHandler('module'); 
  $xoopsModule      = $module_handler->getByDirname($module_name);
}
if (empty($xoopsModuleConfig) || !is_object($xoopsModuleConfig) ) {
  $config_handler    = xoops_getHandler('config');
  $xoopsModuleConfig = $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
}

//disable cache
$GLOBALS['xoopsConfig']['module_cache'][$GLOBALS['xoopsModule']->getVar('mid')] = 0;
$pathIcon = XOOPS_URL . '/' . $xoopsModule->getInfo('icons16');

$module_name = basename( dirname( __FILE__ )) ;
$lang_name = strtoupper($module_name);

include_once "include/constants.php";
include_once "include/function.php";
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$module_name.'/class/infotree.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$module_name.'/class/info.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$module_name.'/class/category.php';

xoops_loadLanguage('modinfo', $module_name);
xoops_loadLanguage('main', 		$module_name);
xoops_loadLanguage('admin', 	$module_name);

xoops_load('XoopsCache');
XoopsLoad::load('XoopsRequest');
$myts = MyTextSanitizer::getInstance();

$seo = (!empty($xoopsModuleConfig[$module_name.'_seourl']) && $xoopsModuleConfig[$module_name.'_seourl']>0) ? intval($xoopsModuleConfig[$module_name.'_seourl']) : 0;
$para = readSeoUrl($_GET, $seo);

$infothisgroups = (is_object($xoopsUser)) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
$infopage = XoopsRequest::getInt('page',0);

$info_handler 		  = new InfoInfoHandler($xoopsDB,$module_name);
$infowait_handler 	= new InfoInfoHandler($xoopsDB,$module_name . "_bak");
$cat_handler 		    = new InfoCategoryHandler($xoopsDB,$module_name);
$info_tree 			    = new InfoTree($xoopsDB->prefix($module_name), 'info_id', 'parent_id');

?>