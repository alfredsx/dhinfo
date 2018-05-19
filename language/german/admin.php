<?php
$mod_name = strtoupper ( basename( dirname(dirname (dirname( __FILE__ ))) ) );

define("_AM_{$mod_name}_ADMINTITLE","Informationen");
define("_AM_{$mod_name}_SUBMENU","Hauptmenü?");
define("_AM_{$mod_name}_ADDCONTENT","Seite hinzufügen");
define("_AM_{$mod_name}_EDITCONTENT","Seite speichern");
define("_AM_{$mod_name}_HOMEPAGE","Kategorie");
define("_AM_{$mod_name}_POSITION","Position");
define("_AM_{$mod_name}_LINKNAME","Linkname");
define("_AM_{$mod_name}_EXTURL","Datei oder URL <br /><small>bei externer URL mit http:// beginnen</small>");
define("_AM_{$mod_name}_STORYID","ID");
define("_AM_{$mod_name}_VISIBLE","Naviblock?");
define("_AM_{$mod_name}_CONTENT","Text");
define("_AM_{$mod_name}_URL","Datei auswählen");
define("_AM_{$mod_name}_UPLOAD","Hochladen");
define("_AM_{$mod_name}_VISIBLE_GROUP","sichtbar für Gruppe");
define("_AM_{$mod_name}_LINKID","Reihenfolge");
define("_AM_{$mod_name}_ACTION","Aktion");
define("_AM_{$mod_name}_EDIT","Ändern");
define("_AM_{$mod_name}_DELETE","Löschen");
define("_AM_{$mod_name}_DISABLECOM","Kommentare deaktivieren");
define("_AM_{$mod_name}_DBUPDATED","Datenbank erfolgreich aktualisiert!");
define("_AM_{$mod_name}_ERRORINSERT","Fehler beim Aktualisieren der Datenbank!");
define("_AM_{$mod_name}_RUSUREDEL","Diesen Content wirklich löschen?");
define("_AM_{$mod_name}_DISABLEBREAKS","automatischen Zeilenumbruch deaktivieren (Wichtig bei HTML-Code!)");
define("_AM_{$mod_name}_URLART","Art der angezeigten Seite");
define("_AM_{$mod_name}_URL_NORMAL","normale Seite");
define("_AM_{$mod_name}_URL_KATEGORIE","Kategorietitel");
define("_AM_{$mod_name}_URL_CAT","Kategorie erstellen");
define("_AM_{$mod_name}_URL_INTLINK","Link unter " . XOOPS_URL . "/");
define("_AM_{$mod_name}_URL_EXTLINK","externen Link öffnen");
define("_AM_{$mod_name}_URL_INTDATEI","lokale Datei einbinden");
define("_AM_{$mod_name}_LISTBLOCKCAT","Kategorie bearbeiten");
define("_AM_{$mod_name}_ADDBLOCKCAT","Kategorie hinzufügen");
define("_AM_{$mod_name}_EDITBLOCKCAT","Kategorie bearbeiten");
define("_AM_{$mod_name}_ERROR_NOBLOCKTITLE","Kein Kategorietitel angegeben!");
define("_AM_{$mod_name}_ERROR_ISSETBLOCKTITLE","Kategorietitel ist schon vorhanden!");
define("_AM_{$mod_name}_ERROR_NOINSERTDB","Datensatz konnte nicht eingetragen werden!");
define("_AM_{$mod_name}_SETDELETE","Löschen bestätigen");
define("_AM_{$mod_name}_SETDELETE_FRAGE","Soll die Kategorie<br /><b>%s</b><br /> mit allen dazugehörigen Seiten wirklich gelöscht werden ?");
define("_AM_{$mod_name}_SETDELETE_LIST","In dieser Kategorie befinden sich <b>%s</b> dazugehörige Seiten.");
define("_AM_{$mod_name}_DELFLUSH","Löschen abgebrochen");
define("_AM_{$mod_name}_ERROR_NODEFAULT","Default-Kategorie kann nicht gelöscht werden");
define("_AM_{$mod_name}_INFODELETE_FRAGE","Soll die Seite<br /><b>%s</b><br /> wirklich gelöscht werden ?");
define("_AM_{$mod_name}_ADMIN_URLINTERN","Interne Links dürfen nicht mit <b>http://</b> beginnen!");
define("_AM_{$mod_name}_LAST_EDITED","letzte Änderung");
define("_AM_{$mod_name}_LAST_EDITEDTEXT","von <b>%s</b> am <b>%s</b>");

//Added in 1.04
define("_AM_{$mod_name}_FRONTPAGE","Startseite");
define("_AM_{$mod_name}_CLICK","Anklickbar");
define("_AM_{$mod_name}_SELF","im neuen Fenster öffnen");

