<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N1</title>
    <style>
        form, .files{
            border: solid black 1px;
            margin: 10px auto;
            padding: 10px;
            width: 500px;
        }
    </style>
</head>
<body>
    <?php
        if(!is_dir("files")) {
            mkdir("files");
        }
        if(isset($_POST['writeButton'])){
            $text = $_POST['text'];
            $tarigi = date("Y-m-d-H-i-s");
            $f = fopen("files/".$tarigi, 'w');
            fwrite($f, $text);
            fclose($f);
        }
    ?>
    <form method="post">
        <textarea name="text" rows="10" cols="40"></textarea> - Text
        <br><br>
        <button name="writeButton">Create file</button>
    </form>
    <div class="files">
        <h2>Files</h2>
        <ul>
            <?php
                $files = scandir("files");
                for($i=2; $i<count($files); $i++){
                    echo "<li><a href='files/".$files[$i]."'>".$files[$i]."</a></li>";
                }
            ?>
        </ul>
    </div>
</body>
</html>