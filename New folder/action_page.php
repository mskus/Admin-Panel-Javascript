<?

@mysql_connect(“localhost”, ”root”, ”12345”)
  or die (“Veritabanına bağlanırken bir hata oluştu!”);

/* mysql’de kendi veritabanimizi secim islemi */
@mysql_select_db(“deneme”)
  or die(“Veritanında bir hata oluştu!”);

$sira = 0;
while ($sira < 4)
{
  /* mysql’e sorgu gönderiliyor ve bu sorgudan gelen degerler bir degiskene atanıyor.
  $sorgu = mysql_query(“select * from kullanicilar”);
  $ad = mysql_result($sorgu, $sira, ’Ad’);
  echo “$ad <br>”;
  $sira++;
}
?>