<?php
$mod_name = strtoupper(basename(dirname(dirname(dirname(__FILE__)))));

define("_AM_{$mod_name}_ADMINTITLE", "Content");
define("_AM_{$mod_name}_SUBMENU", "Main Menu?");
define("_AM_{$mod_name}_ADDCONTENT", "Add page");
define("_AM_{$mod_name}_EDITCONTENT", "Save");
define("_AM_{$mod_name}_HOMEPAGE", "Categories");
define("_AM_{$mod_name}_POSITION", "Position");
define("_AM_{$mod_name}_LINKNAME", "Link Name");
define("_AM_{$mod_name}_EXTURL", "File or URL <br /><small>External URL has to begin with http:// !</small>");
define("_AM_{$mod_name}_STORYID", "ID");
define("_AM_{$mod_name}_VISIBLE", "Navi-Block?");
define("_AM_{$mod_name}_CONTENT", "Text");
define("_AM_{$mod_name}_URL", "Select File");
define("_AM_{$mod_name}_VISIBLE_GROUP", "Select Group visibility");
define("_AM_{$mod_name}_LINKID", "Weight");
define("_AM_{$mod_name}_ACTION", "Action");
define("_AM_{$mod_name}_EDIT", "Edit");
define("_AM_{$mod_name}_DELETE", "Delete");
define("_AM_{$mod_name}_UPLOAD", "Upload");
define("_AM_{$mod_name}_DISABLECOM", "Disable comments");
define("_AM_{$mod_name}_DBUPDATED", "Database Updated Successfully!");
define("_AM_{$mod_name}_ERRORINSERT", "Error while updating database!");
define("_AM_{$mod_name}_RUSUREDEL", "Are you sure you want to delete this content?");
define("_AM_{$mod_name}_DISABLEBREAKS", "Disable automatic Linebreak Conversion (Activate when using HTML)");
define("_AM_{$mod_name}_URLART", "Page Type");
define("_AM_{$mod_name}_URL_NORMAL", "Website");
define("_AM_{$mod_name}_URL_KATEGORIE", "Category Title");
define("_AM_{$mod_name}_URL_CAT", "Add Category");
define("_AM_{$mod_name}_URL_INTLINK", "New Link to " . XOOPS_URL . "/");
define("_AM_{$mod_name}_URL_EXTLINK", "External Link");
define("_AM_{$mod_name}_URL_INTDATEI", "Local File");
define("_AM_{$mod_name}_LISTBLOCKCAT", "List Categories");
define("_AM_{$mod_name}_ADDBLOCKCAT", "Add Category");
define("_AM_{$mod_name}_EDITBLOCKCAT", "Edit Category");
define("_AM_{$mod_name}_ERROR_NOBLOCKTITLE", "Block title required!");
define("_AM_{$mod_name}_ERROR_ISSETBLOCKTITLE", "Block title already exists!");
define("_AM_{$mod_name}_ERROR_NOINSERTDB", "Could not update Content!");
define("_AM_{$mod_name}_SETDELETE", "Are you sure you want to delete?");
define("_AM_{$mod_name}_SETDELETE_FRAGE", "Are you sure you want to delete this Category with all its pages:<br /><b>%s</b> ?");
define("_AM_{$mod_name}_SETDELETE_LIST", "This Category has <b>%s</b> Pages(s).");
define("_AM_{$mod_name}_DELFLUSH", "Delete canceled.");
define("_AM_{$mod_name}_ERROR_NODEFAULT", "Default-Category can\'t be deleted");
define("_AM_{$mod_name}_INFODELETE_FRAGE", "Delete this Page:<br /><b>%s</b><br /> ?");
define("_AM_{$mod_name}_ADMIN_URLINTERN", "Internal Link cannot start with <b>http://</b> !");
define("_AM_{$mod_name}_LAST_EDITED", "Last Edit");
define("_AM_{$mod_name}_LAST_EDITEDTEXT", "by <b>%s</b> on <b>%s</b>");

//Added in 1.04
define("_AM_{$mod_name}_FRONTPAGE", "Frontpage");
define("_AM_{$mod_name}_CLICK", "Clickable");
define("_AM_{$mod_name}_SELF", "open in new Window");

