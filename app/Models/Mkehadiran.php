<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkehadiran extends Model
{

    public function getAll()
    {
        $builder = $this->db->query("SELECT t1.key_kehadiran, DATE_FORMAT(t1.tanggal,'%d-%m-%Y') tanggal, concat(t2.lvl_kelas,' - ',t2.`nama_kelas`) nama_kelas,
        (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid) TOTAL,
        (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='MASUK') MASUK,
        (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='SAKIT') SAKIT,
        (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='ALPHA') ALPHA,
        (SELECT COUNT(*) FROM kehadiran WHERE tanggal=t1.tanggal AND kelasid=t1.kelasid AND `status`='IJIN') IJIN
        FROM kehadiran t1
        JOIN kelas t2 ON t1.kelasid=t2.id_kelas
        GROUP BY t1.key_kehadiran, t1.tanggal, t2.`nama_kelas`");

        return $builder->getResultArray();
    }

    public function getData($nomer)
    {
        $builder = $this->db->query("SELECT t1.id_kehadiran,t1.key_kehadiran,t1.`status`,t2.`nama_siswa`,t3.`nama_kelas` klas,t1.tanggal,t1.keterangan 
									FROM kehadiran t1
									JOIN siswa t2 ON t1.siswaid=t2.id_siswa
									JOIN kelas t3 ON t1.kelasid=t3.id_kelas
									WHERE key_kehadiran='$nomer' ORDER BY t2.`nama_siswa`");
        return $builder->getResultArray();
    }

    public function getKelas()
    {
$builder = $this->db->query("")
    }
}
