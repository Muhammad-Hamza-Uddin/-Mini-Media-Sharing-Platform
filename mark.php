<?php
session_start();

// Check if session variables are set
if (!isset($_SESSION['name'], $_SESSION['email'], $_SESSION['class'], $_SESSION['marks'])) {
    header('Location: index.php');
    exit();
}

// Retrieve data from session
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$class = $_SESSION['class'];
$marks = $_SESSION['marks'];

// Calculate total marks, obtained marks, percentage, and grade
$total_marks = 700; // Total marks for 7 subjects (100 each)
$obtained_marks = array_sum($marks);
$percentage = ($obtained_marks / $total_marks) * 100;

// Determine grade
if ($percentage >= 90) {
    $grade = 'A+';
} elseif ($percentage >= 80) {
    $grade = 'A';
} elseif ($percentage >= 70) {
    $grade = 'B';
} elseif ($percentage >= 60) {
    $grade = 'C';
} elseif ($percentage >= 50) {
    $grade = 'D';
} else {
    $grade = 'Fail';
}

// Clear session data
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Marksheet Result</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Class:</strong> <?php echo htmlspecialchars($class); ?></p>
    <h5>Marks:</h5>
    <ul>
        <?php foreach ($marks as $index => $mark): ?>
            <li>Subject <?php echo $index + 1; ?>: <?php echo htmlspecialchars($mark); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total Obtained Marks:</strong> <?php echo $obtained_marks; ?> / <?php echo $total_marks; ?></p>
    <p><strong>Percentage:</strong> <?php echo number_format($percentage, 2); ?>%</p>
    <p><strong>Grade:</strong> <?php echo $grade; ?></p>
    <a href="index.php" class="btn btn-primary">Back to Form</a>
</div>

</body>
</html>
