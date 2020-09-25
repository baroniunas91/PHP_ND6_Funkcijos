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
    if($sk <= 1) {
        return 'Turi būti įvestas didesnis nei 1';
    }
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
$masyvas2 = [];
$randTimes = rand(10, 30);
echo "Suksim $randTimes kartų";
echo '<br>';
function generateArray($times) {
    $newArray = [];
    $rand = rand(9, 19);
    static $count = 0;

    foreach(range(0, $rand) as $key) {
        if($key == $rand && $count <= $times) {
            if($count == $times) {
                $newArray[] = 0;
            } else {
                $count++;
                $newArray[] = generateArray($times);
            }
        } else {
            $newArray[] = rand(0, 10);
        }
    }
    return $newArray;
}

$masyvas2 = generateArray($randTimes);

echo '<pre>';
print_r($masyvas2);
echo '</pre>';

echo '8) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.
function arraysSum($array){
    $sum = 0;
    for($i=0; $i<count($array); $i++) {
        if($i == (count($array)-1)) {
            // echo 'Suma: ' . $sum;
            // echo '<br>';
            if(is_array($array[$i])) {
                return $sum += arraysSum($array[$i]);
            } else {
                return $sum;
            }
        } else {
            $sum += $array[$i];
        }
    }
    return $sum;
}
$suma = arraysSum($masyvas2);
echo "Visų elementų suma: $suma";
echo '<br>';
echo '9) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. 
// Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną 
// elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar 
// vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

// Generuojam masyvą
$array9 = [];
foreach(range(0, 2) as $key) {
    $rand = rand(1, 33);
    $array9[$key] = $rand;
}
echo 'Sugeneruotas pradinis masyvas: ';
echo '<pre>';
print_r($array9);
echo '</pre>';

function paskutiniai3Pirminiai($arr) {
    foreach($arr as $k => $v) {
        if($k >= count($arr)-3) {
            if(!(beLiekanos($v) === 0)) {
                $arr[] = rand(1, 33);
                return paskutiniai3Pirminiai($arr);
            }
        }
    }
    return $arr;
}
$array9 = paskutiniai3Pirminiai($array9);
echo 'Sugeneruotas masyvas, kurio paskutiniai trys elementai yra pirminiai skaičiai: ';
echo '<pre>';
print_r($array9);
echo '</pre>';

echo '10) ----------------------------------------------------------------------------------------------------';
echo '<br>';
