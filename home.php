<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"href="style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="Assets/Logo_PLN.png" alt="">
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
                        <a href="home.php">
                        <i class='bx bxs-dashboard icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-links">
                      <a href="Pages/penempatan.php">
                      <i class='bx bxs-archive-in icon' ></i>
                            <span class="text nav-text">Penempatan Barang</span>
                      </a>

                    </li>

                    <li class="menu-links">
                      <a href="Pages/penarikan.php">
                      <i class='bx bxs-archive-out icon' ></i>
                            <span class="text nav-text">Penarikan Barang</span>
                      </a>

                    </li>

                    <li class="menu-links">
                      <a href="Pages/pengeluaran.php">
                      <i class='bx bxs-archive icon' ></i>
                            <span class="text nav-text">Pengeluaran Sementara Barang</span>
                      </a>

                    </li>

                   
                    
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Keluar</span>
                    </a>
                </li>

                
                
            </div>
        </div>

    </nav>

    <section class="home" id="home">
        <h1 class="text"><b><span id="text0">Sistem Pendataan Inventaris</span></b><br>Fasiltas Pendukung</h1>
        <p><span class="text1" id="tanggalwaktu"></span></p>
<script>
    var tw = new Date();
    if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
    else (a=tw.getTime());
    tw.setTime(a);
    var tahun= tw.getFullYear ();
    var hari= tw.getDay ();
    var bulan= tw.getMonth ();
    var tanggal= tw.getDate ();
    var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
    var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
</script>
<h1 class="text2">Bidang <?php echo htmlentities($_SESSION['user_name']);?></h1>
        <div class="grid">
            <div class="middle1" onclick="penempatan()">
            <i class='bx bxs-archive-in icon'></h4></i>
            <h3>Penempatan Barang</h3>
            <div class="left"><h4>Jumlah Barang</h4></div>

            <?php 
            
            include"koneksi.php";

 
            $ambildata = mysqli_query($koneksi, "SELECT COUNT(*) FROM penempatan");
            $row = mysqli_fetch_array($ambildata);    
                echo "
                <h2>$row[0]</h2>
                "
            
            ?>
            
            </div>
            <script>
                function penempatan(){
                    window.location='Pages/penempatan.php'
                }
            </script>

            <div class="middle2" onclick="penarikan()">
            <i class='bx bxs-archive-out icon'></i>
            <h3>Penarikan Barang</h3>
            <div class="left"><h4>Jumlah Barang</h4></div>
            <?php 
            
            include"koneksi.php";
 
            $ambildata = mysqli_query($koneksi, "SELECT COUNT(*) FROM penarikan");
            $row = mysqli_fetch_array($ambildata);    
                echo "
                <h2>$row[0]</h2>
                ";
            
            ?>

            <script>
                function penarikan(){
                    window.location='Pages/penarikan.php'
                }
            </script>
            </div>

            <div class="middle3" onclick="pengeluaran()">
            <i class='bx bxs-archive icon'></i>
            <h3>Pengeluaran Sementara Barang</h3>
            <div class="left"><h4>Jumlah Barang</h4></div>
            <?php 
            
            include"koneksi.php";

 
            $ambildata = mysqli_query($koneksi, "SELECT COUNT(*) FROM pengeluaran");
            $row = mysqli_fetch_array($ambildata);    
                echo "
                <h2>$row[0]</h2>
                "
            
            ?>
             <script>
                function pengeluaran(){
                    window.location='Pages/pengeluaran.php'
                }
            </script>
            </div>
            
            </div>
            
            

        </div>
        <!-- <img class="bg" src="Assets/bg.png" style="width: 450px;"> -->
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
