<!-- -----------------------------------
Name: Fred Butoma
Assignment 9
File: view.php
Purpose: view.php forms the body of
the specific news article page chosen from
the list of articles on the news page
--------------------------------------->

<div class="news-row single">
    <div class="news-title"><?= $news_item['title']; ?></div>
    <div class="news-body">
        <?= $news_item['text']; ?>
    </div>
</div>

<?php
//echo '<h2>'.$news_item['title'].'</h2>';
//echo $news_item['text'];
//
