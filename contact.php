<?php

if($_POST) {
    $first_name = "";
    $last_name = "";
    $visitor_email = "";

    $subject = "";
    $visitor_message = "";
    $email_body = "<div>";

    if(isset($_POST['first_name'])) {
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
        <label><b>First Name:</b></label>&nbsp;<span>".$first_name."</span>
        </div>";
    }

    if(isset($_POST['last_name'])) {
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
        <label><b>Last Name:</b></label>&nbsp;<span>".$last_name."</span>
        </div>";
    }

    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
        <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
        </div>";
    }

    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
        <label><b>Subject:</b></label>&nbsp;<span>".$subject."</span>
        </div>";
    }

    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
        <label><b>Visitor Message:</b></label>
        <div>".$visitor_message."</div>
        </div>";
    }

    $recipient = "atikulislam94@gmail.com";

    $email_body .= "</div>";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $first_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p><a href="contact.html">Back</a>';
    }

} else {
    echo '<p>Something went wrong</p>';
}
