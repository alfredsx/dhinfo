<?php
/**
 * ExtGallery User area
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   {@link http://xoops.org/ XOOPS Project}
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author      Zoullou (http://www.zoullou.net)
 * @package     ExtGallery
 */

include "../header.php";
if (!is_object($xoopsModule) ) {
  $module_handler   = xoops_getHandler('module'); 
  $xoopsModule      = $module_handler->getByDirname($module_name);
  $config_handler    = xoops_getHandler('config');
  $xoopsModuleConfig = $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
}

$com_itemid = isset($_GET['com_itemid']) ? (int)$_GET['com_itemid'] : 0;
if ($com_itemid > 0) {
    $info = $info_handler->get($com_itemid);
    if ($info->getVar('title')) {
        $title = $info->getVar('title');
    } else {
        $title = '';
    }
    $com_replytitle = $title;
    include_once XOOPS_ROOT_PATH . '/include/comment_new.php';
}
