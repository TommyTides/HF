function toggleShipping(checkbox) {
    var shippingForm = document.getElementById("shipping-diff");

    if (checkbox.checked) { // Hide extra form
        if (!shippingForm.classList.contains('collapse')) {
            shippingForm.classList.add('collapse');

            // Disable elements required
            document.getElementById('firstNameShip').disabled = true;
            document.getElementById('lastNameShip').disabled = true;
            document.getElementById('streetShip').disabled = true;
            document.getElementById('housenumberShip').disabled = true;
            document.getElementById('citytownShip').disabled = true;
            document.getElementById('countryShip').disabled = true;
            document.getElementById('stateprovinceShip').disabled = true;
            document.getElementById('zipShip').disabled = true;

        }
    } else { // Display extra form
        if (shippingForm.classList.contains('collapse')) {
            shippingForm.classList.remove('collapse');

            // Disable elements required
            document.getElementById('firstNameShip').disabled = false;
            document.getElementById('lastNameShip').disabled = false;
            document.getElementById('streetShip').disabled = false;
            document.getElementById('housenumberShip').disabled = false;
            document.getElementById('citytownShip').disabled = false;
            document.getElementById('countryShip').disabled = false;
            document.getElementById('stateprovinceShip').disabled = false;
            document.getElementById('zipShip').disabled = false;
        }
    }
}