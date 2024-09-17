<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "INSERT INTO users (FirstName, LastName, Email, Address) VALUES ('$firstName', '$lastName', '$email', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.php?message=User added successfully");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add User</title>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark">
    <div class="container d-flex flex-column justify-content-center py-4 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0 text-dark fw-bold">Add New User</h2>
                    </div>
                    <div class="card-body">
                        <form action="add_user.php" method="post">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <button type="submit" class="btn btn-warning text-white fw-bold" style="background-color: #FFD233; border: none;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
