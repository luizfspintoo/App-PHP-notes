<section class="cards">
    <?php if (empty($notes)) : ?>
        <h2>Você ainda não possui anotações, vamos criar?</h2>
        <img src="/images/create.svg">
    <?php else : ?>
        <div class="notes">
            <?php foreach ($notes as $note) : ?>
                <div class="note">
                    <?php if (strlen($note["body"]) > 0) : ?>
                        <div>
                            <p class="description">
                                <?= $note['body']; ?>
                            </p>
                        </div>
                        <a href="/note?id=<?= $note["id"] ?>">
                            <button>Ver Detalhes</button>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
</section>

<script src="/scripts/dashboard/filter/index.js"></script>