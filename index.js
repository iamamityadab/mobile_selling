document.addEventListener("DOMContentLoaded", function () {
    const path = window.location.pathname;

    if (path.endsWith("home.html") || path.endsWith("/")) {
        // Logic for the Home page
        const featuredProducts = [
            { id: 1, name: "Product 1", price: "$499", image: "product1.jpg" },
            { id: 2, name: "Product 2", price: "$699", image: "product2.jpg" },
            { id: 3, name: "Product 3", price: "$899", image: "product3.jpg" },
        ];

        renderFeaturedProducts(featuredProducts);
    } else if (path.endsWith("products.html")) {
        // Logic for the Products page
        const featuredProducts = [
            { id: 1, name: "Product 1", price: "$499", image: "product1.jpg" },
            { id: 2, name: "Product 2", price: "$699", image: "product2.jpg" },
            { id: 3, name: "Product 3", price: "$899", image: "product3.jpg" },
        ];

        renderFeaturedProducts(featuredProducts);
    } else if (path.endsWith("contact.html")) {
        // Logic for the Contact page
        document.getElementById("contact-form").addEventListener("submit", function (e) {
            e.preventDefault();
            submitForm();
        });
    } else if (path.endsWith("login.html")) {
        // Logic for the Login page
        document.getElementById("login-form").addEventListener("submit", function (e) {
            e.preventDefault();
            loginUser();
        });
    }

    // Check login status using an AJAX request
    fetch("check_login_status.php")
        .then(response => response.json())
        .then(data => {
            const isLoggedIn = data.isLoggedIn;
            const loginButton = document.getElementById("login-button");
            const logoutButton = document.getElementById("logout-button");
            const userInfo = document.getElementById("user-info");

            if (isLoggedIn) {
                // User is logged in
                loginButton.style.display = "none";
                logoutButton.style.display = "inline-block";
                userInfo.textContent = "Welcome, " + data.username + "!";
            } else {
                // User is not logged in
                loginButton.style.display = "inline-block";
                logoutButton.style.display = "none";
                userInfo.textContent = "Welcome, Guest!";
            }
        })
        .catch(error => console.error("Error checking login status:", error));
});

// Your existing functions...
