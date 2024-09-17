<?php
include 'db_connect.php';


$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Grupo ni Odvina</title>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark">

    <?php if (isset($_GET['message'])): ?>
    <div id="success-message" class="alert alert-success mt-3 text-white border-0" style="background-color: #000000;" role="alert">
        <?php echo htmlspecialchars($_GET['message']); ?>
    </div>
    <script>
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.opacity = 0;
                setTimeout(() => message.style.display = 'none', 1000);
            }
        }, 3000);
    </script>
    <?php endif; ?>

    <div class="container d-flex flex-column justify-content-center py-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <span class="fw-bold text-black">GRUPO ni </span><span class="fw-bold" style="color: #FFD233;">ODVINA</span>
                        </h2>
                    </div>
                    <div class="card-body">
                        <a href="add_user.php" class="btn btn-warning text-white fw-bold mb-4">+ Add new user</a>

                   
                        <table class="table mt-4">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>UserID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['UserID']); ?></td>
                                        <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
                                        <td><?php echo htmlspecialchars($row['LastName']); ?></td>
                                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                                        <td>
                                      
                                            <a href="edit_user.php?id=<?php echo $row['UserID']; ?>" class="me-3" style="color: #000000;"> 
                                                <i class="fa-solid fa-pen-to-square"></i> 
                                            </a>
                                            <a href="delete_user.php?id=<?php echo $row['UserID']; ?>" style = "color: #000000;" onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fa-solid fa-trash"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    
                                    <tr>
                                        <td colspan="6" class="text-center">No users found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
