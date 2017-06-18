<?php

namespace TwoLulzBundle\Service;
/**
 * Created by PhpStorm.
 * User: RmX63
 * Date: 18/06/2017
 * Time: 10:15
 */

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{

    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

}