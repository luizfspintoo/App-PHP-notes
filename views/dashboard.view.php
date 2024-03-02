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
                    <h1>Olá, Luiz</h1>

                    <div>
                        <img src="/images/avatar.svg">
                    </div>
                </section>

                <section class="filter">
                    <button>
                        <ion-icon name="filter-outline"></ion-icon>
                        <span>Filtrar</span>
                    </button>

                    <div class="input-wrapper">
                        <ion-icon name="search-outline"></ion-icon>
                        <input type="text" placeholder="Pesquisar">
                    </div>
                </section>

                <section class="cards">
                    <div class="card">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, sunt! Neque dolores quasi, beatae sed alias</p>
                    </div>
                    <div class="card">

                        <p>A vastidão do universo revela-se em cada centelha cósmica, </p>
                    </div>
                    <div class="card">

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, sunt! Neque dolores quasi, beatae sed alias</p>
                    </div>
                    <div class="card">

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, sunt! Neque dolores quasi, beatae sed alias</p>
                    </div>
                    <div class="card">

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, sunt! Neque dolores quasi, beatae sed alias</p>
                    </div>
                    <div class="card">

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, sunt! Neque dolores quasi, beatae sed alias</p>
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