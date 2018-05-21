<?php
$mod_name = strtoupper ( basename( dirname(dirname (dirname( __FILE__ ))) ) );

define("_MI_{$mod_name}_NAME","DH-INFO");
define("_MI_{$mod_name}_DESC","Erstellen von Content mit eigener Navigation.");
define("_MI_{$mod_name}_PRINTER","Druckerfreundliche Version aufrufen");
define("_MI_{$mod_name}_BLOCK1","DH-INFO Menüblock");
define("_MI_{$mod_name}_BLOCK1_DESC", "erstellt einen Menüblock zur Navigation");
define("_MI_{$mod_name}_BLOCK2", "DH-INFO Freier Block");
define("_MI_{$mod_name}_BLOCK2_DESC", "Zeigt einen beliebigen Beitrag in einem Block an");
define("_MI_{$mod_name}_CONF1","Editorauswahl zulassen");
define("_MI_{$mod_name}_CONF1_DESC","Ja für Editorauswahl im Formular / Nein für den Defaulteditor des Systems");
define("_MI_{$mod_name}_CONF2","Link 'Seite anlegen' anzeigen");
define("_MI_{$mod_name}_CONF2_DESC","Wenn man die Berechtigung für Seite anlegen hat kann ein Link im Hauptmenü mit angezeigt werden.");
define("_MI_{$mod_name}_CONF3","Druckerfreundliche Seiten generieren");
define("_MI_{$mod_name}_CONF3_DESC","Diese Einstellungen erstellt auf den Seiten ein Iconlink, bei dem dann eine druckerfreundliche Seite aufgerufen wird.");
define("_MI_{$mod_name}_CONF4","Anzeige letzter Änderung");
define("_MI_{$mod_name}_CONF4_DESC","");
define("_MI_{$mod_name}_CONF5","Anzeige der Blöcke unterbinden beim Schreiben");
define("_MI_{$mod_name}_CONF5_DESC","Einstellungen der linken und rechten Blöcke beim Aufruf der submit.php");
define("_MI_{$mod_name}_TEMPL1", "SeitenLayout");
define("_MI_{$mod_name}_LASTD1","keine Anzeige");
define("_MI_{$mod_name}_LASTD2","kurze Anzeige (=> ".formatTimestamp(time(),'s').")");
define("_MI_{$mod_name}_LASTD3","normale Anzeige (=> ".formatTimestamp(time(),'m').")");
define("_MI_{$mod_name}_LASTD4","lange Anzeige (=> ".formatTimestamp(time(),'l').")");

//Added in 1.04
define("_MI_{$mod_name}_BLOCKADMIN","Blockverwaltung");
define("_MI_{$mod_name}_ADMENU2","Kategorien");
define("_MI_{$mod_name}_ADMENU3","Seiten verwalten");
define("_MI_{$mod_name}_ADMENU4","Zugriffsrechte");

//Added in 2.0
define("_MI_{$mod_name}_TOOLTIP","Tooltip");
define("_MI_{$mod_name}_CONF6","Anzeige der SeitenNavigation");
define("_MI_{$mod_name}_CONF6_DESC","");
define("_MI_{$mod_name}_CONF7","Anzeige der Links im Profil");
define("_MI_{$mod_name}_CONF7_DESC","Bei ja werden die Links im Profil angezeigt");
define("_MI_{$mod_name}_PAGESNAV","als Seitenzahlen");
define("_MI_{$mod_name}_PAGESELECT","als Auswahlbox");
define("_MI_{$mod_name}_PAGESIMG","als Bilder");
define("_MI_{$mod_name}_SENDEMAIL","Per E-Mail versenden");
define("_MI_{$mod_name}_ARTICLE","Interessanter Artikel auf %s");
define("_MI_{$mod_name}_ARTFOUND","Hier ist ein interessanter Artikel den ich auf %s gefunden habe");
define("_MI_{$mod_name}_GUEST","Gastschreiber");
define("_MI_{$mod_name}_FREIGABEART","Freigabemodus");
define("_MI_{$mod_name}_FREIGABEART_YES","Freigeben");
define("_MI_{$mod_name}_FREIGABEART_NO","Sperren");
define("_MI_{$mod_name}_ADMENU5","Beiträge warten");
define("_MI_{$mod_name}_ADMENU6","gesperrte Beiträge");
define("_MI_{$mod_name}_GESPERRT","[GESPERRT]");
define("_MI_{$mod_name}_NOFRAMEOREDITOR","<div style='font-style:bold;color:red;'>keine Editoren gefunden!</div>");
define("_MI_{$mod_name}_NEW","NEU");
define("_MI_{$mod_name}_UPDATE","UPDATE");
define("_MI_{$mod_name}_CONF8","SEO-Optimierung");
define("_MI_{$mod_name}_CONF8_DESC","Umschreibung der Urls in Suchmaschinenfreundliche. Rewriting setzt mod_rewrite vorraus!");
define("_MI_{$mod_name}_CONF9","Trennzeichen für Untermenüs");
define("_MI_{$mod_name}_CONF9_DESC","gibt das führende Trennzeichen für Untermenüs am Anfang an.");

//Added in 2.5
define("_MI_{$mod_name}_ADMENU_ABOUT","Über das Modul");
define("_MI_{$mod_name}_INDEX","Index");
define("_MI_{$mod_name}_CREATESITE","Seite anlegen");

//Added in 2.6
define("_MI_{$mod_name}_VIEWSITE","alle Seiten in dieser Kategorie anzeigen");
define("_MI_{$mod_name}_CONF_COLS","Anzahl der Spalten des Editors (mind. 10)");
define("_MI_{$mod_name}_CONF_COLS_DESC","Gibt die Spalten (Höhe) des Editors an (kein HTML-Editor)");
define("_MI_{$mod_name}_CONF_ROWS","gibt die Reihen des Editors an (mind.10)");
define("_MI_{$mod_name}_CONF_ROWS_DESC","Gibt die Reihen (Breite) des Editors an (kein HTML-Editor)");
define("_MI_{$mod_name}_CONF_WIDTH","Breite HTML-Editor in Prozent (10-100)");
define("_MI_{$mod_name}_CONF_WIDTH_DESC","legt die prozentuale Breite des Editors fest (nur für HTML-Editoren)");
define("_MI_{$mod_name}_CONF_HEIGHT","Höhe HTML-Editor in Pixel (mind. 100)");
define("_MI_{$mod_name}_CONF_HEIGHT_DESC","Die Höhe des Eingabefeldes des Editors in Pixeln.");
define("_MI_{$mod_name}_ADMENU_HELP","Hilfe");
define("_MI_{$mod_name}_NONE","keine Blöcke ausblenden");
define("_MI_{$mod_name}_RECHTS","Rechts ausblenden");
define("_MI_{$mod_name}_LINKS","Links ausblenden");
define("_MI_{$mod_name}_BEIDE","Rechts und Links ausblenden");

//Added in 2.7
define("_MI_{$mod_name}_BREADCRUMBS","Breadcrumb Navigantion einschalten");
define("_MI_{$mod_name}_BREADCRUMBS_DESC","");
 /*Max. Dateigroesse fuer Upload bestimmen */
define("_MI_{$mod_name}_CONF_MAXFILESIZE","max. Dateigröße in <b>MB</b> hier angeben.");
define("_MI_{$mod_name}_CONF_MAXFILESIZE_DESC","bestimmt die max. Größe einer Datei zum Hochladen (0-automatisch vom System als MAX-Wert vorgegeben)");
