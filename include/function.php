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
//  @package function.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id $

if( ! defined( 'XOOPS_ROOT_PATH' ) )  die("XOOPS_ROOT_PATH not defined!");

$module_name = basename(dirname(dirname(__FILE__))) ;

if (!function_exists("Info_Load_CSS")) {
  function Info_Load_CSS() { 
    global $xoopsConfig, $xoTheme;
    $module_name = basename(dirname(dirname(__FILE__))) ;
    if( ! defined( strtoupper($module_name) . '_CSS_LOADED' ) ) {
            
      $theme_path 	= "/" . $xoopsConfig['theme_set'] . "/modules/" . $module_name;
      $default_path 	= "/modules/" . $module_name . "/templates";

      //Themepfad
      $rel_path = "";
      if (file_exists( $GLOBALS['xoops']->path( $theme_path . '/style.css'))) {
        $rel_path = XOOPS_URL . $theme_path . '/style.css';
      //default
      } else {
        $rel_path = XOOPS_URL . $default_path . '/style.css';
      }
      if ($rel_path != '') {
        $xoTheme->addStylesheet($rel_path); 
      }
      define( strtoupper($module_name) . '_CSS_LOADED' , 1);
    }
  }
}

if (!function_exists("InfoTableExists")) {
    function InfoTableExists($tablename) {
      global $xoopsDB;
      $result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
      $ret = ($xoopsDB->getRowsNum($result) > 0) ? true : false;
      return $ret;
    }
}

if (!function_exists("InfoColumnExists")) {
    function InfoColumnExists($tablename,$spalte) {
      global $xoopsDB;
      if ($tablename=="" || $spalte=="") return true; // Fehler!!
      $result=$xoopsDB->queryF("SHOW COLUMNS FROM ". $tablename ." LIKE '".$spalte."'");
		  $ret = ($xoopsDB->getRowsNum($result) > 0) ? true : false;
      return $ret;
    }
}

if (!function_exists("setPost")) {
  
	function setPost(XoopsObject $xc) {
    
    if (!is_object($xc)) return false;    
    $xc->cleanVars();
    
    foreach (array( 'parent_id', 'old_id', 'cat', 'st', 'owner', 'blockid', 'frontpage', 'visible', 'nohtml', 'nobreaks', 'nosmiley', 'nocomments', 'link', 'click', 
                    'edited_time', 'edited_user', 'self', 'title_sicht', 'footer_sicht', 'submenu', 'bl_left', 'br_right' ) as $getint) {
      ${$getint} = XoopsRequest::getInt($getint, 0, 'POST');      
      $xc->setVar($getint, ${$getint});
    }
    foreach (array('address', 'ttip', 'title', 'tags') as $getstring) {
      ${$getstring} = XoopsRequest::getString($getstring, '', 'POST');
      $xc->setVar($getstring, ${$getstring});
    }
    foreach (array('content') as $gettext) {
      ${$gettext} = XoopsRequest::getText($gettext, '', 'POST');
      $xc->setVar($gettext, ${$gettext});
    }    
    foreach (array('visible_group') as $getarray) {      
      ${$getarray} = implode(",", XoopsRequest::getArray($getarray, array(''), 'POST'));
      $xc->setVar($getarray, ${$getarray});
    }
    
    $iframe = array('height'=>'250','border'=>'0','width'=>'100','align'=>'center');
    foreach (array( 'height', 'border', 'width', 'align') as $getframe) {
      ${$getframe} = XoopsRequest::getString($getframe, '0', 'POST');
      $iframe[$getframe] = ${$getframe};
    }
    $xc->setVar('frame', $iframe);    

    $xc->setVar('edited_time',time());
		if (is_object($GLOBALS['xoopsUser'])) {
			$xc->setVar('edited_user',$GLOBALS['xoopsUser']->uid());
		} else {
			$xc->setVar('edited_user','0');
		}
    return $xc;    
	}
}

if (!function_exists("clearInfoCache")) {
	function clearInfoCache($name = "", $dirname = null, $root_path = XOOPS_CACHE_PATH)
	{
		if (empty($dirname)) {
			$pattern = ($dirname) ? "{$dirname}_{$name}.*\.php" : "[^_]+_{$name}.*\.php";
			if ($handle = opendir($root_path)) {
				while (false !== ($file = readdir($handle))) {
					if (is_file($root_path . '/' . $file) && preg_match("/{$pattern}$/", $file)) {
						@unlink($root_path . '/' . $file);
					}
				}
				closedir($handle);
			}
		} else {
			$files = (array) glob($root_path . "/*{$dirname}_{$name}*.php");
			foreach ($files as $file) {
				@unlink($file);
			}
		}
		return true;
	}
}

if (!function_exists("makeSeoUrl")) {
	function makeSeoUrl($mod = null)
	{
		$search = array ("ä","Ä","ö","Ö","ü","Ü","ß"," ");
    $replace = array("ae","Ae","oe","Oe","ue","Ue","ss","_");
    $mod["title"] = str_replace ($search, $replace, utf8_decode($mod["title"]));
	
    if ($mod["seo"] == 1) {
      $content = XOOPS_URL . "/modules/" . $mod["dir"] . "/" . $mod["id"] . "-" . urlencode($mod["title"]) . ".html";
    } elseif ($mod["seo"] == 2) {
      $content = XOOPS_URL . "/modules/" . $mod["dir"] . "/" . "?" . $mod["id"] . "-" . urlencode($mod["title"]) . ".html";
    } elseif ($mod["seo"] == 3) {
      $content = XOOPS_URL . "/" . $mod["dir"] . "-" . $mod["id"] . "-" . urlencode($mod["title"]) . ".html";
    } else {
      if (substr($mod["cat"],0,1) == "p") {
        $content = XOOPS_URL . "/modules/" . $mod["dir"] . "/index.php?pid=" . $mod["id"];
      } else {
        $content = XOOPS_URL . "/modules/" . $mod["dir"]. "/index.php?content=" . $mod["id"];
      }
    }
    return $content;
	}
}

if (!function_exists("readSeoUrl")) {
	function readSeoUrl($get, $seo = 0)
	{
		$para=array("id"=>0,"pid"=>0); 
    if ($seo == 2) {
      if ($_SERVER["QUERY_STRING"] != "") {
        $query = explode("-", $_SERVER["QUERY_STRING"], 2);
        if (substr($query[0],0,1) == "p") {
          $query  = substr($query[0],1);
          $para["pid"] = intval($query[0]);		   
        } elseif (substr($query[0],0,8)=="content=") {
          $para["id"] = intval($get["content"]);
        } else {
          $para["id"] = intval($query[0]);
        }
      } 
    } else {
      if (!empty($get["content"])) {
        $para["id"] = intval($get["content"]);
      } elseif (!empty($get["pid"])) {
        $para["pid"] = intval($get["pid"]);
      } 
    }
    return $para;
	}
}

?>