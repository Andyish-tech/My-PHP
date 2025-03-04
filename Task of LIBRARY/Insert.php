<?php



//Add New name


if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $availability = $_POST['availability'];



    $cover_image = '';
$insert="INSERT INTO Books (BookId, BookTitle, AuthorName, Genre, Availabity) VALUES (Null, '$title', '$author', '$genre', '$availability')";

$query=mysqli_query($cnx, $insert);
if ($query) {
  header("Location:DashBook.php");
}else{
    echo "Failed to add book!";
}
}

    // if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
    //     $upload_dir = 'SRC/';
    //     $cover_image = $upload_dir . basename($_FILES['cover']['name']);
    //     move_uploaded_file($_FILES['cover']['tmp_name'], $cover_image);
    // }

//     try {
//         $stmt = $pdo->prepare("INSERT INTO Books (BookId, BookTitle, AuthorName, Genre, Availabity, cover) VALUES (?, ?, ?, ?, ?, ?)");
//         $stmt->execute([$title, $author, $genre, $availability, $cover_image]);
//         echo "Book registered successfully!";
//     } catch(PDOException $e) {
//         echo "Error registering book: " . $e->getMessage();
//     }
// }
// //Create Connection

