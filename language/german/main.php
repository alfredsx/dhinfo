<?php
$mod_name = strtoupper ( basename( dirname(dirname (dirname( __FILE__ ))) ) );

define("_MA_{$mod_name}_FILENOTFOUND","die gewählte Seite ist nicht vorhanden!");
define("_MA_{$mod_name}_PRINTERFRIENDLY","Druckerfreundliche Seite generieren");
define("_MA_{$mod_name}_THISCOMESFROM","Dieser Artikel stammt von %s");
define("_MA_{$mod_name}_URLFORSTORY","Die URL dieses Artikels ist:");
define("_MA_{$mod_name}_LAST_UPDATE","letzte Änderung:");
define("_MA_{$mod_name}_EXTERNLINK","Dieser Link sollte sich jetzt in einem neuen Fenster öffnen<br />Sollte dies nicht der Fall sein, so klicken Sie bitte <a href='%s' target=_blank>hier</a>");
define("_MA_{$mod_name}_PAGENAVTEXT","Seite:");
define("_MA_{$mod_name}_DB_UPDATE","Datenbank erfolgreich geupdated");
define("_MA_{$mod_name}_TOTOP","Nach oben gehen");
define("_MA_{$mod_name}_SECURITY_CODE","Sicherheitscode");
define("_MA_{$mod_name}_SECURITY_GETCODE","Sicherheitscode eingeben");
define("_MA_{$mod_name}_SECURITY_ERROR","Falscher Sicherheitscode");
define("_MA_{$mod_name}_MA_NOEDITRIGHT","Entschuldigung, Sie haben keine Erlaubnis diese Aktion durchzuführen!");
define("_MA_{$mod_name}_NOEXTENSION","Dateiformat wird nicht unterstützt!");
define("_MA_{$mod_name}_WAITTOFREE","Sie haben bereits eine Änderung gemacht.<br />Warten Sie bis diese freigegeben ist.");
define("_MA_{$mod_name}_WAITTOEDIT","Ihre Änderung wurde übertragen.<br />Diese wird jetzt überprüft und dann freigegeben.");
define("_MA_{$mod_name}_ERRORINSERT","Es ist ein Fehler beim eintragen in die Datenbank aufgetreten!");