<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kinyarwanda = $_POST['kinyarwanda'];
    $english = $_POST['english'];
    $math = $_POST['math'];
    $php = $_POST['php'];
    $js = $_POST['js'];

    // Calculate total marks and average
    $total_marks = $kinyarwanda + $english + $math + $php + $js;
    $average = $total_marks / 5;

    // Determine the grade based on the average
    if ($average >= 90) {
        $grade = "A";
    } elseif ($average >= 80) {
        $grade = "B";
    } elseif ($average >= 70) {
        $grade = "C";
    } elseif ($average >= 60) {
        $grade = "D";
    } else {
        $grade = "F";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .result {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Grade Result</h2>
        <div class="result">
            <?php
            echo "Average Marks: " . number_format($average, 2) . "<br>";
            echo "Grade: " . $grade;
            ?>
        </div>
    </div>
</body>
</html>
