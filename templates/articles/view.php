<?php include __DIR__ . '/../header.php'; ?>
    <p><?= $author->getNickname() ?? '' ?></p>
    <h1><?= $article->getName() ?? '' ?></h1>
    <p><?= $article->getText() ?? '' ?></p>
<?php include __DIR__ . '/../footer.php'; ?>
