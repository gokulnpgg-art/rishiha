<?php
/**
 * Database Connection and Data Access Layer
 * Replacement for DataAccess.cs functionality
 */

class Database {
    private $host = 'localhost';
    private $database = 'college_complaint_system';
    private $username = 'root';  // Default XAMPP MySQL username
    private $password = '';      // Default XAMPP MySQL password (empty)
    private $connection;
    
    public function __construct() {
        $this->connect();
    }
    
    /**
     * Establish database connection
     */
    private function connect() {
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->connection->connect_error) {
                throw new Exception("Connection failed: " . $this->connection->connect_error);
            }
            
            // Set charset to utf8
            $this->connection->set_charset("utf8");
            
        } catch (Exception $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }
    
    /**
     * Get database connection
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Execute a query (INSERT, UPDATE, DELETE)
     */
    public function executeQuery($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $this->connection->error);
            }
            
            if (!empty($params)) {
                $types = str_repeat('s', count($params)); // Assume all params are strings by default
                $stmt->bind_param($types, ...$params);
            }
            
            $result = $stmt->execute();
            $stmt->close();
            
            return $result;
        } catch (Exception $e) {
            error_log("Database query error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Fetch data from database
     */
    public function fetchData($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $this->connection->error);
            }
            
            if (!empty($params)) {
                $types = str_repeat('s', count($params));
                $stmt->bind_param($types, ...$params);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            
            return $data;
        } catch (Exception $e) {
            error_log("Database fetch error: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Fetch single row from database
     */
    public function fetchSingleRow($query, $params = []) {
        $data = $this->fetchData($query, $params);
        return !empty($data) ? $data[0] : null;
    }
    
    /**
     * Get last inserted ID
     */
    public function getLastInsertId() {
        return $this->connection->insert_id;
    }
    
    /**
     * Get affected rows count
     */
    public function getAffectedRows() {
        return $this->connection->affected_rows;
    }
    
    /**
     * Close database connection
     */
    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
    
    /**
     * User registration function (equivalent to NewUser in DataAccess.cs)
     */
    public function registerUser($name, $email, $phone, $loginId, $password, $areaName, $gender, $address, $userType = 'Student') {
        $hashedPassword = md5($password); // Using MD5 to match original system
        
        $query = "INSERT INTO users (name, email, phone, login_id, password, area_name, gender, address, user_type) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$name, $email, $phone, $loginId, $hashedPassword, $areaName, $gender, $address, $userType];
        
        return $this->executeQuery($query, $params);
    }
    
    /**
     * User authentication
     */
    public function authenticateUser($loginId, $password) {
        $hashedPassword = md5($password);
        $query = "SELECT * FROM users WHERE login_id = ? AND password = ? AND status = 'Active'";
        return $this->fetchSingleRow($query, [$loginId, $hashedPassword]);
    }
    
    /**
     * Admin authentication
     */
    public function authenticateAdmin($username, $password) {
        $hashedPassword = md5($password);
        $query = "SELECT * FROM admin_users WHERE username = ? AND password = ? AND status = 'Active'";
        return $this->fetchSingleRow($query, [$username, $hashedPassword]);
    }
    
    /**
     * Check if login ID exists
     */
    public function checkLoginIdExists($loginId) {
        $query = "SELECT COUNT(*) as count FROM users WHERE login_id = ?";
        $result = $this->fetchSingleRow($query, [$loginId]);
        return $result ? $result['count'] > 0 : false;
    }
    
    /**
     * Submit feedback
     */
    public function submitFeedback($name, $designation, $company, $areaOfWork, $address, $city, $state, $country, $pincode, $email, $telephone, $fax, $queryComment) {
        $query = "INSERT INTO feedback (name, designation, company, area_of_work, address, city, state, country, pincode, email, telephone, fax, query_comment) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$name, $designation, $company, $areaOfWork, $address, $city, $state, $country, $pincode, $email, $telephone, $fax, $queryComment];
        
        return $this->executeQuery($query, $params);
    }
    
    /**
     * Submit complaint
     */
    public function submitComplaint($userId, $categoryId, $title, $description, $priority = 'Medium') {
        $complaintDate = date('Y-m-d');
        $query = "INSERT INTO complaints (user_id, category_id, title, description, priority, complaint_date) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$userId, $categoryId, $title, $description, $priority, $complaintDate];
        
        return $this->executeQuery($query, $params);
    }
    
    /**
     * Get user complaints
     */
    public function getUserComplaints($userId) {
        $query = "SELECT c.*, cc.category_name 
                  FROM complaints c 
                  LEFT JOIN complaint_categories cc ON c.category_id = cc.id 
                  WHERE c.user_id = ? 
                  ORDER BY c.created_at DESC";
        return $this->fetchData($query, [$userId]);
    }
    
    /**
     * Get all complaints (for admin)
     */
    public function getAllComplaints() {
        $query = "SELECT c.*, u.name as user_name, u.email as user_email, cc.category_name 
                  FROM complaints c 
                  LEFT JOIN users u ON c.user_id = u.id 
                  LEFT JOIN complaint_categories cc ON c.category_id = cc.id 
                  ORDER BY c.created_at DESC";
        return $this->fetchData($query);
    }
    
    /**
     * Get complaint categories
     */
    public function getComplaintCategories() {
        $query = "SELECT * FROM complaint_categories WHERE status = 'Active' ORDER BY category_name";
        return $this->fetchData($query);
    }
    
    /**
     * Update complaint status
     */
    public function updateComplaintStatus($complaintId, $status, $adminId = null) {
        if ($adminId) {
            $query = "UPDATE complaints SET status = ?, assigned_to = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
            $params = [$status, $adminId, $complaintId];
        } else {
            $query = "UPDATE complaints SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
            $params = [$status, $complaintId];
        }
        
        return $this->executeQuery($query, $params);
    }
    
    /**
     * Add complaint reply
     */
    public function addComplaintReply($complaintId, $replyBy, $replyByType, $replyText) {
        $query = "INSERT INTO complaint_replies (complaint_id, reply_by, reply_by_type, reply_text) 
                  VALUES (?, ?, ?, ?)";
        $params = [$complaintId, $replyBy, $replyByType, $replyText];
        
        return $this->executeQuery($query, $params);
    }
    
    /**
     * Get complaint replies
     */
    public function getComplaintReplies($complaintId) {
        $query = "SELECT cr.*, 
                  CASE 
                    WHEN cr.reply_by_type = 'User' THEN u.name
                    WHEN cr.reply_by_type = 'Admin' THEN a.name
                  END as reply_by_name
                  FROM complaint_replies cr
                  LEFT JOIN users u ON cr.reply_by = u.id AND cr.reply_by_type = 'User'
                  LEFT JOIN admin_users a ON cr.reply_by = a.id AND cr.reply_by_type = 'Admin'
                  WHERE cr.complaint_id = ?
                  ORDER BY cr.created_at ASC";
        return $this->fetchData($query, [$complaintId]);
    }
    
    /**
     * Get notifications
     */
    public function getNotifications($userType = 'All') {
        $query = "SELECT * FROM notifications 
                  WHERE is_active = 1 
                  AND (target_audience = 'All' OR target_audience = ?) 
                  AND (expires_at IS NULL OR expires_at >= CURDATE())
                  ORDER BY priority DESC, created_at DESC";
        return $this->fetchData($query, [$userType]);
    }
    
    /**
     * Create notification
     */
    public function createNotification($title, $message, $targetAudience, $createdBy, $priority = 'Medium', $expiresAt = null) {
        $query = "INSERT INTO notifications (title, message, target_audience, created_by, priority, expires_at) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$title, $message, $targetAudience, $createdBy, $priority, $expiresAt];
        
        return $this->executeQuery($query, $params);
    }
}

// Global database instance
$database = new Database();
?>
