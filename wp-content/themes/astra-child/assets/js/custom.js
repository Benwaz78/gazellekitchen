document.addEventListener('click', function (e) {

    const btn = e.target.closest('.variation-option');
    if (!btn) return;

    const container = btn.closest('.modal') || document;

    const productId = container.querySelector('[data-product-id]')?.dataset.product_id
        || container.querySelector('[data-product_id]')?.dataset.product_id;

    if (!productId || !window.gazelleVariations?.[productId]) return;

    const variations = window.gazelleVariations[productId];
    const size = btn.dataset.size;

    container.querySelectorAll('.variation-option')
        .forEach(b => b.classList.remove('active'));

    btn.classList.add('active');

    const match = variations.find(v =>
        v.attributes && Object.values(v.attributes).includes(size)
    );

    if (match) {
        container.querySelector('#productPrice').textContent = match.display_price;
        console.log(match);
    }
});