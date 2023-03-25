<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<div class="login">
        <form action="../api/regiksz/index.php" method="POST">
            <input type="number" name="max" placeholder="MaxFő">
            <input type="text" name="title" placeholder="Cím">
            <input type="text" name="description" placeholder="Leírás">
            <input type="text" name="image" placeholder="Kép URL" value="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png">
            <input type="submit" value="Feltölt" class="cursor-pointer">
        </form>
    </div>
</body>
</html>