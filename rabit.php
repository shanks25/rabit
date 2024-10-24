<?php
if (isset($_POST['submit'])) {
    $image =$_FILES['image'];   //  input type name has image
    //   print_r($image);  //if we print_r we get belowArray values 
    
    $imagename =$_FILES['image']['name'];   // this is what we have to do to get name of uploaded file
    $imagetype =$_FILES['image']['type']; 
    $imagetmpname =$_FILES['image']['tmp_name']; 
    $imageerror =$_FILES['image']['error']; 
    $imagesize =$_FILES['image']['size']; 
    
    $imageext =explode('.',$imagename);  // will convert kunal.jpg into two array ['kunal','jpg']
    $imageactext =strtolower(end($imageext));
    $allowed = ['jpg','jpeg','png','pdf'];
    
    if (in_array($imageactext,$allowed)) {
        if ($imagesize < 1000000) {                    //10mb
            $filenewname=uniqid('',true).".".$imageactext;
            $filenewdestination ='uploads/'.$filenewname;
            move_uploaded_file($imagetmpname,$filenewdestination);  
            //$imagetmpname will first give us temp location of uploaded,move_uploaded_file will move the file
            header("location:test.php?uploadsuccess");
        }
        else{
            echo "Your File is two big";
        }
    }
    else{
        echo "Uploaded wrong image format ";
    }
    
    
}