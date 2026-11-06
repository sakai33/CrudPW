<?php
 require_once('../users/auth.php');
require_once('functions.php');

if (isset($_GET['id'])) {

    delete($_GET['id']);

} else {

    header('Location: index.php');
    exit;

}

?>