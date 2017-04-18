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

include_once "header.php";

$info_id    = intval($para['id']);
$parent_id  = intval($para['pid']); 

$xoopsOption['template_main'] = $module_name.'_index.html';
include_once $GLOBALS['xoops']->path( '/header.php' );
Info_Load_CSS();

if ($info_id > 0) {
  $info = $info_handler->get($info_id);  
  if (is_object($info) && $info->getVar('info_id') == $info_id) {
    if ($info->getVar('link') == 3) {  // Kategorie
      $criteria = new CriteriaCompo();
      $criteria->add(new Criteria('parent_id', $info_id));
      $criteria->add(new Criteria("st", 1));
      $criteria->setSort('blockid');
      $criteria->setOrder('DESC');
      $liste = $info_handler->getAll($criteria, array('info_id', 'parent_id', 'cat', 'visible_group', 'title'), false, false);
      $row_ist = NULL;
      if (is_array($liste) && count($liste) > 0) {
        $list_count = count($liste) - 1;
        while ($list_count > -1) {
          $row = $liste[$list_count];
          if ($info_handler->checkpermsite($row['info_id'], $infothisgroups)) {
            $list_count = 0;
            $row_ist = $row;
          }
          $list_count--;
          unset($row);
        }
        if (is_array($row_ist) && count($row_ist) > 0) {
          $mode=array("seo"=>$seo, "id"=>$row_ist['info_id'], "title"=>$row_ist['title'], "dir"=>$module_name, "cat"=>$row_ist['cat']);
          //header("HTTP/1.1 301 Moved Permanently");	
          header("Location: " . makeSeoUrl($mode));
          exit();
        } else {
          redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
        }
      } else {
        redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
      }      
      
    } 
  } else {
    redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
  }
  
} else {    

  $row_ist = NULL;
  if ($parent_id > 0) {
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('parent_id', $parent_id));
    $criteria->add(new Criteria("st", 1));
    $criteria->setSort('blockid');
    $criteria->setOrder('DESC');
  } else {
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('frontpage', 1));
    $criteria->setOrder('DESC');
    $criteria->setLimit(1);
  }
  $liste = $info_handler->getAll($criteria, array('info_id', 'parent_id', 'cat', 'visible_group', 'title'), false, false);
 
  if (is_array($liste) && count($liste) > 0) {
    $list_count = count($liste) - 1; 
    while ($list_count > -1) {
      $row = $liste[$list_count];
      if ($info_handler->checkpermsite($row['info_id'], $infothisgroups)) {
        $list_count = 0;
        $row_ist = $row;
      }
      $list_count--;
      unset($row);
    }
    if (is_array($row_ist) && count($row_ist) > 0) {
      $mode=array("seo"=>$seo, "id"=>$row_ist['info_id'], "title"=>$row_ist['title'], "dir"=>$module_name, "cat"=>$row_ist['cat']);
      //header("HTTP/1.1 301 Moved Permanently");	
      header("Location: " . makeSeoUrl($mode));
      exit();
    } else {
      redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
    }
  } else {
    if ($parent_id < 1) {
      $criteria = new CriteriaCompo();      
      //$criteria->add(new Criteria('parent_id', $parent_id));
      $criteria->add(new Criteria("st", 1));
      $crit2 = new CriteriaCompo();
      $crit2->add(new Criteria("submenu", 1));
      $crit2->add(new Criteria("visible", 1));
      $criteria->add($crit2, "OR");
      $criteria->setSort('cat,blockid');
      $criteria->setOrder('ASC');
      $liste = $info_handler->getAll($criteria, array('info_id', 'parent_id', 'cat', 'visible_group', 'title'), false, false);
      if (is_array($liste) && count($liste) > 0) {
        $list_count = count($liste);
        $i = 0;
        while ($i < $list_count) {
          $row = $liste[$i];          
          if ($info_handler->checkpermsite($row['info_id'], $infothisgroups)) {
            $list_count = 0;
            $row_ist = $row;
          }
          $i++;
          unset($row);
        }
        if (is_array($row_ist) && count($row_ist) > 0) {
          $mode=array("seo"=>$seo, "id"=>$row_ist['info_id'], "title"=>$row_ist['title'], "dir"=>$module_name, "cat"=>$row_ist['cat']);
          //header("HTTP/1.1 301 Moved Permanently");	
          header("Location: " . makeSeoUrl($mode));
          exit();
        } else {
          redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
        }
      } else {
        redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
      }
    } else {
      redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
    }
  } 
}

