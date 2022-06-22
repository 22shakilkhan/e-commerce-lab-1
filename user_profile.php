<?php
require_once'db_config.php';
/*try to select query*/
            $sql = "select*from users";
            $stmt = $con->query($sql);
            $stmt->execute();
            //this contains all user
            $all_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
   <div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
            <th>image</th>
            <th>Roll</th>
            <th>Name</th>
            <th>Department</th>
            <th>Session</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($all_user as $user): ?>
            <tr>
                <td><img src="uploads/<?=$user['image'];?>" width="100" height="100"></td>
                <td><?=$user['roll'];?></td>
                <td><?=$user['name'];?></td>
                <td><?=$user['department'];?></td>
                <td><?=$user['stu_session'];?></td>
                <td><?=$user['user_password'];?></td>
                <?php endforeach;?>
            </tr>
        </tbody>
    </table>   
   </div> 
</body>
</html>