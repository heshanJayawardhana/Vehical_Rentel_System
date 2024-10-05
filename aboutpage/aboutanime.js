// Target values
const targetValues = {
    viewers: 2000,
    users: 1000,
    vehicles: 50,
    experience: 15,
};

// Animation duration in milliseconds
const duration = 2000;

// Function to animate the counting
function animateCount(id, target) {
    let count = 0;
    const increment = Math.ceil(target / (duration / 100));

    const timer = setInterval(() => {
        count += increment;
        if (count >= target) {
            count = target;
            clearInterval(timer);
        }
        document.getElementById(id).innerText = count;
    }, 100);
}

// Start the countdown animations
animateCount("viewers", targetValues.viewers);
animateCount("users", targetValues.users);
animateCount("vehicles", targetValues.vehicles);
animateCount("experience", targetValues.experience);