if ($info_id < 1 || ($info->getVar('visible') == 0 && $info->getVar('submenu') == 0)) {
	redirect_header(XOOPS_URL, 3, constant('_MA_'.$lang_name.'_FILENOTFOUND'));
}  

$info->setVar('visible', $info_handler->checkpermsite($info_id, $infothisgroups));
if ($info->getVar('st') != 1) $info->setVar('visible', 0);

if ($info->getVar('visible') == 0) {
  redirect_header(XOOPS_URL."/", 3, _NOPERM);
}

if ($info->getVar('bl_right') == 0) {
  $xoopsTpl->assign( 'xoops_showrblock', 0);
  $xoopsTpl->assign( 'xoops_rblocks', 0);
}
if ($info->getVar('bl_left') == 0) {
  $xoopsTpl->assign( 'xoops_showlblock', 0);
  $xoopsTpl->assign( 'xoops_lblocks', 0);
}

$xoopsTpl->assign('footersicht', $info->getVar('footer_sicht'));
$xoopsTpl->assign('pathIcon', $pathIcon);
if ($info->getVar('title_sicht') == 1) $xoopsTpl->assign('title', $info->getVar('title'));
$xoTheme->addMeta('meta', 'pagemodule', 'http://www.simple-xoops.de');

$infoperm_handler = xoops_gethandler('groupperm');
$show_info_perm = $infoperm_handler->getItemIds('InfoPerm', $infothisgroups, $xoopsModule->getVar('mid'));
$canedit = false;
if (in_array(constant('_CON_' . $lang_name . '_CANUPDATEALL'),$show_info_perm)) {
  $canedit = true;
} elseif (in_array(constant('_CON_' . $lang_name . '_CANUPDATE'),$show_info_perm)) {
  if ($xoopsUser) {
    if ($info->getVar('owner') == $xoopsUser->getVar('uid')) {
      $canedit = true;
		}
  } elseif (intval($owner) == 0) {
		//$canedit = true;
  }
}
$xoopsTpl->assign('info_contedit',$canedit);
$candelete = false;
if (in_array(constant('_CON_' . $lang_name . '_CANUPDATE_DELETE'),$show_info_perm)) {
    $candelete = true;
}
$xoopsTpl->assign('info_contdel',$candelete);
if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_last'] > 1) {
    $xoopsTpl->assign('last', constant('_MA_'.$lang_name.'_LAST_UPDATE'));    
    if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_last']==4) $xoopsTpl->assign('last_update', formatTimestamp($info->getVar('edited_time'),'l'));
    if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_last']==3) $xoopsTpl->assign('last_update', formatTimestamp($info->getVar('edited_time'),'m'));
    if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_last']==2) $xoopsTpl->assign('last_update', formatTimestamp($info->getVar('edited_time'),'s'));
}	
$xoopsTpl->assign('modules_url', XOOPS_URL . '/modules/'.$module_name);

