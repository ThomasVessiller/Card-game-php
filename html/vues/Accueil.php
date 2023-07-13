<?php $this->titre = "Event"; ?>

<?php foreach ($events as $event):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=event&id=" . $event['id'] ?>">
                <h1 class="titreEvent"><?= $event['titre'] ?></h1>
            </a>
            <time><?= $event['date'] ?></time>
        </header>
        <p><?= $event['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
