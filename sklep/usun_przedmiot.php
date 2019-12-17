<?php

require_once "connect.php";

$sql = "DELETE FROM sklep.produkty WHERE sklep.produkty.id = {$_POST['id']}";
$stmt = $db->prepare($sql);
if($query = $stmt->execute()) {
    $typ = strtolower($_POST['rodzaj']);
    delete_directory(__DIR__.'\\resources\\'.$typ.'\\'.$_POST['marka'].'\\'.$_POST['model'].'\\');
}

header("Location: panel_moderatora.php");

function delete_directory($dirname) {
    if (is_dir($dirname)) {
        echo 'siema';
        $dir_handle = opendir($dirname);
    }

    else {
        $dir_handle = false;
    }
    if (!$dir_handle) {
        echo 'sie nie udalo';
        return false;
    }

    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    echo 'sie udalo elo';
    return true;
}