$content="";
if ($info->getVar('address') != "" && $info->getVar('link') == 1) { 

  // interner Link
  $content = $info->getVar('address');
  if (substr($content,0,1) == "/" ) $content = substr($content,1);
  header("Location: ".XOOPS_URL."/".$content);
  exit();
  
} elseif ($info->getVar('address') != "" && $info->getVar('link') == 2) { 
  //externer Link
  $allowed_links = array('HTTPS', 'HTTP', 'FTPS', 'FTP');
  $soll_links = explode("://", $info->getVar('address'), 2);
  $soll_links = strtoupper($soll_links[0]);
  if (in_array($soll_links, $allowed_links)) {
    if ($info->getVar('self') == 1) {            
      $content ='<script type="text/javascript">';
      $content.='window.open("'.$info->getVar('address').'");';
      $content.='</script>';
      $content.='<br /><br /><center>';
      $content.= sprintf(constant("_MA_". $module_name . "_EXTERNLINK"),$info->getVar('address'));
      $content.='</center><br /><br />';
      $xoopsTpl->assign('content', $content);
      $xoopsTpl->assign('xoops_module_header', '<meta http-equiv="refresh" content="5; url=' . XOOPS_URL . '" />');
    } else {
      header("Location: ".$info->getVar('address'));
      exit();
    }
  } else {
    redirect_header(XOOPS_URL, 3, _NOPERM);
  }
    
} elseif ($info->getVar('address') != "" && $info->getVar('link') == 4) { 

  //Datei oder Seite einbinden
  $content = $info->getVar('address');
  if (substr($content,0,1) == "/" ) $content = substr($content,1);
  $includeContent = XOOPS_ROOT_PATH . "/" . $content;
  $content = '';
  if (file_exists($includeContent)) {
    $extension = pathinfo($includeContent, PATHINFO_EXTENSION);
    $allowed = include_once("include/mimes.php");
    $iframe = $info->getVar('frame');
    if (!isset($iframe['width']) || $iframe['width']<1 || $iframe['width']>100) $iframe['width'] = 100;
    if (isset($allowed[$extension])) {
      $content = '<object data="' . $includeContent .'" type="' . $allowed[$extension] . '" width="' . $iframe['width'] .'%" height="' . $iframe['height'] . '">Plugin Not installed!</object>';
    } elseif ( substr($extension,0,3) == "php" || $extension == "phtml") {
      $content="<div align='center'>";
      $content.="<iframe width='".$iframe['width']."%' height='".$iframe['height']."' name='".$title."' scrolling='auto' frameborder='".$iframe['border']."' src='".$includeContent."'></iframe>";
      $content.="</div>";
    } else {
      $content = constant("_MA_" . $module_name . "_NOEXTENSION");
    }
  } else {
    $content = constant("_MA_" . $module_name . "_FILENOTFOUND");
  }
  $xoopsTpl->assign('content', $content);  
  
} elseif ($info->getVar('address')!="" && $info->getVar('link') ==5) { 

  //Iframe
  $iframe = $info->getVar('frame');
  if (!isset($iframe['width']) || $iframe['width']<1 || $iframe['width']>100) $iframe['width'] = 100;
  $content="<nav><div align='".$iframe['align']."'>";
  $content.="<iframe src='".$info->getVar('address')."' width='".$iframe['width']."%' height='".$iframe['height']."px' name='".$info->getVar('title')."' scrolling='auto' frameborder='".$iframe['border']."'></iframe>";
  $content.="</div></nav>";
  $xoopsTpl->assign('content', $content);   
  
} else {

  // alles andere ?
  $html 	  = ($info->getVar('nohtml') == 1) ? 0 : 1;      
  $br 	    = ($html == 1) ? 0 : 1;
  $smiley   = ($info->getVar('nosmiley') == 1) ? 0 : 1;
  $text     = $info->getVar('content');
        
  if ($info->getVar('link') == 6) {
    ob_start();
      echo eval($text);
      $text = ob_get_contents();
    ob_end_clean();
    $nohtml = 0; 
    $text = $myts->displayTarea($text, $html, $smiley, 1, 1, $br);
  }     
        
  $text 	= str_replace('{X_XOOPSURL}', XOOPS_URL.'/', $text);
  if (is_object($xoopsUser)) {
    $text = str_replace('{X_XOOPSUSER}', $xoopsUser->getVar('uname'), $text);
    $text = str_replace('{X_XOOPSUSERID}', $xoopsUser->getVar('uid'), $text);
  } else {
    $text = str_replace('{X_XOOPSUSER}',_GUESTS, $text);
    $text = str_replace('{X_XOOPSUSERID}', '0', $text);
  }
  $text = str_replace('{X_SITEURL}', XOOPS_URL . '/', $text);      
    
  if ( trim($text) != '' ) {
    $text = str_replace('<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>','[pagebreak]',$text);
    $text = str_replace('<div style="page-break-after: always;"><span style="display: none;"> </span></div>','[pagebreak]',$text);
    $text = str_replace('<div style="page-break-after: always;"><span style="display: none;"></span></div>','[pagebreak]',$text);
    $text = $myts->displayTarea($text,$html,$smiley,1,1,$br);
    $infotext = explode("[pagebreak]", $text);
    $info_pages = count($infotext);
    if ($info_pages > 1) {
      include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
      $pagenav = new XoopsPageNav($info_pages, 1, $infopage, 'page', 'content='.$info_id);
      if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_shownavi'] == 2) 
        $xoopsTpl->assign('pagenav', $pagenav->renderSelect());
      elseif ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_shownavi'] == 3) 
        $xoopsTpl->assign('pagenav', $pagenav->renderImageNav());
      else
        $xoopsTpl->assign('pagenav', $pagenav->renderNav());
      $text = $infotext[$infopage];
    } 
  }
  $xoopsTpl->assign('page', $infopage);
  $xoopsTpl->assign('content', $text);          
}

