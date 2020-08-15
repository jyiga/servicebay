<?php




class utility extends Exception
{

    public static function getTokenKey()
    {
        if(!isset($_SESSION['cartId']))
        {
            $_SESSION['LAST_shoping']=time();
            $_SESSION['cartId']=utility::getGUID2();
            session_write_close();

        }
    }

    public static function checkTokenTime()
    {
        try{

            
        ob_start();
        $status = session_status();
        if($status == PHP_SESSION_NONE){
            //There is no active session
            session_start();
        }else
        if($status == PHP_SESSION_DISABLED){
            //Sessions are not available
        }else
        if($status == PHP_SESSION_ACTIVE){
            //Destroy current and start new one
            //session_destroy();
            //session_start();
        }
                
        
        
        if(isset($_SESSION['cartId']))
        {

            if (isset($_SESSION['LAST_shoping']) && (time() - $_SESSION['LAST_shoping'] > 3600))
            {
                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time
                session_destroy();
                utility::getTokenKey();
            }
        }else{
            utility::getTokenKey();
        }
        
        }catch(Exception $e)
        {

        }
        
    }


    public static function getGUID2()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
    
    public static function exportJsonFile($array)
    {
        $exportDir="../public/export/json/";
        $fileName=date('Ymdhis').'.json';
        $fp = fopen($exportDir.$fileName, 'w');
        fwrite($fp, json_encode($array,JSON_PRETTY_PRINT));
        fclose($fp);
        return $exportDir.$fileName;
        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename="'.basename($exportDir.$fileName).'"');
        // header('Expires: 0');
        // header('Cache-Control: must-revalidate');
        // header('Pragma: public');
        // header('Content-Length: ' . filesize($exportDir.$fileName));
        // flush(); // Flush system output buffer
        // readfile( $exportDir.$fileName);
    }

    //JY11062020 changed the function to enable the develop supply upload path 
    public static function importFile($fileElement, $allowed,$path="../public/import/images/")
    {
        // Check if file was uploaded without errors
        if(isset($_FILES[$fileElement]) && $_FILES[$fileElement]["error"] == 0){
        //$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES[$fileElement]["name"];
        $filetype = $_FILES[$fileElement]["type"];
        $filesize = $_FILES[$fileElement]["size"];

        //$filename = round(microtime(true)) .$filename;
        $filename = $filename;
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) 
        {
            throw new Exception("Error: Please select a valid file format.");
        }
        
    
        // Verify file size - 5MB maximum
        $maxsize = 40 * 1024 * 1024;
        if($filesize > $maxsize) 
        {
            throw new Exception("Error: File size is larger than the allowed limit.");
        }
        //die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($path . $filename)){
                if (!unlink($path . $filename)) 
                { 

                }else
                {
                    move_uploaded_file($_FILES[$fileElement]["tmp_name"], $path. $filename);
                    //echo "Your file was uploaded successfully.";
                    return array("path"=>$path . $filename,"size"=>($filesize/(1024 * 1024)));
                }
                //throw new Exception($filename . " is already exists.");

                //echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES[$fileElement]["tmp_name"], $path. $filename);
                //echo "Your file was uploaded successfully.";
                return array("path"=>$path . $filename,"size"=>($filesize/(1024 * 1024)));
            } 
        } else{
            throw new Exception("Error: There was a problem uploading your file. Please try again.");
            
        }
    } else{
        throw new Exception($_FILES[$fileElement]["error"]);
        //$filename . " is already exists."
        //echo "Error: " . $_FILES["photo"]["error"];
    }

    }

    


    
}