<?php
session_start();
ob_start();
include('include/koneksi.php');
include_once("include/main.php");
$id_Order=$_GET['id_sewa'];

$query = mysqli_query($mysqli, "SELECT * FROM sewa
                             INNER JOIN lapangan ON sewa.id_lapangan=lapangan.id_lapangan
                             INNER JOIN pelanggan on sewa.id_pelanggan=pelanggan.id_pelanggan
                             INNER JOIN pengelola on sewa.id_pengelola=pengelola.id_pengelola
                             WHERE sewa.id_sewa = $id_Order")
                                or die('Ada kesalahan pada query tampil portfolio : '.mysqli_error($mysqli));

while($data = mysqli_fetch_assoc($query)) {

 ?>
 <html>
 <body>

 <p></p>
 <table style="border-collapse: collapse; width: 100%;">
 <tbody>
   <tr style="height: 21px;">
   <td style="width: 54.4595%; height: 84px; text-align: center;"><img src="images/flank.png" height="100" align="center"></td>
   </tr>

 </tbody>
 </table>
 <hr />
 <h4 style="text-align: center;"><strong>INVOICE : <?php echo $data['id_sewa']; ?></strong></h4>
 <table  style="border-collapse: collapse; width: 100%; background-color: #deebff;">
 <tbody>
 <tr style="height: 21px;">
 <td style="width: 38.3784%; height: 21px;"><strong>Pemesanan :</strong></td>
 <td style="width: 34.7297%; height: 21px; text-align: right;"><strong>Nomor Invoice</strong></td>
 <td style="width: 2.2973%; height: 21px; text-align: center;">:</td>
 <td style="width: 24.5946%; height: 21px;"><?php echo $data['id_sewa']; ?></td>
 </tr>
 <tr style="height: 21px;">
 <td style="width: 38.3784%; height: 21px;"><?php echo $data['nama_pelanggan']; ?></td>
 <td style="width: 34.7297%; height: 21px; text-align: right;"><strong>Tanggal</strong></td>
 <td style="width: 2.2973%; height: 21px; text-align: center;">:</td>
 <td style="width: 24.5946%; height: 21px;"><?php echo $data['tgl_pesan']; ?></td>
 </tr>
 <tr style="height: 21px;">
 <td style="width: 38.3784%; height: 21px;"><?php echo $data['email']; ?></td>
 <td style="width: 34.7297%; height: 21px; text-align: right;"><strong>Batas Konfirmasi Pembayaran</strong></td>
 <td style="width: 2.2973%; height: 21px; text-align: center;">:</td>
 <td style="width: 24.5946%; height: 21px;">3 jam Dari Sekarang</td>
 </tr>
 <tr style="height: 21px;">
 <td style="width: 38.3784%; height: 21px;"><?php echo $data['nohp']; ?></td>
 <td style="width: 34.7297%; height: 21px; text-align: right;"><strong>Total</strong></td>
 <td style="width: 2.2973%; height: 21px; text-align: center;">:</td>
 <td style="width: 24.5946%; height: 21px;">Rp. <?php echo $data['total']; ?></td>
 </tr>
 </tbody>
 </table>
 <p></p>
 <hr />
 <table  style="border-collapse: collapse; width: 100%;">
 <tbody>
 <tr>
 <td style="width: 25%;"><strong>Lapangan</strong></td>
 <td style="width: 25%;"><strong>Lama Sewa</strong></td>
 <td style="width: 25%;"><strong>Harga Perjam</strong></td>
 <td style="width: 25%;"><strong>Total</strong></td>
 </tr>
 <tr>
 <td style="width: 25%;"><?php echo $data['nama_lapangan']; ?></td>
 <td style="width: 25%;"><?php echo $data['lama_sewa']; ?> Jam</td>
 <td style="width: 25%;"><?php echo $data['harga_lapangan']; ?></td>
 <td style="width: 25%;" rowspan="2">
 <h4><strong><?php echo $data['total']; ?></strong></h4>
 </td>
 </tr>
 <tr>
 <td style="width: 25%;"><?php echo $data['jam_mulai']; ?></td>
 <td style="width: 25%;"></td>
 <td style="width: 25%;"></td>
 </tr>
 </tbody>
 </table>
 <p></p>
 <hr />
 <table style="border-collapse: collapse; width: 100%;">
 <tbody>
 <tr style="height: 21px;">
 <td style="width: 33.3333%; height: 21px;"><strong>Bank Transfer</strong></td>
 <td style="width: 33.3333%; height: 21px;"><strong>Atas Nama</strong></td>
 <td style="width: 33.3333%; height: 21px;"><strong>Nomor Rekening</strong></td>
 </tr>
 <tr style="height: 21px;">
 <td style="width: 33.3333%; height: 21px;">BCA</td>
 <td style="width: 33.3333%; height: 21px;">Ahmad Fachri</td>
 <td style="width: 33.3333%; height: 21px;">2909090091000</td>
 </tr>
 </tbody>

 </table>
<?php } ?>
 <hr/>
 <p></p>
 </body>
 </html>


<?php
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
    require_once('plugins/html2pdf/html2pdf.class.php');
try{
  $html2pdf = new HTML2PDF('P','A4','en');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output('Invoice.pdf');
  //header("Location: index.php");
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
