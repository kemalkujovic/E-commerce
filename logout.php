<?php
session_start();

// Brisanje svih podataka iz sesije
session_unset();

// Uništavanje sesije
session_destroy();

// Preusmjeravanje na prijavu ili početnu stranicu
header("Location: login.php");
exit();
?>