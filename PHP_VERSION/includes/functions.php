<?php
/**
 * Common functions and session management
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if user is logged in
 */
function isUserLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Check if admin is logged in
 */
function isAdminLoggedIn() {
    return isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']);
}

/**
 * Get current user data
 */
function getCurrentUser() {
    if (isUserLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            'login_id' => $_SESSION['user_login_id'],
            'user_type' => $_SESSION['user_type']
        ];
    }
    return null;
}

/**
 * Get current admin data
 */
function getCurrentAdmin() {
    if (isAdminLoggedIn()) {
        return [
            'id' => $_SESSION['admin_id'],
            'name' => $_SESSION['admin_name'],
            'username' => $_SESSION['admin_username'],
            'role' => $_SESSION['admin_role']
        ];
    }
    return null;
}

/**
 * Login user
 */
function loginUser($userData) {
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['user_name'] = $userData['name'];
    $_SESSION['user_email'] = $userData['email'];
    $_SESSION['user_login_id'] = $userData['login_id'];
    $_SESSION['user_type'] = $userData['user_type'];
    $_SESSION['login_time'] = time();
}

/**
 * Login admin
 */
function loginAdmin($adminData) {
    $_SESSION['admin_id'] = $adminData['id'];
    $_SESSION['admin_name'] = $adminData['name'];
    $_SESSION['admin_username'] = $adminData['username'];
    $_SESSION['admin_role'] = $adminData['role'];
    $_SESSION['admin_login_time'] = time();
}

/**
 * Logout user
 */
function logoutUser() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_login_id']);
    unset($_SESSION['user_type']);
    unset($_SESSION['login_time']);
    
    // Destroy session if no admin is logged in
    if (!isAdminLoggedIn()) {
        session_destroy();
    }
}

/**
 * Logout admin
 */
function logoutAdmin() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_username']);
    unset($_SESSION['admin_role']);
    unset($_SESSION['admin_login_time']);
    
    // Destroy session if no user is logged in
    if (!isUserLoggedIn()) {
        session_destroy();
    }
}

/**
 * Redirect to login page if not authenticated
 */
function requireUserLogin() {
    if (!isUserLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

/**
 * Redirect to admin login page if not authenticated
 */
function requireAdminLogin() {
    if (!isAdminLoggedIn()) {
        header('Location: admin_login.php');
        exit();
    }
}

/**
 * Sanitize input data
 */
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Validate email
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Display success message
 */
function showSuccessMessage($message) {
    return '<div class="alert alert-success" role="alert">' . htmlspecialchars($message) . '</div>';
}

/**
 * Display error message
 */
function showErrorMessage($message) {
    return '<div class="alert alert-danger" role="alert">' . htmlspecialchars($message) . '</div>';
}

/**
 * Display info message
 */
function showInfoMessage($message) {
    return '<div class="alert alert-info" role="alert">' . htmlspecialchars($message) . '</div>';
}

/**
 * Get status badge HTML
 */
function getStatusBadge($status) {
    $badges = [
        'Submitted' => '<span class="badge badge-primary">Submitted</span>',
        'In Progress' => '<span class="badge badge-warning">In Progress</span>',
        'Under Review' => '<span class="badge badge-info">Under Review</span>',
        'Resolved' => '<span class="badge badge-success">Resolved</span>',
        'Closed' => '<span class="badge badge-secondary">Closed</span>',
        'Rejected' => '<span class="badge badge-danger">Rejected</span>'
    ];
    
    return isset($badges[$status]) ? $badges[$status] : '<span class="badge badge-light">' . htmlspecialchars($status) . '</span>';
}

/**
 * Get priority badge HTML
 */
function getPriorityBadge($priority) {
    $badges = [
        'Low' => '<span class="badge badge-success">Low</span>',
        'Medium' => '<span class="badge badge-warning">Medium</span>',
        'High' => '<span class="badge badge-orange">High</span>',
        'Critical' => '<span class="badge badge-danger">Critical</span>'
    ];
    
    return isset($badges[$priority]) ? $badges[$priority] : '<span class="badge badge-light">' . htmlspecialchars($priority) . '</span>';
}

/**
 * Format date for display
 */
function formatDate($date) {
    if (empty($date)) return '-';
    return date('d-m-Y', strtotime($date));
}

/**
 * Format datetime for display
 */
function formatDateTime($datetime) {
    if (empty($datetime)) return '-';
    return date('d-m-Y H:i A', strtotime($datetime));
}

/**
 * Generate CSRF token
 */
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Validate CSRF token
 */
function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Get base URL
 */
function getBaseURL() {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $path = dirname($script);
    
    return $protocol . "://" . $host . ($path == "/" ? "" : $path);
}

/**
 * Redirect with message
 */
function redirectWithMessage($url, $message, $type = 'success') {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
    header("Location: " . $url);
    exit();
}

/**
 * Get and display flash message
 */
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'info';
        
        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
        
        switch ($type) {
            case 'success':
                return showSuccessMessage($message);
            case 'error':
                return showErrorMessage($message);
            default:
                return showInfoMessage($message);
        }
    }
    return '';
}

/**
 * Check if form was submitted
 */
function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Get POST data safely
 */
function getPostData($key, $default = '') {
    return isset($_POST[$key]) ? sanitizeInput($_POST[$key]) : $default;
}

/**
 * Get GET data safely
 */
function getGetData($key, $default = '') {
    return isset($_GET[$key]) ? sanitizeInput($_GET[$key]) : $default;
}

/**
 * Generate pagination links
 */
function generatePagination($currentPage, $totalPages, $baseUrl) {
    if ($totalPages <= 1) return '';
    
    $pagination = '<nav aria-label="Page navigation">';
    $pagination .= '<ul class="pagination justify-content-center">';
    
    // Previous button
    if ($currentPage > 1) {
        $pagination .= '<li class="page-item">';
        $pagination .= '<a class="page-link" href="' . $baseUrl . '?page=' . ($currentPage - 1) . '">Previous</a>';
        $pagination .= '</li>';
    }
    
    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = ($i == $currentPage) ? ' active' : '';
        $pagination .= '<li class="page-item' . $active . '">';
        $pagination .= '<a class="page-link" href="' . $baseUrl . '?page=' . $i . '">' . $i . '</a>';
        $pagination .= '</li>';
    }
    
    // Next button
    if ($currentPage < $totalPages) {
        $pagination .= '<li class="page-item">';
        $pagination .= '<a class="page-link" href="' . $baseUrl . '?page=' . ($currentPage + 1) . '">Next</a>';
        $pagination .= '</li>';
    }
    
    $pagination .= '</ul></nav>';
    return $pagination;
}
?>
