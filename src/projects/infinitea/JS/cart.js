document.addEventListener("DOMContentLoaded", function () {
    let itemsQuantityZones = document.querySelectorAll('.counter-input');
    let productPrices = document.querySelectorAll('.productTotal');
    let weightSelects = document.querySelectorAll('.grammes');
    let priceTotalElement = document.getElementById('priceTotal');
    let priceTotalHiddenInput = document.getElementById('priceTotalHiddenInput'); // Ajout de cette ligne

    let basePrices = Array.from(productPrices).map(product => {
        let priceText = product.textContent.replace(' €', '');
        return parseFloat(priceText);
    });

    updateAllPrices();
    updateTotalPrice();

    let incrementButtons = document.querySelectorAll('.increment-button');
    let decrementButtons = document.querySelectorAll('.decrement-button');

    incrementButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            quantityUp(index);
            updatePrice(index);
            updateTotalPrice();
            updateDatabase(index);
        });
    });

    decrementButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            quantityDown(index);
            updatePrice(index);
            updateTotalPrice();
            updateDatabase(index);
        });
    });

    weightSelects.forEach((select, index) => {
        select.addEventListener("change", () => {
            updatePrice(index);
            updateTotalPrice();
            updateDatabase(index);
        });
    });

    function quantityUp(index) {
        let itemsQuantity = parseInt(itemsQuantityZones[index].value, 10);
        itemsQuantityZones[index].value = itemsQuantity + 1;
    }

    function quantityDown(index) {
        let itemsQuantity = parseInt(itemsQuantityZones[index].value, 10);
        if (itemsQuantity > 0) {
            itemsQuantityZones[index].value = itemsQuantity - 1;
        }
    }

    function updatePrice(index) {
        let basePrice = basePrices[index];
        let quantity = parseInt(itemsQuantityZones[index].value, 10);
        let weight = parseInt(weightSelects[index].value, 10);
        let newPrice = basePrice * quantity * (weight / 1000);
        productPrices[index].textContent = newPrice.toFixed(2) + ' €';
    }

    function updateTotalPrice() {
        let totalPrice = Array.from(productPrices).reduce((total, product) => {
            let priceText = product.textContent.replace(' €', '');
            return total + parseFloat(priceText);
        }, 0);
        priceTotalElement.textContent = totalPrice.toFixed(2) + ' €';
        priceTotalHiddenInput.value = totalPrice.toFixed(2); // Ajout de cette ligne
    }

    function updateAllPrices() {
        for (let i = 0; i < itemsQuantityZones.length; i++) {
            updatePrice(i);
        }
    }

    function updateDatabase(index) {
        let productId = itemsQuantityZones[index].dataset.productId;
        let quantity = parseInt(itemsQuantityZones[index].value, 10);
        let weight = parseInt(weightSelects[index].value, 10);

        fetch('pages/update-cart.php', {  // Assurez-vous que ce chemin est correct
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                productId: productId,
                quantity: quantity,
                weight: weight
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Database updated successfully');
                } else {
                    console.error('Error updating database:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});
