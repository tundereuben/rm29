<?php
//phpinfo()
//print_r($_FILES["fileUpload"])
//echo $imageFile;

if(isset($_FILES["fileUpload"]["name"])){
    $imageFile = ($_FILES["fileUpload"]["name"]);
    $imageType = ($_FILES["fileUpload"]["type"]);
    $validExt = array("jpeg", "jpg", "png");
    $fileExt = pathinfo($imageFile, PATHINFO_EXTENSION);
    echo $fileExt . "<br>";
    $ready = '';
    if(($imageType == "image/jpeg") || ($imageType == "image/jpg") || ($imageType == "image/png")&& (in_array($fileExt, $validExt)) ) {
        $ready = true;
        echo "was valid image<br>";
    }else{
        echo "was not an image<br>";
        $ready = false;
    }
    
    if(($_FILES["fileUpload"]["size"]<1000000) && $ready !=false){
        $ready = true;
        echo "file size is " . $_FILES["fileUpload"]["size"] ."<br>";
    }else {
        echo "file was TOO BIG!<br>";
        $ready=false;
    }
    
    if($_FILES["fileUpload"]["error"]){
        echo "looks like there was an error ".$_FILES["fileUpload"]["error"]."<br>";
        $ready=false;
    }
    
    $targetPath = "images/".$imageFile;
    $sourcePath = $_FILES["fileUpload"]["tmp_name"];
    if(file_exists($targetPath)){
        echo "File already there <br>";
        $ready = false;
    }
    
    if($ready == true){
        //move_uploaded_file($sourcePath, $targetPath);
        echo "upload successful <br> <img src='".$targetPath. "'width='100px' height='100px'>";
   }
}
?>