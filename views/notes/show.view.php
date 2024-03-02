<?php require base_path("views/partials/dashboard/head.php"); ?>

<body>
    <div id="app">
    <nav>

<div class="logo">
    <h1>Note<span>Sync</span></h1>

    
</div>
<ul>
    <li>
        <a href="/dashboard">
            <ion-icon name="home-outline"></ion-icon>
            Dashboard
        </a>
    </li>
    <li>
        <a href="/notes">
            <ion-icon name="document-text-outline"></ion-icon>
            Anotações
        </a>
    </li>
    <li>
        <a href="">
        <ion-icon name="settings-outline"></ion-icon>
            Minha Conta
        </a>
    </li>
    <li>
        <a href="">
            <ion-icon name="chatbubbles-outline"></ion-icon>
            Comentários
        </a>
    </li>
    <li>
        <a href="">
            <ion-icon name="documents-outline"></ion-icon>
            Relatórios
        </a>
    </li>
    <li>
        <a href="">
            <ion-icon name="mail-outline"></ion-icon>
            E-mails
        </a>
    </li>
    <li>
        <a href="">
            <ion-icon name="bag-check-outline"></ion-icon>
            Segurança
        </a>
    </li>


    <li>
        <ion-icon name="log-out-outline"></ion-icon>
        <?php if ($_SESSION["user"] ?? false) : ?>
            <form action="/session" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Sair</button>
            </form>
        <?php endif; ?>
    </li>




</ul>
</nav>
        <main>

            <div class="inner">
                <button class="toggle-btn">
                    <ion-icon name="reorder-three-outline"></ion-icon>
                </button>
                <section class="title-avatar">
                    <h1>Anotação ✒️</h1>

                    <div>
                        Bem vindo, <span>Luiz</span>
                        <img src="/images/avatar.svg">
                    </div>
                </section>

                <section class="cards">
                    <div class="card">
                        <h3>Título Anotação 🚩</h3>
                        <p><?= $note['body']; ?></p>
                        <div class="back">
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
                    </div>
                </section>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.querySelector('nav');
            const toggleBtn = document.querySelector('.toggle-btn');

            toggleBtn.addEventListener('click', function() {
                nav.classList.toggle('show');
            });
        });
    </script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>