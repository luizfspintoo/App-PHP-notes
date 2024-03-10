<link rel="stylesheet" href="/styles/account.css">


<div class="my-account">
    <form method="POST" action="/account">
        <div>
            <h2>Informações Pessoais</h2>
            <div class="input-wrapper">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" maxlength="30" placeholder="Nome completo">
            </div>
            <div class="input-wrapper">
                <label for="sobre">Sobre mim</label> <br>
                <textarea name="sobre" id="sobre" maxlength="120" placeholder="Escreva um breve resumo"></textarea>
            </div>
        </div>

        <button type="submit">Atualizar</button>
    </form>

    <div class="about-me">
        <div>
            <img src="/images/avatar.svg" alt="">
        </div>
        <div class="drags-file">
            <h3>Nome</h3>
            <p>Luiz Felipe da Silva</p>

            <h3>Sobre mim</h3>
            <p>Desenvolvedor de software especializado em PHP, criando aplicativos web interativos e escaláveis usando Laravel, JavaScript e outras tecnologias modernas.</p>
        </div>
    </div>
</div>