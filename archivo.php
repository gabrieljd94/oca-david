<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="file" accept="text/plain">
        <input type="submit" value="ENVIAR">
    </form>
    <?php
    var_dump($_FILES);
    echo "*/*********************************************************************************";
    var_dump($_POST);
    ?>
</body>
</html>