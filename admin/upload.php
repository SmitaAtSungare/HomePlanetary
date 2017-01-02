<?php
session_start();
include('config.php');
function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 70)
{
    if (!$image = @imagecreatefromjpeg($sourceImage))
    {
        return false;
    }
    list($origWidth, $origHeight) = getimagesize($sourceImage);
    if ($maxWidth == 0)
    {
        $maxWidth  = $origWidth;
    }
    if ($maxHeight == 0)
    {
        $maxHeight = $origHeight;
    }
    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;
    $ratio = min($widthRatio, $heightRatio);
    $newWidth  = (int)$origWidth  * $ratio;
    $newHeight = (int)$origHeight * $ratio;
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    imagejpeg($newImage, $targetImage, $quality);
    imagedestroy($image);
    imagedestroy($newImage);
 }

if(!empty($_FILES))
{
	$t = time();
    $targetDir = "images/".$_SESSION["galleryid"]."/";
    $fileName = $_FILES['file']['name'];    
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);  
    $fileName = $t.".".$extension;
    $targetFile = $targetDir.$fileName;  
    
    if(is_dir($targetDir)==false)
    {       
        mkdir("$targetDir", 0700, true);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
        {
        list($width, $height, $type, $attr) = getimagesize($targetFile);
        resizeImage($targetFile, $targetFile, $width, $height);
            $mysqli->query("INSERT INTO images (img_path,gallery_id) VALUES('".$targetFile."',".$_SESSION["galleryid"].")");
        }    
    }
    else              
    {           
        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile))
        {
        list($width, $height, $type, $attr) = getimagesize($targetFile);
        resizeImage($targetFile, $targetFile, $width, $height);
            $mysqli->query("INSERT INTO images (img_path,gallery_id) VALUES('".$targetFile."',".$_SESSION["galleryid"].")");
        }          
    }
}
?>