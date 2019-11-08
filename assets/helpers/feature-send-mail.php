<?php

function victory_send_mail() {
	$victory = get_theme_mod('victory');

	error_reporting(E_ALL); ini_set('display_errors', 1);

	parse_str($_REQUEST['formData']);

	// Only process POST reqeusts.
	if ($_SERVER["REQUEST_METHOD"] == "POST" && wp_verify_nonce( $_REQUEST['nonce'], 'victory-nonce' )) {

		// Get the form fields and remove whitespace.
		$name = strip_tags(trim($name));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
		$email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
		$message = trim($message);

		// Check that data was sent to the mailer.
		if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {

			// Set a 400 (bad request) response code and exit.
			http_response_code(400);
			echo "Oops! Looks like you missed a required field.";
			exit;
		}

		// Set the email subject.
		$subject = "New contact from $name";

		// Build the email content.
		$email_content = "Name: $name\n";
		$email_content .= "Email: $email\n\n";
		$email_content .= "Message:\n$message\n";

		// Build the email headers.
		$email_headers = "From: $name <$email>";

		// Send the email.
		if (mail($victory['contact_email'], $subject, $email_content, $email_headers)) {

			// Set a 200 (okay) response code.
			http_response_code(200);
			echo "Thank You! Your message has been sent.";
		} else {

			// Set a 500 (internal server error) response code.
			http_response_code(500);
			echo "Oops! Something went wrong.";
		}

	} else {

		// Not a POST request, set a 403 (forbidden) response code.
		http_response_code(403);
		echo "Oops! There was a problem.";
	}
}
add_action( 'wp_ajax_victory_send_mail', 'victory_send_mail' );
add_action( 'wp_ajax_nopriv_victory_send_mail', 'victory_send_mail' );
