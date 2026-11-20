<?php
require_once 'includes/functions.php';

// Determine who is logging out
if (isAdminLoggedIn()) {
    logoutAdmin();
    redirectWithMessage('admin_login.php', 'You have been logged out successfully.', 'success');
} elseif (isUserLoggedIn()) {
    logoutUser();
    redirectWithMessage('login.php', 'You have been logged out successfully.', 'success');
} else {
    // No one is logged in, redirect to main login
    header('Location: login.php');
    exit();
}
?>
