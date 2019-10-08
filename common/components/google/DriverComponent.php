<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/5/2018
 * Time: 11:49 AM
 */

namespace common\components\google;


class DriverComponent
{

    public function upload($file)
    {
        $fileMetadata = new \Google_Service_Drive_DriveFile(array(
            'name' => 'photo.jpg'));
        $content = file_get_contents('files/photo.jpg');
        $file = $driveService->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => 'image/jpeg',
            'uploadType' => 'multipart',
            'fields' => 'id'));
        printf("File ID: %s\n", $file->id);
    }
}