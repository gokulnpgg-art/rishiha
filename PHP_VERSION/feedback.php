<?php
require_once 'includes/functions.php';
require_once 'includes/database.php';

$message = '';
$message_type = '';

// Process feedback form
if (isPostRequest()) {
    $name = getPostData('name');
    $designation = getPostData('designation');
    $company = getPostData('company');
    $areaOfWork = getPostData('area_of_work');
    $address = getPostData('address');
    $city = getPostData('city');
    $state = getPostData('state');
    $country = getPostData('country');
    $pincode = getPostData('pincode');
    $email = getPostData('email');
    $telephone = getPostData('telephone');
    $fax = getPostData('fax');
    $queryComment = getPostData('query_comment');
    
    // Validate required fields
    $errors = [];
    
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($queryComment)) $errors[] = 'Query/Comment is required';
    if (!empty($email) && !validateEmail($email)) $errors[] = 'Invalid email address';
    
    if (empty($errors)) {
        // Submit feedback
        if ($database->submitFeedback($name, $designation, $company, $areaOfWork, $address, $city, $state, $country, $pincode, $email, $telephone, $fax, $queryComment)) {
            $message = 'Thank you for your feedback! We appreciate your valuable suggestions.';
            $message_type = 'success';
            // Clear form data after successful submission
            $_POST = array();
        } else {
            $message = 'Failed to submit feedback. Please try again.';
            $message_type = 'error';
        }
    } else {
        $message = implode('<br>', $errors);
        $message_type = 'error';
    }
}

include 'includes/header.php';
?>

<div class="container">
    <table style="width: 100%; margin-top: 20px;">
        <tr>
            <td colspan="2" rowspan="2" style="height: 20px" align="center">
                <h2 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: large; color: #16A9EF;">
                    Feedback
                </h2>
            </td>
            <td align="center" colspan="1" rowspan="2" style="height: 20px"></td>
        </tr>
        <tr></tr>
        
        <tr>
            <td align="center" colspan="2" rowspan="1" style="height: 20px"></td>
            <td align="center" colspan="1" rowspan="1" style="height: 20px"></td>
        </tr>
        
        <tr>
            <td align="center" colspan="2" rowspan="1" style="height: 20px; text-align: left;">
                <?php if ($message): ?>
                    <?php if ($message_type == 'success'): ?>
                        <div style="color: green; font-weight: bold; font-size: 16px; margin: 10px 0;">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php else: ?>
                        <div style="color: red; font-weight: bold; font-size: 16px; margin: 10px 0;">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <td align="center" colspan="1" rowspan="1" style="height: 20px; text-align: left"></td>
        </tr>
        
        <tr>
            <td colspan="2" rowspan="2" style="height: 40px">
                <p style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium; width: 463px;">
                    Online civil registry welcomes valuable suggestions and feedback for content improvement of this website
                </p>
            </td>
            <td colspan="1" rowspan="2" style="height: 40px"></td>
        </tr>
        <tr></tr>
        
        <tr>
            <td colspan="2" style="height: 20px"></td>
            <td colspan="1" style="height: 20px"></td>
        </tr>
        
        <tr>
            <td colspan="2" style="height: 20px">
                <h3 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">
                    Feedback about our site
                </h3>
            </td>
            <td colspan="1" style="height: 20px"></td>
        </tr>
        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <tr>
            <td style="width: 100px; height: 26px;">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Name</label>
            </td>
            <td style="width: 100px; height: 26px;">
                <input type="text" name="name" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('name')); ?>" required />
            </td>
            <td style="width: 100px; height: 26px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Designation</label>
            </td>
            <td style="width: 100px">
                <input type="text" name="designation" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('designation')); ?>" />
            </td>
            <td style="width: 100px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Company</label>
            </td>
            <td style="width: 100px">
                <input type="text" name="company" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('company')); ?>" />
            </td>
            <td style="width: 100px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Area of work</label>
            </td>
            <td style="width: 100px">
                <input type="text" name="area_of_work" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('area_of_work')); ?>" />
            </td>
            <td style="width: 100px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Address</label>
            </td>
            <td style="width: 100px">
                <input type="text" name="address" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('address')); ?>" />
            </td>
            <td style="width: 100px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">City</label>
            </td>
            <td style="width: 100px">
                <input type="text" name="city" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('city')); ?>" />
            </td>
            <td style="width: 100px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">State</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="text" name="state" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('state')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Country</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="text" name="country" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('country')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Pin</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="text" name="pincode" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('pincode')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">E-mail</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="email" name="email" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('email')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Telephone</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="text" name="telephone" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('telephone')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium;">Fax</label>
            </td>
            <td style="width: 100px; height: 20px">
                <input type="text" name="fax" style="padding: 5px;" value="<?php echo htmlspecialchars(getPostData('fax')); ?>" />
            </td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td colspan="2" style="height: 20px">
                <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium; width: 321px;">
                    Enter your queries/Comment in the space below
                </label>
            </td>
            <td colspan="1" style="height: 20px"></td>
        </tr>
        
        <tr>
            <td colspan="2" style="height: 20px">
                <textarea name="query_comment" style="width: 454px; height: 100px; padding: 5px;" required><?php echo htmlspecialchars(getPostData('query_comment')); ?></textarea>
            </td>
            <td colspan="1" style="height: 20px"></td>
        </tr>
        
        <tr>
            <td colspan="2" style="height: 20px"></td>
            <td colspan="1" style="height: 20px"></td>
        </tr>
        
        <tr>
            <td style="width: 100px; height: 20px" align="right">
                <input type="submit" value="Submit" 
                       style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium; 
                              background-color: #98CD23; color: white; padding: 8px 16px; border: none; cursor: pointer;" />
            </td>
            <td style="width: 100px; height: 20px" align="left">
                <input type="reset" value="Clear" 
                       style="font-family: 'Times New Roman', Times, serif; font-weight: bold; font-size: medium; 
                              padding: 8px 16px; cursor: pointer;" />
            </td>
            <td align="left" style="width: 100px; height: 20px"></td>
        </tr>
        
        </form>
        
        <tr>
            <td style="width: 100px; height: 20px"></td>
            <td style="width: 100px; height: 20px"></td>
            <td style="width: 100px; height: 20px"></td>
        </tr>
        
        <tr>
            <td colspan="2" style="padding-top: 30px;" align="center">
                <p style="font-family: 'Times New Roman', Times, serif;">
                    <a href="login.php" style="color: #16A9EF; text-decoration: none;">
                        User Login
                    </a> |
                    <a href="admin_login.php" style="color: #16A9EF; text-decoration: none;">
                        Admin Login
                    </a> |
                    <a href="about.php" style="color: #16A9EF; text-decoration: none;">
                        About
                    </a>
                </p>
            </td>
            <td></td>
        </tr>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
