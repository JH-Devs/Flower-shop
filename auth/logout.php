<?php 

// Přihlášení uživatele
session_start();

// Zrušení všech session dat
session_unset();

// Zničení session
session_destroy();

// Přesměrování na přihlašovací stránku nebo kamkoliv jinam po odhlášení
header('Location:/');
exit;

?>