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
//  @package admin_header.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id: admin_header.php 76 2013-09-06 17:00:56Z alfred $

$path = dirname(dirname(dirname(__DIR__)));
include_once $path . '/mainfile.php';
include_once $path . '/include/cp_functions.php';
require_once $path . '/include/cp_header.php';

global $xoopsModule;

$thisModuleName = $GLOBALS['xoopsModule']->getVar('dirname');
$lang_name = strtoupper($thisModuleName);

// Load language files
xoops_loadLanguage('admin', $thisModuleName);
xoops_loadLanguage('modinfo', $thisModuleName);
xoops_loadLanguage('main', $thisModuleName);

$pathIcon16      = XOOPS_URL . '/' . $xoopsModule->getInfo('icons16');
$pathIcon32      = XOOPS_URL . '/' . $xoopsModule->getInfo('icons32');
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');

include_once $GLOBALS['xoops']->path($pathModuleAdmin . '/xoops_version.php'); //Fix for XOOPS 2.5.9
include_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');

include_once XOOPS_ROOT_PATH . '/modules/' . $thisModuleName . '/include/function.php';
XoopsLoad::load('XoopsRequest');

include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $thisModuleName . '/class/infotree.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $thisModuleName . '/class/info.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $thisModuleName . '/class/category.php';

$info_handler 	  = new InfoInfoHandler($xoopsDB, $thisModuleName);
$infowait_handler = new InfoInfoHandler($xoopsDB, $thisModuleName . "_bak");
$cat_handler 	  = new InfoCategoryHandler($xoopsDB, $thisModuleName);
$info_tree 		  = new InfoTree($xoopsDB->prefix($thisModuleName), 'info_id', 'parent_id');

$myts = MyTextSanitizer::getInstance();
