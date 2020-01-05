<?php
class FileExplorer {
    public $dirPath;
    public $dirFiles;

    function __construct() {
        $this->dirPath = is_dir($_GET['dir']) ? $_GET['dir'] : __DIR__;
        $this->getDir();
    }

    function getDir() {
        $this->dirFiles = $dir = new DirectoryIterator($this->dirPath);

       foreach ($dir as $item)  {
            //print_r($item->getRealPath());
        }
    }

    function render() {
        include "explorer.php";
    }
}

$explorer = new FileExplorer();
$explorer->render();