if ( $xoopsModuleConfig['com_rule'] != 0 ) {
  $xoopsTpl->assign('viewcomments', ($info->getVar('nocomments') > 0 ? 0:1) );  
  include_once $GLOBALS['xoops']->path('include/comment_view.php');
  $xoopsTpl->assign(array(
        'editcomment_link'   => XOOPS_URL.'/modules/'.$module_name . '/include/comment_edit.php?com_itemid=' . $com_itemid . '&amp;com_order=' . $com_order . '&amp;com_mode=' . $com_mode . $link_extra,
        'deletecomment_link' => XOOPS_URL.'/modules/'.$module_name . '/include/comment_delete.php?com_itemid=' . $com_itemid . '&amp;com_order=' . $com_order . '&amp;com_mode=' . $com_mode . $link_extra,
        'replycomment_link'  => XOOPS_URL.'/modules/'.$module_name . '/include/comment_reply.php?com_itemid=' . $com_itemid . '&amp;com_order=' . $com_order . '&amp;com_mode=' . $com_mode . $link_extra
  ));
  $xoopsTpl->_tpl_vars['commentsnav'] = str_replace("self.location.href='", "self.location.href='" . XOOPS_URL.'/modules/'.$module_name . '/include/', $xoopsTpl->_tpl_vars['commentsnav']);

}

$xoopsTpl->assign('id', $info_id);
$xoopsTpl->assign('info_add',_ADD);
$xoopsTpl->assign('info_edit',_EDIT);
$xoopsTpl->assign('info_delete',_DELETE);
$mode=array("seo"=>$seo,"id"=>$info_id,"title"=>$info->getVar('title'),"dir"=>$xoopsModule->dirname(),"cat"=>$info->getVar('cat'));
$mail_link= 'mailto:?subject='.sprintf(constant('_MI_'.$lang_name.'_ARTICLE'),$xoopsConfig['sitename']).'&amp;body='.sprintf(constant('_MI_'.$lang_name.'_ARTFOUND'), $xoopsConfig['sitename']).': ' . makeSeoUrl($mode);
$xoopsTpl->assign('email_link',$mail_link); 
$xoopsTpl->assign('info_totop',constant('_MA_'.$lang_name.'_TOTOP'));
$xoopsTpl->assign('info_cat',$info->getVar('cat'));
$xoopsTpl->assign('xoops_pagetitle',$xoopsModule->getVar('name')." - ".strip_tags($info->getVar('title'))); 
if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_printer'] == 1) $xoopsTpl->assign('print', 1);
$xoopsTpl->assign('print_title', constant('_MI_'.$lang_name.'_PRINTER'));
$xoopsTpl->assign('email_title', constant('_MI_'.$lang_name.'_SENDEMAIL'));

// Breadcrumbs
if ($xoopsModuleConfig[$xoopsModule->getVar('dirname').'_breadcrumbs'] == 1) {
  $xoBreadcrumbs = array();  
  $xoList = array_reverse($info_tree->getAllParentTitle($info_id), true);
  foreach ($xoList as $i => $t) {
    if ($i == $info_id) continue;
    $mode=array("seo"=>$seo,"id"=>$i,"title"=>$t,"dir"=>$xoopsModule->dirname(),"cat"=>$info->getVar('cat'));
    $xoBreadcrumbs[] = array('title' => strip_tags($t), 'link' => makeSeoUrl($mode));
  }
  $xoBreadcrumbs[] = array('title' => strip_tags($info->getVar('title')));    
  $GLOBALS['xoopsTpl']->assign('breadcrumbs', 1);
  $GLOBALS['xoopsTpl']->assign('xoBreadcrumbs', $xoBreadcrumbs);
}

include_once $GLOBALS['xoops']->path( '/footer.php' );
?>