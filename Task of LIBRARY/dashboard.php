<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            line-height: 1.6;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 2rem 0;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-menu {
            list-style-type: none;
        }

        .nav-item {
            padding: 0.5rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            color: #ecf0f1;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #34495e;
        }

        .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
        }

        .welcome-message {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-header i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: #3498db;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-content ul {
            list-style-type: none;
        }

        .card-content li {
            margin-bottom: 0.5rem;
        }

        .recent-activity {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .activity-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .activity-card img {
            width: 60px;
            height: 80px;
            object-fit: cover;
            margin-right: 1rem;
            border-radius: 4px;
        }

        .activity-details h4 {
            margin-bottom: 0.25rem;
        }

        .activity-details p {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .profile-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1.5rem;
        }

        .profile-details h3 {
            margin-bottom: 0.5rem;
        }

        .profile-details p {
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 1rem 0;
            }

            .nav-menu {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }

            .nav-item {
                padding: 0.5rem;
            }

            .main-content {
                padding: 1rem;
            }

            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .profile-picture {
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">Library Logo</div>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book"></i>
                            <span>Borrowed Books</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-history"></i>
                            <span>Book History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <h1 class="welcome-message"><i class="fas fa-smile"></i> Welcome back, John!</h1>
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fas fa-book"></i>
                        <h2 class="card-title">Books Currently Borrowed</h2>
                    </div>
                    <div class="card-content">
                        <ul>
                            <li>The Great Gatsby</li>
                            <li>To Kill a Mockingbird</li>
                            <li>1984</li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fas fa-calendar"></i>
                        <h2 class="card-title">Due Dates</h2>
                    </div>
                    <div class="card-content">
                        <ul>
                            <li>The Great Gatsby - May 15, 2023</li>
                            <li>To Kill a Mockingbird - May 20, 2023</li>
                            <li>1984 - May 25, 2023</li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fas fa-star"></i>
                        <h2 class="card-title">Recommendations</h2>
                    </div>
                    <div class="card-content">
                        <ul>
                            <li>Pride and Prejudice</li>
                            <li>The Catcher in the Rye</li>
                            <li>One Hundred Years of Solitude</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h2>Recent Activity</h2>
            <div class="recent-activity">
                <div class="activity-card">
                    <img src="https://via.placeholder.com/60x80" alt="Book Cover">
                    <div class="activity-details">
                        <h4>The Great Gatsby</h4>
                        <p><i class="fas fa-clock"></i> Borrowed 2 days ago</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="https://via.placeholder.com/60x80" alt="Book Cover">
                    <div class="activity-details">
                        <h4>To Kill a Mockingbird</h4>
                        <p><i class="fas fa-clock"></i> Borrowed 5 days ago</p>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="https://via.placeholder.com/60x80" alt="Book Cover">
                    <div class="activity-details">
                        <h4>1984</h4>
                        <p><i class="fas fa-clock"></i> Borrowed 1 week ago</p>
                    </div>
                </div>
            </div>
            <h2>Profile Summary</h2>
            <div class="profile-card">
                <img src="https://via.placeholder.com/80x80" alt="Profile Picture" class="profile-picture">
                <div class="profile-details">
                    <h3><i class="fas fa-user"></i> John Doe</h3>
                    <p>Member since: January 1, 2023</p>
                    <p>Books borrowed: 15</p>
                    <p>Membership status: Gold</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>