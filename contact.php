<!-- contact-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop - Contact</title>
    <link rel="stylesheet" href="style.css">
    <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="index.js"></script>
</head>

<body>
    <header>
        <h1>Mobile Shop</h1>
        <nav>
            <a href="home.html">Home</a> |
            <a href="product.html">Products</a> |
            <a href="contact.html">Contact</a>
        </nav>
    </header>

    <section>
        <h2>Contact Us</h2>
        <p>Have questions or suggestions? Reach out to us using the form below.</p>
    </section>

    <form id="contact-form" action="submit_form.php" method="POST">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Submit</button>
    </form>

    <script>
        // You can include any additional JavaScript specific to contact.html here
    </script>
</body>

</html>
