<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {



header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Pengeluaran.xls"); 

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <table>
        <tbody>
            <tr >
            <td></td>
            <td > PERUM LISTRIK NEGARA<br>.............................(1)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td > FP 3<br>No: .............................(2)</td>
            </tr>
        </tbody>
    
</table>
    <h2 style="        text-align: center;
        align-items: center;
        font-size: 24px;">Dokumen Pengeluaran Sementara Barang<br style="font-style: italic;">( Fasilitas Pendukung )
        </h2>

    <table class="content-table" style="width:100%;margin: 10px 0;border-radius: 1px;
    
    align-items: center;
    text-align: center; border: 1px solid #000000;">
            <thead >
                <tr style="border: 1px solid #000000;">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Merk/Type</th>
                    <th>Nomor Seri</th>
                    <th>Nomor Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Tujuan</th>
                    <th>Keterangan</th>
                </tr>
                
            </thead>
            <tbody>
            <tr style="text-align: center;
        align-items: center; border: 1px solid #000000;">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                </tr>
            <?php 
            
            include"koneksi.php";
            $urutan = 1;
            $ambildata = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
            while($tampil = mysqli_fetch_array($ambildata)){
                
                $nama_barang = $tampil['nama_barang'];
                $merk_barang = $tampil['merk_barang'];
                $nomor_seri = $tampil['nomor_seri'];
                $nomor_barang = $tampil['nomor_barang'];
                $satuan = $tampil['satuan_jumlah'];
                $jumlah = $tampil['jumlah'];
                $tujuan = $tampil['tujuan'];
                $keterangan = $tampil['keterangan'];
                ?>    
                <tr style="text-align: center;
        align-items: center; border-left: 1px solid #000000;">
                <td style="width:40px"><?php echo $urutan++ ?></td>
                <td style="width:180px;"><?php echo $nama_barang ?></td>
                <td style="width:150px"><?php echo $merk_barang ?></td>
                <td style="width:130px"><?php echo $nomor_seri ?></td>
                <td style="width:130px"><?php echo $nomor_barang ?></td>
                <td style="width:100px"><?php echo $satuan ?></td>
                <td style="width:100px"><?php echo $jumlah?></td>
                <td style="width:100px"><?php echo $tujuan?></td>
                <td style="width:170px"><?php echo $keterangan?></td>
                
            </tr>

            <?php 
            }
            ?>
            
           

            
        </tbody>
  
         
        </table>

        <table>
            <tbody >
                <tr style="border-bottom: 1px solid #000000;">
                    <td style="border-left: 1px solid #000000;"></td>
                    <td style="height: 30px;">Diterima Kembali Tanggal : ........................ (4)<br>Oleh : ........................ (.................................) (5)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right: 1px solid #000000;"></td>
                    
                </tr>
                
            </tbody>
        </table>

            <br>
        <table>
        <tbody>
            <tr style="text-align: center;
        align-items: center">
            <td></td>
            <td > Yang Menerima,<br><br><br><br><br>.............................(7)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td > ............... , .............................. (6)<br>Yang Menyerahkan,<br><br><br><br>.................................................(8)</td>
            </tr>
        </tbody>
    
</table>
</body>
</html>

<style>
    h2{
        text-align: center;
        align-items: center;
        font-size: 18px;
    }
.content-table{

    margin: 10px 0;
    
    border-radius: 1px;
    
    align-items: center;
    text-align: center;
    
}

.content-table thead tr{
    border: 3px solid #000000;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    

}

.content-table th,
.content-table td{
    padding: 12px 15px;
    
}
.content-table tbody tr{
    border: 3px solid #000000;
    
}

.content-table tbody tr:last-of-type{
    border-bottom: 2px solid var(--primary-color);
}

.content-table tbody tr td a{
    

    padding: 1px;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
}
</style>
<?php
}else{
    header("Location: index.php");
    exit();
}
?>