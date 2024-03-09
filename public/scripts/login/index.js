//show password and hide
function togglePassword()
{
    document.querySelectorAll(".eye").forEach((eye) => eye.classList.toggle("hide"));

    const type = password.getAttribute("type") == "password" ? "text" : "password";

    password.setAttribute("type", type);
}

//button load
var loadButton = document.getElementById("submit");
var fa = document.getElementById('fa');
loadButton.addEventListener("click", () => {
    fa.style.display = "block";
});

