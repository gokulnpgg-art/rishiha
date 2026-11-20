<?php
require_once 'includes/functions.php';
require_once 'includes/database.php';

$error_message = '';
$success_message = '';

// Redirect if already logged in
if (isUserLoggedIn()) {
    header('Location: dashboard.php');
    exit();
}

// Process login form
if (isPostRequest()) {
    $loginId = getPostData('login_id');
    $password = getPostData('password');
    
    if (empty($loginId) || empty($password)) {
        $error_message = 'Please enter both login ID and password.';
    } else {
        $user = $database->authenticateUser($loginId, $password);
        
        if ($user) {
            loginUser($user);
            redirectWithMessage('dashboard.php', 'Welcome back!', 'success');
        } else {
            $error_message = 'Invalid login credentials. Please try again.';
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
                            Student/User Login
                        </h2>
                    </td>
                </tr>
                
                <?php if ($error_message): ?>
                <tr>
                    <td colspan="2" align="center">
                        <?php echo showErrorMessage($error_message); ?>
                    </td>
                </tr>
                <?php endif; ?>
                
                <?php if ($success_message): ?>
                <tr>
                    <td colspan="2" align="center">
                        <?php echo showSuccessMessage($success_message); ?>
                    </td>
                </tr>
                <?php endif; ?>
                
                <tr>
                    <td colspan="2" align="center">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" 
                              style="border: 2px solid #ccc; padding: 20px; background-color: #f9f9f9;">
                            
                            <table style="width: 100%;">
                                <tr>
                                    <td style="padding: 10px;">
                                        <label for="login_id" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                            Login ID:
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px;">
                                        <input type="text" id="login_id" name="login_id" 
                                               style="width: 100%; padding: 8px; font-size: 14px;" 
                                               value="<?php echo htmlspecialchars(getPostData('login_id')); ?>" required />
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding: 10px;">
                                        <label for="password" style="font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                            Password:
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px;">
                                        <input type="password" id="password" name="password" 
                                               style="width: 100%; padding: 8px; font-size: 14px;" required />
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding: 20px;" align="center">
                                        <input type="submit" value="Login" 
                                               style="background-color: #98CD23; color: white; padding: 10px 20px; 
                                                      border: none; font-weight: bold; font-family: 'Times New Roman', Times, serif; 
                                                      cursor: pointer; font-size: 16px;" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center" style="padding-top: 20px;">
                        <p style="font-family: 'Times New Roman', Times, serif;">
                            Don't have an account? 
                            <a href="registration.php" style="color: #16A9EF; text-decoration: none; font-weight: bold;">
                                Register here
                            </a>
                        </p>
                        <p style="font-family: 'Times New Roman', Times, serif;">
                            <a href="admin_login.php" style="color: #16A9EF; text-decoration: none;">
                                Admin Login
                            </a> |
                            <a href="about.php" style="color: #16A9EF; text-decoration: none;">
                                About
                            </a> |
                            <a href="feedback.php" style="color: #16A9EF; text-decoration: none;">
                                Feedback
                            </a>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
