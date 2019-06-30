<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Page changer</title>
</head>
<body>
    <p>File name: <?php echo $_POST["fileName"]; ?> </p>
    <p>Content to change: <?php echo $_POST["fileContent"]; ?> </p>
    <a href="<?php echo ($_POST["fileName"]); ?>"> <button type="button" class="btn btn-primary">Get to new page</button></a>

    <?php
    
    if (isset($_POST['append'])){
        $myFile = fopen($_POST["fileName"], "a+") or die("open file failed!");
        fwrite($myFile, "\n");
    } else {
        $myFile = fopen($_POST["fileName"], "w+") or die("open file failed!");
    }
    fwrite($myFile, $_POST["fileContent"]);
    
    fclose($myFile);
    ?>
    
</body>