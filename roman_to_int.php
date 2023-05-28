<?php
function romanToInt($s) {
    $values = array(
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    );

    $total = 0;
    $length = strlen($s);

    for ($i = 0; $i < $length; $i++) {
        $currentValue = $values[$s[$i]];
        
        if ($i + 1 < $length && $values[$s[$i + 1]] > $currentValue) {
            $total -= $currentValue;
        } else {
            $total += $currentValue;
        }
    }

    return $total;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $romanNumeral = $_POST['romanNumeral'];

    // Convert to uppercase and remove leading/trailing whitespaces
    $romanNumeral = trim(strtoupper($romanNumeral));

    if (empty($romanNumeral)) {
        echo 'Error: Please enter a Roman numeral.';
    } else {
        $convertedInteger = romanToInt($romanNumeral);
        echo $convertedInteger;
    }
}
?>