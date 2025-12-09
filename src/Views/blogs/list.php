<?php

    echo "<a href='/blog/create'>Create</a>";
    foreach($blogs as $blog){
        echo '<div>';
        echo '<p>' . $blog['title'] . '</p>';
        echo '<article>' . $blog['content'] . '</article>';
        echo "<a href='/blog/edit/{$blog['id']}'>Edit</a></br>";
        echo "<a href='/blog/show/{$blog['id']}'>Show</a></br>";
        echo "<form action='/api/blogs/{$blog['id']}' method='POST'>
            <input type='hidden' name='_method' value='DELETE'>
            <button>delete</button>
        </form>";
        echo '</div>';
    }