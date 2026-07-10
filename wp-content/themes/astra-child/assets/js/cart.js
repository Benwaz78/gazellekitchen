function gkToast(productName, message, cartUrl, success=true){

    const toast = document.getElementById('gk-toast');
    const icon = success ? '✓' : '🗑️';

    toast.innerHTML = `

        <div id="gk-toast-header">

            <div id="gk-toast-icon">
                ${icon}
            </div>

            <div>

                <div id="gk-toast-title">
                    ${productName}
                </div>

                <div id="gk-toast-text">
                    ${message}
                </div>

            </div>

        </div>

        <div id="gk-toast-footer">

            <a href="${cartUrl}">
                View Cart
            </a>

        </div>

    `;

    toast.classList.add('show');

    clearTimeout(window.toastTimer);

    window.toastTimer = setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);

}



document.addEventListener('click', function (e) {

   console.count('GK ADD TO CART');


    const button = e.target.closest('.gazelle-add-to-cart');
    if (button){
        e.preventDefault();
            const product = button.closest('.gazelle-product');

         
    

    const productId = product.dataset.productId;
    const form = button.closest('form');
    const quantityInput = form.querySelector('.gazelle-quantity');
    const quantity = parseInt(quantityInput.value || 1, 10);

    const formData = new FormData();

    formData.append('product_id', productId);
    formData.append('add-to-cart', productId);
    formData.append('quantity', quantity);
    // formData.append('action', 'gk_add_to_cart_TEST');
    formData.append('action', 'gk_add_to_cart');
    formData.append('nonce', gk_cart.nonce);

    // Read stored variation
    const variationInput = product.querySelector('.gazelle-selected-variation');
    // const variation = JSON.parse(variationInput.value);
    // console.log("Selected variation:");
    // console.log(variation);

    if (variationInput && variationInput.value) {
        const variation = JSON.parse(variationInput.value);
        formData.append('variation_id', variation.variation_id);
        Object.entries(variation.attributes).forEach(([key, value]) => {
            formData.append(key, value);
        });

    }
    // console.log("FORM DATA");
    fetch(
        gk_cart.ajax_url,
        {
            method: 'POST',
            credentials: 'same-origin',
            body: formData
        }
    )
    .then(response => {

        // console.log("Status:", response.status);
        // console.log("OK:", response.ok);

        return response.json();   // <-- IMPORTANT

    })
    .then(data => {

       
       const badge = document.querySelector('.cart-qty');

        if (badge) {
            badge.textContent = data.data.count;
           gkToast(data.data.product_name, 'Added to cart', data.data.cart_url, true);
        }

        // Update dropdown
        const dropdown = document.querySelector('#headerTopCartDropdown');

        if (dropdown) {
            dropdown.outerHTML = data.data.mini_cart;
        }

       




    })
    .catch(error => {

        console.error(error);

    });

    }


});



document.addEventListener('click', function (e) {

    const remove = e.target.closest('.btn-remove');

    if (!remove) return;

    e.preventDefault();

    const formData = new FormData();
     const cartItemKey = remove.dataset.cart_item_key;

    formData.append('action', 'gk_remove_from_cart');
    formData.append('cart_item_key', cartItemKey);
    formData.append('nonce', gk_cart.nonce);
    

    fetch(gk_cart.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        document.querySelector('.cart-qty').textContent =
            data.data.count;
        console.log(data.data);
        console.log(data.data.product_name);
        gkToast(data.data.product_name,'Removed from cart',data.data.cart_url,false);

        document.querySelector('#headerTopCartDropdown')
            .outerHTML = data.data.mini_cart;

    });

});



