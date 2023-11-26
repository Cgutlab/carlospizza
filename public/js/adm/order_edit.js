document.addEventListener('DOMContentLoaded', function () {
    // Function to calculate the total cost based on selected pizzas and quantities
    function calcularCostoTotal() {
        var pizzasSelect = document.getElementById('pizzas');
        var priceInput = document.getElementById('price');
        var pizzaQuantitiesContainer = document.getElementById('pizzaQuantities');

        // Check if required elements are present
        if (!pizzasSelect || !priceInput || !pizzaQuantitiesContainer) {
            return;
        }

        // Clear the quantities container
        pizzaQuantitiesContainer.innerHTML = '';

        // Calculate the cost total
        var costoTotal = Array.from(pizzasSelect.options).reduce(function (total, opcion) {
            var percent = parseFloat(opcion.dataset.percent);
            var costoIngredientes = parseFloat(opcion.dataset.cost);
            var pizzaId = opcion.value;
            var cantidadInput = document.getElementById('quantity_' + pizzaId);
            var cantidad = cantidadInput ? parseInt(cantidadInput.value) || 1 : 1;

            // Create and add quantity input element
            var input = document.createElement('input');
            input.type = 'number';
            input.name = 'quantity[]';
            input.id = 'quantity_' + pizzaId;
            input.min = '1';
            input.value = cantidad;

            var label = document.createElement('label');
            label.textContent = 'Quantity for ' + opcion.textContent.trim();
            label.htmlFor = 'quantity_' + pizzaId;

            var div = document.createElement('div');
            div.classList.add('input-field');
            div.appendChild(input);
            div.appendChild(label);

            pizzaQuantitiesContainer.appendChild(div);

            // Calculate the cost total
            total += costoIngredientes * (1 + percent / 100) * cantidad;

            return total;
        }, 0);

        // Update the total price field
        priceInput.value = costoTotal.toFixed(2);
    }

    // Force calculation on page load
    calcularCostoTotal();

    var pizzasSelect = document.getElementById('pizzas');
    var pizzaQuantitiesContainer = document.getElementById('pizzaQuantities');

    // Check if required elements are present
    if (pizzasSelect && pizzaQuantitiesContainer) {
        // Event listener for changes in the selected pizzas
        pizzasSelect.addEventListener('change', function () {
            calcularCostoTotal();
        });
    }
});