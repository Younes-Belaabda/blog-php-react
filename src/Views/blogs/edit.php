<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/api/blogs/<?php echo $id ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="title" value="<?php echo $blog['title']?>"><br>
        <input type="text" name="content" placeholder="content" value="<?php echo $blog['content']?>"><br>
        <button>edit</button>
    </form>
</body>
</html>