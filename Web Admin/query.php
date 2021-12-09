<?php
class crud extends koneksi {

    //insert, detail, update
    public function login($data){
        $sql ="SELECT * FROM administrator WHERE email=:email";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":email", $data);
        $result->execute();
        return $result;
    }
    
    // lihat
    public function lihatAdministrator(){
        $sql = "SELECT * FROM administrator";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatUser(){
        $sql = "SELECT * FROM user";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatBus(){
        $sql = "SELECT * FROM bus";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

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

    public function lihatPemesanan(){
        $sql = "SELECT * FROM pemesanan";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function lihatDetailPemesanan(){
        $sql = "SELECT * FROM detail_pemesanan";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    // insert
    public function insertAdministrator($nama, $jenis_kelamin, $alamat, $no_hp, $level, $id_terminal, $email, $password){
        try{
            $sql ="INSERT INTO administrator(nama, jenis_kelamin, alamat, no_hp, '', id_level, id_terminal, email, password) VALUES (:nama, :jenis_kelamin, :alamat, :no_hp, :foto, :2, :id_terminal, :email, :password)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":nama", $nama);
            $result->bindParam(":jenis_kelamin", $jenis_kelamin);
            $result->bindParam(":alamat", $alamat);
            $result->bindParam(":no_hp", $no_hp);
            // $result->bindParam(":", $foto);
            $result->bindParam(":2", $level);
            $result->bindParam(":id_terminal", $id_terminal);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insertTerminal($nama_terminal, $alamat_terminal, $provinsi, $kabupaten, $kecamatan){
        try{
            $sql ="INSERT INTO terminal(nama_terminal, detail_alamat_terminal, provinsi_terminal, kabupaten_terminal, kecamatan_terminal) VALUES (:terminal, :alamat, :provinsi, :kabupaten, :kecamatan)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":terminal", $nama_terminal);
            $result->bindParam(":alamat", $alamat_terminal);
            $result->bindParam(":provinsi", $provinsi);
            $result->bindParam(":kabupaten", $kabupaten);
            $result->bindParam(":kecamatan", $kecamatan);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function insertJenisBus($jenis, $fasilitas){
        try{
            $sql ="INSERT INTO jenis_bus(jenis, fasilitas) VALUES (:jenis, :fasilitas)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":jenis", $jenis);
            $result->bindParam(":fasilitas", $fasilitas);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // detail
    public function detailAdministrator($data){
        try{
            $sql ="SELECT * FROM administrator WHERE id_user_admin=:id_user_admin";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id_user_admin", $data);
            $result->execute();
            $result->bindColumn(1, $this->id_user_admin);
            $result->bindColumn(2, $this->nama);
            $result->bindColumn(3, $this->jenis_kelamin);
            $result->bindColumn(4, $this->alamat);
            $result->bindColumn(5, $this->no_hp);
            $result->bindColumn(6, $this->foto);
            $result->bindColumn(7, $this->id_level);
            $result->bindColumn(8, $this->id_terminal);
            $result->bindColumn(9, $this->email);
            $result->bindColumn(10, $this->password);
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

    public function detailTerminal($data){
        try{
            $sql ="SELECT * FROM terminal WHERE id_terminal=:id_terminal";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id_terminal", $data);
            $result->execute();
            $result->bindColumn(1, $this->id_terminal);
            $result->bindColumn(2, $this->nama_terminal);
            $result->bindColumn(3, $this->detail_alamat_terminal);
            $result->bindColumn(4, $this->provinsi_terminal);
            $result->bindColumn(5, $this->kabupaten_terminal);
            $result->bindColumn(6, $this->kecamatan_terminal);
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

    public function detailJenisBus($data){
        try{
            $sql ="SELECT * FROM jenis_bus WHERE id_jenis=:id_jenis";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id_jenis", $data);
            $result->execute();
            $result->bindColumn(1, $this->id_jenis);
            $result->bindColumn(2, $this->jenis);
            $result->bindColumn(3, $this->fasilitas);
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

    // pilih
    public function pilihAdministrator($data){
        $sql ="SELECT * FROM administrator WHERE id_user_admin=:id_user_admin";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_user_admin", $data);
        $result->execute();
        return $result;
    }

    public function pilihUser($data){
        $sql ="SELECT * FROM user WHERE nik_user=:nik_user";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":nik_user", $data);
        $result->execute();
        return $result;
    }

    public function pilihBus($data){
        $sql ="SELECT * FROM bus WHERE id_bus=:id_bus";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_bus", $data);
        $result->execute();
        return $result;
    }

    public function pilihTerminal($data){
        $sql ="SELECT * FROM terminal WHERE id_terminal=:id_terminal";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_terminal", $data);
        $result->execute();
        return $result;
    }

    public function pilihJenisBus($data){
        $sql ="SELECT * FROM jenis_bus WHERE id_jenis=:id_jenis";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_jenis", $data);
        $result->execute();
        return $result;
    }

    public function pilihRute($data){
        $sql ="SELECT * FROM rute WHERE id_rute=:id_rute";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_rute", $data);
        $result->execute();
        return $result;
    }

    public function pilihPenumpang($data){
        $sql ="SELECT * FROM penumpang WHERE nik_penumpang=:nik_penumpang";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":nik_penumpang", $data);
        $result->execute();
        return $result;
    }

    public function pilihPemesanan($data){
        $sql ="SELECT * FROM pemesanan WHERE id_pemesanan=:id_pemesanan";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_pemesanan", $data);
        $result->execute();
        return $result;
    }

    public function pilihDetailPemesanan($data){
        $sql ="SELECT * FROM detail_pemesanan WHERE id_detail_pemesanan=:id_detail_pemesanan";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_detail_pemesanan", $data);
        $result->execute();
        return $result;
    }

    // update
    public function updateAdministrator($nama, $jenis_kelamin, $alamat, $no_hp, $foto, $id_level, $id_terminal, $email, $password, $data){
        try{
            $sql ="UPDATE administrator SET nama=:nama, jenis_kelamin=:jenis_kelamin, alamat=:alamat, no_hp=:no_hp, foto=:foto, id_level=:id_level, id_terminal=:id_terminal, email=:email, password=:password WHERE id_user_admin=:id_user_admin";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":nama", $nama);
            $result->bindParam(":jenis_kelamin", $jenis_kelamin);
            $result->bindParam(":alamat", $alamat);
            $result->bindParam(":no_hp", $no_hp);
            // $result->bindParam(":foto", $foto);
            $result->bindParam(":id_level", $id_level);
            $result->bindParam(":id_terminal", $id_terminal);
            $result->bindParam(":email", $email);
            $result->bindParam(":password", $password);
            $result->bindParam(":id_user_admin", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateTerminal($terminal, $alamat, $provinsi, $kabupaten, $kecamatan, $data){
        try{
            $sql ="UPDATE terminal SET nama_terminal=:terminal, detail_alamat_terminal=:alamat, provinsi_terminal=:provinsi, kabupaten_terminal=:kabupaten, kecamatan_terminal=:kecamatan WHERE id_terminal=:id_terminal";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":terminal", $terminal);
            $result->bindParam(":alamat", $alamat);
            $result->bindParam(":provinsi", $provinsi);
            $result->bindParam(":kabupaten", $kabupaten);
            $result->bindParam(":kecamatan", $kecamatan);
            $result->bindParam(":id_terminal", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateJenisBus($jenis, $fasilitas, $data){
        try{
            $sql ="UPDATE jenis_bus SET jenis=:jenis, fasilitas=:fasilitas WHERE id_jenis=:id_jenis";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":jenis", $jenis);
            $result->bindParam(":fasilitas", $fasilitas);
            $result->bindParam(":id_jenis", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateRute($pemberangkatan, $waktu_berangkat, $tujuan, $waktu_tiba, $harga, $data){
        try{
            $sql ="UPDATE rute SET pemberangkatan=:pemberangkatan, waktu_berangkat=:waktu_berangkat, tujuan=:tujuan, waktu_tiba=:waktu_tiba, harga=:harga WHERE id_rute=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":pemberangkatan", $pemberangkatan);
            $result->bindParam(":waktu_berangkat", $waktu_berangkat);
            $result->bindParam(":tujuan", $tujuan);
            $result->bindParam(":waktu_tiba", $waktu_tiba);
            $result->bindParam(":harga", $harga);
            $result->bindParam(":id", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePenumpang($nama_penumpang, $jenis_kelamin_penumpang, $no_hp_penumpang, $data){
        try{
            $sql ="UPDATE penumpang SET nama_penumpang=:nama_penumpang, jenis_kelamin_penumpang=:jenis_kelamin_penumpang, no_hp_penumpang=:no_hp_penumpang WHERE nik_penumpang=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":nama_penumpang", $nama_penumpang);
            $result->bindParam(":jenis_kelamin_penumpang", $jenis_kelamin_penumpang);
            $result->bindParam(":no_hp_penumpang", $no_hp_penumpang);
            $result->bindParam(":id", $data);
            $result->execute();
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // delete
    public function deleteAdministrator($data){
        try{
            $sql ="DELETE FROM terminal WHERE id_user_admin=:id_user_admin";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_user_admin"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteUser($data){
        try{
            $sql ="DELETE FROM user WHERE nik_user=:nik_user";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("nik_user"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteBus($data){
        try{
            $sql ="DELETE FROM bus WHERE id_bus=:id_bus";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_bus"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteTerminal($data){
        try{
            $sql ="DELETE FROM terminal WHERE id_terminal=:id_terminal";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_terminal"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteJenisBus($data){
        try{
            $sql ="DELETE FROM jenis_bus WHERE id_jenis=:id_jenis";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_jenis"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteRute($data){
        try{
            $sql ="DELETE FROM rute WHERE id_rute=:id_rute";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_rute"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deletePenumpang($data){
        try{
            $sql ="DELETE FROM penumpang WHERE nik_penumpang=:nik_penumpang";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("nik_penumpang"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deletePemesanan($data){
        try{
            $sql ="DELETE FROM pemesanan WHERE id_pemesanan=:id_pemesanan";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_pemesanan"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteDetailPemesanan($data){
        try{
            $sql ="DELETE FROM detail_pemesanan WHERE id_detail_pemesanan=:id_detail_pemesanan";
            $result = $this->koneksi->prepare($sql);
            $result->execute(array("id_detail_pemesanan"=>$data));
            return true;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}
?>
