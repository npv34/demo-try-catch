<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once "UploadFile.php";

    if ($_FILES['file']) {
        $fileUpload = $_FILES['file'];

        $uploadFile = new UploadFile($fileUpload);

        try {
            $uploadFile->upload();
        }catch (DomainException $domainException) {
            echo $domainException->getMessage();
        }catch (LengthException $lengthException) {
            echo $lengthException->getMessage();
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>

</body>
</html>