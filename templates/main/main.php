<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article) : ?>
    <h1>
        <a href="/article/<?= $article['id'] ?>"><?= $article['name'] ?></a>
    </h1>
    <p><?= $article['text'] ?></p>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
