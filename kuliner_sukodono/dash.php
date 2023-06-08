<!DOCTYPE html>
<html>
<?php session_start();
      if (empty($_SESSION['username']))
       { echo " <script> alert('Login is required to view this page')
        document.location = 'login.php' </script>"; }?>
<head>
    <title>Tabel Data - Restoran</title>
    <link rel="stylesheet" type="text/css" href="dashh.css">
</head>
<body>
    <div class="header">
        <h1 class="heading">Tabel Data</h1>
        <nav class="navigation">
            <ul>
                <li><a href="restoran.php">Restoran</a></li>
                <li><a href="user.php">User</a></li>
                <li><a href="review.php">Review</a></li>
            </ul>
        </nav>
    </div>
    <div class="page">
        <!-- Konten tabel -->
    </div>
</body>
</html>