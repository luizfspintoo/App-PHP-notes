<link rel="stylesheet" href="/styles/note.css">

<section>
    <div class="card">
        <form method="POST" action="/notes">
            <div>
                <div>
                    <div>
                        <label for="body">Descrição</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3" maxlength="255"><?= $_POST["body"] ?? ""; ?></textarea>

                            <?php if (isset($erros["body"])) : ?>
                                <p class="erro-message"><?= $erros["body"]; ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="buttons">
                            <a href="/notes">
                                <ion-icon name="arrow-undo-outline"></ion-icon>
                                Cancelar
                            </a>
                            <button type="submit">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>