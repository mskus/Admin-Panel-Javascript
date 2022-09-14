 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <style type="text/css">
        body
    </style>
</head>
<body>


 <?php 
include("config.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<div class="col-md-7">
<table class="table">
    
    <tr>
        <th>No</th>
        <th>Başlık</th>
        <th>İçerik</th>
        <th>Versıyon</th>

    </tr>

<?php 

$sorgu = $link->query("SELECT * FROM stok"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['ıd']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$baslik = $sonuc['ısım'];
$icerik = $sonuc['top'];
$icerik2 = $sonuc['versıyon'];

?>
    
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $baslik; ?></td>
        <td><?php echo $icerik; ?></td>
        <td><?php echo $icerik2; ?></td>
        <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php 
} 
?>

</table>
</div>
</div>
</body>
</html>