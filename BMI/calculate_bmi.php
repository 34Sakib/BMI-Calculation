<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $heightFeet = $_POST['heightFeet'];
    $heightInches = $_POST['heightInches'];

    // Convert height to meters
    $height = ($heightFeet * 0.3048) + ($heightInches * 0.0254);

    if ($weight > 0 && $height > 0) {
        $bmi = $weight / ($height * $height);
        $bmiFormatted = number_format($bmi, 2);
        
        // Determine BMI category and associated color
        if ($bmi < 18.5) {
            $category = "Underweight";
            $color = "#1E90FF"; // Blue
        } elseif ($bmi >= 18.5 && $bmi <= 24.99) {
            $category = "Normal Weight";
            $color = "#32CD32"; // Green
        } elseif ($bmi >= 25.0 && $bmi <= 29.99) {
            $category = "Overweight";
            $color = "#FFD700"; // Yellow
        } elseif ($bmi >= 30.0 && $bmi <= 34.99) {
            $category = "Class I Obesity";
            $color = "#FF8C00"; // Dark Orange
        } elseif ($bmi >= 35.0 && $bmi <= 39.99) {
            $category = "Class II Obesity";
            $color = "#FF4500"; // Orange Red
        } else {
            $category = "Class III Obesity";
            $color = "#B22222"; // Firebrick Red
        }

        // Display the result
        echo "<h1>Your BMI: <span style='color:$color;'>$bmiFormatted</span></h1>";
        echo "<p style='color:$color;'>You are in the $category category.</p>";
    } else {
        echo "Please enter valid values.";
    }
} else {
    echo "Invalid request method.";
}
?>
