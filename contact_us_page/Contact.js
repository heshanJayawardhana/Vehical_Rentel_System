document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Input fields
    let firstname = document.getElementById("firstname").value.trim();
    let lastname = document.getElementById("lastname").value.trim();
    let email = document.getElementById("email").value.trim();
    let subject = document.getElementById("subject").value.trim();
    let message = document.getElementById("message").value.trim();
    let formMessage = document.getElementById("formMessage");

    // Regex for email validation
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    // Basic validation
    if (firstname === "") {
        formMessage.textContent = "Please enter your first name.";
        formMessage.style.color = "red";
        return;
    }
    if (lastname === "") {
        formMessage.textContent = "Please enter your last name.";
        formMessage.style.color = "red";
        return;
    }
    if (!emailPattern.test(email)) {
        formMessage.textContent = "Please enter a valid email address.";
        formMessage.style.color = "red";
        return;
    }
    if (subject === "") {
        formMessage.textContent = "Please enter your subject.";
        formMessage.style.color = "red";
        return;
    }
    if (message === "") {
        formMessage.textContent = "Please enter your message.";
        formMessage.style.color = "red";
        return;
    }
    
});