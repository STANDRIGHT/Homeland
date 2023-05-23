<?php
class admin extends Database
{
    public function login($email, $password)
    {
        $stmt = $this->prepare("SELECT _id, _password, _status FROM " . TBL_ADMIN . " WHERE _email=:email");
        $stmt->bindvalue(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            if(password_verify($password, $row->_password)){
                if($row->_status == 'S'){
                    $resp = ['status'=>0, 'message'=>"Account Suspended"];
                }else if($row->_status=='D'){
                    $resp = ['status'=>0, 'message'=>"Invalid Login Credentials"];
                }else{
                    $_SESSION["id"] = $row->_id;
                    $resp = ['status'=>1, 'message'=>"Login Successful"];
                }
            }else{
                $resp = ['status'=>0, 'message'=>"Invalid Password"];
            }
            //declaring session

        } else {
            $resp = ['status'=>0, 'message'=>"Invalid Email"];
        }
        return $resp;
    }


    public function getUserProfile($id){
        $stmt =$this->prepare("SELECT adminName _adminName, _email EMAIL, _password	Upassword, _status Ustatus
            FROM ".TBL_ADMIN." WHERE _id=:id ");
        $stmt ->bindValue(":id", $id);
        $stmt->execute();
        if($stmt->rowCount()>0){
            $resp=['status'=>1, 'data'=>$stmt->fetch(PDO::FETCH_OBJ)];
        }else{
            $resp=['status'=>0, 'message'=>'Invalid ID'];
        }
        return $resp;

        

    }
}


// public function Login($email, $password): array
// {
//     $stmt = $this->prepare("SELECT _id as Aid, adminName as _adminName, _email as Ademail, _password as Apassword,  _status as Astatus FROM " . TBL_ADMIN . " WHERE _email = :$email");
//     $stmt->bindParam(":email", $email);
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {