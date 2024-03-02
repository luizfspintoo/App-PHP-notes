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
                    <h1>Editar anotação ✒️</h1>

                    <div>
                        Bem vindo, <span>Luiz</span>
                        <img src="/images/avatar.svg">
                    </div>
                </section>

                <section class="cards">
                    <div class="card">
                    <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note["id"]; ?>">
            <div class="space-y-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                        <div class="mt-2">
                        <textarea id="body" name="body" rows="3"><?= $note["body"] ?? ""; ?></textarea>

                        <?php if (isset($erros["body"])) : ?>
                            <p class="erro-message"><?= $erros["body"]; ?></p>
                        <?php endif; ?>

                        </div>

                        <div class="back">
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
            </div>
        </main>
    </div>
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
          const nav = document.querySelector('nav');
          const toggleBtn = document.querySelector('.toggle-btn');
      
          toggleBtn.addEventListener('click', function () {
            nav.classList.toggle('show');
          });
        });
    </script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>




