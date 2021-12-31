<html>
<head>
    <title>LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    <link rel="stylesheet" a href="css\styles.css">
    <!-- Latest compiled and minified CSS -->

</head>
<body>
  <div class="reg-form">
    <form method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="mb-3">
        <label for="Usernmae" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="username" value="">
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password" value="">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">LogIn</button>
      </div>
    </form>

  </div>

  <br>

  <?php

    if (!isset($_SESSION)) {
      session_start();
    }
    // define variables and set to empty values
    $usernameErr = $Err = "";
    $name = $pass = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testdb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, "3006");



    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $name = $_POST["username"];
      $pass = $_POST["password"];

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // sql to create table
      $sql = "SELECT * from loginform where user= '$name' and password= '$pass'";


      if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "id: " . $row["id"]. " - Name: " . $row["user"]. " " . $row["password"]. "<br>";
              header("location: createJob.php");

          }
        } else {
              echo "$name";
              echo $pass;
        }
      } else {
        echo "Error" . mysqli_error($conn);
      }

      mysqli_close($conn);


    }
  ?>


</body>
</html>
