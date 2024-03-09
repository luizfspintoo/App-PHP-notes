<?php require base_path("views/partials/login/head.php"); ?>

<body>
	<div id="page" class="flex">

		<img src="https://img.freepik.com/fotos-gratis/amigas-ouvindo-musica-em-fones-de-ouvido_23-2148735446.jpg?t=st=1709139070~exp=1709142670~hmac=6218a1cb2c7b14cfdae32d46a844567c04370945577902279696b8f71c503b8c&w=740" alt="">
		<div class="fadeIn">


			<header>
				<h2>Note<span>Sync</span></h2>

				<a href="/" class="back">
					<img src="/images/arrow-back.svg" alt=""> 
					Home
				</a>
			</header>

			<main>
				<div class="headline">
					<h1>Criar conta</h1>
				</div>

				<form action="/register" method="POST">
					<div class="input-wrapper">
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email" placeholder="Informe o seu email">
						<?php if (isset($erros["email"])) : ?>
							<p class="erro-message"><?= $erros["email"]; ?></p>
						<?php endif; ?>
					</div>
					<div class="input-wrapper">
						<div class="label-wrapper flex">
							<label for="password">Senha</label>
						</div>
						<input type="password" name="password" id="password" placeholder="Informe sua senha">
						<img onclick="togglePassword()" class="eye" src="/images/eye.svg" alt="">
						<img onclick="togglePassword()" class="eye hide" src="/images/eye-off.svg" alt="">
						<?php if (isset($erros["password"])) : ?>
							<p class="erro-message"><?= $erros["password"]; ?></p>
						<?php endif; ?>
					</div>

					<button type="submit" id="submit">
						<i class="fa fa-circle-o-notch fa-spin" id="fa"></i> Criar conta
					</button>

					<div class="help">
						<p>🚀 Já possui uma conta?</p>
						<a href="/login">Faça seu login aqui</a>
					</div>
				</form>
			</main>
		</div>

	</div>
</body>

<script src="/scripts/login/index.js"></script>

</html>