<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='./style/bootstrap.min.css'/>
    <link rel='stylesheet' href="./mystyle.css"/>
    <title>MeoNha's Button</title>
    <script src="testCode.js"></script>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="jumbotron">
        <h1 class="display-3">MeoNha's Button</h1>
        <p class="lead">Showcase of all the button</p>
    </div>
    <div class="container" id="buttonStore">
            <!--<input name="" id="button1" class="btn btn-primary" type="button" value="Click me!" onclick="changeButton('button1');">
            <input name="" id="button2" class="btn btn-secondary" type="button" value="Click me!" onclick="changeButton('button2');">
            <input name="" id="button3" class="btn btn-success" type="button" value="Click me!" onclick="changeButton('button3');">
            <input name="" id="button4" class="btn btn-danger" type="button" value="Click me!" onclick="changeButton('button4');">
            <input name="" id="button5" class="btn btn-warning" type="button" value="Click me!" onclick="changeButton('button5');">
            <input name="" id="button6" class="btn btn-info" type="button" value="Click me!" onclick="changeButton('button6');">
            <input name="" id="button7" class="btn btn-light" type="button" value="Click me!" onclick="changeButton('button7');">
            <input name="" id="button8" class="btn btn-dark" type="button" value="Click me!" onclick="changeButton('button8');">-->
    </div>
    <div class="container row">
        <p class="col-3">Click to generate button</p>
        <input name="" id="buttonCraetor" class="btn btn-primary" type="button" value="Click me!" onclick="generateButton();">
    </div>
</body>
</head>
</html>