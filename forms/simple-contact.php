<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "error";
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "error";
        exit;
    }
    
    // For now, we'll just simulate success
    // In a real implementation, you would send the email here
    
    // You can log the message to a file or database
    $log_entry = date('Y-m-d H:i:s') . " - From: $name <$email>, Subject: $subject, Message: $message\n";
    file_put_contents('contact_messages.log', $log_entry, FILE_APPEND | LOCK_EX);
    
    echo "success";
} else {
    echo "error";
}
?>