<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
</head>

<body>


  <div class="m-3 d-flex justify-content-start">
    <a class="text-uppercase" href="index.php">Strona główna </a>
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
    <h2 class="text-uppercase text-primary fw-bold text-success"> dodaj wpis do daily bloga</h1>
  </div>

  <div class="d-flex justify-content-center text-muted mt-2 mb-2">
    <form action="" method="POST">
      <?php
      $title = "";
      $content = "";
      $titleError = "";
      $contentError = "";

      if (isset($_POST["wyslano"])) {

        //przypisanie danych z tablicy do zmiennych
        $title = $_POST["title"];
        $content = $_POST["content"];

        //walidacja 
        if (empty($title)) {
          $titleError = "Pole Tytuł nie może być puste!";
        }
        if (empty($content)) {
          $contentError = "Treść nie może być pusta!";
        }

        //Jeśli nie ma błęddów wysyla dane i czysci pola formularza
        if (empty($titleError) && empty($contentError)) {

          $sql = "INSERT INTO posts(title,content) VALUES ('$title','$content');";
          if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit();
          }

          //czyszczenie pól formularza
          $title = "";
          $content = "";
        }
      }

      ?>
      <label type=text class="text-success fw-bold" for="">Tytuł:</label>
      <div class="input-group has-validation">
        <input class="form-control <?php if (!empty($titleError)) echo "is-invalid"; ?>" type="text" name="title" value="<?php echo $title; ?>">
        <div class="invalid-feedback">
          <?php
          echo $titleError;
          ?>
        </div>
      </div>

      <label type=text class="text-success fw-bold" for="">Treść:</label>
      <div class="input-group has-validation">
        <textarea class="form-control <?php if (!empty($contentError)) echo "is-invalid"; ?>" type="text" name="content" value="<?php echo $title; ?>">
        
          <?php
          echo $contentError;
          ?>
        
        </textarea>
      </div>
      <button class="btn btn-success mt-1" type="submit" name="wyslano" value="xxx">DODAJ</button>

      <?php
      //komunikat powodzenia
    if(empty($titleError)&&empty($contentError)&&isset($_POST['wyslano'])){
      echo '<div class="alert alert-success mt-2" role="alert">';
                    echo  'Brawo! Dodałeś nowy wpis do bloga!';
                    echo '</div>';
    }
    ?>
    </form>


  </div>



  </form>




  </div>
</body>

</html>