<?php
//</editor-fold desc="на всякий случай">
ini_set("MEMORY_LIMIT", "128M");
echo "<pre>";

/* функция разделения для удобного чтения */
function newTitle($number, $title)
{
    echo "<br>" . $number . " " . $title . "<br>". "<br>";
}

/* Выводит значения массива, увеличенные на 10 */
newTitle(1, "Увеличение на 10");
$array = [1 , 2, -3.14 , 10, -40];
echo "Массив до: ";
print_r($array);
function plusTen($matrix)
{
    return $matrix + 10;
}
$arrAfter = array_map('plusTen', $array);
echo "Массив после: ";
print_r($arrAfter);

/* сортировка массива по четности и нечетности */
$secArray = [1, 2, 3, 4];
newTitle(2, "array_filter");
/* 1 вариант */

//function oddFunc($matrix): int
//{
//    return !($matrix & 1);
//}
//function evenFunc($matrix): int
//{
//    return $matrix & 1;
//}
//echo "Четные: ";
//print_r(array_filter($secArray, 'oddFunc'));
//echo "Нечетные: ";
//print_r(array_filter($secArray, 'evenFunc'));

/* 2 вариант */
function evenFunc($matrix): int
{
    return !($matrix & 1);
}
echo "Четные: ";
$oddNums = array_filter($secArray, 'evenFunc');
print_r($oddNums);
echo "Нечетные: ";
$evenNums = array_diff($secArray, $oddNums);
print_r($evenNums);

/* 3 вариант */

/* array chunk разбиение массива */
newTitle(3, "array_chunk");
$newArray = array_chunk($array, 2, true);
echo "Массив до \"разреза\": ";
print_r($array);
echo "Массив после \"разреза на части по два\": ";
print_r($newArray);

/* использование in_array */
newTitle(4, "in_array");
$search = [1, 2, 1, 3, true, false];


?>
</html>
