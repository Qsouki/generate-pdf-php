<?php 
$db= require_once('database.php');
$users=$db->getAll();

?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>My App</title>
    </head>
    <body >
        <table class="table table-borderless w-75">
            <thead>
                <tr>
                    <th class="text-muted text-extra-small mb-2">ID</th>
                    <th class="text-muted text-extra-small mb-2">NAME</th>
                    <th class="text-muted text-extra-small mb-2">PHONE</th>
                    <th class="text-muted text-extra-small mb-2">EMAIL</th>
                    <th class="text-muted text-extra-small mb-2">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user ) : ?>
                    <tr> 
                        <td name="id" ><?php echo $user['id'] ?></td>
                        <td name="name"><input type="hidden" name='name_.<?php echo $user['id'] ?>' value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></td>
                        <td name="phone"><input type="hidden" name="phone_.<?php echo $user['id'] ?>" value="<?php echo $user['phone'] ?>"><?php echo $user['phone'] ?></td>
                        <td name="email"><input type="hidden"  name="email_.<?php echo $user['id'] ?>" value="<?php echo $user['email'] ?>"><?php echo $user['email'] ?></td>
                        <td>
                            <a href="/generator-pdf/pdf.php?id=<?php echo $user['id'] ?>"  class="btn btn-info">PRINT</a>
                        </td>
                    </tr> 
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>