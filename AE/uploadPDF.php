<?php

//include_once 'config.php';

$valid_extensions = array('pdf'); // valid extensions PDF ONLY

$v1 = "PDF";
$id = "12345";
$fileD = $id;
$newPath = "";
$destFolder = "file";



session_start();
$_SESSION["ID"] = $id;



//  copy paste session
$path = '../'.$destFolder.'/';
$fileName = $_FILES[$v1]['name'];
$tmp = $_FILES[$v1]['tmp_name'];
$newPath = getFilepath();


echo $newPath;
exit();




// prepare and bind
try {
    $sql = "UPDATE file SET $col=? WHERE staffID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPath, $staffID);
    $stmt->execute();

    echo 1;


    $stmt->close();
    $conn->close();


    // header("Location:memberBio7.php");

} catch (Exception $e) {
    echo $e;

}









function getFilepath()
{
    global $fileName, $tmp, $path, $valid_extension, $fileD;

    try {
        // get uploaded file's extension
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000, 1000000) . $fileD . $fileName;
        // $final_image =$fileD.$fileName;
        // check's valid format
          $ext2=strtolower($ext);
        if ($ext2 != "pdf"){

            exit;
        }
            


        $path = $path . strtolower($final_image);
        move_uploaded_file($tmp, $path);

        return $path;
    } catch (\Throwable $th) {
        throw $th;
    }


}