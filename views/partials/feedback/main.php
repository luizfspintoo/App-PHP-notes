<link rel="stylesheet" href="/styles/feedback.css">

<div class="card">
    <header>
        <img src="/images/mulher-sorrindo.png" alt="">
    </header>

    <main>
        <h1>Avalie a nossa plataforma</h1>
        <span>Agradecemos por utilizar a nossa plataforma! Sua opinião é muito importante para nós. Por favor, tire um momento para avaliar a sua experiência. Seu feedback nos ajuda a melhorar e oferecer um experiência incrível.</span>

        <div class="rating">
            <form action="/feedback" method="POST">

                <input type="text" name="name" id="name" placeholder="Digite seu nome" maxlength="160"><br>
                <?php if (isset($erros["name"])) : ?>
                    <p class="erro-message"><?= $erros["name"]; ?></p>
                <?php endif; ?>

                <input type="text" name="email" id="email" placeholder="Digite seu email" maxlength="160" value="<?= $_SESSION["user"]["email"]; ?>"><br>

                <textarea name="body" id="body" rows="4" placeholder="Escreva o seu Feedback aqui 🚀" maxlength="160"></textarea>
                <?php if (isset($erros["body"])) : ?>
                    <p class="erro-message"><?= $erros["body"]; ?></p>
                <?php endif; ?>

                <?php if (isset($erros["erro"])) : ?>
                    <p class="erro-message"><?= $erros["erro"]; ?></p>
                <?php endif; ?>

                <button type="submit">
                    Avaliar Plataforma
                    <img src="/images/icons-feedback/arrow.svg" alt="">
                </button>
            </form>
        </div>
    </main>
</div>