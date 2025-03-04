<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header and Search Bar */
        header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            display: flex;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-bar input {
            flex-grow: 1;
            padding: 10px 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 25px;
            outline: none;
        }

        .search-bar i {
            margin-left: -30px;
            color: #777;
        }

        /* Main Content */
        .main-content {
            display: flex;
            margin-top: 20px;
        }

        /* Filter Sidebar */
        .filter-sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .filter-section {
            margin-bottom: 20px;
        }

        .filter-section h3 {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .filter-section h3 i {
            margin-right: 10px;
        }

        .filter-section ul {
            list-style-type: none;
        }

        .filter-section li {
            margin-bottom: 5px;
        }

        /* Book Grid */
        .book-grid {
            flex-grow: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding-left: 20px;
        }

        .book-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
        }

        .book-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .book-card h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .book-card p {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .book-card .icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .book-card .icons i {
            cursor: pointer;
            color: #777;
            transition: color 0.3s ease;
        }

        .book-card .icons i:hover {
            color: #f39c12;
        }

        /* Featured Books */
        .featured-books {
            margin-top: 40px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .featured-books h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .featured-carousel {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding-bottom: 20px;
        }

        .featured-book {
            flex: 0 0 auto;
            width: 200px;
            text-align: center;
        }

        .featured-book img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .featured-book h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .featured-book .featured-icon {
            color: #f39c12;
            margin-bottom: 5px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        .pagination a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            margin: 0 5px;
            border-radius: 50%;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #f39c12;
            color: #fff;
        }

        .pagination a.active {
            background-color: #f39c12;
            color: #fff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }

            .filter-sidebar {
                width: 100%;
                margin-bottom: 20px;
            }

            .book-grid {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="search-bar">
                <input type="text" placeholder="Search for books...">
                <i class="fas fa-search" ></i>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-content">
            <aside class="filter-sidebar">
                <div class="filter-section">
                    <h3><i class="fas fa-tag"></i> Categories</h3>
                    <ul>
                        <li><input type="checkbox" id="fiction"> <label for="fiction">Fiction</label></li>
                        <li><input type="checkbox" id="non-fiction"> <label for="non-fiction">Non-Fiction</label></li>
                        <li><input type="checkbox" id="mystery"> <label for="mystery">Mystery</label></li>
                        <li><input type="checkbox" id="sci-fi"> <label for="sci-fi">Sci-Fi</label></li>
                    </ul>
                </div>
                <div class="filter-section">
                    <h3><i class="fas fa-user"></i> Authors</h3>
                    <ul>
                        <li><input type="checkbox" id="author1"> <label for="author1">J.K. Rowling</label></li>
                        <li><input type="checkbox" id="author2"> <label for="author2">Stephen King</label></li>
                        <li><input type="checkbox" id="author3"> <label for="author3">George R.R. Martin</label></li>
                        <li><input type="checkbox" id="author4"> <label for="author4">Agatha Christie</label></li>
                    </ul>
                </div>
                <div class="filter-section">
                    <h3><i class="fas fa-calendar"></i> Publication Year</h3>
                    <ul>
                        <li><input type="checkbox" id="year1"> <label for="year1">2023</label></li>
                        <li><input type="checkbox" id="year2"> <label for="year2">2022</label></li>
                        <li><input type="checkbox" id="year3"> <label for="year3">2021</label></li>
                        <li><input type="checkbox" id="year4"> <label for="year4">2020</label></li>
                    </ul>
                </div>
            </aside>
            <main class="book-grid">
                <div class="book-card">
                    <img src="SRC/1003w-2XyyZAn617M.webp" alt="Book Cover">
                    <h3>Book Title 1</h3>
                    <p>Author Name</p>
                    <div class="icons">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="book-card">
                    <img src="SRC/41BovRMwjJL.jpg" alt="Book Cover">
                    <h3>Book Title 2</h3>
                    <p>Author Name</p>
                    <div class="icons">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="book-card">
                    <img src="SRC/4a0d938690900028d18058e2f612d90a.jpg" alt="Book Cover">
                    <h3>Book Title 3</h3>
                    <p>Author Name</p>
                    <div class="icons">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="book-card">
                    <img src="SRC/beginning-php-and-mysql.png" alt="Book Cover">
                    <h3>Book Title 4</h3>
                    <p>Author Name</p>
                    <div class="icons">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <!-- Add more book cards as needed -->
            </main>
        </div>

        <section class="featured-books">
            <h2>Featured Books</h2>
            <div class="featured-carousel">
                <div class="featured-book">
                    <img src="SRC/4a0d938690900028d18058e2f612d90a.jpg" alt="Featured Book Cover">
                    <div class="featured-icon"><i class="fas fa-star"></i></div>
                    <h3>Featured Book 1</h3>
                </div>
                <div class="featured-book">
                    <img src="SRC/4c28f5b82c8bb71984554dc44d9ccab3.jpg" alt="Featured Book Cover">
                    <div class="featured-icon"><i class="fas fa-star"></i></div>
                    <h3>Featured Book 2</h3>
                </div>
                <div class="featured-book">
                    <img src="SRC/1003w-2XyyZAn617M.webp" alt="Featured Book Cover">
                    <div class="featured-icon"><i class="fas fa-star"></i></div>
                    <h3>Featured Book 3</h3>
                </div>
                <div class="featured-book">
                    <img src="SRC/41BovRMwjJL.jpg" alt="Featured Book Cover">
                    <div class="featured-icon"><i class="fas fa-star"></i></div>
                    <h3>Featured Book 4</h3>
                </div>
            </div>
        </section>

        <nav class="pagination">
            <a href="#"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="active"><i class="fas fa-book"></i> 1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </nav>
    </div>
</body>
</html>