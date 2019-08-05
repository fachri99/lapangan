<?php
include 'koneksi.php';
if ($_POST['id'] == 'all') {
  $data = mysqli_query($koneksi, "SELECT * FROM sewa ORDER BY id_sewa ASC");
}else{
  $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_pengelola = '".$_POST['id']."'");
}
while ($fetch = mysqli_fetch_assoc($data)) {
  echo "<tr>";
    echo "<td>".$fetch['id_sewa']."</td>";
    echo "<td>".$fetch['id_lapangan']."</td>";
    echo "<td>".$fetch['tgl_pesan']."</td>";
    echo "<td>".$fetch['jam_mulai']."</td>";
    echo "<td>".$fetch['jam_selesai']."</td>";
    echo "<td>".$fetch['total']."</td>";
    echo "<td>".$fetch['status']."</td>";
  echo "</tr>";
}

?>
