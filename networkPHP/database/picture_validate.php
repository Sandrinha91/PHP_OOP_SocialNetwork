<?php

require_once 'conection.php';
require_once 'userdata.php';

class PictureValidate extends Userdata
{
    private $suported_formats = ['image/png', 'image/jpeg', 'image/jpg'];

    //picture format validate and move to specific directory
    public function uploadFiles($file)
    {   
        $msg='';

        if(is_array($file))
        {
            if( in_array($file['type'], $this->suported_formats) )
            {
                $fileExt = explode('.',$file['name']);
                $fileActualExt = strtolower(end($fileExt));
                $uniqeName = uniqid('',true).".".$fileActualExt;
                move_uploaded_file( $file['tmp_name'], 'images/'.$uniqeName );
                $id = $_SESSION['id'];
                // insert picture link in database
                $picture= 'images/'.$uniqeName;
                $this->updateProfilePicture($id, $picture );
            }
            else
            {
                $msg = 'File format not suported!';
                return $msg;
            }
        }
        else
        {
            $msg = 'No files selected!';
            return $msg;
        }
    }

    
    

}

?>