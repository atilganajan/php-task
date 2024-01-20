<?php

// TODO: 1. Aşağıdaki kodun sonucunun “Apple” olarak çıkması gerekmektedir. Çıktı kodunu lütfen tek satır halinde yazınız.

$array[] = "Pie";
$array[] = "Banana";
$array[] = "Apple";
$array[] = "Strawberry";

echo "$array[2]";

// TODO: 2. Veritabanına bağlanmak (connect) için lütfen bağlantı kodunu yazınız.


$host = "localhost";
$dbname = "laravel";
$user = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// TODO 3. Kullanıcının tarayıcı ve işletim sistemi bilgilerini almak için kullanılan kodu yazınız.

function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }elseif(preg_match('/Firefox/i',$u_agent)){
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }elseif(preg_match('/OPR/i',$u_agent)){
        $bname = 'Opera';
        $ub = "Opera";
    }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
        $bname = 'Apple Safari';
        $ub = "Safari";
    }elseif(preg_match('/Netscape/i',$u_agent)){
        $bname = 'Netscape';
        $ub = "Netscape";
    }elseif(preg_match('/Edge/i',$u_agent)){
        $bname = 'Edge';
        $ub = "Edge";
    }elseif(preg_match('/Trident/i',$u_agent)){
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }

    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {

    }

    $i = count($matches['browser']);
    if ($i != 1) {

        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }else {
            $version= $matches['version'][1];
        }
    }else {
        $version= $matches['version'][0];
    }


    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}

$ua=getBrowser();

$browserAndPlatform = "Tarayıcı:". $ua['name'] . "<br>  İşletim sistemi:"  .$ua['platform'] ;
print_r($browserAndPlatform);

// TODO: 4. Sessionda tekil oturumu silmek / yok etmek için hangi kod kullanılır, yazınız.

session_destroy();


// TODO: 5. Herhangi bir stringin ilk 3 karakterini almak için kod yazınız.

$string = "Ahmet";

$firstThreeCharacter =substr($string,0,3);

echo $firstThreeCharacter;

// TODO: 6. Kullanıcıyı PHP ile bir sayfaya yönlendirmek için kullanacağınız kodu yazınız.

header('Location:redirect ');


// TODO: 7. SQL: 2 tarih arasındaki verileri listelemek için örnek sorgu yazınız. (Tablo adını, verileri rastgele kullanabilirsiniz.)
$sql = "SELECT * FROM orders WHERE order_date BETWEEN '2023-01-01' AND '2023-12-31'";

// TODO: 8. Aşağıdaki verinin çıktısı “doğru” olmalıdır. Aşağıdaki kodun çıktısını kontrol ediniz. Doğru veya yanlış ise yazınız, yanlış ise doğru halini yazınız.

$var = 0;
if (empty($var)):
    echo "doğru"; // TODO: Cevap => empty fonksiyonu boş olup olmadığını kontrol eder ancak değerinide dikkate alır. Bu nedenden dolayı çıktı doğru olarak çıkacaktır.
endif;


// TODO: 9. Php çağrıldığında hangi kod PHP betik dosyasının bilgilerini içerir, yazınız.

print_r(phpinfo()); // TODO: Bu ifadeyi kullanarak PHP ile ilgili detaylı bilgi alabiliriz.

// TODO: 10. Kısa bir şekilde POST ile gelen dosyanın upload etme kodlarını yazınız.

if(isset($_POST['submit'])){
    $uploadDir = 'images/';
    $uploadedFile = $uploadDir . basename($_FILES['file']['name']);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)){
        echo "successful.";
    } else {
        echo "unexpected error.";
    }
}



