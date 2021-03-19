<?php

if (isset($_POST["upload"])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'img/uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "file Added Successfully";
                return $fileNameNew;
            } else {
                echo "Your file is too big!!!";
            }
        } else {
            echo "There Was an error uploading your file!!!";
        }

    } else {
        echo "You Can not Upload files of this type!!!";
    }

    /* if($_FILES["photo"]["name"]!= ''){

$test=explode(".",$_FILES["photo"]["name"]);

$extension=end($test);
$name=rand(100,999).".".$extension;
var_dump($name);
$location='../../../../utrance-railway/public/img/uploads/'.$name;
move_uploaded_file($_FILES["photo"]["tmp_name"],$location);
echo "Image Upload Successfully";

}*/
}

?>
   <script>
   </script>
