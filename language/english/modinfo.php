<?php
$mod_name = strtoupper ( basename( dirname(dirname (dirname( __FILE__ ))) ) );

define("_MI_{$mod_name}_NAME","DH-INFO");
define("_MI_{$mod_name}_DESC","Creating static content for your site.");
define("_MI_{$mod_name}_PRINTER","Printer Friendly Page");
define("_MI_{$mod_name}_BLOCK1","Menu Block");
define("_MI_{$mod_name}_BLOCK1_DESC", "Builds a navigation menu from content pages");
define("_MI_{$mod_name}_BLOCK2", "Content Block");
define("_MI_{$mod_name}_BLOCK2_DESC", "Builds a Block for a content pages");
define("_MI_{$mod_name}_CONF1","WYSIWYG - Editor");
define("_MI_{$mod_name}_CONF1_DESC","YES for Editor selection in the Form, NO for the default Editor");
define("_MI_{$mod_name}_CONF2","Show Link 'Create Page'");
define("_MI_{$mod_name}_CONF2_DESC","If you have create permission for hand, a link in the main menu to be displayed.");
define("_MI_{$mod_name}_CONF3","generate Printer friendly pages");
define("_MI_{$mod_name}_CONF3_DESC","These settings created on the sides Iconlink wherein then a printer friendly page called.");
define("_MI_{$mod_name}_CONF4","View last edit");
define("_MI_{$mod_name}_CONF4_DESC","");
define("_MI_{$mod_name}_CONF5","Display the blocks prevent writing");
define("_MI_{$mod_name}_CONF5_DESC","Settings of the left and right blocks when calling the submit.php");
define("_MI_{$mod_name}_TEMPL1", "Page Layout");
define("_MI_{$mod_name}_LASTD1","no Date");
define("_MI_{$mod_name}_LASTD2","short Date (=> ".formatTimestamp(time(),'s').")");
define("_MI_{$mod_name}_LASTD3","medium Date (=> ".formatTimestamp(time(),'m').")");
define("_MI_{$mod_name}_LASTD4","long Date (=> ".formatTimestamp(time(),'l').")");

//Added in 1.04
define("_MI_{$mod_name}_BLOCKADMIN","Blocksadmin");
define("_MI_{$mod_name}_ADMENU2","Category Management");
define("_MI_{$mod_name}_ADMENU3","Page Management");
define("_MI_{$mod_name}_ADMENU4","Permissions ");

//Added in 2.0
define("_MI_{$mod_name}_TOOLTIP","Tooltip");
define("_MI_{$mod_name}_CONF6","Show Navigation");
define("_MI_{$mod_name}_CONF6_DESC","");
define("_MI_{$mod_name}_CONF7","Show the page links in the Profile");
define("_MI_{$mod_name}_CONF7_DESC","YES to display page links in the Profile");
define("_MI_{$mod_name}_PAGESNAV","as Page number");
define("_MI_{$mod_name}_PAGESELECT","as selection");
define("_MI_{$mod_name}_PAGESIMG","as Image");
define("_MI_{$mod_name}_SENDEMAIL","Send per E-Mail");
define("_MI_{$mod_name}_ARTICLE","Interesting article on %s");
define("_MI_{$mod_name}_ARTFOUND","Here is an interesting article that I\'ve found on %s ");
define("_MI_{$mod_name}_GUEST","Guest writer");
define("_MI_{$mod_name}_FREIGABEART","Release Status");
define("_MI_{$mod_name}_FREIGABEART_YES","Publish");
define("_MI_{$mod_name}_FREIGABEART_NO","Offline");
define("_MI_{$mod_name}_ADMENU5","Waiting postings");
define("_MI_{$mod_name}_ADMENU6","Offline postings");
define("_MI_{$mod_name}_GESPERRT","[Offline]");
define("_MI_{$mod_name}_NOFRAMEOREDITOR","<div style='font-style:bold;color:red;'>Framework und/oder XoopsEditorPack nicht installiert!</div>");
define("_MI_{$mod_name}_NEW","NEW");
define("_MI_{$mod_name}_UPDATE","UPDATE");
define("_MI_{$mod_name}_CONF8","SEO-Optimization");
define("_MI_{$mod_name}_CONF8_DESC","Convert URL into SEO-friendly. You need to set mod_rewrite!");
define("_MI_{$mod_name}_CONF9","Module own links");
define("_MI_{$mod_name}_CONF9_DESC","if YES, external links are not visible");

//Added in 2.5
define("_MI_{$mod_name}_ADMENU_ABOUT","About");
define("_MI_{$mod_name}_INDEX","Index");
define("_MI_{$mod_name}_CREATESITE","Create Site");

//Added in 2.6
define("_MI_{$mod_name}_VIEWSITE","Show all pages in this category");
define("_MI_{$mod_name}_CONF_COLS","Number of columns of the Editor (min. 10)");
define("_MI_{$mod_name}_CONF_COLS_DESC","Is the column (height) of the Editor (no HTML editor)");
define("_MI_{$mod_name}_CONF_ROWS","are the rows of editor of (at least 10)");
define("_MI_{$mod_name}_CONF_ROWS_DESC","Returns the rows (width) of the Editor (no HTML editor)");
define("_MI_{$mod_name}_CONF_WIDTH","Wide HTML editor in percentage (10-100)");
define("_MI_{$mod_name}_CONF_WIDTH_DESC","legt die prozentuale Breite des Editors fest (nur für HTML-Editoren)");
define("_MI_{$mod_name}_CONF_HEIGHT","Height HTML editor in pixels (at least 100)");
define("_MI_{$mod_name}_CONF_HEIGHT_DESC","The height of the input field of the editor in pixels.");
define("_MI_{$mod_name}_ADMENU_HELP","Help");
define("_MI_{$mod_name}_NONE","Hide no blocks");
define("_MI_{$mod_name}_RECHTS","disabled right blocks");
define("_MI_{$mod_name}_LINKS","disabled left");
define("_MI_{$mod_name}_BEIDE","disabled right and left blocks");

//Added in 2.7
define("_MI_{$mod_name}_BREADCRUMBS","Breadcrumbs");
define("_MI_{$mod_name}_BREADCRUMBS_DESC","Please define, whether breadcrumbs should be shown on user side or not");
