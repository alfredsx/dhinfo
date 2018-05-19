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
//  @package seo_plugin.php
//  @author Dirk Herrmann <alfred@simple-xoops.de>
//  @version $Id$

if(!defined('XOOPS_ROOT_PATH')) die("");
include_once dirname(__FILE__)."/include/function.php";

// SEO-URL generate
if (!function_exists("seo_plugin_".$module_name."_make")) {
eval (' 
  function seo_plugin_'.$module_name.'_make($mod) {
    if (!is_array($mod) || count($mod)<1) return "";
	$search = array ("ä","Ä","ö","Ö","ü","Ü","ß"," ");
    $replace = array("ae","Ae","oe","Oe","ue","Ue","ss","_");
	$mod["title"] = str_replace ($search, $replace, utf8_decode($mod["title"]));
	
    if ($mod["seo"]==1)
	  $content = XOOPS_URL."/modules/".$mod["dir"]."/".$mod["cat"].":".$mod["id"]."-".urlencode($mod["title"]).".html";
    elseif ($mod["seo"]==2)
	  $content = XOOPS_URL."/modules/".$mod["dir"]."/"."?".$mod["cat"].":".$mod["id"]."-".urlencode($mod["title"]).".html";
    elseif ($mod["seo"]==3)
	  $content = XOOPS_URL."/".$mod["dir"]."-".$mod["cat"].":".$mod["id"]."-".urlencode($mod["title"]).".html";
    else {
	 if (substr($mod["cat"],0,1) == "p") {
	   $content = XOOPS_URL."/modules/".$mod["dir"]."/index.php?pid=".$mod["id"];
	 } else {
	   $content = XOOPS_URL."/modules/".$mod["dir"]."/index.php?content=".$mod["cat"].":".$mod["id"];
	 }
   }
   return $content;
 }
 ');
}
 
// SEO-URL read parameters
if (!function_exists("read_".$module_name."_para")) {
eval ('
  function read_'.$module_name.'_para($get,$seo=0) {
    $para=array("id"=>0,"cid"=>0,"pid"=>0);
    if ($seo==2) {
      if ($_SERVER["QUERY_STRING"]!="") {
	    $query = explode("-",$_SERVER["QUERY_STRING"],2);
		if (substr($query[0],0,1)=="p") {
		   $query  = substr($query[0],1);
		   $query = explode(":",$query);
		   $para["pid"] = intval($query[1]);		   
		} elseif (substr($query[0],0,8)=="content=") {
		   $id = explode(":",$get["content"]);
	       if (count($id)==2) {
	         $para["id"] = intval($id[1]);
		     $para["cid"] = intval($id[0]);
	       } else {
		     $para["id"] = intval($id[0]);
		   }
		} else {
		   $id = explode(":",$query[0]);
	       if (count($id)==2) {
	         $para["id"] = intval($id[1]);
		     $para["cid"] = intval($id[0]);
	       }
		}
	 } 
   } else {
     if (!empty($get["content"])) {
	   $id = explode(":",$get["content"]);
	   if (count($id)==2) {
	     $para["id"] = intval($id[1]);
		 $para["cid"] = intval($id[0]);
	   } else {
		 $para["id"] = intval($id[0]);
	   }
	 } elseif (!empty($get["pid"])) {
	     $para["pid"] = intval($get["pid"]);
	 } 
   }
   return $para;
 }
 ');
}
?>