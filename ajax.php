<?php
require_once ('helper.php');

$task = $_POST['task'];

switch ($task) {
    case 'parser':
        $helper = new MyHelper();
        $result = $helper->ParseRBC();
        echo $result;
        break;
}