<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Laporan Data</title>

</head>

<table class='table1'>

              <tr>

<td align="center" colspan='2'>

<h2>CONTOH DATA</h2>

<h2>LAPORAN PENJUALAN PRODUK kodingbuton.com</h2>

 

                   </td>

              </tr>

<strong><hr></strong>

 

<table border='1' class='table'>

<tr>

<th align="center">No.</th>

<th>Tanggal Order</th>

<th>Nama Produk</th>

<th>Nama Pelanggan</th>

<th>Email /Kontak</th>

<th>Alamat Pengiriman</th>

<th>Qty </th><th>Diskon </th>

<th>Harga + Ongkir </th>

</tr>

 

<?php

include "conec.php";

include "coba.php";

$tgl_awal = $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];

$tgl_akhir = $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];

$query=mysql_query("SELECT * FROM orders_detail a, orders b, produk c, kota d WHERE b.tgl_order BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_produk=c.id_produk AND a.id_orders=b.id_orders AND b.id_kota=d.id_kota AND b.id_orders AND b.status='S1' ORDER BY b.id_orders DESC");

 

$cnt=1;

while($row=mysql_fetch_array($query)){

     $tgl=tgl_indo($row['tgl_order']);

     $sale   = $row[harga]*$row[diskon]/100 * $row[jumlah];

      $subtotal    = $row[jumlah]*$row[harga]+$row[ongkos_kirim]- $sale;

    $total       = $total + $subtotal;

    $sub_jum    = $row[jumlah];  

    $total_j     = $total_j + $sub_jum; 

?>

<tr>

<td align='center'><?php echo $cnt ?>.</td>

<td align="center"><?php echo htmlentities($tgl);?></td>

<td> &nbsp; <?php echo htmlentities($row['nama_produk']);?></td>

<td> &nbsp; <?php echo $row['nama_kustomer'];?></td>

<td> &nbsp; <?php echo $row['email'];?> / <?php echo $row['telpon'];?> </td>

<td> &nbsp; <?php echo htmlentities($row['alamat']);?> </td>

<td> <center><?php echo $row['jumlah'];?></center></td>

<td><center> <?php echo $row['diskon'] ?> %</center></td>

<td align="right">Rp. <?php echo format_rupiah(($row['harga'] * $row['jumlah']+$row['ongkos_kirim'] - $sale ));?>,-&nbsp;</td>

                                                    

</tr>

<?php $cnt=$cnt+1; } ?>

 <tr> 

<td colspan="6"><div align="left"><strong>TOTAL JUMLAH</strong></div></td>

<td align="center"><strong><?php echo $total_j;?></strong></td>

<td align="right" colspan="2"><strong>Rp. <?php echo format_rupiah( $total ) ;?>,-&nbsp;</strong></td>

</tr>       

</table>

<body>

</body>

</html>