<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='../style/bootstrap.min.css'/>
    <link rel='stylesheet' href="../mystyle.css"/>
    <title>MeoNha's Button</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="scode.js"></script>
    <script src="phpScript.js"></script>
    <script src="jshandler.js"></script>

</head>
<body>
    <?php include 'navbar.php';?>
    <div class="jumbotron">
        <h1 class="display-3">MeoNha's Button</h1>
    </div>
    <div class="container row">
        <button type="button" class="btn btn-primary btnjs" value="prevjs">Prev Song</button>
        <button type="button" class="btn btn-primary btnjs" value="refreshjs">Get login</button>
        <button type="button" class="btn btn-primary btnjs" value="currentjs">Get current</button>
        <button type="button" class="btn btn-primary btnjs" value="next">Next song</button>
    </div>
    <div class="container row" id="responses"></div>
    <div class="container row">
        <p class="col-3">Click to generate button</p>
        <input id="first" class="btn btn-primary" type="button" value="First Run!" onclick="firstRun();">
    </div>
</body>
</head>
</html>