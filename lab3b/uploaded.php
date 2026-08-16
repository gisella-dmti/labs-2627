<?php

$upload_directory = getcwd() . '/uploads/';
echo '<pre>';

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

if (isset($_FILES['audio_file']) &&
    $_FILES['audio_file']['error'] === UPLOAD_ERR_OK) {

    $uploaded_audio_file =
        $upload_directory . basename($_FILES['audio_file']['name']);

    $temporary_audio_file =
        $_FILES['audio_file']['tmp_name'];

    if (move_uploaded_file(
        $temporary_audio_file,
        $uploaded_audio_file
    )) {

        echo '<h2>Audio File Uploaded Successfully!</h2>';

        echo '<p>File Name: ' .
             htmlspecialchars(basename($uploaded_audio_file)) .
             '</p>';

        echo '<audio controls>';
        echo '<source src="uploads/' .
             urlencode(basename($uploaded_audio_file)) .
             '" type="audio/mpeg">';
        echo 'Your browser does not support the audio element.';
        echo '</audio>';

    } else {

        echo '<p>Failed to upload audio file.</p>';

    }

} else {

    echo '<p>No audio file was uploaded.</p>';

}

if (isset($_FILES['image_file']) &&
    $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {

    $uploaded_image_file =
        $upload_directory . basename($_FILES['image_file']['name']);

    $temporary_image_file =
        $_FILES['image_file']['tmp_name'];

    if (move_uploaded_file(
        $temporary_image_file,
        $uploaded_image_file
    )) {

        echo '<h2>Image File Uploaded Successfully!</h2>';

        echo '<p>File Name: ' .
             htmlspecialchars(basename($uploaded_image_file)) .
             '</p>';

        echo '<img src="uploads/' .
             urlencode(basename($uploaded_image_file)) .
             '" alt="Uploaded Image" style="max-width:500px;">';

    } else {

        echo '<p>Failed to upload image file.</p>';

    }

} else {

    echo '<p>No image file was uploaded.</p>';

}
?>
