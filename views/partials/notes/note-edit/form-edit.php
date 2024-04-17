<link rel="stylesheet" href="/styles/note.css">

<section>
    <div class="card">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note["id"]; ?>">
            <div class="space-y-12">
                <div>
                    <div>
                        <label for="body">Descrição</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3" maxlength="255"><?= $note["body"] ?? ""; ?></textarea>

                            <?php if (isset($erros["body"])) : ?>
                                <p class="erro-message"><?= $erros["body"]; ?></p>
                            <?php endif; ?>

                            <?php if (isset($erros["erro"])) : ?>
                                <p class="erro-message"><?= $erros["erro"]; ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="buttons">
                            <a href="/notes">
                                <ion-icon name="arrow-undo-outline"></ion-icon>
                                Cancelar
                            </a>
                            <button type="submit">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                                Atualizar
                            </button>
                        </div>

                    </div>
                </div>
        </form>
    </div>
</section>