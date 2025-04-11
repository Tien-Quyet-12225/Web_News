@extends('layouts.master')


<h2>Contact Us</h2>
<form id="contact-form">
    <input type="text" name="name" placeholder="Your Name" required><br><br>
    <input type="email" name="email" placeholder="Your Email" required><br><br>
    <textarea name="message" placeholder="Your Message" required></textarea><br><br>
    <button type="submit">Send</button>
</form>

<p id="status"></p>

<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbzYl60gQBENkhKAoAzYvg-SaODZ1p3LA2Xs4k4JDy4Z-g5ymhQ2sfloW_XybNRPz9q8/exec'; // Thay bằng URL thật của bạn

    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = {
            name: this.name.value,
            email: this.email.value,
            message: this.message.value
        };

        fetch(scriptURL, {
                method: 'POST',
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('status').innerText = 'Sent successfully!';
                this.reset();
            })
            .catch(error => {
                document.getElementById('status').innerText = 'Failed to send.';
                console.error('Error:', error);
            });
    });
</script>
