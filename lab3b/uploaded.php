<?php

$upload_directory = getcwd() . '/uploads/';


// =========================
// Handle Text File
// =========================

if (isset($_FILES['text_file']) &&
    $_FILES['text_file']['error'] === UPLOAD_ERR_OK) {

    $uploaded_text_file =
        $upload_directory . basename($_FILES['text_file']['name']);

    $temporary_file =
        $_FILES['text_file']['tmp_name'];

    if (move_uploaded_file($temporary_file, $uploaded_text_file)) {

        $text_file_content =
            file_get_contents($uploaded_text_file);

        echo '<h2>Text File Uploaded Successfully!</h2>';

        echo '<textarea cols="70" rows="30">';
        echo htmlspecialchars($text_file_content);
        echo '</textarea>';

    } else {

        echo '<p>Failed to upload text file.</p>';

    }
}


// =========================
// Handle PDF File
// =========================

if (isset($_FILES['pdf_file']) &&
    $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {

    $uploaded_pdf_file =
        $upload_directory . basename($_FILES['pdf_file']['name']);

    $temporary_pdf_file =
        $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file(
        $temporary_pdf_file,
        $uploaded_pdf_file
    )) {

        echo '<h2>PDF File Uploaded Successfully!</h2>';

        echo '<p>File Name: ' .
             htmlspecialchars(basename($uploaded_pdf_file)) .
             '</p>';

        echo '<p>';
        echo '<a href="uploads/' .
             urlencode(basename($uploaded_pdf_file)) .
             '" target="_blank">';
        echo 'Open PDF File';
        echo '</a>';
        echo '</p>';

    } else {

        echo '<p>Failed to upload PDF file.</p>';

    }

} else {

    echo '<p>No PDF file was uploaded.</p>';

}

?>
