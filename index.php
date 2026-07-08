<?php
require_once 'db.php';

function hesaplaDonemSonu($vize, $odev, $proje, $final) {
    $ortalama = ($vize * 0.25) + ($odev * 0.25) + ($proje * 0.05) + ($final * 0.45);
    
    $harf = '';
    $katsayi = 0.00;
    $statu = '';

    if ($ortalama >= 90) { 
        $harf = 'AA'; $katsayi = 4.00; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 85) { 
        $harf = 'BA'; $katsayi = 3.50; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 80) { 
        $harf = 'BB'; $katsayi = 3.00; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 75) { 
        $harf = 'CB'; $katsayi = 2.50; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 70) { 
        $harf = 'CC'; $katsayi = 2.00; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 65) { 
        $harf = 'DC'; $katsayi = 1.50; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 60) { 
        $harf = 'DD'; $katsayi = 1.00; $statu = 'Başarılı'; 
    } elseif ($ortalama >= 50) { 
        $harf = 'FD'; $katsayi = 0.50; $statu = 'Başarısız'; 
    } else { 
        $harf = 'FF'; $katsayi = 0.00; $statu = 'Başarısız'; 
    }

    return [
        'ortalama' => round($ortalama, 2),
        'harf' => $harf,
        'katsayi' => number_format($katsayi, 2),
        'statu' => $statu
    ];
}

$sql = "SELECT * FROM ogrenciler";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Not Hesaplama Sistemi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        .basarili { background-color: #d4edda; }
        .basarisiz { background-color: #f8d7da; }
    </style>
</head>
<body>
    <h2>Öğrenci Dönem Sonu Notları</h2>
    <table>
        <thead>
            <tr>
                <th>Öğrenci Adı Soyadı</th>
                <th>Vize (%25)</th>
                <th>Ödev (%25)</th>
                <th>Proje (%5)</th>
                <th>Final (%45)</th>
                <th>Dönem Sonu Notu</th>
                <th>Harf Notu</th>
                <th>Katsayı</th>
                <th>Statü</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sonuc = hesaplaDonemSonu($row['vize'], $row['odev'], $row['proje'], $row['final']);
                    
                    $statuClass = ($sonuc['statu'] == 'Başarısız') ? 'basarisiz' : 'basarili';
                    
                    echo "<tr class='{$statuClass}'>
                            <td>" . htmlspecialchars($row['ad_soyad']) . "</td>
                            <td>" . htmlspecialchars($row['vize']) . "</td>
                            <td>" . htmlspecialchars($row['odev']) . "</td>
                            <td>" . htmlspecialchars($row['proje']) . "</td>
                            <td>" . htmlspecialchars($row['final']) . "</td>
                            <td>" . $sonuc['ortalama'] . "</td>
                            <td>" . $sonuc['harf'] . "</td>
                            <td>" . $sonuc['katsayi'] . "</td>
                            <td>" . $sonuc['statu'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Sistemde kayıtlı öğrenci bulunamadı.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php 
$conn->close(); 
?>