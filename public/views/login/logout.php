<?php
session_name("itbase_session");
session_start();
session_destroy();
header("location:login.php");
