# Web Based College Complaint System - PHP Version

This is a PHP conversion of the original ASP.NET Web Based College Complaint System, designed to run on XAMPP with MySQL database.

## Features

- **User Management**: Student/Faculty/Staff registration and login
- **Complaint Management**: Submit, track, and manage complaints
- **Admin Panel**: Administrative dashboard for complaint management
- **Notification System**: Real-time notifications for users
- **Feedback System**: User feedback collection
- **Responsive Design**: Original design preserved with responsive layout

## Technologies Used

- **Frontend**: PHP, HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP (procedural and OOP)
- **Database**: MySQL/MariaDB
- **Web Server**: Apache (via XAMPP)

## Installation Instructions

### Prerequisites

1. **XAMPP**: Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Ensure Apache and MySQL services are running

### Setup Steps

1. **Copy Files to XAMPP**:
   ```
   Copy the entire PHP_VERSION folder to C:\xampp\htdocs\
   Rename it to 'college_complaint' (or your preferred name)
   ```

2. **Database Setup**:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database or run the SQL file:
     ```sql
     Import: database/college_complaint_system.sql
     ```
   - The script will create all necessary tables and insert default data

3. **Configuration**:
   - Open `includes/database.php`
   - Update database connection settings if needed:
     ```php
     private $host = 'localhost';
     private $database = 'college_complaint_system';
     private $username = 'root';  // XAMPP default
     private $password = '';      // XAMPP default (empty)
     ```

4. **Access the Application**:
   - Open browser and go to: `http://localhost/college_complaint/`

## Default Login Credentials

### Admin Login
- **Username**: admin
- **Password**: admin123

### Test User
You can register a new user or create one through the registration page.

## File Structure

```
PHP_VERSION/
├── includes/
│   ├── database.php       # Database connection and operations
│   ├── functions.php      # Common functions and session management
│   ├── header.php         # Main header template
│   ├── user_header.php    # User navigation header
│   └── footer.php         # Footer template
├── database/
│   └── college_complaint_system.sql  # Database schema
├── css/
│   ├── style.css          # Original CSS styles
│   └── bootstrap.css      # Bootstrap styles
├── js/                    # JavaScript files
├── index.php              # Home page
├── login.php              # User login
├── admin_login.php        # Admin login
├── registration.php       # User registration
├── about.php              # About page
├── feedback.php           # Feedback form
├── logout.php             # Logout functionality
└── README.md              # This file
```

## Key Features Implemented

### User Features
- ✅ User registration with validation
- ✅ Secure login system
- ✅ Session management
- ✅ Complaint submission (to be implemented)
- ✅ Complaint tracking (to be implemented)
- ✅ Notifications (to be implemented)

### Admin Features
- ✅ Admin login system
- ✅ Admin dashboard (to be implemented)
- ✅ Complaint management (to be implemented)
- ✅ User management (to be implemented)
- ✅ Notification management (to be implemented)

### General Features
- ✅ Feedback system
- ✅ About page
- ✅ Responsive design
- ✅ Original styling preserved
- ✅ Secure database operations with prepared statements
- ✅ Input sanitization and validation

## Database Schema

The system uses the following main tables:
- `users` - Student/Faculty/Staff information
- `admin_users` - Administrative users
- `complaints` - Complaint records
- `complaint_categories` - Complaint categories
- `complaint_replies` - Replies to complaints
- `feedback` - User feedback
- `notifications` - System notifications
- `user_sessions` - Session tracking

## Security Features

- Password hashing (MD5 - can be upgraded to bcrypt)
- SQL injection prevention with prepared statements
- Input sanitization and validation
- Session management with proper logout
- CSRF protection (basic implementation)

## Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge

## Troubleshooting

### Common Issues

1. **Database Connection Error**:
   - Ensure MySQL service is running in XAMPP
   - Check database credentials in `includes/database.php`
   - Verify database exists

2. **404 Errors**:
   - Ensure files are in correct XAMPP htdocs directory
   - Check file permissions
   - Verify Apache service is running

3. **CSS/JS Not Loading**:
   - Check file paths in header templates
   - Ensure CSS and JS files are copied correctly

4. **Session Issues**:
   - Ensure PHP sessions are enabled
   - Check session configuration in php.ini

## Future Enhancements

- Upgrade password hashing to bcrypt
- Add file upload functionality for complaints
- Email notifications
- Advanced reporting features
- Mobile app integration
- API endpoints for external integration

## Support

For issues or questions, please check:
1. XAMPP documentation
2. PHP documentation
3. MySQL documentation

## License

This project is for educational purposes. Original design credits to the ASP.NET version developers.

---

**Last Updated**: September 2025  
**Version**: 1.0  
**Author**: PHP Conversion Team
