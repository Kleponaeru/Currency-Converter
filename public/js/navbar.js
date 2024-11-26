   // JavaScript for the profile dropdown toggle
   document.getElementById('user-menu-button').addEventListener('click', function() {
    var dropdown = document.getElementById('dropdown-menu');

    // Toggle visibility with transition
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        dropdown.classList.add('opacity-100', 'scale-100'); // Show with transition
    } else {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('opacity-100', 'scale-100'); // Hide with transition
    }
});

// JavaScript for the mobile menu toggle
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    var mobileMenu = document.getElementById('mobile-menu');

    // Toggle visibility with transition (fade + scale effect)
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
        mobileMenu.classList.add('opacity-100', 'scale-100'); // Show with transition
        mobileMenu.classList.remove('scale-95', 'opacity-0'); // Remove the collapsed state
    } else {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('opacity-100', 'scale-100'); // Hide with transition
        mobileMenu.classList.add('scale-95', 'opacity-0'); // Collapse it back with transition
    }
});

// Optional: Close the dropdown when clicking outside of it
document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdown-menu');
    var button = document.getElementById('user-menu-button');
    var mobileMenu = document.getElementById('mobile-menu');
    var mobileMenuButton = document.getElementById('mobile-menu-button');

    // If the clicked target is outside the dropdown or button, close it
    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('opacity-100', 'scale-100'); // Reset the dropdown
    }

    // If the clicked target is outside the mobile menu or button, close it
    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('opacity-100', 'scale-100'); // Reset the mobile menu
        mobileMenu.classList.add('scale-95', 'opacity-0'); // Ensure collapsed state on close
    }
});
