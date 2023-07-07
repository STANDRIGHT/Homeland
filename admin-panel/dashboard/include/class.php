<?php
class admin extends Database
{

    public function register($email, $username, $password){
      $stmt=$this->prepare("SELECT _id as Rid, _email as Remail, _password as Rpassword, FROM ".TBL_ADMIN." WHERE _email:$email ");
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);
      $stmt->execute();

      if($stmt->rowCount()>0){
        $resp=["status"=>0, "message"=>"Email already exit"];
      }else{
        $row=$stmt->fetch(PDO:: FETCH_OBJ);
        if(!password_hash($row->_password, PASSWORD_DEFAULT)){
            $resp=['status'=>0, 'message'=>'Incorrect Password'];

        }elseif(!filter_var($row->_email, FILTER_VALIDATE_EMAIL)){
            $resp=["status"=>0, "message" =>"Email not valid" ];

        }

      }
      return $resp;    

    }

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

    public function getAdmins(){
        $stmt =$this->prepare("SELECT _id  AS Aid, adminName AS AadminName, _email as Aemail, _password AS Apassword,
        _status AS Astatus, AdminCategory AS AAdminCategory, created_at AS Acreated_at FROM ".TBL_ADMIN." ");
        $stmt->execute();
        $admins=$stmt->fetchAll(PDO:: FETCH_OBJ);

        return $admins;
    }

    //fecting single admin i.e the master admin
    public function singleAdmin(){
        $stmt =$this->prepare("SELECT _id  AS Aid, adminName AS AadminName, _email as Aemail, _password AS Apassword,
        _status AS Astatus, AdminCategory AS AAdminCategory, created_at AS Acreated_at FROM ".TBL_ADMIN."
        WHERE AdminCategory='Master' ");
        $stmt->execute();

        if($Admin=$stmt->fetch(PDO:: FETCH_ASSOC)){
            $singleAdmin =$Admin;
            
            $_SESSION["master"]=$singleAdmin;
        }
        

        return $_SESSION["master"];
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
            $resp= array('status'=>1, 'message'=>'Update successful');

        }else{
            $resp=['status'=>0, 'message'=>'Error in creating category'];
        }

        return $resp; 
    }

    //Delete Category
    public function delete($id){
        $delete =$this->prepare("DELETE FROM ".TBL_CATEGORIES." WHERE Pid=:id");
        $delete->bindParam(':id', $id);
        if($delete->execute()==true){
            
            $resp=['status'=>1, 'message'=>'successfully deleted'];

        }else{
            $resp=['status'=>0, 'message'=>'Failed to delete'];

        }

        return $resp;
    }
}



//CLASS FOR PROPERTIES
class properties extends Database{
    public function props(){
        //make query for properties
        $properties=$this->prepare("SELECT _id as Pid, name as Pname, _location as Plocation, price as Pprice, image as Pimage,
        beds as Pbeds, bath as Pbath, sq_ft as Psq_ft, home_type as Phometype, _type as Ptype, year_built as Pyear_built, 
        price_sqft as Pprice_sqft, description	as Pdescription, admin_name as Padmin_name, created_at as Pcreated_at
        FROM ".TBL_PROPERTIES." ");
        $properties->execute();

        //fecth date
        $allproperties=$properties->fetchAll(PDO::FETCH_OBJ);

        return $allproperties;
    }
}



//REQUEST CLASS for clients
class  request  extends Database {
    public function request(){
        $request=$this->prepare("SELECT _id as Rid, _name as Rname, email as Remail, phone as Rphone, created_at as Rcreated_at
          FROM ".TBL_REQUEST." ");
        $request->execute();

        $allrequest=$request->fetchAll(PDO::FETCH_ASSOC);

        return $allrequest;
    }

    

}


