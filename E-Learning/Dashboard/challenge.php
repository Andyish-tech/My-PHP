<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenges Dashboard</title>
    <style>
        :root {
            --primary-color: #1a73e8;
            --secondary-color: #e8f0fe;
            --text-color: #333;
            --text-light: #666;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --success-color: #22c55e;
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            transition: var(--transition);
        }

        .logo {
            padding: 1rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo img {
            width: 30px;
            height: auto;
        }

        .nav-item {
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .profile {
            margin-top: auto;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            overflow: hidden;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 2rem;
            transition: var(--transition);
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--card-background);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .page-description {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.5;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-tag {
            background: var(--secondary-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-tag:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Challenge Cards Grid */
        .challenges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .challenge-card {
            background: var(--card-background);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .challenge-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .card-image {
            background-color: var(--primary-color);
            padding: 2rem;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-image img {
            width: 120px;
            height: auto;
        }

        .open-label {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--success-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: var(--border-radius);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            font-weight: 600;
        }

        .card-meta {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .view-button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            width: 100%;
        }

        .view-button:hover {
            background: #1557b0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .page-button {
            padding: 0.5rem 1rem;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: var(--card-background);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .page-button:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .challenges-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 1rem;
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .challenges-grid {
                grid-template-columns: 1fr;
            }
            .profile {
                display: none;
            }
            .page-header {
                margin-bottom: 1.5rem;
            }
            .page-title {
                font-size: 1.5rem;
            }
            .nav-item {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="logo">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Logo">
            <span>Umurava</span>
        </div>
        <div class="nav-item">Dashboard</div>
        <div class="nav-item">Upcoming Evaluations</div>
        <div class="nav-item">Community</div>
        <div class="nav-item">Settings</div>
        <div class="nav-item">Help Center</div>
        <div class="nav-item">Save Story & Friends</div>
        <div class="profile">
            <div class="profile-img">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Profile Picture">
            </div>
            <span>Maria M.</span>
        </div>
    </nav>

    <main class="main-content">
        <div class="search-bar">
            <input type="text" placeholder="Search here...">
        </div>

        <div class="page-header">
            <h1 class="page-title">Challenges</h1>
            <p class="page-description">Join a challenge or a hackathon to gain valuable work experience,</p>
        </div>

        <div class="filters">
            <span class="filter-tag">All Challenge</span>
            <span class="filter-tag">Completed Challenge</span>
            <span class="filter-tag">Open Challenge</span>
            <span class="filter-tag">Ongoing Challenge</span>
        </div>

        <div class="challenges-grid">
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
            <div class="challenge-card">
                <div class="card-image">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/dash4-dl0IxEOXKlaiuxBKW6we8CwB6w1eRw.png" alt="Umurava Logo">
                    <span class="open-label">Open</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">Design a Dashboard for SokoFund, Fintech Product</h3>
                    <div class="card-meta">
                        <p>Skills Needed: UI/UX, Dashboard Design</p>
                        <p>Timeline: 5 days</p>
                    </div>
                    <button class="view-button">View Challenge</button>
                </div>
            </div>
        </div>

        <div class="pagination">
            <button class="page-button">Previous</button>
            <button class="page-button">Next</button>
        </div>
    </main>
</body>
</html>
