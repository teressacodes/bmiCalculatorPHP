<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tess's BMI Calculator</title>
</head>
<body>

<h3>Please enter your information to calculate your BMI:</h3>
<form name="bmi" method="POST" action="">
    <p>
        <label name="weight">Weight in Pounds</label>
        <label>
            <input name="weight" type="number" value="<?php echo isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : '0'; ?>">
        </label>
    </p>
    <p>
        <label name="height">Height in Inches</label>
        <label>
            <input name="height" type="number" value="<?php echo isset($_POST['height']) ? htmlspecialchars($_POST['height']) : '0'; ?>">
        </label>
    </p>
    <p>
        <input name="submit" type="submit" value="Calculate BMI">
    </p>
</form>

<?php
$bmi = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    if ($weight > 0 && $height > 0) {
        $bmi = ($weight / ($height * $height)) * 703;
    } else {
        echo "<p>Please enter valid weight and height.</p>";
    }
}

echo "<p>Your BMI is: " . $bmi . "</p>";
?>

</body>
</html>