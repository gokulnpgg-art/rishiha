<?php
require_once 'includes/functions.php';
require_once 'includes/database.php';

$error_message = '';

// Redirect if already logged in
if (isAdminLoggedIn()) {
    header('Location: admin_dashboard.php');
    exit();
}

// Process login form
if (isPostRequest()) {
    $username = getPostData('username');
    $password = getPostData('password');
    
    if (empty($username) || empty($password)) {
        $error_message = 'Please enter both username and password.';
    } else {
        $admin = $database->authenticateAdmin($username, $password);
        
        if ($admin) {
            loginAdmin($admin);
            redirectWithMessage('admin_dashboard.php', 'Welcome to Admin Panel!', 'success');
        } else {
            $error_message = 'Invalid admin credentials. Please try again.';
        }
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="style1" style="margin-top: 50px;">
                <tr>
                    <td colspan="2" align="center" style="padding-bottom: 20px;">
                        <h2 style="color: #16A9EF; font-family: 'Times New Roman', Times, serif;">
                            Admin Login
                        </h2>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <?php if ($error_message): ?>
                            <?php echo showErrorMessage($error_message); ?>
                        <?php endif; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <!-- Login Form styled similar to ASP.NET Login control -->
                        <div style="border: 1px solid #ccc; padding: 20px; background-color: #f9f9f9; 
                                    font-family: Verdana; font-size: large; color: #333333; width: 418px;">
                            
                            <div style="background-color: #990000; color: white; font-weight: bold; 
                                        font-size: 0.9em; padding: 5px; text-align: center; margin-bottom: 10px;">
                                Admin Login
                            </div>
                            
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="padding: 5px;">
                                            <label style="font-size: 0.8em;">User Name:</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;">
                                            <input type="text" name="username" style="width: 100%; font-size: 0.8em; padding: 5px;" 
                                                   value="<?php echo htmlspecialchars(getPostData('username')); ?>" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;">
                                            <label style="font-size: 0.8em;">Password:</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px;">
                                            <input type="password" name="password" style="width: 100%; font-size: 0.8em; padding: 5px;" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px;" align="center">
                                            <input type="submit" value="Log In" 
                                                   style="background-color: white; border: 1px solid #CC9966; 
                                                          color: #990000; font-family: Verdana; font-size: 0.8em; 
                                                          padding: 5px 15px; cursor: pointer;" />
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center" style="padding-top: 20px;">
                        <p style="font-family: 'Times New Roman', Times, serif;">
                            <a href="login.php" style="color: #16A9EF; text-decoration: none;">
                                User Login
                            </a> |
                            <a href="about.php" style="color: #16A9EF; text-decoration: none;">
                                About
                            </a> |
                            <a href="feedback.php" style="color: #16A9EF; text-decoration: none;">
                                Feedback
                            </a>
                        </p>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size: 12px; color: #666;">
                            Default Admin Credentials: admin / admin123
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
