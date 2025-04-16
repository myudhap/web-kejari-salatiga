<?php

if (!function_exists('upload_file')) {
    function upload_file($file, $extension, $max_size, $folder) {
        // validate file uploaded
        if (!$file || $file->getError() !== UPLOAD_ERR_OK) {
            return ['success' => true, 'data' => ""];
        }

        // validate extension
        if (!in_array($file->guessExtension(), (array) $extension)) {
            return ['success' => false, 'errors' => "Ekstensi file tidak sesuai"];
        }

        // validate size
        if ($file->getSizeByUnit('MB') > $max_size) {
            return ['success' => false, 'errors' => "Ukuran file terlalu besar (maksimal " . $max_size . "MB)."];
        }

        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/assets/img/' . $folder, $newName);

        return ['success' => true, 'data' => $newName];
    }
}