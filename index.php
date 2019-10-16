<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST['encoding'] == "sjis"){
        $arr = [
            "show" => $_POST["show"] ?? false,
            "origin" => mb_convert_encoding($_POST["origin"], "UTF-8", "SJIS") ?? "",
            "name" => mb_convert_encoding($_POST["name"], "UTF-8", "SJIS") ?? ""
        ];
    } else {
        $arr = [
            "show" => $_POST["show"] ?? false,
            "origin" => $_POST["origin"] ?? "",
            "name" => $_POST["name"] ?? ""
        ];
    }

    if (!isset($arr["show"])){
        $arr["show"] = false;
    }

    file_put_contents('sample.json',json_encode($arr));

    //echo "OK!";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <form class="form-inline" method="post" action="/index.php">
        <div class="form-group mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="show" value="true" autofocus>
                <label class="form-check-label" for="defaultCheck1">
                    表示　
                </label>
            </div>
        </div>

            <button type="submit" class="btn btn-primary mb-2">Submit</button>

        <div class="form-group mb-2">
            <input type="text" name="origin" class="form-control" placeholder="作品">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="test" name="name" class="form-control" placeholder="キャラ名">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>
</body>
</html>
