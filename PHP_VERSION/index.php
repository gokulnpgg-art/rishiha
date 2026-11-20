<?php
require_once 'includes/functions.php';

// Redirect logged in users to their respective dashboards
if (isUserLoggedIn()) {
    header('Location: dashboard.php');
    exit();
} elseif (isAdminLoggedIn()) {
    header('Location: admin_dashboard.php');
    exit();
}

include 'includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top: 50px;">
            <h1 style="color: #16A9EF; font-family: 'Times New Roman', Times, serif; margin-bottom: 30px;">
                Welcome to Web Based College Complaint System
            </h1>
            
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 18px; line-height: 1.8; color: #464646; margin-bottom: 40px;">
                An efficient platform for students, faculty, and staff to submit and track complaints 
                related to various college facilities and services.
            </p>
            
            <div class="row" style="margin: 40px 0;">
                <div class="col-md-4" style="margin-bottom: 30px;">
                    <div style="border: 1px solid #ddd; padding: 30px; height: 250px; background: #f9f9f9;">
                        <h3 style="color: #98CD23; margin-bottom: 20px;">For Students/Users</h3>
                        <p style="margin-bottom: 20px;">Submit and track your complaints easily</p>
                        <a href="login.php" style="background-color: #98CD23; color: white; padding: 10px 20px; 
                                                      text-decoration: none; border-radius: 4px; font-weight: bold;">
                            User Login
                        </a>
                        <br><br>
                        <a href="registration.php" style="color: #16A9EF; text-decoration: none;">
                            New User? Register Here
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4" style="margin-bottom: 30px;">
                    <div style="border: 1px solid #ddd; padding: 30px; height: 250px; background: #f9f9f9;">
                        <h3 style="color: #98CD23; margin-bottom: 20px;">For Administrators</h3>
                        <p style="margin-bottom: 20px;">Manage and respond to complaints</p>
                        <a href="admin_login.php" style="background-color: #16A9EF; color: white; padding: 10px 20px; 
                                                         text-decoration: none; border-radius: 4px; font-weight: bold;">
                            Admin Login
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4" style="margin-bottom: 30px;">
                    <div style="border: 1px solid #ddd; padding: 30px; height: 250px; background: #f9f9f9;">
                        <h3 style="color: #98CD23; margin-bottom: 20px;">General Information</h3>
                        <p style="margin-bottom: 20px;">Learn more about our system</p>
                        <a href="about.php" style="background-color: #808080; color: white; padding: 10px 20px; 
                                                      text-decoration: none; border-radius: 4px; font-weight: bold;">
                            About Us
                        </a>
                        <br><br>
                        <a href="feedback.php" style="color: #16A9EF; text-decoration: none;">
                            Give Feedback
                        </a>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 50px; padding: 30px; background: #f7f7f7; border-radius: 8px;">
                <h3 style="color: #16A9EF; margin-bottom: 20px;">System Features</h3>
                <div class="row">
                    <div class="col-md-6" style="text-align: left;">
                        <ul style="font-family: 'Times New Roman', Times, serif; color: #464646; line-height: 1.8;">
                            <li>Easy complaint submission process</li>
                            <li>Real-time complaint tracking</li>
                            <li>Multiple complaint categories</li>
                            <li>Secure user authentication</li>
                        </ul>
                    </div>
                    <div class="col-md-6" style="text-align: left;">
                        <ul style="font-family: 'Times New Roman', Times, serif; color: #464646; line-height: 1.8;">
                            <li>Admin panel for management</li>
                            <li>Notification system</li>
                            <li>User-friendly interface</li>
                            <li>Feedback mechanism</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
