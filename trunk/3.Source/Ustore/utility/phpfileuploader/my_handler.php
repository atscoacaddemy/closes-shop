<?php require_once "phpuploader/include_phpuploader.php" ?>    
<?php    
    $uploader=new PhpUploader();    
   
    $mvcfile=$uploader->GetValidatingFile();    
   
    if($mvcfile->FileName=="accord.bmp")    
    {    
     $uploader->WriteValidationError("My custom error : Invalid file name. ");    
         exit(200);    
    }    
   
    //USER CODE:    
   	$productId=$_REQUEST["proId"];
	$imageType= $_REQUEST["imgType"];
	$savefilepath="data/".$productId."_".$imageType.".".substr(strrchr($mvcfile->FileName,'.'),1);
    $targetfilepath="../../".$savefilepath;   
	
   	
    if( is_file ($targetfilepath) )    
     unlink($targetfilepath);    
    $mvcfile->MoveTo( $targetfilepath );    
   
    $uploader->WriteValidationOK();   
	require_once ("../../controller/ProductImageController.php");
	ProductImageController::Update($productId,$imageType,$savefilepath); 
?>   
