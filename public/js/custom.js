document.addEventListener("DOMContentLoaded", function() {
    const maxLength = 50; // Số ký tự tối đa
    const elements = document.querySelectorAll('.char-limit');

    elements.forEach(element => {
        let text = element.innerText;
        if (text.length > maxLength) {
            element.innerText = text.substring(0, maxLength) + '...';
        }
    });
});