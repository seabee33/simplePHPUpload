<?php


// Set Options
$uploadFolder = 'uploads/';
$fileToUpload = $_FILES['fileToUpload'];
$uploadOk = 'y';



//Check if files were actually selected to upload
if(empty($_FILES['fileToUpload']['name'][0])){
    echo 'No files selected';
    $uploadOk = 'n';
}


print_r($_FILES['fileToUpload']);
echo "<br><br><br>";

if($uploadOk == 'y'){
    foreach ($_FILES['fileToUpload']['name'] as $key => $fileName){
        $singleFile = $_FILES['fileToUpload'];
        // check if file size is less then 500 MB
        if($uploadOk == 'y'){
            if ($_FILES["fileToUpload"]["size"][$key] > (500 * 1000000)){ //500 MB
                echo 'File size too big: ' . $_FILES["fileToUpload"]["size"][$key] . ' <br>';
                $uploadOk = 'n';
            } else {
                echo 'File size ' . $_FILES["fileToUpload"]["size"][$key] . ' ok <br>';
                $uploadOk = 'y';
            }
        }
    
        // Check file type
        $allowedFiles = [
            // Video
            'mp4' => 'video/mp4',
            'avi' => 'video/x-msvideo',
            'mov' => 'video/quicktime',
            'wmv' => 'video/x-ms-wmv',
            'webm' => 'video/webm',
            // Images
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            'heic' => 'image/heic',
            'heif' => 'image/heif',
            // Audio
            'mp3' => 'audio/mpeg',
            'm4a' => 'audio/mp4',
            // Documents
            'pdf' => 'application/pdf',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'doc' => 'application/msword',
            'ppt' => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            'md' => 'text/markdown',
            'zip' => 'application/zip',
            'odt' => 'application/vnd.oasis.opendocument.text',
        ];
        if($uploadOk == 'y'){
            $fileType = $singleFile['type'][$key];
            if(in_array($fileType, $allowedFiles)){
                echo 'File type: ' . $singleFile['type'][$key] . ' ok <br>';
                $uploadOk = 'y';
            } else {
                echo 'File type: ' . $singleFile['type'][$key] . ' NOT allowed <br>';
                $uploadOk = 'n';
            }
        }

        //Check extension
        $fileExt = strtolower(pathinfo($singleFile['name'][$key], PATHINFO_EXTENSION));
        
        if(in_array($fileExt, array_keys($allowedFiles))){
            echo 'File extension: ' . $fileExt . ' ok. <br>';
            $uploadOk = 'y';
        } else {
            echo 'File extension: ' . $fileExt . ' NOT allowed. <br>';
            $uploadOk = 'n';
        }
    
        // Final step
        if($uploadOk == 'y'){
            if(move_uploaded_file($singleFile["tmp_name"][$key], 'uploads/' . basename($singleFile["name"][$key]))){
                echo "the file: " . htmlspecialchars(basename($singleFile["name"][$key])) . " has been uploaded. <br><br>";
            } else {
                echo "something went wrong :( <br>";
            }
        } else {
            echo "File not uploaded <br>";
        }
    }
}








?>
<br><br>
<a href="uploads/">Uploads</a>
