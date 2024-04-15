<?php

namespace Classes\Uploads;

class Upload
{
    public function imgUpload($file)
    {
        $targetDir = "static/uploads/img/";
        $fileType = explode('.',$file["name"])[1];
        $fileName = substr(md5($file['name']),22).'.'.$fileType;
        $targetFile = $targetDir . basename( $fileName);

        // if everything is ok, try to upload file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $fileName;
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }

    public function fileUpload($file)
    {
        $targetDir = "static/uploads/cv/";
        $fileType = explode('.',$file["name"])[1];
        $fileName = substr(md5($file['name']),22).'.'.$fileType;
        $targetFile = $targetDir . basename( $fileName);

        // if everything is ok, try to upload file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $fileName;
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }
}
