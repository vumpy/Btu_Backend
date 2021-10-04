<?php
    include 'DBhelper.php';

    $dbhelper = new DBhelper();

    $users = $dbhelper->get_users();

    if(isset($_GET['delete_id'])){
        $dbhelper->delete_user($_GET['delete_id']);
        header('Location:index.php');
    }

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0){
            header('Location:form.php?id='.$_GET['id']);
        }
        else {
            header('Location:form.php?id='.$_GET['id']);
        }
    }

    if(isset($_POST['id'])){
        if($_POST['id'] > 0) {
            $user = new user($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['birthday'], NULL);
            $dbhelper->update_user($user);
            header('Location:index.php');    
        }
        else {
            var_dump($_POST);
            $user = new user(NULL, $_POST['name'], $_POST['surname'], $_POST['birthday'], NULL);
            $dbhelper->create_user($user);
            header('Location:index.php');
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        <?php   
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($users as $i => $user) {
                        ?>
                    <tr>        
                        <?php
                            $user->print();

                        ?>
                            <td>
                            <a href='index.php?delete_id=<?=$user->get_id()?>'>
                                delete 
                            </a>    
                            </td>

                            <td>
                            <a href='index.php?id=<?=$user->get_id()?>'>
                                update 
                            </a>
                            </td>          
            
                        
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
            

            <a href = 'index.php?id=-1'>
                add new user
            </a>
        

    </body>
</html>