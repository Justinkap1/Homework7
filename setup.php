<?php
function generateStartingPositions($rows, $columns) {
    $positions = [];

    if ($rows * $columns < 7) {
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $curArray = array($i, $j);
                array_push($positions, $curArray);
            }
        }
    } else {
        for ($i = 0; $i < 7; $i++) {
            do {
                $row = rand(0, $rows - 1);
                $column = rand(0, $columns - 1);
                $position = [$row, $column];
            } while (in_array($position, $positions));

            $positions[] = $position;
        }
    }

    return $positions;
}

// Get the number of rows and columns from the query parameters
$rows = isset($_GET['rows']) ? $_GET['rows'] : 1;
$columns = isset($_GET['columns']) ? $_GET['columns'] : 1;

$startingPositions = generateStartingPositions($rows, $columns);

header('Content-Type: application/json');
echo json_encode(['startingPositions' => $startingPositions]);