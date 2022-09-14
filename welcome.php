<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("config.php");
$baglanti = $link;

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <script type="text/javascript">

         $(function() {
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});

     </script>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style type="text/css">
        body{ font: 20px sans-serif; }

    </style>
</head>
<body>
  
<!-- VERTICAL NAVBAR -->
<div class="vertical-nav shadow-lg p-3 mb-5 bg-white rounded" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
        <img src="img/logo.png" width="200" class="">
    </div>
  </div>
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Tablolar</p>




  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"> </i>
                adad
               
            </a>
    </li>




  </ul>
  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0"><?php echo htmlspecialchars($_SESSION["username"]); ?></p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="logout.php" class="nav-link text-dark font-italic">
                <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                Çıkış Yap
            </a>
    </li>
    <li class="nav-item">
      <a href="reset-password.php" class="nav-link text-dark font-italic">
                <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                Şifre Sıfırlama
            </a>

  </ul>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-dark page-content" id="content"> 
    <button id="sidebarCollapse" type="button" class="btn btn-light"><img src="toggle.png" width="40"></button>
    <div class="navbar-brand">
    <button type="button" class="btn btn-warning custom">Hepsini Seç</button>
 </div>
</div>
</nav>

<!-- ANAEKRAN -->

  <div class="page-content p-5" id="content">


<br></br>


<!-- TABLOLARI LISTELEME -->
<div class="col">
<table class="table">
    
    <tr>
        <th>No</th>
        <th>Başlık</th>
        <th>İçerik</th>
        <th>Versıyon</th>
        <th>V1</th>
        <th>V2</th>

    </tr>

<?php 





$sorgu = $link->query("SHOW COLUMNS FROM demo");
while($sonuc = $sorgu->mysqli_fetch_array($result)){
    echo $sonuc['Field']."<br>";






$sorgu = $baglanti->query("SHOW TABLES");  // Tabloları listeleme

while ($tablo = $sorgu->fetch_array()) {
    $html .= "<li>" . $tablo[0] . "</li>";
}
echo $html;



$sorgu = $link->query("SELECT * FROM stok"); // Makale tablosundaki tüm verileri çekiyoruz.
while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$baslik = $sonuc['ısım'];
$icerik = $sonuc['top'];
$icerik2 = $sonuc['username'];
$icerik3 = $sonuc['password'];



}
?>
    


    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $baslik; ?></td>
        <td><?php echo $icerik; ?></td>
        <td><?php echo $icerik2; ?></td>
        <td><?php echo $icerik3; ?></td>
        <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
        <td><input type="checkbox" name=""></td>
    </tr>
</div>
<?php 
} 
?>
</table>













</body>
</html>