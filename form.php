<?php
    include 'DBhelper.php';

    $dbhelper = new DBhelper();

    if($_GET['id'] > 0){
        $users = $dbhelper->get_user_for_update($_GET['id']);
    }

    


?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        if($_GET['id'] > 0){
            $users = $dbhelper->get_user_for_update($_GET['id']);
            foreach ($users as $i => $user) {
        }       
    ?>
        <form method = "post" action = "index.php">
            <label for="fname">Name:</label>
            <input type="text" id="name" name="name" value="<?=$user->get_name()?>"> <br><br>
            <label for="lname">Surname:</label>
            <input type="text" id="surname" name="surname" value = <?=$user->get_surname()?>><br><br>
            <label for="lname">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value = <?=$user->get_birthday()?>><br><br>
            <input type="hidden" id="id" name="id" value = <?=$user->get_id()?>> <br><br>
            <input type="submit" value="Submit">
        </form>
    <?php
        }


        else {           
    ?>
        <form method = "post" action = "index.php">
            <label for="fname">Name:</label>
            <input type="text" id="name" name="name"> <br><br>
            <label for="lname">Surname:</label>
            <input type="text" id="surname" name="surname" ><br><br>
            <label for="lname">Birthday:</label>
            <input type="date" id="birthday" name="birthday" ><br><br>
            <input type="hidden" id="id" name="id" value = <?=$_GET['id']?>> <br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        }
    ?>

</body>
</html>