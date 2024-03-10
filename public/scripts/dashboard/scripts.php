<script>
    document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('nav');
    const toggleBtn = document.querySelector('.toggle-btn');

    toggleBtn.addEventListener('click', function() {
        nav.classList.toggle('show');
    });
});

//profile menu
let profileMenu = document.getElementById("profile");
    let menuContainer = document.querySelector(".profile");

profileMenu.addEventListener("click", () => {
    menuContainer.classList.toggle("show");
});

</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

