<?php

function isBufferFileAdequate()
{
    global $conn, $error;
    if ($_FILES['image']['size'] != 0) {
        if ($_FILES['image']['size'] > 5242880) {
            $error = "Fichier trop grand! Respectez la limite de 5Mo.";
            return false;
        } elseif ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
            return true;
        } else {
            $error = "Type de fichier non accepté! Images JPG et PNG seulement.";
            return false;
        }
    } else {
        $error = "No file or file size = 0";
        return false;
    }
}

function saveImage($subfolder, $userID)
{
    global $conn, $error;

    $file = $_FILES['image']['name'];
    $path = pathinfo($file);
    $ext = $path['extension'];

    $temp_name = $_FILES['image']['tmp_name'];
    $new_filename = $userID . "_" . date("mdyHis");
    $path_filename_ext = "../uploads/" . $subfolder . "/" . $new_filename . "." . $ext;

    if (file_exists($path_filename_ext)) {
        $error = "Error, the file already exists";
        return NULL;
    } else {
        move_uploaded_file($temp_name, $path_filename_ext);
        $error = "Congratulations! File Uploaded Successfully.";
        return $path_filename_ext;
    }
}
