<?php require_once "phpuploader/include_phpuploader.php" ?>    
<html>    
<body>    
       <?php    
            $uploader=new PhpUploader();    
            $uploader->Name="myuploader";    
            //Create a new file upload handler    
            $uploader->UploadUrl="my_handler.php";    
            $uploader->Render();    
        ?>                   
</body>    
</html>  