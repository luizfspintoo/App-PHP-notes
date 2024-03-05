<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <title>NoteSync</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #09090A;
            color: white;
            font-family: "DM Sans", sans-serif;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        nav {
            background-color: transparent;
            height: 80px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(240, 240, 240, 0.2)
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 0 auto;
            align-items: center;
        }

        .nav-menu ul {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .nav-menu ul li {
            font-size: 14px;
            font-weight: 700;
        }

        ul li {
            padding: 10px 0;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a.cta {
            padding: 10px 30px;
            background-color: #7b4ee4;
            border-radius: 3px;
        }

        a.cta:hover,
        .btn-button:hover {
            background-color: #6a5acd;
        }

        a.cta-register {
            border: 1px solid #7b4ee4;
            padding: 10px 30px;
            border-radius: 3px;
        }

        a.cta-register:hover {
            background-color: #6a5acd;
            border: 1px solid #7b4ee4;
        }

        .hero {
            opacity: 0;
            /* Inicialmente definido como invisível */
            animation: fadeIn 1s ease-in-out forwards;
            /* Animação de entrada */
        }


        .hero,
        .about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
            padding: 4rem 0;
            margin-bottom: 7rem;
        }

        .hero h1,
        .about h2 {
            font-size: 55px;
        }

        .hero-paragraph {
            margin: 20px 0;
        }

        .btn-button {
            text-decoration: none;
            border: none;
            font-size: 14px;
            color: white;
            font-weight: 700;
            background-color: #7b4ee4;
            border-radius: 3px;
            padding: 15px 30px;
            display: inline-block;
        }

        img {
            width: 55%;
            border-radius: 3px;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
                /* Pode ajustar a animação de transição aqui */
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gradiente-text {
            background: linear-gradient(to right, #7b4ee4, #5834ad);
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <h2>NoteSync</h2>
            <div class="nav-menu">
                <ul>
                    <li>Home</li>
                    <li>Quem somos</li>
                    <li>NoteSync</li>
                    <li>Contato</li>
                    <li>
                        <a class="cta-register" href="/register">
                            Registre-se
                        </a>
                    </li>
                    <li>
                        <a class="cta" href="/login">
                            Faça login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container">
        <div class="hero">
            <div>
                <h1><span>NoteSync</span class="gradient-text"> seu novo App de <span class="gradient-text">anotações</span></h1>
                <p class="hero-paragraph">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia doloribus nulla maiores repellat similique quas harum? Ut sit eveniet explicabo excepturi. Error quia minima dolorem sequi, id dolor excepturi corrupti!</p>
                <a href="" class="btn-button">Inscreva-se agora e crie suas ideias</a>
            </div>

            <img src="https://img.freepik.com/fotos-gratis/mulher-em-casa-usando-smartphone-na-frente-do-computador-enquanto-toma-cafe_23-2148793444.jpg?t=st=1709598482~exp=1709602082~hmac=0c0b3fb3e38005085ec389ea7456922a7c399c30034d9d3ac2497bdac75134aa&w=740" alt="">
        </div>
    </section>
    <section class="container">
        <div class="about">
            <img src="https://img.freepik.com/fotos-gratis/retrato-de-grupo-de-colegas-diversos-e-felizes_93675-134770.jpg?t=st=1709604866~exp=1709608466~hmac=f3b2426a4fc1a5bcdc23ebb4a5c5b4ad3aec138ddb8faa62015ea1489443abb5&w=740" alt="">
            <div>
                <h2>Quem somos</h2>
                <p class="hero-paragraph">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia doloribus nulla maiores repellat similique quas harum? Ut sit eveniet explicabo excepturi. Error quia minima dolorem sequi, id dolor excepturi corrupti!</p>
                <a href="" class="btn-button">Inscreva-se agora e crie suas ideias</a>
            </div>
        </div>
    </section>

</body>

</html>