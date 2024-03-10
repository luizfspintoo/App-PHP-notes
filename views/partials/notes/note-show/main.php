<link rel="stylesheet" href="/styles/note.css">

        <div class="card note">
            <p>
                <?= $note['body']; ?>
            </p>
        </div>
        <div class="buttons card">
            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note["id"] ?>">
                    <ion-icon name="create-outline"></ion-icon>
                    Editar
                </a>
            </footer>
            <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note["id"] ?>">
                <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded">
                    <ion-icon name="trash-outline"></ion-icon>
                    Deletar
                </button>
            </form>
        </div>
</section>