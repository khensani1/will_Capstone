<?php
include 'components/connect.php';

if (isset($_GET['resertToken'])) {
    $token = $_GET['resertToken'];

    // Verify if token exists and is valid
    $stmt = $conn->prepare("SELECT * FROM `password` WHERE resertToken = ? AND expiry_date > ?");
    $stmt->execute([$token, date("U")]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC); //fetch the row after checking if the token exist
       //If token is valid,show passord resert form
        if (isset($_POST['reset_password'])) {
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // hash the password
                $user_id = $row['user_id'];

                // Update user's password in the database
                $stmt = $conn->prepare("UPDATE `user` SET password = ? WHERE user_id = ?");
                $stmt->execute([$hashed_password, $user_id]);

                // Delete used token
                $stmt = $conn->prepare("DELETE FROM `password` WHERE resertToken = ?");
                $stmt->execute([$token]);

                echo "Password has been reset successfully.";
            } else {
                echo "Passwords do not match.";
            }
        }
    } else {
        echo "Invalid or expired token.";
    }
}else {
    echo "Token is missing";
}
?>

<!-- Reset Password Form -->
<form method="post" action="">
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" required>
    
    <button type="submit" name="reset_password">Reset Password</button>
</form>

