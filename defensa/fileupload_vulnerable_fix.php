<?php
$allowed_types = ['image/jpeg', 'image/png', 'image/gif']; // Tipos de archivo permitidos
$upload_dir = __DIR__ . '/uploads/';

if (isset($_FILES['file'])) {
    $file_name = basename($_FILES['file']['name']);
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = mime_content_type($file_tmp);

    if (in_array($file_type, $allowed_types)) {
        $new_file_name = uniqid() . "_" . $file_name; // Evita colisiones de nombres
        move_uploaded_file($file_tmp, $upload_dir . $new_file_name);
        echo "Archivo subido correctamente.";
    } else {
        echo "Tipo de archivo no permitido.";
    }
}
?>
