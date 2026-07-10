document.addEventListener('click', function (e) {


    if (!(e.target instanceof Element)) {
        return;
    }

    const button = e.target.closest('.variation-option');
     if (!button) return;

    const product = button.closest('.gazelle-product');
    if (!product) return;

    // Remove previous active button
    product.querySelectorAll('.variation-option').forEach(btn => {
        btn.classList.remove('active');
    });

    // Activate clicked button
    button.classList.add('active');

     // Product information
    const productId = product.dataset.productId;
    const attribute = button.dataset.attribute;
    const value = button.dataset.value;

     // Variations for this product
         const variations = JSON.parse(
    product.dataset.variations || '[]'
);

    // console.log(window.gazelleVariations[productId]);

    // Find matching variation
    const variation = variations.find(v => {
    if (!v.attributes) return false;
        return v.attributes['attribute_' + attribute] === value;
    });

    if (!variation) return;

    // Update price
    const priceElement = product.querySelector('.gazelle-product-price');

    if (priceElement) {
        priceElement.textContent = variation.display_price;
    }

    const variationInput = product.querySelector('.gazelle-selected-variation');

    if (variationInput) {

        const selectedVariation = {
            variation_id: variation.variation_id,
            attributes: variation.attributes
        };

        variationInput.value = JSON.stringify(selectedVariation);

        // console.log(selectedVariation);
        // console.log(variationInput.value);
    }


});

// Initialize all products
document.querySelectorAll('.gazelle-product').forEach(product => {

    const firstOption = product.querySelector('.variation-option.active');

    if (firstOption) {
        firstOption.click();
    }

});



// ================================
// Feature 2
// Open Product Modal
// ================================

document.addEventListener('click', function (e) {

    const button = e.target.closest('.open-product-modal');
    if (!button) return;

    e.preventDefault();

    const productId = button.dataset.productId;

    const modalBody = document.querySelector('#productModal .modal-body');

    modalBody.innerHTML = `
        <div class="text-center py-5">
            Loading...
        </div>
    `;

    const formData = new FormData();

    formData.append('action', 'gazelle_load_product');
    formData.append('product_id', productId);

    fetch(gazelle_ajax.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: formData
    })
    .then(response => response.text())
    .then(html => {

        modalBody.innerHTML = html;
        const wrapper = modalBody.querySelector('.thumb-gallery-wrapper');

        if (wrapper) {
             window.initializeThumbGallery(wrapper);
        }

        // Initialize default variation inside the modal
        const modalProduct = modalBody.querySelector('.gazelle-product');
        if (modalProduct) {

            const firstOption =
                modalProduct.querySelector('.variation-option.active') ||
                modalProduct.querySelector('.variation-option');

            if (firstOption) {
                firstOption.click();
            }

        }

    })
    .catch(console.error);

});



// ================================
// Feature 3
// For quantity
// ================================

document.addEventListener('click', function (e) {

    const target = e.target;

    if (!(target instanceof Element)) return;

    // PLUS
    if (target.classList.contains('plus')) {

        e.preventDefault();

        const form = target.closest('form');

        if (!form) return;

        const input = form.querySelector('.gazelle-quantity');

        if (!input) return;

        let qty = parseInt(input.value || 1, 10);

        input.value = qty + 1;

        return;
    }

    // MINUS
    if (target.classList.contains('minus')) {

        e.preventDefault();

        const form = target.closest('form');

        if (!form) return;

        const input = form.querySelector('.gazelle-quantity');

        if (!input) return;

        let qty = parseInt(input.value || 1, 10);

        qty = Math.max(1, qty - 1);

        input.value = qty;
    }

});