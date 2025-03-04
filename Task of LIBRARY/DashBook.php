<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management - Books</title>
    
</head>
<style>
    :root {
    --primary-color: #3498db;
    --secondary-color: #2c3e50;
    --background-color: #ecf0f1;
    --text-color: #333;
    --sidebar-width: 200px;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--background-color);
}

.container {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: var(--sidebar-width);
    background-color: var(--secondary-color);
    color: white;
    padding: 20px;
    position: fixed;
    height: 100vh;
    overflow-y: auto;
}

.sidebar nav ul {
    list-style-type: none;
}

.sidebar nav ul li {
    margin-bottom: 10px;
}

.sidebar nav ul li a {
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar nav ul li a:hover,
.sidebar nav ul li a.active {
    background-color: var(--primary-color);
}

.sidebar nav ul li a .icon {
    margin-right: 10px;
}

.main-content {
    flex-grow: 1;
    margin-left: var(--sidebar-width);
    padding: 20px;
    overflow-y: auto;
}

h2 {
    margin-bottom: 20px;
    color: var(--primary-color);
}

.search-filter {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.search-bar {
    flex-grow: 1;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.filter-options button {
    margin-left: 10px;
    padding: 10px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.book-card {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.book-card h3 {
    margin-bottom: 10px;
}

.book-card p {
    margin-bottom: 5px;
}

.action-buttons {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.action-buttons button {
    margin-left: 10px;
    padding: 5px 10px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination button {
    padding: 5px 10px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 10px;
}

.add-book-form {
    max-width: 500px;
    margin: 0 auto;
}

.add-book-form label {
    display: block;
    margin-top: 10px;
}

.add-book-form input[type="text"],
.add-book-form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.add-book-form fieldset {
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
}

.add-book-form button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}


</style>

 <?php
require_once 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $availability = $_POST['availability'];

    $cover_image = '';
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $cover_image = $upload_dir . basename($_FILES['cover']['name']);
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover_image);
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO Books (BookId, BookTitle, AuthorName, Genre, Availabity, cover) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $author, $genre, $availability, $cover_image]);
        echo "Book registered successfully!";
    } catch(PDOException $e) {
        echo "Error registering book: " . $e->getMessage();
    }
}
?> 

<body>
    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="dashboard.html" class="icon"><span class="icon">⫷</span> Back</a></li>
                    <li><a href="#" class="active"><span class="icon">📖</span> Books</a></li>
                    <li><a href="#view-all-books"><span class="icon">📜</span> View All Books</a></li>
                    <li><a href="#add-book"><span class="icon">➕</span> Add Book</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <section id="view-all-books">
                <h2>View All Books</h2>
                <div class="search-filter">
                    <input type="text" placeholder="🔍 Search books..." class="search-bar">
                    <div class="filter-options">
                        <button>🔠 Title</button>
                        <button>✍️ Author</button>
                        <button>✅/❌ Availability</button>
                    </div>
                </div>
                <div class="books-grid">
                    <div class="book-card">
                        <h3>📚 The Great Gatsby</h3>
                        <p>✍️ F. Scott Fitzgerald</p>
                        <p>🎭 Novel</p>
                        <p>✅ Available</p>
                        <div class="action-buttons">
                            <button class="edit">📝</button>
                            <button class="delete">🗑️</button>
                        </div>
                    </div>
                    <!-- More book cards would go here -->
                </div>
                <div class="pagination">
                    <button>←</button>
                    <span>Page 1 of 5</span>
                    <button>→</button>
                </div>
            </section>
            <section id="add-book">
                <h2>Add Book</h2>
                <form class="add-book-form" method="POST" action="Insert.php">
                    <label for="title">📚 Book Title</label>
                    <input type="text" id="title" name="title" required>

                    <label for="author">✍️ Author Name</label>
                    <input type="text" id="author" name="author" required>

                    <label for="genre">🎭 Genre</label>
                    <select id="genre" name="genre" required>
                        <option value="">Select a genre</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="mystery">Mystery</option>
                        <option value="sci-fi">Science Fiction</option>
                    </select>

                    <fieldset>
                        <legend>Availability</legend>
                        <label>
                            <input type="radio" name="availability" value="available" checked> ✅ Available
                        </label>
                        <label>
                            <input type="radio" name="availability" value="borrowed"> ❌ Borrowed
                        </label>
                    </fieldset>

                    <label for="cover">📷 Book Cover Image</label>
                    <input type="file" id="cover" name="cover" accept="image/*">

                    <button type="submit" name="submit">➕ Add Book</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>

