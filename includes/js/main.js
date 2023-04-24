// console.log("main.js");

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


(function(jQuery) {
    setTimeout(function() {
        "use strict";
        jQuery("#loading").fadeOut();
        if (window.counterUp !== undefined) {
            const counterUp = window.counterUp["default"]
            const $counters = $(".counter");
            $counters.each(function(ignore, counter) {
                var waypoint = new Waypoint({
                    element: $(this),
                    handler: function() {
                        counterUp(counter, {
                            duration: 1, // 2000
                            delay: 0 // 2000
                        });
                        this.destroy();
                        console.log('done loading');
                    },
                    offset: 'bottom-in-view'
                });
            });
        }
    }, 0); // 1
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



// Function to validate links and change class for invalid links
function validateLinks() {
    // Get all <a> tags on the page
    var links = document.getElementsByTagName("a");

    // Loop through each <a> tag
    for (var i = 0; i < links.length; i++) {
        var link = links[i];

        // Skip links within the class "sidebar"
        if (link.closest('.sidebar')) {
            continue;
        }

        var href = link.getAttribute("href");
        // console.log("Validating link:", href);

        // Wrap the callback function in a closure to capture the correct value of the "link" variable
        (function(link) {
            // Send a HEAD request to the link to check if it's valid
            fetch(href, { method: "HEAD" })
                .then(function(response) {
                    // Check the response status code
                    if (!response.ok) {
                        console.error("Invalid link:", href);
                        // Update the class of the link to display red text color, hover effect, and transition animation
                        link.classList.remove("text-blue-500", "hover:text-blue-700");
                        link.classList.add("text-red-500", "hover:text-red-600", "link-transition");

                        // Add an icon in front of the link
                        var icon = document.createElement("i");
                        icon.classList.add("fas", "fa-exclamation-triangle", "mr-1");
                        link.insertBefore(icon, link.firstChild);
                    }
                })
                .catch(function(error) {
                    console.error("Failed to fetch link:", "\n", href, "\n\n", error);
                });
        })(link);
    }
}

// window.addEventListener("load", function() {
//     setTimeout(function() {
//         validateLinks();
//     }, 1000);
// });