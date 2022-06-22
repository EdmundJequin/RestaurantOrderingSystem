<?php
require_once 'DatabaseConnection.php';
class MenuEntity
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function __destruct()
    {

    }

    //Create Menu
    public function createMenu($inputdata)
    {
        $statusMsg = '';
        $targetDir = "../Images/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $foodName = $inputdata[0];
        $foodPrice = $inputdata[1];
        $foodType = $inputdata[2];

        if (!empty($_FILES["file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = "INSERT INTO foodItem (`name`, `price`, `type`, `imageName`)
                    VALUES ('$foodName', '$foodPrice', '$foodType', '$fileName.')";
                    $result = $this->conn->query($insert);
                    if($result){
                        $statusMsg = "The menu has been created successfully.";
                        return $statusMsg;
                    }else{
                        $statusMsg = "Menu creation failed, please try again.";
                        return $statusMsg;
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error creating your menu.";
                    return $statusMsg;
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                return $statusMsg;
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
            return $statusMsg;
        }
    }

    //View Menu
    public function viewMenu()
    {
        $query = "SELECT * FROM fooditem";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    //Delete Menu
    public function deleteMenu($foodID)
    {
        $delete = "DELETE FROM fooditem WHERE foodID = '$foodID'";
        $result = $this->conn->query($delete);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    //Update Menu Item
    public function updateMenu($inputdata)
    {   
        $statusMsg = '';
        $targetDir = "../Images/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $foodID = $inputdata[0];
        $foodName = $inputdata[1];
        $foodPrice = $inputdata[2];
        $foodType = $inputdata[3];
        
        if (!empty($_FILES["file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $update = ("UPDATE foodItem SET foodID = '$foodID', name = '$foodName', price = '$foodPrice', type = '$foodType',
                    imageName = '$fileName'
                    WHERE foodID = '$foodID'");
                    $result = $this->conn->query($update);
                    if($result){
                        $statusMsg = "The menu has been updated successfully.";
                        return $statusMsg;
                    }else{
                        $statusMsg = "Menu update failed, please try again.";
                        return $statusMsg;
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error updating your menu.";
                    return $statusMsg;
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                return $statusMsg;
            }
        }else{
            $update = ("UPDATE foodItem SET foodID = '$foodID', name = '$foodName', price = '$foodPrice', type = '$foodType'
            WHERE foodID = '$foodID'");
            $result = $this->conn->query($update);
            
            if($result){
                $statusMsg = "The menu has been updated successfully.";
                return $statusMsg;
            }
        }
    }
}
?>