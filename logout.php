<?php

include 'includes/init.php';

Session::destroy();
header('Location: index.php');
exit();
