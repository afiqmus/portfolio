<?php 
require_once("connection.php"); 
$status = $statusMsg = ''; 
if(isset($_POST["btnSub2"])){ 
    $status = 'error'; 
    if(!empty($_FILES["mindmap2"]["name"])) { 
        $fileName = basename($_FILES["mindmap2"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['mindmap2']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            $insert = $conn->query("INSERT into topic2 (mindmap2) VALUES ('$imgContent')"); 
             
            if($insert){ 
                $status = 'success'; 
                header('location: topic2.php');
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
echo $statusMsg; 
?>