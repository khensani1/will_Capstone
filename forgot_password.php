<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Composer autoload

include 'components/connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) { // Check if $user is not false
        $user_id = $user['user_id'];
        // Generate a unique token
        $resertToken = bin2hex(random_bytes(50));
        $expiry_date = date("Y-m-d H:i:s", strtotime('+30 minutes')); // 30 minutes from now
        
        // Insert token into the password reset table with expiration time
       
        $created_date = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT INTO `password` (user_id, resertToken, expiry_date, created_date ) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user['user_id'], $resertToken, $expiry_date, $created_date]);

        // Send reset link to user's email address
        $reset_link = "http://localhost/PontshoProject/reset_password.php?resertToken=" . $resertToken;
        
        // PHPMailer configuration
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'sarahmogala960@gmail.com'; // Gmail address
            $mail->Password = 'guzc bcit hunv jqga'; //  App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Disable SSL certificate verification (for development only, not recommended for production)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $mail->setFrom('sarahmogala960@gmail.com', 'ICE Support Team');
            $mail->addAddress($email);
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "You requested password reset, please click on the following link to reset your password: <a href='$reset_link'>Reset Password</a>";
            
            $mail->send();
            echo 'Password reset link has been sent to your email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

<!-- HTML Form -->
<form method="post" action="forgot_password.php">
    <label for="email">Enter your email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit" name="submit">Send Reset Link</button>
</form>

<!-- Display Error Message -->
<?php if (!empty($error_message)) { ?>
    <p><?php echo $error_message; ?></p>
<?php } ?>
