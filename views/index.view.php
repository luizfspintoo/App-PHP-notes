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
            scroll-behavior: smooth;
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
            padding: 7px 30px;
            border-radius: 3px;
            font-weight: 500;
        }

        a.cta-register:hover {
            background-color: #6a5acd;
            border: 1px solid #7b4ee4;
        }

        .hero,
        .about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 3rem;
            padding: 4rem 0;
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

        .about {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            animation: fadeIn 1s ease-in-out forwards;
        }


        @keyframes fadeIn {
            from {
                transform: translateY(20px);
            }

            to {
                transform: translateY(0);
            }
        }

        .gradient-text {
            background: linear-gradient(to right, #6a5acd, #8a2be2);
            background-clip: text;
            color: transparent;
        }

        .nav-menu span {
            display: none;
            font-weight: bold;
            font-size: 1.6rem;
            cursor: pointer;
        }

        .menu {
            display: none;
        }

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 1);
            overflow-x: hidden;
            transition: 0.5s;
        }

        .overlay-content {
            position: relative;
            top: 25%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }

        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 28px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .overlay a:hover,
        .overlay a:focus {
            color: #7b4ee4;
        }

        .overlay .closebtn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 60px;
            cursor: pointer;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 15px
            }

            .overlay .closebtn {
                font-size: 40px;
                top: 20px;
                right: 20px;
            }
        }

        @media only screen and (max-width: 800px) {

            .hero,
            .about {
                flex-direction: column;
            }

            img {
                width: 100%;
            }

            .about {
                flex-direction: column-reverse;
            }

            .nav-menu ul {
                display: none;
            }

            .menu {
                display: block;
            }

            .nav-menu span {
                display: block;
            }
        }
    </style>
</head>

<body>
    <nav id="hero">
        <div class="navbar">
            <h2>Note<span class="gradient-text">Sync</span></h2>
            <div class="nav-menu">
                <ul>
                    <li>
                        <a href="#hero">
                            Home
                        </a>
                    <li>
                        <a href="#about">
                            NoteSync
                        </a>
                    <li>
                        <a href="#contact">
                            Contato
                        </a>
                    </li>
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

                <div id="myNav" class="overlay">
                    <a class="closebtn" id="closeNav">&times;</a>

                    <div class="overlay-content">
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Clients</a>
                        <a href="#">Contact</a>
                        <a href="/register">
                            Registre-se
                        </a>
                        <a href="/login">
                            Faça login
                        </a>
                    </div>
                </div>
                <span id="openNav">><</span>
            </div>
        </div>
    </nav>
    <section class="container">
        <div class="hero animate-on-scroll visible">
            <div>
                <h1><span class="gradient-text">NoteSync</span> seu novo App de <span class="gradient-text">anotações</span></h1>
                <p class="hero-paragraph">Suas ideias não podem esperar, e com o NoteSync, elas não precisam. Bem vindo(a) a sua organização pessoal e profissional.</p>
                <a href="/register" class="btn-button">Registre-se agora e crie suas ideias</a>
            </div>

            <img src="https://img.freepik.com/fotos-gratis/mulher-em-casa-usando-smartphone-na-frente-do-computador-enquanto-toma-cafe_23-2148793444.jpg?t=st=1709598482~exp=1709602082~hmac=0c0b3fb3e38005085ec389ea7456922a7c399c30034d9d3ac2497bdac75134aa&w=740" alt="">
        </div>
    </section>
    <section class="container" id="about">
        <div class="about animate-on-scroll">
            <img src="https://img.freepik.com/fotos-gratis/retrato-de-grupo-de-colegas-diversos-e-felizes_93675-134770.jpg?t=st=1709604866~exp=1709608466~hmac=f3b2426a4fc1a5bcdc23ebb4a5c5b4ad3aec138ddb8faa62015ea1489443abb5&w=740" alt="">
            <div>
                <h2>Quem somos</h2>
                <p class="hero-paragraph">Somos a NoteSync, uma equipe apaixonada dedicada a criar soluções inovadoras para simplificar a maneira como você gerencia suas ideias e tarefas diárias.</p>
                <a href="/register" class="btn-button">Registre-se agora e crie suas ideias</a>
            </div>
        </div>
    </section>

    <script>
        const hero = document.querySelector(".hero");
        const about = document.querySelector(".about");

        // Get the offset position of the sections
        const heroteste = hero.offsetTop;
        const aboutteste = about.offsetTop;

        function myFunction() {
            if (window.scrollY >= heroteste) {
                hero.classList.add("visible");
            }

            if (window.scrollY > heroteste) {
                about.classList.add("visible");
            } else {
                about.classList.remove("visible");
            }
        }

        window.addEventListener("scroll", myFunction);

        /* Open when someone clicks on the span element */
        var open = document.getElementById("openNav");
        open.addEventListener("click", () => {
            document.getElementById("myNav").style.width = "100%";
        });

        var close = document.getElementById("closeNav");
        close.addEventListener("click", () => {
            document.getElementById("myNav").style.width = "0%";
        });
    </script>
</body>

</html>