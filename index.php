<html>
<?php

echo '<pre>';
// комментарий 1 строка
/* комментарий 2 абзац */
//</editor-fold desc="комментарий 3 особый">

function newTitle($number, $title)
{
    echo '<br>' . $number . " " . $title . '<br>';
}
newTitle(1, "Приветствие");

/* Приветствие */
function sayHello($a) {
    if (!is_int($a)) {
        echo "Передался не целочисленный параметр\n";
        return;
    }
    for ($i = 0; $i < $a; $i++) {
        echo "hello world!\n";
    }
}
sayHello(5);
sayHello("5"); // Ошибка
newTitle(2, "Сумма");

/* Сложение цен */
function returnPrice($firstPrice, $secondPrice)
{
    return $firstPrice + $secondPrice;
}
echo 'Сумма товара = ' . returnPrice(2 ,3);
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

$multiply = function (int $num) {echo $num * 2 . "\n";};
$multiply(2);
$multiply(4);
newTitle(5, "Тоже самое но со стрелочной функцией");
echo "ошибка";
/* что то не так....хотя вроде работает
$secret = fn($num) => $num * 2;

echo $secret(3) . "\n";
echo $secret(5) . "\n";
*/

/* 2ой вариант
$secret = fn($num) => fn($snum) => $num * $snum;

$multiplyBy3 = $secret(3);
echo $multiplyBy3(5) . "\n";

$multiplyBy5 = $secret(5);
echo $multiplyBy5(2) . "\n";
*/

newTitle(6, "рекусривная функция обхода многомерного массива");

/* вывод массива */
$array = [
    ["Nik", 27, 3700],
    ["Alex", 23, 470],
    ["Steve", 43, 3400]];

function examination($matrix)
{
    foreach ($matrix as $item) {
        print_r($item);
    }
}
examination($array);
newTitle(7, "array_map");


?>
</html>
