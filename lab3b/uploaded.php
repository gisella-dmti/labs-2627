<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Handle PDF File
$uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
$temporary_pdf_file = $_FILES['pdf_file']['tmp_name'];

if (move_uploaded_file($temporary_pdf_file, $uploaded_pdf_file)) {
    echo '<p>PDF file uploaded successfully.</p>';
    echo '<a href="' . $relative_path . basename($_FILES['pdf_file']['name']) . '" target="_blank">';
    echo 'View PDF';
    echo '</a>';
} else {
    echo '<p>Failed to upload PDF file.</p>';
}


echo '<pre>';
var_dump($_FILES);
exit;
