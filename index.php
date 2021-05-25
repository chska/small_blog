<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
</head>

<body>


    <div class="m-3 d-flex justify-content-end">
        <a class="text-uppercase" href="panel.php">PANEL </a>
    </div><br>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "blog";

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>
    <div class="d-flex justify-content-center mb-5">
        <h1 class="text-uppercase text-primary fw-bold text-success"> Witaj na daily blogu Magdy Chodorowskiej</h1>
    </div>
    <div class="container text-muted">
        <?php
        $sql = "SELECT id,title,content,created_at FROM posts";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="d-flex justify-content-center ">
                <h1 class="fs-4 fw-bold"><?php echo $row['title'] ?></h1><br>
            </div>

            <div class="d-flex justify-content-center ">
                <p class="fs-6"><?php echo $row['created_at'] ?> </p>
            </div>
            <div class="d-flex justify-content-center mb-3 ">
                <p><?php echo $row['content'] ?></p>
            </div>
        <?php
        }


        ?>
    </div>


</body>

</html>