//Added in 1.05
define("_AM_{$mod_name}_HP_SEITE","Startseite des Moduls:");
define("_AM_{$mod_name}_HP_SEITE_NODEF","keine definiert");
define("_AM_{$mod_name}_AM_GROUP","Gruppe");
define("_AM_{$mod_name}_URL_IFRAME","Seite mit IFRAME einbinden");
define("_AM_{$mod_name}_URL_INTERN","URL der Seite<br />Angabe ohne <b>" . XOOPS_URL . "</b> !<br>Für " . XOOPS_URL . " tragen Sie nur <b>/</b> ein");
define("_AM_{$mod_name}_URL_EXTERN","URL der Seite<br />Angabe muss mit http:// oder https:// beginnen !");
define("_AM_{$mod_name}_URL_DATEI","Pfad der Datei<br />Angabe ausgehend von XOOPS_ROOT_PATH</b> !");
define("_AM_{$mod_name}_URL_FRAME","Url der Seite<br />Angabe muss mit http:// oder https:// beginnen !");
define("_AM_{$mod_name}_URL_FRAME_HEIGHT","Höhe des Frames<br />Angabe in Pixel !");
define("_AM_{$mod_name}_URL_FRAME_BORDER","Rahmen um den Frame<br />Angabe in Pixel (0 -> keiner)!");
define("_AM_{$mod_name}_ADMIN_ERRURL","URL muss mit http:// oder https:// beginnen!");
define("_AM_{$mod_name}_GOMOD","Gehe zum Modul");
define("_AM_{$mod_name}_ADMENU0","Modulvoreinstellung");
define("_AM_{$mod_name}_ADMENU1","Seite bearbeiten/erstellen");

//Added in 1.06
define("_AM_{$mod_name}_TITLESICHT","Titelüberschrift zeigen");
define("_AM_{$mod_name}_FOOTERSICHT","Fusszeile zeigen");
define("_AM_{$mod_name}_URL_FRAME_WIDTH","Breite des IFRAME<br />Angabe in Prozent (0 = 100%)");
define("_AM_{$mod_name}_URL_FRAME_ALIGN","Ausrichtung des IFRAME");

//Added in 2.0
define("_AM_{$mod_name}_PERMISSIONS","Zugriffsrechte setzen");
define("_AM_{$mod_name}_CANCREATE","Seite erstellen");
define("_AM_{$mod_name}_CANUPDATEALL","alle Seiten bearbeiten");
define("_AM_{$mod_name}_CANUPDATE","eigene Seite bearbeiten");
define("_AM_{$mod_name}_CANACCESS","alle Seite freigeben");
define("_AM_{$mod_name}_CANDELETE","Seiten löschen");
define("_AM_{$mod_name}_CANFREEALL","Seiten freigeben");
define("_AM_{$mod_name}_CANUPDATE_CAT","Kategorie wählen");
define("_AM_{$mod_name}_CANUPDATE_POSITION","Menüposition wählen");
define("_AM_{$mod_name}_CANUPDATE_GROUPS","Ansichtberechtigung setzen");
define("_AM_{$mod_name}_CANUPDATE_SITEART","Seitenart setzen");
define("_AM_{$mod_name}_ADMIN_ERRDATEI","angegebene Datei ist nicht vorhanden");
define("_AM_{$mod_name}_OWNER","Ersteller");
define("_AM_{$mod_name}_CANUPDATE_SITEFULL","sofortige Freigabe");
define("_AM_{$mod_name}_LINKVERSION","derzeitige Version");
define("_AM_{$mod_name}_VISIBLE_LEFTBLOCK","linke Blöcke anzeigen");
define("_AM_{$mod_name}_VISIBLE_RIGHTBLOCK","rechte Blöcke anzeigen");
define("_AM_{$mod_name}_CANFREEPERM","Zugriffsrechte setzen");

// Added in V 2.3
define("_AM_{$mod_name}_URL_PHP","PHP-Code Seite");

// Added in V 2.5
define("_AM_{$mod_name}_MODULEADMIN_MISSING","ModuleAdmin fehlt! Kann nicht ausgeführt werden.");
define("_AM_{$mod_name}_TOCKEN_MISSING","Sicherheitstocken abgelaufen oder fehlerhaft. Aktion kann nicht ausgeführt werden.");
define("_AM_{$mod_name}_SITEUPDATE","Einstellungen updaten");
define("_AM_{$mod_name}_INAKTIVE","[deaktiviert]");
define("_AM_{$mod_name}_NEWADDSITE","Neuanlage der Seite");
define("_AM_{$mod_name}_INFOBOX_CAT","Sie haben <b>%s</b> Kategorien angelegt.");
define("_AM_{$mod_name}_SITEDEL_HP","Soll die derzeitige Startseite <br /><b>%s</b><br />deaktiviert werden?");
define("_AM_{$mod_name}_INFOBOX_SITE","Es befinden sich <b>%s</b> Seiten in diesen Kategorien.");
define("_AM_{$mod_name}_INFODELETE_AENDERUNG","Soll die Änderung an der Seite<br />%s<br />wirklich verworfen werden?");
define("_AM_{$mod_name}_INFOBOX_WAITSITE","Es warten <b>%s</b> geänderte Seiten auf Bearbeitung.");
define("_AM_{$mod_name}_CANALLOWHTML","HTML benutzen");

//Added in Version 2.7
define("_AM_{$mod_name}_CANALLOWUPLOAD","Kann Dateien hochladen");
define("_AM_{$mod_name}_UPLOAD_DESC","Datei hochladen nach " . XOOPS_UPLOAD_URL . "/files/" . basename( dirname( dirname( dirname( __FILE__ ) ) ) ) . "/<br />max. Dateigröße: %s MB");
define("_AM_{$mod_name}_URL_DATEI_UPLOAD","Datei zum Upload auswählen <br /><small>falls keine Neuanlage und Datei wird ausgewählt wird alte Datei gelöscht, ansonsten frei lassen</small>");
