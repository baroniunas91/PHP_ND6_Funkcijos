<?php
echo '1) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function insertText($string) {
    echo "<h1>$string</h1>";
}
insertText('Hello World!');
echo '<br>';
echo '2) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis 
// tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;
function insertTextAndTag($string, $tagNum) {
    echo "<h$tagNum>$string</h$tagNum>";
}
insertTextAndTag('Stringas su Tag\'u', rand(1,6));
echo '<br>';
echo '3) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. 
// Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po 
// paskutinio) Keitimui naudokite pirmo uždavinio funkciją;
function getAllDigits($string) {
    $string = preg_replace('/\D/', '', $string);
    return $string;
}
$generatedString = md5(time());
echo 'Sugeneruotas stringas: ';
echo '<br>';
echo $generatedString;
echo '<br>';
echo '<br>';
echo 'Gauti skaitmenys: ';
echo '<br>';
insertText(getAllDigits($generatedString));

echo '4) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos 
// (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;

function beLiekanos($sk) {
    $sk = (int)$sk;
    $count = 0;
    for($i=$sk-1; $i>1; $i--) {
        if($sk % $i == 0) {
            $count++;
            // echo "Dalinasi be liekanos $i";
            // echo '<br>';
        }
    }
    return $count;
}
$skaicius = 222;
$skaicius = (int)$skaicius;
echo 'Įvestas skaičius ' . $skaicius .'. Be liekanos dalinasi ' . beLiekanos($skaicius) . ' skaičiai (išskyrus vienetą ir patį save)';
echo '<br>';
echo '5) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. 
// Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.
echo 'Sugeneruotas masyvas iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuotas masyvas pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudojant ketvirto uždavinio funkciją.';
echo '<br>';
$masyvas = [];
foreach(range(0, 99) as $val) {
    $rand = rand(33, 77);
    $masyvas[] = $rand;
    // $kartai = beLiekanos($rand);
    // echo "Masyvo reikšmė $rand, dalinasi be liekanos $kartai kartų";
    // echo '<br>';
}
$callback = function($a, $b) {
    return beLiekanos($a) <=> beLiekanos($b);
};

usort($masyvas, $callback);

echo '<pre>';
print_r($masyvas);
echo '</pre>';

echo '6) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. 
// Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.
$arr = [];
foreach(range(0, 99) as $val) {
    $rand = rand(33, 77);
    $arr[] = $rand;
}
// echo '<pre>';
// print_r($arr);
// echo '</pre>';
echo '<br>';
echo 'Ištrinti pirminiai skaičiai:';
echo '<br>';
foreach($arr as $key => $value) {
    if(beLiekanos($value) == 0) {
        echo $value;
        echo '<br>';
        unset($arr[$key]);
    }
}
$arrLength = count($arr);
echo '<br>';
echo "Ištrynus pirminius skaičius, masyvo ilgis tapo - $arrLength";
echo '<br>';
echo '<pre>';
print_r($arr);
echo '</pre>';


echo '7) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra 
// atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir 
// pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis 
// elementas yra lygus 0;
