<?php 

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/university.json'), true);
}

$users = getUsers();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>

<body>
    <h2>Docker Project - Hicham Zaidi</h2>
<table id="tab">

  <tr id="row1">
      <th>Picture</th>
      <th>University Name</th>    
      <th>Domain</th>
  </tr>

  <?php foreach ($users as $user): ?>

<tr>
                <td>
                    <img style="width:70px" src="<?php echo "images/${user['picture']}" ?>" alt="">
                </td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['domain'] ?></td>
</tr>

  <?php endforeach;; 
?>
</table>

<form action="addRow.php" method="POST" style="margin: 100px;" enctype="multipart/form-data" >

  <label for="fname">Picture :</label><br>
  <input name="picture" type="file" value="<?php echo $user['picture'] ?>" ><br><br>

  <label for="lname">University Name :</label><br>
  <input name="name" placeholder="Name" value="<?php echo $user['name'] ?>" ><br><br>

  <label for="lname">Domain :</label><br>
  <input name="domain" placeholder="Domain" value="<?php echo $user['domain'] ?>"><br><br>

  <button name="add" type="submit" value="submit">ADD ROW</button>

</form>

</body>
</html>


