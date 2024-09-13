<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address.
    $to = 'natfoale@gmail.com'; // Replace with your email address

    // Set the email subject.
    $subject = "New message from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $headers = "From: $name <$email>";

    // Send the email.
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        // Redirect to an error page
        header("Location: error.html");
        exit;
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.html");
    exit;
}
?>