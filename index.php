<html>
<?php
//</editor-fold desc="на всякий случай">
ini_set("MEMORY_LIMIT", "128M");
echo "<pre>";
//</editor-fold>

/* функция разделения для удобного чтения */
function newTitle($number, $title)
{
    echo "<br>" . $number . " " . $title . "<br>";
}

newTitle(1, "Приветствие");

/* Приветствие */
function sayHello($a)
{
    if (!is_int($a)) {
        echo "Передался не целочисленный параметр\n";
        return;
    }
    for ($i = 0; $i < $a; $i++) {
        echo "hello world!\n";
    }
}

sayHello(5);
sayHello("5"); // Выдаст ошибку
newTitle(2, "Сумма");

/* Сложение цен */
function returnPrice($firstPrice, $secondPrice)
{
    return $firstPrice + $secondPrice;
}

echo 'Сумма товара = ' . returnPrice(2, 3);
newTitle(3, "Вывод имени");

/**
 * Функция выводит имя пользователя используя ссылки
 * @param $name
 * @return void
 */
function greeting(&$name): void
{
    $name = "Привет, $name!" . PHP_EOL;
    echo $name;
}

$name = 'Nik';
greeting($name);
newTitle(4, "Анонимная функция умножения на 2");

$multiply = function (int $num) {
    echo $num * 2 . "\n";
};
$multiply(2);
$multiply(4);
newTitle(5, "Тоже самое но со стрелочной функцией");

$secret = fn($num) => $num * 2;

echo $secret(3) . "\n";
echo $secret(5) . "\n";


/* 2ой вариант */
$secret = fn($num) => fn($snum) => $num * $snum;

$multiplyBy3 = $secret(3);
echo $multiplyBy3(5) . "\n";

$multiplyBy5 = $secret(5);
echo $multiplyBy5(2) . "\n";


newTitle(6, "рекусривная функция обхода многомерного массива");

/* вывод массива */
$array = [
    [
        "name" => "Nik",
        "age" => 27,
        "exp" => 3700
    ],
    [
        "name" => "Alex",
        "age" => 23,
        "exp" => 470
    ],
    [
        "name" => "Steve",
        "age" => 43,
        "exp" => 26000
    ]
];

function examination($matrix)
{
    foreach ($matrix as $key => $value) {
        if (is_array($value)) {
            echo "$key:\n";
            examination($value);
        } else {
            echo "$key => $value\n";
        }
    }
}

examination($array);
newTitle(7, "array_map");

$matrix = [1, 2.1, 3];
$newArray = array_map(fn($num) => $num + 1, $matrix);
var_dump($newArray);

newTitle(8, "strlen(), strtoupper(), strtolower()");
$Hello = "Hello World!";
echo $strlenHello = strlen($Hello) . "<br>";
echo $strtoupperHello = strtoupper($Hello) . "<br>";
echo $strtolowerHello = strtolower($Hello) . "<br>";

newTitle(9, "array_push(), array_pop(), array_merge()");

array_push($matrix, 4, 5);
echo "После array_push: ", implode(", ", $matrix), "<br>";

echo "Удалённый элемент: ", array_pop($matrix), "<br>";
echo "После array_pop: ", implode(", ", $matrix), "<br>";

$mergedMatrix = array_merge($matrix, [6, 7, 8]);
echo "После array_merge: ", implode(", ", $mergedMatrix);

newTitle(10, "is_string(), is_numeric(), is_array()");

$data = ["Hello", 123, 45.6, [1, 2, 3], true];

foreach ($data as $item) {
    var_export($item);
    echo " | is_string: " . (is_string($item) ? "true" : "false");
    echo " | is_numeric: " . (is_numeric($item) ? "true" : "false");
    echo " | is_array: " . (is_array($item) ? "true" : "false");
    echo "<br>";
}

newTitle(11, "abs(), sqrt(), round(), ceil(), floor()");

$num = -9.7;
echo "$num | abs: " . abs($num) . " | sqrt: " . sqrt(abs($num)) .
    " | round: " . round($num) . " | ceil: " . ceil($num) .
    " | floor: " . floor($num) . " | rand: " . rand(1, 100) .
    " | mt_rand: " . mt_rand(1, 100);

newTitle(12, "date()");

echo "Дата: " . date("Y.m.d") . " | Время: " . date("H:i:s") .
    " | Полная дата: " . date("l, d F Y H:i:s") .
    " | Год: " . date("Y");

?>
</html>
