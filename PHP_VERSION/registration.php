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

// Process registration form
if (isPostRequest()) {
    $name = getPostData('name');
    $email = getPostData('email');
    $phone = getPostData('phone');
    $loginId = getPostData('login_id');
    $password = getPostData('password');
    $confirmPassword = getPostData('confirm_password');
    $areaName = getPostData('area_name');
    $gender = getPostData('gender');
    $address = getPostData('address');
    
    // Validate form data
    $errors = [];
    
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($email)) $errors[] = 'Email is required';
    if (empty($phone)) $errors[] = 'Phone is required';
    if (empty($loginId)) $errors[] = 'Login ID is required';
    if (empty($password)) $errors[] = 'Password is required';
    if (empty($confirmPassword)) $errors[] = 'Confirm password is required';
    if (empty($gender)) $errors[] = 'Gender is required';
    if (empty($address)) $errors[] = 'Address is required';
    
    if (!empty($email) && !validateEmail($email)) {
        $errors[] = 'Invalid email address';
    }
    
    if (!empty($phone) && strlen($phone) != 10) {
        $errors[] = 'Phone number must be exactly 10 digits';
    }
    
    if (!empty($password) && !empty($confirmPassword) && $password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }
    
    // Check if login ID already exists
    if (!empty($loginId) && $database->checkLoginIdExists($loginId)) {
        $errors[] = 'Login ID already exists. Please choose a different one.';
    }
    
    if (empty($errors)) {
        // Register the user
        if ($database->registerUser($name, $email, $phone, $loginId, $password, $areaName, $gender, $address)) {
            redirectWithMessage('login.php', 'Registration successful! You can now login.', 'success');
        } else {
            $error_message = 'Registration failed. Please try again.';
        }
    } else {
        $error_message = implode('<br>', $errors);
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table style="margin-top: 30px; width: 100%;">
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td colspan="4">
                        <?php if ($error_message): ?>
                            <?php echo showErrorMessage($error_message); ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="width: 64px">&nbsp;</td>
                    <td align="center" colspan="4">
                        <h2 style="font-family: 'Times New Roman', Times, serif; color: #FF66CC; text-decoration: underline;">
                            Registration Page
                        </h2>
                    </td>
                </tr>
                
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Name</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <input type="text" name="name" style="width: 100%; padding: 5px;" 
                               value="<?php echo htmlspecialchars(getPostData('name')); ?>" required />
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">E-mail ID</label>
                    </td>
                    <td colspan="2">
                        <input type="email" name="email" style="width: 247px; padding: 5px;" 
                               value="<?php echo htmlspecialchars(getPostData('email')); ?>" required />
                    </td>
                    <td></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Phone</label>
                    </td>
                    <td colspan="2">
                        <input type="text" name="phone" style="width: 247px; padding: 5px;" maxlength="10" 
                               value="<?php echo htmlspecialchars(getPostData('phone')); ?>" required 
                               pattern="[0-9]{10}" title="Please enter exactly 10 digits" />
                    </td>
                    <td></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Login ID</label>
                    </td>
                    <td style="width: 100px">
                        <input type="text" name="login_id" style="width: 196px; padding: 5px;" 
                               value="<?php echo htmlspecialchars(getPostData('login_id')); ?>" required />
                        <br /><br />
                    </td>
                    <td style="width: 100px"></td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Password</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <input type="password" name="password" style="width: 244px; padding: 5px;" required />
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Confirm Password</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <input type="password" name="confirm_password" style="width: 251px; padding: 5px;" required />
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Area Name</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <input type="text" name="area_name" style="width: 249px; padding: 5px;" 
                               value="<?php echo htmlspecialchars(getPostData('area_name')); ?>" />
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Gender</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <select name="gender" style="height: 29px; width: 106px; padding: 2px;" required>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo (getPostData('gender') == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (getPostData('gender') == 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Trans-Gender" <?php echo (getPostData('gender') == 'Trans-Gender') ? 'selected' : ''; ?>>Trans-Gender</option>
                        </select>
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">Address</label>
                    </td>
                    <td style="width: 100px" colspan="2">
                        <textarea name="address" style="height: 94px; width: 261px; padding: 5px;" required><?php echo htmlspecialchars(getPostData('address')); ?></textarea>
                    </td>
                    <td style="width: 100px">&nbsp;</td>
                </tr>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td style="width: 100px">
                        <input type="submit" value="Register" 
                               style="font-family: 'Times New Roman', Times, serif; font-weight: bold; 
                                      background-color: #98CD23; color: white; padding: 8px 16px; 
                                      border: none; cursor: pointer; width: 131px;" />
                    </td>
                    <td style="width: 100px" colspan="2">
                        <input type="reset" value="Clear" 
                               style="font-family: 'Times New Roman', Times, serif; 
                                      padding: 8px 16px; width: 131px; cursor: pointer;" />
                    </td>
                    <td style="width: 100px"></td>
                </tr>
                
                </form>
                
                <tr>
                    <td style="width: 64px">&nbsp;</td>
                    <td colspan="3" style="padding-top: 20px;">
                        <p style="font-family: 'Times New Roman', Times, serif; text-align: center;">
                            Already have an account? 
                            <a href="login.php" style="color: #16A9EF; text-decoration: none; font-weight: bold;">
                                Login here
                            </a>
                        </p>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
