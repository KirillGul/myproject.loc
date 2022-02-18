<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article) : ?>
    <h1>
        <a href="/article/<?= $article->getId() ?>"><?= $article->getName() ?></a>
    </h1>
    <p><?= $article->getText() ?></p>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
