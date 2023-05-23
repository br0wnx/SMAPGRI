<?php
 defined('BASEPATH') exit('No direct script acess allowed');

 class transaksi_model extends CI_Model {

function gettahun(){
    $query = $this -> db ->query ("SELECT year(tgl_pinjam) As tahun from tb_pinjam group by year(tgl_pinjam) order by YEAR(tgl_pinjam) ASC");
    return $query-> result();
}


function filterbytanggal($tanggalawal,$tanggalakhir){
    $query = $this -> db ->query ("SELECT * From tb_pinjam where tgl_pinjam BETWEEN '$tglawal' and '$tglakhir' ORDER BY tgl_pinjam ASC ");
    return $query-> result();
}

function filterbybulan($tahun1, $bulanawal,$bulanakhir){
    $query = $this -> db ->query ("SELECT * From tb_pinjam where YEAR(tgl_pinjam) = ''$tahun1' and MONTH(tgl_pinjam) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_pinjam ASC  ");
    return $query-> result();
}

function filterbyTAHUN($tahun2){
    $query = $this -> db ->query ("SELECT * From tb_pinjam where YEAR(tgl_pinjam) = ''$tahun1' ORDER BY tgl_pinjam ASC  ");
    return $query-> result();
}






 }