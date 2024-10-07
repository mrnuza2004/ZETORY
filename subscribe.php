<?php
// Replace this with your own email address
$to = "ameerahamednusaif@gmail.com"; // Enter the email address where you want to receive the subscriptions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email field is not empty
    if (!empty($_POST['email'])) {
        // Sanitize and validate the email address
        $subscriber_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (filter_var($subscriber_email, FILTER_VALIDATE_EMAIL)) {
            // Set the email subject and message
            $subject = "New Newsletter Subscription";
            $message = "You have a new subscriber: $subscriber_email";

            // Set headers
            $headers = "From: no-reply@yourdomain.com\r\n";
            $headers .= "Reply-To: $subscriber_email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Send the email
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Thank you for subscribing!'); window.location.href='index.html';</script>";
            } else {
                echo "<script>alert('Subscription failed. Please try again later.'); window.location.href='index.html';</script>";
            }
        } else {
            echo "<script>alert('Invalid email address.'); window.location.href='index.html';</script>";
        }
    }
}
?>
