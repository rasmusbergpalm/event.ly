<?php

class UploadComponent extends Component {
    public $path = 'upload/';
    public $allowedTypes = array('image/jpeg', 'image/gif', 'image/png');
    public $maxSize = 524288; //0.5 MB
    
    public function upload($file) {
        if(!in_array($file['type'], $this->allowedTypes))
            user_error('Type not allowed', E_USER_ERROR);
        
        if($file["size"] > $this->maxSize)
            user_error('Max size exceeded', E_USER_ERROR);
        
        if($file["error"] > 0)
            user_error("Error code: " . $file["error"],E_USER_ERROR);
        
        if (file_exists($this->path . $file["name"]))
            user_error("File already exists", E_USER_ERROR);
        
        if(!move_uploaded_file($file["tmp_name"], $this->path.$file["name"]))
            user_error("Error moving file", E_USER_ERROR);
        
        return true;
    }

}

?>
