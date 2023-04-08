console.log("main.js");

// Get all dropdown buttons
const dropdownButtons = document.querySelectorAll(".dropdown");

// Hide all dropdowns initially
const hideAllDropdowns = () => {
    const dropdowns = document.querySelectorAll(".submenu");
    dropdowns.forEach((dropdown) => dropdown.classList.add("hidden"));
    dropdownButtons.forEach((button) => {
        button.querySelector(".fa-chevron-down").classList.remove("rotate-180");
        button.querySelector(".fa-chevron-down").classList.add("rotate-0");
        button.classList.remove("active");
    });
};
hideAllDropdowns();

// Add event listeners to all dropdown buttons
dropdownButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.stopPropagation();
        const target = button.getAttribute("data-target");
        const isAlreadyOpen = !document.querySelector(target).classList.contains("hidden");
        hideAllDropdowns();
        if (!isAlreadyOpen) {
            document.querySelector(target).classList.toggle("hidden");
            button.querySelector(".fa-chevron-down").classList.toggle("rotate-180");
            button.querySelector(".fa-chevron-down").classList.toggle("rotate-0");
            button.classList.add("active");
        }
    });
});

// Close the dropdown when the user clicks outside of it
document.addEventListener("click", (event) => {
    if (!event.target.closest(".dropdown") && !event.target.closest(".submenu")) {
        hideAllDropdowns();
    }
});


// jQuery for page scrolling feature - requires jQuery Easing plugin
(function(jQuery) {
    setTimeout(function() {
        console.log('loaded');

        "use strict";

        /*---------------------------------------------------------------------
        Page Loader
        -----------------------------------------------------------------------*/
        jQuery("#loading").fadeOut();


        /*---------------------------------------------------------------------
        Counter
        -----------------------------------------------------------------------*/
        if (window.counterUp !== undefined) {
            const counterUp = window.counterUp["default"]
            const $counters = $(".counter");
            $counters.each(function(ignore, counter) {
                var waypoint = new Waypoint({
                    element: $(this),
                    handler: function() {
                        counterUp(counter, {
                            duration: 10000,
                            delay: 2000 // updated delay to 2000 ms
                        });
                        this.destroy();
                        console.log('done loading');
                    },
                    offset: 'bottom-in-view'


                });
            });
        }

    }, 1);

})(jQuery);

// Profile opener on right top
const profileButton = document.querySelector('#profile');
const profilePopup = document.querySelector('#profile-popup');

// Function to toggle the profile popup
function toggleProfilePopup() {
    profilePopup.classList.toggle('hidden');
}

// Add click event listener to profile button to toggle profile popup
profileButton.addEventListener('click', function(event) {
    toggleProfilePopup();
    event.stopPropagation(); // prevent event from bubbling up to document
});

// Function to hide the profile popup
function hideProfilePopup() {
    profilePopup.classList.add('hidden');
}

// Add click event listener to document to hide profile popup if clicked outside of it
document.addEventListener('click', function(event) {
    const isClickInsidePopup = profilePopup.contains(event.target);
    if (!isClickInsidePopup) {
        hideProfilePopup();
    }
});