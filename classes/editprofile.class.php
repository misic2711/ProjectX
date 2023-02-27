<?php

class EditProfile extends DbConnection {
    public $row;

    public function publicInfoForm($email) {

        $select_query = "SELECT * FROM users WHERE user_email = ?";
        $select_prep = $this->conn->prepare($select_query);
        $select_prep->bind_param('s', $email);
        $select_prep->execute();

        $select_result = $select_prep->get_result();

        $this->row = $select_result->fetch_assoc();

        $full_name = $this->row['user_full_name'];
        $username = $this->row['user_username'];
        $password = $this->row['user_password'];


        $imageUrl = '';
        if($this->row['profile_picture'] == '') {
            $imageUrl = 'images/placeholder.jpg';
        }
        else {
            $imageUrl = $this->row['profile_picture'];
        }

        $form = "
        <h2> Public Information</h2>
            <form action='' method='post' enctype='multipart/form-data'>
                
                    <img width='300' src='$imageUrl'><br>
                
                <input type='file' name='avatar'><br>
                <label>Full Name</label><br>
                <input type='text' name='full_name' value='$full_name'><br>

                <label>Username</label><br>
                <input type='text' name='username' value='$username'><br>

                <input type='submit' name='save' value='Save'>
            </form>
        ";

        echo $form;
    }
    private function uploadAvatar($avatar) {
        $allFiles = scandir('uploads');
        $avatarName = $avatar['name'];
        $avatarTmpName = $avatar['tmp_name'];
        $avatarInfo = pathinfo($avatarName);
        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

        if(!in_array($avatarInfo['extension'], $allowedExt)) {
            die('Extension not allowed');
        }

        if(in_array($avatarInfo['basename'], $allFiles)) {
            $avatarInfo['basename'] = $avatarInfo['filename'] . "_" . date('Y-m-d His') . "." . $avatarInfo['extension'];
        }

        $destination = 'uploads/' . $avatarInfo['basename'];

        move_uploaded_file($avatarTmpName, $destination);

        return $destination;
    }

    public function editPublicInfo($avatar, $fullName, $username) {
        
        $destination = '';

        if($avatar['name'] != '') {
            $destination = $this->uploadAvatar($avatar);
        }
        else {
            if(strpos($this->row['profile_picture'], 'images')) {
                $destination = 'images/placeholder.jpg';
            }
            else {
                $destination = $this->row['profile_picture'];
            }
        }

       
        $selectAllQuery = "SELECT * FROM users";
        $selectAllResult = $this->conn->query($selectAllQuery);

        while($row = $selectAllResult->fetch_assoc()) {
            if($row['user_email'] != $_SESSION['user_email']) {
                if($row['user_username'] == $username) {
                    die('Username already exists.');
                }
            }
        }



        $updateQuery = "UPDATE users SET profile_picture = ?, user_full_name = ?, user_username = ? WHERE user_email = ?";
        $updatePrep = $this->conn->prepare($updateQuery);
        $updatePrep->bind_param('ssss', $destination, $fullName, $username, $_SESSION['user_email']);
        $updateResult = $updatePrep->execute();

        if($updateResult) {
            echo 'Successfully updated public information, please refresh your page.';
        }
        else {
            echo 'Error while trying to update public information, please try again';
        }
    }
}