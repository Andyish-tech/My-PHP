<?php
require_once 'config.php';

function get_user_stats($user_id) {
    global $conn;
    $stats = array(
        'completed' => 0,
        'new' => 0,
        'ongoing' => 0
    );

    $query = "SELECT status, COUNT(*) as count FROM user_courses WHERE user_id = ? GROUP BY status";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        switch ($row['status']) {
            case 'Completed':
                $stats['completed'] = $row['count'];
                break;
            case 'Not Started':
                $stats['new'] = $row['count'];
                break;
            case 'In Progress':
                $stats['ongoing'] = $row['count'];
                break;
        }
    }

    return $stats;
}

function get_recent_courses($limit = 3) {
    global $conn;
    $courses = array();

    $query = "SELECT c.id, c.title, c.thumbnail_url, c.status, GROUP_CONCAT(t.name) as tags 
              FROM courses c 
              LEFT JOIN course_tags ct ON c.id = ct.course_id 
              LEFT JOIN tags t ON ct.tag_id = t.id 
              GROUP BY c.id 
              ORDER BY c.created_at DESC 
              LIMIT ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    return $courses;
}
?>