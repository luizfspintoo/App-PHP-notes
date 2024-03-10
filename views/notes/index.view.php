<?php require base_path("views/partials/dashboard/head.php"); ?>
<body>
    <div id="app">
        <?php require base_path("views/partials/dashboard/sidebar.php"); ?>
        <main>
            <div class="inner">
                <?php require base_path("views/partials/dashboard/header.php"); ?>
                <?php require base_path("views/partials/notes/filter.php"); ?>
                <?php require base_path("views/partials/notes/main.php"); ?>
            </div>
        </main>
    </div>
    <?php require base_path("public/scripts/dashboard/scripts.php"); ?>
</body>
</html>