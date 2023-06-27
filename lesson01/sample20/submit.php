<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample20</title>
</head>
<body>
    <?php if (!empty($_REQUEST['my_name'])):?>
        <p>お名前：<?php echo htmlspecialchars($_REQUEST['my_name'],ENT_QUOTES) ; ?></p>
    <?php endif;?>

    <?php if (!empty($_GET['my_name'])):?>
        <p>お名前：<?php echo htmlspecialchars($_REQUEST['my_name'],ENT_QUOTES) ; ?></p>
    <?php endif;?>

    <?php if (!empty($_POST['my_name'])):?>
        <p>お名前：<?php echo htmlspecialchars($_REQUEST['my_name'],ENT_QUOTES) ; ?></p>
    <?php endif;?>
</body>

</html>