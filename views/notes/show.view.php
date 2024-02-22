<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes">Visualizar todas as anotações</a>
        </p>
        <p>
            <?= $note['body']; ?>
        </p>

        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note["id"] ?>">
            <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-3 border border-red-500 hover:border-transparent rounded">Deletar</button>
        </form>

        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note["id"] ?>" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">Editar</a>
        </footer>
    </div>
</main>
<?php require base_path("views/partials/footer.php"); ?>