<?php

// Connection  
$servername = "127.0.0.1";
$username = "root";
$password = "mysql";
$db = "projectstaff";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



// Add new project
if (isset($_POST['newProject'])) {
  $projectName = $_POST['newProject'];
  $sql = "INSERT INTO projects (project)
  VALUES ('$projectName')";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}

// Add new staff member
if (isset($_POST['newMember'])) {
  $memberName = $_POST['newMember'];
  $sql = "INSERT INTO staff (Name)
  VALUES ('$memberName')";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}

// Update staff name  
if (isset($_POST['updateName'])) {
  $ID = $_POST['updateName'];
  $name = $_POST['name'];
  $sql = "UPDATE staff SET Name='$name' WHERE ID=$ID";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}

// Update project name  
if (isset($_POST['updatePName'])) {
  $ID = $_POST['updatePName'];
  $name = $_POST['pname'];
  $sql = "UPDATE projects SET Project='$name' WHERE ID=$ID";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}


// Delete  staff by ID
if (isset($_POST['del'])) {
  $delID = $_POST['del'];
  $sql = "DELETE FROM staff WHERE id=$delID";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}

// Delete  projects by ID
if (isset($_POST['delP'])) {
  $delID = $_POST['delP'];
  $sql = "DELETE FROM projects WHERE id=$delID";
  mysqli_query($conn, $sql);
  header("Refresh:0");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div class="menu">

    <div class="menu_left">
      <a href="index.php?path=projektai">Projektai</a>
      <a href="index.php?path=darbuotojai">Darbuotojai</a>
    </div>

    <div class="menu_right">
      <a href="###">Projekto Valdymas</a>
    </div>

  </div>


  <?php
  echo '<table class="table">';

  $sqlProjects = "SELECT ID, Project FROM projects";
  $result = $conn->query($sqlProjects);
  if ($_SERVER["REQUEST_URI"] == '/PersonalasMYSQL/' or $_GET["path"] != 'darbuotojai') {
    if ($result->num_rows > 0) {
      echo
        "<tr>
    <td class='small-col'>ID</td>
    <td>Project</td>
    <td>Asigned</td>
    <td class='small-col'>Actions</td>;
    </tr>";
      while ($row = $result->fetch_assoc()) {
        echo
          "<tr><td class='small-col'>" . $row["ID"] .  "</td>" .
            "<td>" . $row["Project"] . "<form method='POST'>
            <input type='hidden' name='updatePName' value='" . $row["ID"] . "'>
            <input type='text' name='pname' value=''>
            <input  class='buttons' type='submit' value='CHANGE PROJECT NAME'>
           </form>" . "</td> 
          <td>Asigned##</td>
          <td class='small-col'><form method='POST'>
          <input type='hidden' name='delP' value='" . $row["ID"] . "'>
          <input  class='buttons delete' type='submit' value='DELETE'>
         </form></td>

        </tr>";
      }
    } else {
      echo "0 results";
    }
  } else if ($_GET["path"] = 'darbuotojai') {
    $sqlProjects = "SELECT ID, Name FROM staff";
    $result = $conn->query($sqlProjects);

    echo "<tr>
    <td class='small-col'>ID</td>
    <td>Name</td>
    <td>Asigned Course</td>
    <td class='small-col'>Action</td>

    </tr>";
    while ($row = $result->fetch_assoc()) {
      echo
        "<tr>
        <td class='small-col'>" . $row["ID"] . "</td>" .
          "<td>" . $row["Name"] . "<form method='POST'>
          <input type='hidden' name='updateName' value='" . $row["ID"] . "'>
          <input type='text' name='name' value=''>
          <input  class='buttons' type='submit' value='CHANGE NAME'>
         </form>" . "</td>" .
          '<td>Asigned Course</td>' .
          "<td class='small-col'><form method='POST'>
          <input type='hidden' name='del' value='" . $row["ID"] . "'>
          <input  class='buttons delete' type='submit' value='DELETE'>
         </form>
         </td>
          </tr>";
    }
  }

  echo '</table><br>';

  if ($_SERVER["REQUEST_URI"] == '/PersonalasMYSQL/' or $_GET["path"] != 'darbuotojai') {
    echo '<form method="POST">
<input type="text" name="newProject" value="">
<input type="submit" value="ADD NEW PROJECT">
</form>';
  } else if ($_GET["path"] = 'darbuotojai') {
    echo '<form method="POST">
<input type="text" name="newMember" value="">
<input type="submit" value="ADD NEW MEMBER">
</form>';
  }

  echo '<p class="currentDir">Current directory: ' . $_GET["path"] . '</p>';
  echo '<p class="currentDir">Current directory: ' . $_SERVER["REQUEST_URI"] . '</p>';
  echo '<p class="currentDir">Current directory: ' . $_SERVER["QUERY_STRING"] . '</p>';



  $conn->close();

  ?>
</body>

</html>