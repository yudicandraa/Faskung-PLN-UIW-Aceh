<!DOCTYPE html><html lang="en">
  <head>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style_1.css" />
    <title>Faskung PLN UIW Aceh</title>
  </head>
  <body>
    
    <div class="container">
      <div class="forms-container"> 
      <div class="background-image"></div> 
        <div class="signin-signup">
          
          <form action="login.php" class="sign-in-form" method="post">         
            <h1 class="title">Masuk</h1>
            <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	      <?php } ?>
            
            <div class="input-field">
              <i class="fas fa-user" style="opacity: 50%;"></i>
              <input type="text" name="uname" placeholder="Nama Pengguna" autocomplete="off"  />
            </div>
            <div class="input-field">
              <i class="fas fa-lock" style="opacity: 50%;"></i>
              <input type="password" name="password" placeholder="Kata Sandi" autocomplete="off" />
            </div>
            <button class="paak" value="Login" name="Login" type="submit">Masuk</button>
          </form>

          
           <form action="login.php" class="sign-up-form" method="post">         
            <h1 class="title">Masuk</h1>
            <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	      <?php } ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="uname" placeholder="Nama Pengguna" autocomplete="off"  />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Kata Sandi" autocomplete="off" />
            </div>
            <button class="paak" value="Login" name="Login" type="submit">MASUK</button>
          </form>
        </div>
      </div>
      
      <div class="panels-container">
        <div class="panel left-panel">
          
          <div class="content">
            <div>
              <img src="img/logos.png" class="imagess" alt="" height="200" width="-200" style="margin-top: 50px;" />
              <h3 style="margin-top: -15px;">UIW ACEH</h3>
            </div>
            <h3 style="font-size: 20px; font-weight:600; margin-top:20px;">Sistem Pendataan Inventaris</h3>
            <h3 style="font-size: 20px; font-weight:200;">Fasilitas Pendukung</h3>
            <p>
              
            </p>
            <!--<button class="btn transparent" id="sign-in-btn">
              Masuk
            </button>-->
          </div>
          <img src="Assets/bungaa.png" class="image" alt=""/>
          
          
        </div>

      </div>
    </div>

   <!-- <script src="app.js"></script>
  </body>
PLN Unit Wilayah Aceh</script>
</body>-->
</html>
