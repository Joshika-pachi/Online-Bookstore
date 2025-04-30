<?php
// Expire the cookies
setcookie("userid", "", time() - 60);
setcookie("password", "", time() - 60);

// Redirect to login page
header("Location: contact.php");
exit;
?>
