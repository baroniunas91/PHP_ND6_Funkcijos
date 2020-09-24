<?php
echo '1) ----------------------------------------------------------------------------------------------------';
echo '<br>';
// Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function insertText($string) {
    echo "<h1>$string</h1>";
}
insertText('Hello World!');

