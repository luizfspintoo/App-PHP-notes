<link rel="stylesheet" href="/styles/account.css">

<div class="my-account">
    <form method="POST" action="/account">
        <div>
            <h2>Informações da Conta</h2>
            <div class="input-wrapper">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" id="id" value="<?= $userAccount["id"] ?? ""; ?>">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" maxlength="30" placeholder="email" disabled value="<?= $userAccount["email"] ?? ""; ?>">
                
                <?php if (isset($erros["email"])) : ?>
                    <p class="erro-message"><?= $erros["email"]; ?></p>
                <?php endif; ?>
            </div>
            <div class="input-wrapper">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" maxlength="30" placeholder="Informe sua nova senha">
                
                <?php if (isset($erros["password"])) : ?>
                    <p class="erro-message"><?= $erros["password"]; ?></p>
                <?php endif; ?>

                <?php if (isset($userAccount["erro"])) : ?>
                    <p class="erro-message"><?= $userAccount["erro"]; ?></p>
                <?php endif; ?>
            </div>
        </div>

        <button type="submit">
            <ion-icon name="chevron-forward-outline"></ion-icon>
            Atualizar
        </button>
    </form>

    <div class="about-me">
        <div>
            <img src="/images/security.png" alt="">
        </div>
        <div class="drags-file">
            <p>Atualize suas informações de login a qualquer momento. Sua senha atual não será exibida no campo de senha. Lembre-se de anotar suas alterações.</p>
        </div>
    </div>
</div>
