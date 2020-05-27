<?php


class UploadFile
{
    protected $file;
    const MAX_FILE_SIZE = 1000;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function upload()
    {
        if (!isset($this->file['error']) ||
            is_array($this->file['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }

        $validTypes = array("image/jpg", "image/jpeg", "image/bmp", "image/gif", "image/png");

        $fileType = $this->file['type'];
        if (!in_array($fileType, $validTypes)) {
            throw new DomainException("Khong dung dinh dang");
        }

        $fileSize = $this->file['size'];
        if ($fileSize / 1024 > self::MAX_FILE_SIZE) {
            throw new LengthException("dung luong file khong duoc vuot qua " . self::MAX_FILE_SIZE);
        }

        //upload file - tim hieu va thuc hien upload file?
        if (move_uploaded_file($this->file['tmp_name'], 'upload/' . $this->file['name'])) {
            echo "upload file success";
        } else {
            echo "upload file error";
        }
    }
}