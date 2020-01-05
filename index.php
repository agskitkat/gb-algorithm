<?php
class FileExplorer {
    function __construct() {

    }

    function render() {
        include "explorer.php";
    }
}

$explorer = new FileExplorer();
$explorer->render();


