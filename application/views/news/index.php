
<h2 class="page-title"><?= $title; ?></h2>

<?php foreach ($news as $news_item): ?>
    <div class="news-row">
        <div class="news-title"><?= $news_item['title']; ?></div>
        <div class="news-body">
            <?= $news_item['text']; ?>
        </div>
        <div class="news-link">
            <a href="<?= site_url('news/'.$news_item['slug']); ?>">View article</a>
        </div>
    </div>

<?php endforeach; ?>

<!--<script src="/assets/js/fetch_news.js"></script>-->
