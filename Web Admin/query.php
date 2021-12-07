<?php
class crud extends koneksi {
    public function lihatTerminal(){
        $sql = "SELECT * FROM terminal";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatJenisBus(){
        $sql = "SELECT * FROM jenis_bus";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatRute(){
        $sql = "SELECT * FROM rute";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatPenumpang(){
        $sql = "SELECT * FROM penumpang";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function insertData($email, $pass, $name){
        try{
            $sql ="INSERT INTO user_detail(user_email, user_password, user_fullname, level) Values (:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function detailData($data){
        try{
            $sql ="SELECT * FROM user_detail WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $data);
            $result->execute();
            $result->bindColumn(1, $this->id);
            $result->bindColumn(2, $this->user_email);
            $result->bindColumn(3, $this->user_password);
            $result->bindColumn(4, $this->user_fullname);
            $result->fetch(PDO::FETCH_ASSOC);
            if($result->rowCount()==1):
                return true;
            else:
                return false;
            endif;    
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    
    public function detailDataKegiatan($data){
        try{
            $sql ="SELECT * FROM kegiatan WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $data);
            $result->execute();
            $result->bindColumn(1, $this->id);
            $result->bindColumn(2, $this->nama_keg);
            $result->bindColumn(3, $this->desk);
            $result->bindColumn(4, $this->img);
            $result->fetch(PDO::FETCH_ASSOC);
            if($result->rowCount()==1):
                return true;
            else:
                return false;
            endif;    
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pilihKegiatan($data){
            $sql ="SELECT * FROM kegiatan WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $data);
            $result->execute();
            return $result;
    }

    public function pilihAkun($data){
        $sql ="SELECT * FROM user_detail WHERE id=:id";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id", $data);
        $result->execute();
        return $result;
    }

    public function login($data){
        $sql ="SELECT * FROM administrator WHERE email=:email";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":email", $data);
        $result->execute();
        return $result;
    }

    public function updateData($email, $pass, $name, $data){
        try{
            $sql ="UPDATE user_detail SET user_email=:email, user_password=:pass, user_fullname=:name WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->bindParam(":id", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateDataKegiatan($namaKeg, $desk, $img, $data){
        try{
            $sql ="UPDATE kegiatan SET nama_keg=:namaKeg, desk=:desk, img=:img WHERE kegiatan.id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":namaKeg", $namaKeg);
            $result->bindParam(":desk", $desk);
            $result->bindParam(":img", $img);
            $result->bindParam(":id", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($data){
        try{
            $sql ="DELETE FROM user_detail WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteKeg($data){
        try{
            $sql ="DELETE FROM kegiatan WHERE id=:id";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}
?>
