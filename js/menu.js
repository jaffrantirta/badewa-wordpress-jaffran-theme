/**
 * Mobile Menu Dropdown Handler
 */
(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Get all menu items with children (dropdowns)
        const dropdownToggles = document.querySelectorAll('.navbar-nav .menu-item-has-children > a');

        // Add click handler to each dropdown toggle
        dropdownToggles.forEach(function(toggle) {
            // Prevent default link behavior on mobile
            toggle.addEventListener('click', function(e) {
                // Only handle on mobile (when navbar is collapsed)
                const navbar = document.querySelector('.navbar-collapse');
                if (!navbar.classList.contains('show') && window.innerWidth >= 992) {
                    return; // Let desktop hover work normally
                }

                // On mobile, prevent default and toggle submenu
                if (window.innerWidth < 992) {
                    e.preventDefault();

                    const parentLi = toggle.closest('.menu-item-has-children');
                    const submenu = parentLi.querySelector('.sub-menu, .dropdown-menu');

                    if (submenu) {
                        // Toggle active class on parent
                        parentLi.classList.toggle('dropdown-open');

                        // Toggle submenu visibility
                        if (submenu.style.display === 'block') {
                            submenu.style.display = 'none';
                        } else {
                            // Close other open dropdowns
                            document.querySelectorAll('.navbar-nav .sub-menu, .navbar-nav .dropdown-menu').forEach(function(menu) {
                                if (menu !== submenu) {
                                    menu.style.display = 'none';
                                    menu.closest('.menu-item-has-children').classList.remove('dropdown-open');
                                }
                            });

                            submenu.style.display = 'block';
                        }
                    }
                }
            });
        });

        // Close all dropdowns when navbar is collapsed
        const navbarToggler = document.querySelector('.navbar-toggler');
        if (navbarToggler) {
            navbarToggler.addEventListener('click', function() {
                const navbar = document.querySelector('.navbar-collapse');

                // If navbar is being closed, reset all dropdowns
                if (navbar.classList.contains('show')) {
                    setTimeout(function() {
                        document.querySelectorAll('.navbar-nav .sub-menu, .navbar-nav .dropdown-menu').forEach(function(menu) {
                            menu.style.display = 'none';
                        });
                        document.querySelectorAll('.navbar-nav .menu-item-has-children').forEach(function(item) {
                            item.classList.remove('dropdown-open');
                        });
                    }, 100);
                }
            });
        }

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Reset dropdowns on desktop
                if (window.innerWidth >= 992) {
                    document.querySelectorAll('.navbar-nav .sub-menu, .navbar-nav .dropdown-menu').forEach(function(menu) {
                        menu.style.display = '';
                    });
                    document.querySelectorAll('.navbar-nav .menu-item-has-children').forEach(function(item) {
                        item.classList.remove('dropdown-open');
                    });
                } else {
                    // Hide all dropdowns on mobile
                    document.querySelectorAll('.navbar-nav .sub-menu, .navbar-nav .dropdown-menu').forEach(function(menu) {
                        menu.style.display = 'none';
                    });
                }
            }, 250);
        });
    });
})();
