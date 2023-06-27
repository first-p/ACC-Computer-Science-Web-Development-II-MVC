

<h2 class="page-title"><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<form action="/news/create" method="POST">

<label for="title">Title</label>
<input type="text" name="title" placeholder="Enter title" /><br />

<label for="text">Text</label>
<textarea name="text" class="" placeholder="Enter news"></textarea><br />

<input class="submit-post" type="submit" name="submit" value="Create news item" />

</form>