<?php

class Upload
{
  public function checkFileError($file) {
    if ($file['error'] > 0) {
      return "Erreur lors du transfert.";
    }
  }

  public function checkFileSize($file, $maxSize) {
    if ($file['size'] > $maxSize) {
      return "Le fichier est trop gros.";
    }
  }

  public function checkFileExtension($file, array $types) {
    if (!in_array($file['type'], $types)) {
      return "Mauvais type de fichier.";
    }
  }

  public function checkAll($file, $maxSize, array $types) {
    $error = "";

    $error .= $this->checkFileError($file);
    $error .= $this->checkFileSize($file, $maxSize);
    $error .= $this->checkFileExtension($file, $types);

    return $error;
  }

  public function uploadImage($image, $destination) {
    $error = $this->checkAll($image, 10485760, [
      'image/jpeg',
      'image/png'
    ]);

    if (!$error) {
      move_uploaded_file($image['tmp_name'], $destination);
    }

    echo $image['type'];

  return $error;  }
}
