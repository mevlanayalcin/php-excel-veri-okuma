<?php


require_once 'PHPExcel.php';
$connect=mysqli_connect("localhost","root","12345678","anisoft");
$excel= PHPExcel_IOFactory::load('liste.xlsx');

$excel ->getActiveSheetIndex(0);

echo "<table border='1'>";

$i=2;


while($i<2489)
{

    $pozno= mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('A'.$i) ->getValue() );
    $isinadi=mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('B'.$i) ->getValue() );
    $birimi= mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('C'.$i) ->getValue() );
    $birimfiyatyili="2017";
    $birimfiyat= mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('D'.$i) ->getValue());
    $karlibirimfiyat=  mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('D'.$i) ->getValue());
    $uzuntanimi= mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('G'.$i) ->getValue());
    $kurumid="7";
    $kurum="Karayolları Genel Müdürlüğü";
    $altkurum= mysqli_real_escape_string($connect,$excel ->getActiveSheet() ->getCell('F'.$i) ->getValue());
    $sql="INSERT INTO birimfiyatkitaplari(Tanimi,Birimi,BirimFiyati,BirimFiyatYili,UzunTanimi,KarliBirimFiyat,Kurum,AltKurum,kurum_id,PozNo)
    VALUES('".$isinadi."','".$birimi."','".$birimfiyat."','".$birimfiyatyili."','".$uzuntanimi."','".$karlibirimfiyat."','".$kurum."','".$altkurum."','".$kurumid."','".$pozno."')   ";

    if ($connect->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
        echo "<br>";
    }


    $i++;



}

if($pozno=="")
{
    echo "Boşum " ;
}

else
{
    echo "Doluyum";
}

mysqli_close($connect);


//echo "<table>";