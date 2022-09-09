<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"href="css/penempatan.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../Assets/Logo_PLN.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">PLN UNIT INDUK WILAYAH</span>
                    <span class="profession">ACEH</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">



                <ul class="menu-links"> 
                <li class="nav-link">
                        <a href="../home.php">
                        <i class='bx bxs-dashboard icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-links">
                      <a href="penempatan.php">
                      <i class='bx bxs-archive-in icon' ></i>
                            <span class="text nav-text">Penempatan Barang</span>
                      </a>

                    </li>

                    <li class="menu-links">
                      <a href="penarikan.php">
                      <i class='bx bxs-archive-out icon' ></i>
                            <span class="text nav-text">Penarikan Barang</span>
                      </a>

                    </li>

                    <li class="menu-links">
                      <a href="pengeluaran.php">
                      <i class='bx bxs-archive icon' ></i>
                            <span class="text nav-text">Pengeluaran Sementara Barang</span>
                      </a>

                    </li>

                    
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Keluar</span>
                    </a>
                </li>

                
                
            </div>
        </div>

    </nav>

    <section class="home" id="home">
        <h1 class="text"><b id="text1">Penempatan Barang</b><br>Fasiltas Pendukung</h1>
        <div class="buttons">
            <div class="grid">
                <div class="buttons" onclick="location.href='formulir.php'">
                <div class="backBtn">
                        
                        <button  type="button" id="button">
                        <i class='bx bxs-bookmark-alt-plus' ></i>
                        <span class="btnText">Tambah Data</span>
                        </button>

                        </div>
                </div>
                
                <div class="buttons" onclick="location.href='../cetakpenempatan.php'">
                <div class="backBtn">
                        
                        <button  type="button" id="button">
                        <i class='bx bxs-file-pdf' ></i>
                        <span class="btnText">Cetak PDF</span>
                        </button>

                        </div>
                </div>

                <div class="buttons" onclick="location.href='../cetakexcel1.php'">
                    <div class="backBtn">
                        
                        <button  type="button" id="button">
                        <i class='bx bxs-spreadsheet'></i>
                        <span class="btnText">Cetak Excel</span>
                        </button>

                    </div>
                </div>
                

            </div>
        <div class="table">
        
        
        <table class="content-table" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Merk/Type</th>
                    <th>Nomor Seri</th>
                    <th>Nomor Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            include"../koneksi.php";
            //pagination
            $jumlahdataperhalaman = 5;
            $result = mysqli_query($koneksi, "SELECT * FROM penempatan");
            $jumlahdata = mysqli_num_rows($result);
            $jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);

            if(isset($_GET['page'])){
                $halamanAktif = $_GET['page'];
            }
            else{
                $halamanAktif = 1;
            }
           

            $awalData = ( $jumlahdataperhalaman * $halamanAktif) - $jumlahdataperhalaman;
            //var_dump($jumlahdata);
            $urutan = $awalData + 1;
            $ambildata = mysqli_query($koneksi, "SELECT * FROM penempatan LIMIT $awalData,$jumlahdataperhalaman");
            while($tampil = mysqli_fetch_array($ambildata)){
                
                $nama_barang = $tampil['nama_barang'];
                $merk_barang = $tampil['merk_barang'];
                $nomor_seri = $tampil['nomor_seri'];
                $nomor_barang = $tampil['nomor_barang'];
                $satuan = $tampil['satuan_jumlah'];
                $jumlah = $tampil['jumlah'];
                $keterangan = $tampil['keterangan'];
                ?>    
                <tr>
                <td><?php echo $urutan++ ?></td>
                <td style="width:15%"><?php echo $nama_barang ?></td>
                <td style="width:15%"><?php echo $merk_barang ?></td>
                <td style="width:10%"><?php echo $nomor_seri ?></td>
                <td style="width:12%"><?php echo $nomor_barang ?></td>
                <td style="width:5%"><?php echo $satuan ?></td>
                <td style="width:5%"><?php echo $jumlah?></td>
                <td style="width:10%"><?php echo $keterangan?></td>
                <td id="aksi" style="width:25%"> 

                <a href="update.php?kode=<?php echo $nomor_barang?>">

                <button  class="btnaksi2" type="submit">
                Edit
                </button>
                </a>
                
                <a href="tarikbarang.php?kode=<?php echo $nomor_barang?>">
                <button  class="btnaksi3" type="submit" >
                Penarikan
                </button>
                </a>   
                <a href="keluar_sementara.php?kode=<?php echo $nomor_barang?>">
                <button  class="btnaksi4" type="submit">
                Pengeluaran
                </button>
                </a> 
                   
                        

                </td>
            </tr>

            <?php 
            }
            ?>
            
           

            
        </tbody>
            
         
        </table>

        </div>
        
             
                        
        </div>
            <div class="pagination">
            <?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <a class="navigasi" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php else : ?>   
                <a class="navigasi2" href="?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>               
         <?php endfor; ?>  
            </div>
</section>



   

</body>
<script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");



toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});





    </script>
</html>

<?php
}else{
     header("Location: index.php");
     exit();
}
?>
