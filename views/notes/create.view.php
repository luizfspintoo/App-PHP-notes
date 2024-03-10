<?php require base_path("views/partials/dashboard/head.php"); ?>
<body>
    <div id="app">
        <?php require base_path("views/partials/dashboard/sidebar.php"); ?>
        <main>
            <div class="inner">
                <?php require base_path("views/partials/dashboard/header.php"); ?>
                <?php require base_path("views/partials/notes/note-create/form-create.php"); ?>
            </div>
        </main>
    </div>
    <?php require base_path("public/scripts/dashboard/scripts.php"); ?>
</body>
</html>