
<?php
/* Bağlantıyı Başlat */
$mysqli = new mysqli("localhost","dafron_dbdemo","","dafron_dbdemo");/* Bağlantıyı Kontrol Et */
if ($mysqli->connect_error){
    /* Bağlantı Başarısız İse */
    echo "Bağlantı Başarısız. Hata: " . $mysqli->connect_error;
    exit;
}else{
    /* Bağlantı Başarılı İse */
    echo "Bağlantı Başarılı.";
}/* Bağlantıyı Sonlandır. */
$mysqli->close();
?>
