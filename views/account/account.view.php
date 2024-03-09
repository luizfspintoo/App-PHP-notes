<?php require base_path("views/partials/dashboard/head.php"); ?>

<body>
    <div id="app">
    <?php require base_path("views/partials/dashboard/sidebar.php"); ?>
        <main>

            <div class="inner">
                <?php require base_path("views/partials/dashboard/header.php"); ?>
                <?php require base_path("views/partials/account/main.php"); ?>
            </div>
        </main>
    </div>
    <script src="/scripts/dashboard/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>