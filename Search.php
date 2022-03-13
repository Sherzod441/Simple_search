<?php

include('connection.php');

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $sql = "select * from users where name like '%$name%' or surname like '%$name%' or email like '%$name%'";
    $query = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search in Php</title>
</head>

<body>

    <form method="POST">
        <input type="text" name="name" placeholder="search" />
        <input type="submit" name="search" value="Search" />
    </form>
    <div>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <li><?php echo $row['name']; ?></li>
                <li><?php echo $row['surname']; ?></li>
                <li><?php echo $row['email']; ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>

</html>