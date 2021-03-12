<?php
session_start();
if(isset($_POST['submit']))
{
    $file=$_FILES["img"];
    $fileName=$file["name"];
    $fileType=$file["type"];
    $fileTmpName=$file["tmp_name"];
    $fileError=$file["error"];
    $fileSize=$file["size"];
    $ext=pathinfo($fileName, PATHINFO_EXTENSION);
    $errors=[];
    if($fileError!=0)
    {
        $errors[]="error while uploading the file";
    } elseif(! in_array($ext,["JSON","json"]))
    {
        $errors[]="the file must be .json";
    }

    if(empty($errors))
    {

        $randomStr=uniqid();
        $fileNewName="$randomStr.$ext";
        move_uploaded_file($fileTmpName, "uploads/$fileNewName");
        $readFile=fopen("uploads/$fileNewName","r");
        $readFileSize=filesize("uploads/$fileNewName");
        $readFileData=fread($readFile,$readFileSize);
        $readFileDataArr=json_decode($readFileData);
        $_SESSION["fileContent"]=$readFileDataArr;
        header("location: display.php");


    } else
    {
        $_SESSION['errors']=$errors;
        header("location: upload-json.php");       
    }
    
}



?>