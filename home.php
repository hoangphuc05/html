<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='./style/bootstrap.min.css'/>
    <link rel='stylesheet' href="./mystyle.css"/>
    <title>MeoNha home page</title>
</head>
<body>

    <?php include 'navbar.php';?>
    <div class="jumbotron">
        <h1 style="text-align: center">WELCOME TO PHUCC HOME PAGE</h1>
    </div>
    <div class="container">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Choose a page
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="buttons.html">Button example</a>
                <a class="dropdown-item" href="#">Another action</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-6">
            <form action="formHandler.php" method = "POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll surely share your email with everyone.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<hr>
    <div class="container form-group">
        <form action="./changePr/pageChanger.php" method="POST">
            <div class="container">
            <div class="form-group">
                <div class="row">
                <label for="fileName" class="col-2 col-form-label">Which file to change</label>
                <input type="text" class="form-control col-10" id="fileName" placeholder="file name/directory" name="fileName">
                </div>
                <label for="fileContent">Content to change in file</label>
                <textarea class="form-control" id="fileContent" rows="3" name="fileContent"></textarea>
            </div>
               
               
            
            <input type="submit" class="btn btn-success" value="Append changes" name="append">
            <input type="submit" class="btn btn-danger" value="Replace file" name='replace'>
        </form>
    </div>

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ChooseFile
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <?php 
            chdir(changePr);
            foreach(glob('*') as $file) {
                echo'<button class="dropdown-item" type="button" id="',$file,'">';
                echo $file,"<br>";
                echo('</button>');
            }
        ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

