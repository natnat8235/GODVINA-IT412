<?php
include 'db_connect.php';


if (isset($_GET['id'])) {
    $userID = intval($_GET['id']); 


    $sql = "DELETE FROM users WHERE UserID = $userID";

    if (mysqli_query($conn, $sql)) {
    
        header("Location: homepage.php?message=User deleted successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No user ID provided.";
}

mysqli_close($conn);
?>
