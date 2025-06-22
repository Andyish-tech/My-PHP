<?php
session_start();
require_once 'functions.php';

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$user_stats = get_user_stats($user_id);
$recent_courses = get_recent_courses();

// HTML content starts here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content remains the same as in the original HTML -->
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <!-- Sidebar content remains the same -->
        </aside>

        <main class="main-content">
            <header class="header">
                <!-- Header content remains the same -->
            </header>

            <h1 style="margin-bottom: 2rem;">Welcome back <?php echo htmlspecialchars($username); ?>,</h1>

            <div class="stats">
                <div class="stat-card">
                    <h3>Completed Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;"><?php echo $user_stats['completed']; ?></p>
                </div>
                <div class="stat-card">
                    <h3>New Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;"><?php echo $user_stats['new']; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Ongoing Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;"><?php echo $user_stats['ongoing']; ?></p>
                </div>
            </div>

            <section class="challenges-section">
                <div class="section-header">
                    <h2>Recent Courses</h2>
                    <a href="#" style="color: var(--primary-color);">See all</a>
                </div>

                <div class="challenges-grid">
                    <?php foreach ($recent_courses as $course): ?>
                        <div class="challenge-card">
                            <div class="card-header">
                                <img src="<?php echo htmlspecialchars($course['thumbnail_url']); ?>" alt="Course Thumbnail" width="100">
                                <button class="status-button"><?php echo htmlspecialchars($course['status']); ?></button>
                            </div>
                            <div class="card-content">
                                <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                                <div style="margin: 1rem 0;">
                                    <?php
                                    $tags = explode(',', $course['tags']);
                                    foreach ($tags as $tag):
                                    ?>
                                        <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <button class="view-button">View Course</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>

    <script>
        // JavaScript content remains the same
    </script>
</body>
</html>