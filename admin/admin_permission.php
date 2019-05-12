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
//  @package admin_permission.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id: admin_permission.php 74 2013-03-29 20:25:05Z alfred $

include_once __DIR__ . '/admin_header.php';
xoops_cp_header();
$indexAdmin = new ModuleAdmin(); 

include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
echo $indexAdmin->addNavigation('admin_permission.php');

$form = new XoopsGroupPermForm(constant('_AM_' . $lang_name . '_PERMISSIONS'), $xoopsModule->mid(), constant('_CON_' . $lang_name . '_PERMNAME'), '', '/admin/admin_permission.php', false);
$form->addItem(constant('_CON_' . $lang_name . '_CANCREATE'), constant('_AM_' . $lang_name . '_CANCREATE'), 0);
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE'), constant('_AM_' . $lang_name . '_CANUPDATE'), 0);

$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_CAT'), constant('_AM_' . $lang_name . '_CANUPDATE_CAT'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_POSITION'), constant('_AM_' . $lang_name . '_CANUPDATE_POSITION'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_GROUPS'), constant('_AM_' . $lang_name . '_CANUPDATE_GROUPS'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_SITEART'), constant('_AM_' . $lang_name . '_CANUPDATE_SITEART'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_SITEFULL'), constant('_AM_' . $lang_name . '_CANUPDATE_SITEFULL'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPDATE_HTML'), constant('_AM_' . $lang_name . '_CANALLOWHTML'), constant('_CON_' . $lang_name . '_CANCREATE'));
$form->addItem(constant('_CON_' . $lang_name . '_ALLCANUPLOAD'), constant('_AM_' . $lang_name . '_CANALLOWUPLOAD'), constant('_CON_' . $lang_name . '_CANCREATE'));

$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_CAT'), constant('_AM_' . $lang_name . '_CANUPDATE_CAT'), constant('_CON_' . $lang_name . '_CANUPDATE'));
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_POSITION'), constant('_AM_' . $lang_name . '_CANUPDATE_POSITION'), constant('_CON_' . $lang_name . '_CANUPDATE'));
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_GROUPS'), constant('_AM_' . $lang_name . '_CANUPDATE_GROUPS'), constant('_CON_' . $lang_name . '_CANUPDATE'));
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_SITEART'), constant('_AM_' . $lang_name . '_CANUPDATE_SITEART'), constant('_CON_' . $lang_name . '_CANUPDATE'));
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_SITEFULL'), constant('_AM_' . $lang_name . '_CANUPDATE_SITEFULL'), constant('_CON_' . $lang_name . '_CANUPDATE'));
$form->addItem(constant('_CON_' . $lang_name . '_CANUPDATE_DELETE'), constant('_AM_' . $lang_name . '_CANDELETE'), constant('_CON_' . $lang_name . '_CANUPDATE'));

echo $form->render();
unset ($form);
include_once __DIR__ . '/admin_footer.php';
