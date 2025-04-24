<?php
session_start();
session_unset();
session_destroy();
header("Location: ../FE/index.php");
exit();?>
