document.addEventListener('DOMContentLoaded', function () {
    // Function to calculate the total cost based on selected pizzas and quantities
    function calcularCostoTotal() {
        var pizzasSelect = document.getElementById('pizzas');
        var priceInput = document.getElementById('price');

        // Check if the required elements are present
        if (!pizzasSelect || !priceInput) {
            return;
        }

        // Calculate the total cost
        var costoTotal = Array.from(pizzasSelect.options).reduce(function (total, opcion) {
            if (opcion.selected) {
                var percent = parseFloat(opcion.dataset.percent);
                var costoIngredientes = parseFloat(opcion.dataset.cost);
                var pizzaId = opcion.value;
                var cantidadInput = document.getElementById('quantity_' + pizzaId);
                var cantidad = cantidadInput ? parseInt(cantidadInput.value) || 1 : 1;

                total += costoIngredientes * (1 + percent / 100) * cantidad;
            }

            return total;
        }, 0);

        // Set the calculated total cost in the price input field
        priceInput.value = costoTotal.toFixed(2);
    }

    // Calculate the total cost on page load
    calcularCostoTotal();

    var pizzasSelect = document.getElementById('pizzas');
    var pizzaQuantitiesContainer = document.getElementById('pizzaQuantities');

    // Check if the required elements are present
    if (pizzasSelect && pizzaQuantitiesContainer) {
        // Event listener for changes in the selected pizzas
        pizzasSelect.addEventListener('change', function () {
            // Update quantities and recalculate the total cost
            updateQuantities();
            calcularCostoTotal();
        });

        // Function to update the displayed quantities based on selected pizzas
        function updateQuantities() {
            var selectedPizzas = Array.from(pizzasSelect.options);
            pizzaQuantitiesContainer.innerHTML = '';

            selectedPizzas.forEach(function (pizza) {
                if (pizza.selected) {
                    var pizzaId = pizza.value;

                    // Create input element for quantity
                    var input = document.createElement('input');
                    input.type = 'number';
                    input.name = 'quantity[]';
                    input.id = 'quantity_' + pizzaId;
                    input.min = '1';
                    input.value = '1';

                    // Create label for the quantity input
                    var label = document.createElement('label');
                    label.textContent = 'Quantity for ' + pizza.textContent.trim();
                    label.htmlFor = 'quantity_' + pizzaId;

                    // Create a container div for the input and label
                    var div = document.createElement('div');
                    div.classList.add('input-field');
                    div.appendChild(input);
                    div.appendChild(label);

                    // Append the container div to the quantities container
                    pizzaQuantitiesContainer.appendChild(div);
                }
            });
        }

        // Event listener for input changes in the quantities container
        pizzaQuantitiesContainer.addEventListener('input', function () {
            // Recalculate the total cost on quantity input changes
            calcularCostoTotal();
        });
    }
});