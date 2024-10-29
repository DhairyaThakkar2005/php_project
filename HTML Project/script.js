const areas = {
    Ahmedabad: ["Bodakdev", "Thaltej", "Satellite"],
    Vadodara: ["Akota", "Bhayl", "Fategunj"],
    Surat: ["Adajan", "Dumas", "Ghod Dod Road"],
    Rajkot: ["Kalavad Road", "Race Course", "Shastri Nagar"],
    Bhavnagar: ["Palitana", "Gadhsisha", "Mahuva"],
    Gandhinagar: ["Sector 16", "Koba", "Sargasan"]
};

const cityInput = document.getElementById('city-input');
const areaSelect = document.getElementById('area-select');
cityInput.addEventListener('input', function() {
    const selectedCity = cityInput.value;
    areaSelect.innerHTML = '<option value="">Select Area</option>'; // Reset options

    if (areas[selectedCity]) {
        areas[selectedCity].forEach(area => {
            const option = document.createElement('option');
            option.value = area;
            option.textContent = area;
            areaSelect.appendChild(option);
        });
    }
});
