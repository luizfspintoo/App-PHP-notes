<?php require base_path("views/partials/dashboard/head.php"); ?>

<body>
    <div id="app">
        <?php require base_path("views/partials/dashboard/sidebar.php"); ?>
        <main>

            <div class="inner">
                <?php require base_path("views/partials/dashboard/header.php"); ?>

                <section class="filter">
                    <a href="/notes/create">
                        <button>
                            <ion-icon name="add-outline"></ion-icon>
                            <span>Criar Anotação</span>
                        </button>
                    </a>

                    <div class="input-wrapper">
                        <ion-icon name="search-outline"></ion-icon>
                        <input type="text" placeholder="Pesquise sua anotação aqui">
                    </div>
                </section>

                <section class="cards">
                    <?php if (empty($notes)) : ?>    
                            <img src="/images/create.svg">
                    <?php else : ?>
                        <?php foreach ($notes as $note) : ?>
                            <?php if (strlen($note["body"]) > 0) : ?>
                                <a class="card" href="/note?id=<?= $note["id"] ?>">
                                    <div>
                                        <p><?= $note['body']; ?></p>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </section>
            </div>
        </main>
    </div>
    <script src="/scripts/dashboard/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>