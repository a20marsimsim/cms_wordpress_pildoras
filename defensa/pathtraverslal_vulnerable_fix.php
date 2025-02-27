<?php
$base_dir = realpath($_SERVER['DOCUMENT_ROOT']) . '/';

if (isset($_GET['file'])) {
    $file = $_GET['file'];

    $file_path = realpath($base_dir . $file);

    if ($file_path !== false && strpos($file_path, $base_dir) === 0) {
        include($file_path);
    } else {
        echo "Acceso denegado.";
    }
} else {
    echo "No se ha especificado un archivo.";
}
?>
