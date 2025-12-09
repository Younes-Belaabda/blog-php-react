<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<div>';
        echo '<p>' . $blog['title'] . '</p>';
        echo '<article>' . $blog['content'] . '</article>';
        echo '</div>';
    ?>
</body>
</html>