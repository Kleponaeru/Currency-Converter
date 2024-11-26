document.addEventListener("DOMContentLoaded", function () {
    const openMenuBtn = document.getElementById("open-menu-btn");
    const closeMenuBtn = document.getElementById("close-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const backdrop = document.getElementById("backdrop");

    // Open the mobile menu
    openMenuBtn.addEventListener("click", function () {
        mobileMenu.classList.remove("hidden"); // Show menu
        backdrop.classList.remove("hidden"); // Show backdrop
    });

    // Close the mobile menu
    closeMenuBtn.addEventListener("click", function () {
        mobileMenu.classList.add("hidden"); // Hide menu
        backdrop.classList.add("hidden"); // Hide backdrop
    });

    // Close the menu if the backdrop is clicked
    backdrop.addEventListener("click", function () {
        mobileMenu.classList.add("hidden");
        backdrop.classList.add("hidden");
    });
});
