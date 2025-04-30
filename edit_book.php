<?php
if (!isset($_POST['save_change'])) {
    echo "Invalid request!";
    exit;
}

require_once("./functions/database_functions.php");
$conn = db_connect();

// Escape all input to prevent SQL errors and injection
$isbn = mysqli_real_escape_string($conn, trim($_POST['isbn']));
$title = mysqli_real_escape_string($conn, trim($_POST['title']));
$author = mysqli_real_escape_string($conn, trim($_POST['author']));
$descr = mysqli_real_escape_string($conn, trim($_POST['descr']));
$price = floatval(trim($_POST['price']));
$publisher = mysqli_real_escape_string($conn, trim($_POST['publisher']));

// Handle image upload if provided
if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}

// Handle publisher ID (insert if not exists)
$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
$findResult = mysqli_query($conn, $findPub);

if (!$findResult) {
    echo "Publisher lookup failed: " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($findResult) > 0) {
    $row = mysqli_fetch_assoc($findResult);
    $publisherid = $row['publisherid'];
} else {
    $insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
    $insertResult = mysqli_query($conn, $insertPub);
    if (!$insertResult) {
        echo "Can't add new publisher: " . mysqli_error($conn);
        exit;
    }
    $publisherid = mysqli_insert_id($conn);
}

// Build update query
$query = "UPDATE books SET  
    book_title = '$title', 
    book_author = '$author', 
    book_descr = '$descr', 
    book_price = $price, 
    publisherid = $publisherid";

if (isset($image)) {
    $query .= ", book_image = '$image'";
}

$query .= " WHERE book_isbn = '$isbn'";

// Execute update
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Can't update data: " . mysqli_error($conn);
    exit;
} else {
    header("Location: admin_edit.php?bookisbn=$isbn");
    exit;
}
?>
