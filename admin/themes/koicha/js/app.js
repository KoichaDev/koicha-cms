const scrollToNavBar = document.getElementById('scroll-to-navbar');
// Hide the scroll to Navbar image on the start of the page
scrollToNavBar.style.display = "none";

// Event Listener when scrolling
document.addEventListener("scroll", () => {
    // Still hide the navbar button
    scrollToNavBar.style.display = "none";
    // Will display the navbar after a certain Y-coordination of the page
    if (window.pageYOffset >= 650) {
        scrollToNavBar.style.display = "inline-block";
    }
})

// Event listner for Back to Scroll Navbar
scrollToNavBar.addEventListener('click', () => {
    // Check if we're at the top already. If so, stop scrolling by clearing the interval
     window.scroll(0, window.pageYOffset - 5799)

});