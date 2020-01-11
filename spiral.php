<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>File Explorer</title>
</head>
<body>

<div class="container">
<?php

    function drawSpiral($cols, $rows) {
        //echo "$cols, $rows" . PHP_EOL;
        // Количество ячек
        $iterations = ($cols * $rows);

        // Матрица
        $matrix = [];

        // Направление движения курсора
        $direction = "LEFT";

        // Координаты выбранной ячейки (курсор)
        $row = $col = 0;

        for($i = 1; $iterations >= $i; $i++) {
            // Добавляем
            //echo $direction . " = matrix[$row][$col] =  $i" . PHP_EOL;
            $matrix[$row][$col] = $i;

            // Определяем курсор и направление движения курсора
            if($direction === "LEFT") {
                $col++;
                if($cols === $col || isset($matrix[$row][$col]) ) {
                    $col--;
                    $direction = "BOTTOM";
                }
            }

            if($direction === "BOTTOM") {
                $row++;
                if($rows === $row || isset($matrix[$row][$col]) ) {
                    $row--;
                    $direction = "RIGHT";
                }
            }

            if($direction === "RIGHT") {
                $col--;
                if(0 > $col || isset($matrix[$row][$col]) ) {
                    $col++;
                    $direction = "TOP";
                }
            }

            if($direction === "TOP") {
                $row--;
                if(0 > $row || isset($matrix[$row][$col]) ) {
                    $row++;
                    $col++;
                    $direction = "LEFT";
                }
            }

        }

        // Отображение (рендер)
        echo "Спираль: $cols X $rows" . PHP_EOL;
        echo "<table border='1px'>";
        foreach($matrix as $row) {
            ksort ($row);
            echo "<tr><td>";
            echo implode("</td><td>",  $row);
            echo "</td></tr>";
        }
        echo "</table><br><br>";
    }

    drawSpiral(5, 5);
    drawSpiral(5, 1);
    drawSpiral(2, 10);
    drawSpiral(15, 22);
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
