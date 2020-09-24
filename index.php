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