//Added in 1.05
define("_AM_{$mod_name}_HP_SEITE", "Module Homepage:");
define("_AM_{$mod_name}_HP_SEITE_NODEF", "none selected");
define("_AM_{$mod_name}_AM_GROUP", "Group");
define("_AM_{$mod_name}_URL_IFRAME", "Page with iFrame");
define("_AM_{$mod_name}_URL_INTERN", "URL of the Page<br />do not enter <b>" . XOOPS_URL . "</b> !<br>For " . XOOPS_URL . " add <b>/</b> only");
define("_AM_{$mod_name}_URL_EXTERN", "External URL<br />Has to start with http:// or https:// !");
define("_AM_{$mod_name}_URL_DATEI", "Path of File<br />Must start with <b>XOOPS_ROOT_PATH</b>!");
define("_AM_{$mod_name}_URL_FRAME", "URL of the Page<br />Has to start with http:// or https:// !");
define("_AM_{$mod_name}_URL_FRAME_HEIGHT", "Heigth from the iFrame<br />in Pixel !");
define("_AM_{$mod_name}_URL_FRAME_BORDER", "Border of the iFrame<br />in Pixel (0 -> no Border)!");
define("_AM_{$mod_name}_ADMIN_ERRURL", "URL has to begin with http:// or https:// !");

define("_AM_{$mod_name}_GOMOD", "Go to module");
define("_AM_{$mod_name}_ADMENU0", "Module Defaults");
define("_AM_{$mod_name}_ADMENU1", "Create/Edit content page");

//Added in 1.06
define("_AM_{$mod_name}_TITLESICHT", "Show title");
define("_AM_{$mod_name}_FOOTERSICHT", "Show footnote");
define("_AM_{$mod_name}_URL_FRAME_WIDTH", "Width of iFrame<br />in % (0 = 100%)");
define("_AM_{$mod_name}_URL_FRAME_ALIGN", "Align iFrame");

//Added in 2.0
define("_AM_{$mod_name}_PERMISSIONS", "Set Permission");
define("_AM_{$mod_name}_CANCREATE", "Add new page");
define("_AM_{$mod_name}_CANUPDATEALL", "Edit all info pages");
define("_AM_{$mod_name}_CANUPDATE", "Update page");
define("_AM_{$mod_name}_CANACCESS", "Publish page");
define("_AM_{$mod_name}_CANDELETE", "Delete page");
define("_AM_{$mod_name}_CANFREEALL", "Publish all pages");
define("_AM_{$mod_name}_CANUPDATE_CAT", "Select Category");
define("_AM_{$mod_name}_CANUPDATE_POSITION", "Select menu position");
define("_AM_{$mod_name}_CANUPDATE_GROUPS", "Update Groups");
define("_AM_{$mod_name}_CANUPDATE_SITEART", "Set Page options ");
define("_AM_{$mod_name}_ADMIN_ERRDATEI", "Selected file doesn\'t exist");
define("_AM_{$mod_name}_OWNER", "Author");
define("_AM_{$mod_name}_CANUPDATE_SITEFULL", "Publish now");
define("_AM_{$mod_name}_LINKVERSION", "Current Version");
define("_AM_{$mod_name}_VISIBLE_LEFTBLOCK", "Show left Blocks");
define("_AM_{$mod_name}_VISIBLE_RIGHTBLOCK", "Show right Blocks");
define("_AM_{$mod_name}_CANFREEPERM", "Set Permissions");

// Added in V 2.3
define("_AM_{$mod_name}_URL_PHP", "PHP-Code Info");

// Added in V 2.5
define("_AM_{$mod_name}_MODULEADMIN_MISSING", "ModuleAdmin is missing! You can not run.");
define("_AM_{$mod_name}_TOCKEN_MISSING", "Security tocken halt expired or incorrect. Action can not be executed.");
define("_AM_{$mod_name}_SITEUPDATE", "Update Settings");
define("_AM_{$mod_name}_INAKTIVE", "[disabled]");
define("_AM_{$mod_name}_NEWADDSITE", "new Site");
define("_AM_{$mod_name}_INFOBOX_CAT", "You have created <b>%s</b> categories.");
define("_AM_{$mod_name}_SITEDEL_HP", "Should the current Home <br /><b>%s</b><br /> be disabled?");
define("_AM_{$mod_name}_INFOBOX_SITE", "There are <b>%s</b> sites in these categories.");
define("_AM_{$mod_name}_INFODELETE_AENDERUNG", "If the change to the side <br /><br />%s discarded really?");
define("_AM_{$mod_name}_INFOBOX_WAITSITE", "It <b>%s </b> dirty pages waiting for processing.");
define("_AM_{$mod_name}_CANALLOWHTML", "use HTML");

//Added in Version 2.7
define("_AM_{$mod_name}_CANALLOWUPLOAD", "Can upload files");
define("_AM_{$mod_name}_UPLOAD", "upload file to " . XOOPS_URL . "/modules/" . basename(dirname(dirname(dirname(__FILE__)))) . "/files<br />max. Filesize: %s MB");
