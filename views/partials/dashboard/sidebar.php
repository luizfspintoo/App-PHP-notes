<nav>
    <div class="logo">
        <h1>Note<span>Sync</span></h1>
    </div>
    <ul>
        <li>
            <a href="/dashboard" class="<?= urlIs("/dashboard") ? "active" : "" ?> ">
                <ion-icon name="home-outline"></ion-icon>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/notes" class="<?= urlIs("/notes") ? "active" : "" ?> ">
                <ion-icon name="document-text-outline"></ion-icon>
                Anotações
            </a>
        </li>
        <li>
            <a href="/account" class="<?= urlIs("/account") ? "active" : "" ?> ">
                <ion-icon name="settings-outline"></ion-icon>
                Conta
            </a>
        </li>
    </ul>
    <div>
        <?php if ($_SESSION["user"] ?? false) : ?>
            <form action="/session" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="logout">Sair</button>
            </form>
        <?php endif; ?>
    </div>
</nav>