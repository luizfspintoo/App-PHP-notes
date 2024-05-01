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

                <div class="wrapper">
                    <label for="name">Nome <span class="mandatory">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Digite seu nome" maxlength="160" value="<?= $name; ?>"><br>
                    <?php if (isset($erros["name"])) : ?>
                        <p class="erro-message"><?= $erros["name"]; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="wrapper">
                    <label for="email">Email <span class="mandatory">*</span></label>
                    <input type="text" name="email" id="email" placeholder="Digite seu email" maxlength="160" value="<?= $_SESSION["user"]["email"]; ?>" disabled><br>
                    <input type="hidden" name="email" value="<?= $_SESSION["user"]["email"]; ?>">
                </div>

                <div class="wrapper">
                    <label for="body">Feedback <span class="mandatory">*</span></label>
                    <textarea name="body" id="body" rows="4" placeholder="Escreva o seu Feedback aqui 🚀" maxlength="160"><?= $body ?></textarea>
                    <?php if (isset($erros["body"])) : ?>
                        <p class="erro-message"><?= $erros["body"]; ?></p>
                    <?php endif; ?>
                </div>

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