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

    // public function insertJenisBus($nama_terminal, $alamat_terminal, $provinsi, $kabupaten, $kecamatan){
    //     try{
    //         $sql ="INSERT INTO terminal(nama_terminal, detail_alamat_terminal, provinsi_terminal, kabupaten_terminal, kecamatan_terminal) VALUES (:terminal, :alamat, :provinsi, :kabupaten, :kecamatan)";
    //         $result = $this->koneksi->prepare($sql);
    //         $result->bindParam(":terminal", $nama_terminal);
    //         $result->bindParam(":alamat", $alamat_terminal);
    //         $result->bindParam(":provinsi", $provinsi);
    //         $result->bindParam(":kabupaten", $kabupaten);
    //         $result->bindParam(":kecamatan", $kecamatan);
    //         $result->execute();
    //         return true;
    //     }
    //     catch (PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }


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

    
    // public function detailDataKegiatan($data){
    //     try{
    //         $sql ="SELECT * FROM kegiatan WHERE id=:id";
    //         $result = $this->koneksi->prepare($sql);
    //         $result->bindParam(":id", $data);
    //         $result->execute();
    //         $result->bindColumn(1, $this->id);
    //         $result->bindColumn(2, $this->nama_keg);
    //         $result->bindColumn(3, $this->desk);
    //         $result->bindColumn(4, $this->img);
    //         $result->fetch(PDO::FETCH_ASSOC);
    //         if($result->rowCount()==1):
    //             return true;
    //         else:
    //             return false;
    //         endif;    
    //     } catch (PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }

    // public function pilihKegiatan($data){
    //         $sql ="SELECT * FROM kegiatan WHERE id=:id";
    //         $result = $this->koneksi->prepare($sql);
    //         $result->bindParam(":id", $data);
    //         $result->execute();
    //         return $result;
    // }

    public function pilihTerminal($data){
        $sql ="SELECT * FROM terminal WHERE id_terminal=:id_terminal";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id_terminal", $data);
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
            $sql ="UPDATE jenis_bus SET jenis=:jenis, fasilitas=:fasilitas WHERE id_jenis=:id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":jenis", $jenis);
            $result->bindParam(":fasilitas", $fasilitas);
            $result->bindParam(":id", $data);
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
