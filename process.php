<?php
// process.php
// This page will receive the POST data, sanitize it, and display it nicely.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    function clean_input($key) {
        return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key])) : "";
    }

    $fullName = clean_input("fullName");
    $email    = clean_input("email");
    $phone    = clean_input("phone");
    $dob      = clean_input("dob");
    $gender   = clean_input("gender");
    $address  = clean_input("address");
    $course   = clean_input("course");
    $agree    = isset($_POST["agree"]) ? "Yes" : "No";

    // Simple server-side check (optional but good practice)
    $errors = [];

    if ($fullName === "") $errors[] = "Full name is missing.";
    if ($email === "")    $errors[] = "Email is missing.";
    if ($phone === "")    $errors[] = "Mobile number is missing.";
    if ($dob === "")      $errors[] = "Date of birth is missing.";
    if ($gender === "")   $errors[] = "Gender is missing.";
    if ($address === "")  $errors[] = "Address is missing.";
    if ($course === "")   $errors[] = "Course is not selected.";
    if ($agree !== "Yes") $errors[] = "You must confirm the information.";

} else {
    // If the page is accessed without POST data
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Submitted</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (!empty($errors)): ?>
        <div class="result-container">
            <h1>Submission Failed</h1>
            <p class="subtitle">There were some problems with your submission:</p>

            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            </ul>

            <p style="margin-top: 15px;">
                <a href="index.html" class="back-link">Go Back to Form</a>
            </p>
        </div>
    <?php else: ?>
        <div class="result-container">
            <h1>Application Submitted Successfully</h1>
            <p class="subtitle">Here is a summary of the information you provided:</p>

            <table class="result-table">
                <tr>
                    <th>Full Name</th>
                    <td><?php echo $fullName; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo nl2br($address); ?></td>
                </tr>
                <tr>
                    <th>Course Applied</th>
                    <td><?php echo $course; ?></td>
                </tr>
                <tr>
                    <th>Information Confirmed</th>
                    <td><?php echo $agree; ?></td>
                </tr>
            </table>

            <a href="index.html" class="back-link">Submit Another Response</a>
        </div>
    <?php endif; ?>
</body>
</html>
