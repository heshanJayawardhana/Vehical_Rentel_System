function validateForm(form) {
    const phone = form.phone.value.trim();
    const destination = form.destination.value.trim();
    const startDate = new Date(form.start_date.value);
    const returnDate = new Date(form.return_date.value);
    const numberOfMembers = form.numberofMembers.value;
    const errorMessages = [];

    // Validate phone number
    if (!/^\d{10}$/.test(phone)) {
        errorMessages.push("Please enter a valid 10-digit phone number.");
    }

    // Validate destination
    if (destination === "") {
        errorMessages.push("Destination cannot be empty.");
    }

    // Validate rental dates
    if (startDate >= returnDate) {
        errorMessages.push("Rental end date must be after the start date.");
    }

    // Validate number of members
    if (numberOfMembers <= 0) {
        errorMessages.push("Number of members must be greater than 0.");
    }

    if (errorMessages.length > 0) {
        alert(errorMessages.join("\n"));
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
