// Dummy vehicle data
const vehicles = [
    { id: 1, model: 'Toyota Corolla', image: 'images/car1.jpg', category: 'Cars' },
    { id: 2, model: 'Honda Civic', image: 'images/car2.jpg', category: 'Cars' },
    { id: 3, model: 'Nissan Altima', image: 'images/car3.jpg', category: 'Vans' },
    { id: 4, model: 'Mercedes Sprinter', image: 'images/van1.jpg', category: 'Vans' },
    { id: 5, model: 'Tour Bus A', image: 'images/bus1.jpg', category: 'Tour Buses' },
    { id: 6, model: 'Tour Bus B', image: 'images/bus2.jpg', category: 'Tour Buses' }
];

// Function to generate vehicle display dynamically based on category
function displayVehicles(category) {
    const vehicleContainer = document.querySelector(`.product-container.${category.toLowerCase()}`);
    vehicleContainer.innerHTML = ''; // Clear existing content

    vehicles.filter(vehicle => vehicle.category === category).forEach(vehicle => {
        const productCard = document.createElement('div');
        productCard.classList.add('product-card');

        const productImage = document.createElement('div');
        productImage.classList.add('product-image');

        const vehicleImg = document.createElement('img');
        vehicleImg.src = vehicle.image;
        vehicleImg.alt = vehicle.model;
        vehicleImg.classList.add('product-thumb');

        const bookButton = document.createElement('button');
        bookButton.classList.add('card-btn');
        bookButton.textContent = 'Book now';
        bookButton.onclick = () => {
            window.location.href = `booking.php?vehicle_id=${vehicle.id}`;
        };

        productImage.appendChild(vehicleImg);
        productImage.appendChild(bookButton);

        const productInfo = document.createElement('div');
        productInfo.classList.add('product-info');

        const productBrand = document.createElement('h2');
        productBrand.classList.add('product-brand');
        productBrand.textContent = vehicle.model;

        const productDescription = document.createElement('p');
        productDescription.classList.add('product-short-description');
        productDescription.textContent = 'A short description about the vehicle.';

        productInfo.appendChild(productBrand);
        productInfo.appendChild(productDescription);

        productCard.appendChild(productImage);
        productCard.appendChild(productInfo);

        vehicleContainer.appendChild(productCard);
    });
}

// Call function for each category
displayVehicles('Cars');
displayVehicles('Vans');
displayVehicles('Tour Buses');
