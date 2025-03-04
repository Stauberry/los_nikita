<html>
<?php
//</editor-fold desc="на всякий случай">
ini_set("MEMORY_LIMIT", "128M");
echo "<pre>";

/* функция разделения для удобного чтения */
function newTitle($number, $title)
{
    echo "<br>" . $number . " " . $title . "<br>" . "<br>";
}

/* Выводит значения массива, увеличенные на 10 */
newTitle(1, "Увеличение на 10");
$array = [1, 2, -3.14, 10, -40];
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

// 4. Проверка наличия элемента в массиве
newTitle(4, "in_array");
$massive = [1, 2, 1, 3, '1', true, false];
$search = 1;
$count = in_array($search, $massive, true) ? array_count_values($massive)[$search] : 0;
echo $count ? "$search найден $count раз(а)" : "$search не найден";

// 5. Вывод имени и фамилии студентов
newTitle(5, "foreach");
$studentsInfo = [
    [
        "name" => "Иван",
        "surname" => "Иванов",
        "age" => 20
    ],
    [
        "name" => "Петр",
        "surname" => "Петров",
        "age" => 22
    ],
    [
        "name" => "Алексей",
        "surname" => "Сидоров",
        "age" => 19
    ]
];
foreach ($studentsInfo as $student) {
    echo $student["name"] . " " . $student["surname"] . PHP_EOL;
}

// 6. Фильтрация по возрасту
/*newTitle(6, "array_filter");
$filteredStudents = array_filter($studentsInfo, fn($s) => $s["age"] > 20);
print_r($filteredStudents);*/

// 6.1 Сортировка по возрастанию пузырьком
$filteredStudents = usort($studentsInfo, fn($a, $b) => $a["age"] <=> $b["age"]);
print_r($filteredStudents);

// 7. implode и explode
newTitle(7, "implode & explode");
$names = array_column($studentsInfo, "name");
$str = implode(", ", $names);
echo "Строка: $str" . PHP_EOL;
$arr = explode(", ", $str);
print_r($arr);

// 8. JSON обработка
newTitle(8, "json_encode & json_decode");
$json = json_encode($studentsInfo);
echo "JSON: $json" . PHP_EOL;
$decoded = json_decode($json, true);
print_r($decoded);

?>
</html>
