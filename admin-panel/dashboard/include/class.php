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

    public function countProps(){
        $stmt = $this->prepare("SELECT count(*) AS totalProps FROM ".TBL_PROPS." ");
        $stmt->execute();
        
        //fecth data
        $allprops = $stmt->fetch(PDO:: FETCH_OBJ);
        return $allprops;
    }



    
    public function countCat(){
        $stmt = $this->prepare("SELECT count(*) AS totalcat FROM ".TBL_CATEGORIES." ");
        $stmt->execute();
        
        //fecth data
        $allcat = $stmt->fetch(PDO:: FETCH_OBJ);
        return $allcat;
    }


    
    public function countAmin(){
        $stmt = $this->prepare("SELECT count(*) AS totaladmin FROM ".TBL_ADMINS." ");
        $stmt->execute();
        
        //fecth data
        $alladmin = $stmt->fetch(PDO:: FETCH_OBJ);
        return $alladmin;
    }
}


class categories extends Database{
    public function showCategoies(){
        $stmt =$this->prepare("SELECT Pid _Pid, Pname _Pname, created_at _created_at FROM ".TBL_CATEGORIES." ");
        $stmt->execute();

        //fecth data
        $allcategories =$stmt->fetchAll(PDO:: FETCH_OBJ);
        return $allcategories;
    }

    public function createCategories($name){
        $insert=$this ->prepare("INSERT INTO ".TBL_CATEGORIES." (Pname) VALUES(:name)");
        $insert->bindParam(':name',$name);
        $insert->execute();

        if($insert == true){
            $resp = array('status'=>1, 'message'=>'insert successful');

        }else{
            $resp =['status'=>0, 'message'=>'Error in creating category'];
        }

        return $resp;            
    }

    public function singleCategories($id){
            $stmt =$this->prepare("SELECT * FROM ".TBL_CATEGORIES." WHERE Pid=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            //fecth data
            $singleCategories =$stmt->fetch(PDO:: FETCH_OBJ);
            return $singleCategories;
    }

    public function updateCategories($id,$name){
        $update=$this->prepare("UPDATE  ".TBL_CATEGORIES." SET Pname=:name WHERE Pid=:id ");
        $update->bindParam(':id', $id);
        $update->bindParam(':name',$name);
        $update->execute();

        if($update == true){
            $resp = array('status'=>1, 'message'=>'Update successful');

        }else{
            $resp =['status'=>0, 'message'=>'Error in creating category'];
        }

        return $resp; 

    }
}


