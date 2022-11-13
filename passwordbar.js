const passInput = document.querySelector(".input-password input");
const toggleIcon = document.querySelector(".input-password .toggle-password");
const percentBar = document.querySelector(".strength-percent span");
const passBar = document.querySelector(".strength-bar");

passInput.addEventListener("input", handlePassInput);
toggleIcon.addEventListener("click", togglePassInput);

function handlePassInput(e) {
    if (passInput.value.length === 0) {
        passBar.innerHTML = "Lemah";
        addClass();
    } else if (passInput.value.length <= 4) {
        passBar.innerHTML = "Lemah";
        addClass("weak");
    } else if (passInput.value.length <= 7) {
        passBar.innerHTML = "Sedang";
        addClass("average");
    } else {
        passBar.innerHTML = "Kuat";
        addClass("strong");
    }
}

function addClass(className) {
    percentBar.classList.remove("weak");
    percentBar.classList.remove("average");
    percentBar.classList.remove("strong");
    if (className) {
        percentBar.classList.add(className);
    }
}

function togglePassInput(e) {
    const type = passInput.getAttribute("type");
    if (type === "password") {
        passInput.setAttribute("type", "text");
        toggleIcon.innerHTML = "<i class='fa-regular fa-eye'></i>";
    } else {
        passInput.setAttribute("type", "password");
        toggleIcon.innerHTML = "<i class='fa-regular fa-eye-slash'></i>";
    }
}
