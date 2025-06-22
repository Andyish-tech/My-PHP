<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        :root {
            --primary-color: #3366FF;
            --text-color: #1a1a1a;
            --border-color: #e5e7eb;
            --sidebar-width: 240px;
        }

        body {
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary-color);
            padding: 1.5rem;
            color: white;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .logo {
            margin-bottom: 2rem;
        }

        .nav-menu {
            list-style: none;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .user-profile {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            width: 300px;
        }

        .search-input {
            border: none;
            outline: none;
            width: 100%;
            padding: 0.25rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
        }

        .challenges-section {
            margin-top: 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .challenges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .challenge-card {
            background: white;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .card-header {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-content {
            padding: 1rem;
        }

        .tag {
            background: #e2e8f0;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            margin-right: 0.5rem;
        }

        /* Updated status button styles */
        .status-button {
            background: #22c55e;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .status-button:hover {
            background: #16a34a;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .status-button:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .view-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            margin-top: 1rem;
            width: 100%;
            transition: background-color 0.2s;
        }

        .view-button:hover {
            background: #2952cc;
        }

        .mobile-menu {
            display: none;
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
            }

            .search-bar {
                width: 200px;
            }
        }

        @media (max-width: 640px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .challenges-grid {
                grid-template-columns: 1fr;
            }

            .main-content {
                padding: 1rem;
            }

            .search-bar {
                display: none;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dashboard1-IVoBt8TBQ9kkKVLiF9j4YXpQuOo8Lp.png" alt="Umurava Logo" width="32">
            </div>
            <nav class="nav-menu">
                <div class="nav-item active" href="#">Dashboard</div>
                <div class="nav-item">Challenges Assessment</div>
                <div class="nav-item">Community</div>
                <div class="nav-item">Settings</div>
            </nav>
            <div class="user-profile">
                <div class="profile-info">Hilaire K.</div>
            </div>
        </aside>

        <main class="main-content">
            <header class="header">
                <button class="mobile-menu">☰</button>
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Search here...">
                </div>
                <div class="profile-menu">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dashboard1-IVoBt8TBQ9kkKVLiF9j4YXpQuOo8Lp.png" alt="Profile" width="32" height="32" style="border-radius: 50%;">
                </div>
            </header>

            <h1 style="margin-bottom: 2rem;">Welcome back Hilaire,</h1>

            <div class="stats">
                <div class="stat-card">
                    <h3>Completed Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;">05</p>
                </div>
                <div class="stat-card">
                    <h3>New Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;">200</p>
                </div>
                <div class="stat-card">
                    <h3>Ongoing Challenges</h3>
                    <p style="font-size: 2rem; margin-top: 0.5rem;">200</p>
                </div>
            </div>

            <section class="challenges-section">
                <div class="section-header">
                    <h2>Recent Challenges</h2>
                    <a href="#" style="color: var(--primary-color);">See all</a>
                </div>

                <div class="challenges-grid">
                    <!-- Challenge Card 1 -->
                    <div class="challenge-card">
                        <div class="card-header">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dashboard1-IVoBt8TBQ9kkKVLiF9j4YXpQuOo8Lp.png" alt="Umurava" width="100">
                            <button class="status-button">Open</button>
                        </div>
                        <div class="card-content">
                            <h3>Design a Dashboard for SokoFund Fintech Product</h3>
                            <div style="margin: 1rem 0;">
                                <span class="tag">User Research</span>
                                <span class="tag">UX Design</span>
                            </div>
                            <button class="view-button">View Challenge</button>
                        </div>
                    </div>

                    <!-- Challenge Card 2 -->
                    <div class="challenge-card">
                        <div class="card-header">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dashboard1-IVoBt8TBQ9kkKVLiF9j4YXpQuOo8Lp.png" alt="Umurava" width="100">
                            <button class="status-button">Open</button>
                        </div>
                        <div class="card-content">
                            <h3>Design a Dashboard for SokoFund Fintech Product</h3>
                            <div style="margin: 1rem 0;">
                                <span class="tag">User Research</span>
                                <span class="tag">UX Design</span>
                            </div>
                            <button class="view-button">View Challenge</button>
                        </div>
                    </div>

                    <!-- Challenge Card 3 -->
                    <div class="challenge-card">
                        <div class="card-header">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dashboard1-IVoBt8TBQ9kkKVLiF9j4YXpQuOo8Lp.png" alt="Umurava" width="100">
                            <button class="status-button">Open</button>
                        </div>
                        <div class="card-content">
                            <h3>Design a Dashboard for SokoFund Fintech Product</h3>
                            <div style="margin: 1rem 0;">
                                <span class="tag">User Research</span>
                                <span class="tag">UX Design</span>
                            </div>
                            <button class="view-button">View Challenge</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenu = document.querySelector('.mobile-menu');
        const sidebar = document.querySelector('.sidebar');

        mobileMenu.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
