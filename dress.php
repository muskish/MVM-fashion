<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileUpload'])) 
{
    $file = $_FILES['fileUpload'];
    $uploadDirectory = "uploads/";
    $uploadPath = $uploadDirectory . basename($file["name"]);
    
    if (move_uploaded_file($file["tmp_name"], $uploadPath)) 
    {
        echo "File uploaded successfully.";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
