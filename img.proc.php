<?php
// img.proc.php
// img processing script

// image uploading script

$target_dir = "images/uploads/";

$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) 
    {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$fileData = pathinfo(basename($_FILES["img"]["name"]));
$temp_name = basename($_FILES["img"]["name"]).date('Y-m-d h:i:s');
$fileName = md5($temp_name). '.' . $fileData['extension'];
$target_file = $target_dir . $fileName;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 1000000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
{
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
    $pass=false;
// if everything is ok, try to upload file
} 
else 
{
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) 
    {
        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
