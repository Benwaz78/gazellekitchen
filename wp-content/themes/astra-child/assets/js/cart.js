document.addEventListener('click', function (e) {

    const btn = e.target.closest('.gazelle-add-to-cart');
    if (!btn) return;


    e.preventDefault();
    e.stopPropagation();

    // 🔥 PREVENT DOUBLE CLICK / DOUBLE FIRE
    if (btn.dataset.loading === "1") return;
    btn.dataset.loading = "1";

    const productId = btn.dataset.product_id;
    const modal = btn.closest('.modal');

    const activeOption = modal?.querySelector('.variation-option.active');

    const variations = window.gazelleVariations?.[productId] || [];

    let match = null;

    if (activeOption && variations.length) {

        const size = activeOption.dataset.size;

        match = variations.find(v =>
            v.attributes &&
            Object.values(v.attributes).includes(size)
        );
    }

    const formData = new FormData();
    formData.append('add-to-cart', productId);
    formData.append('product_id', productId);
    formData.append('quantity', 1);

    if (match && match.variation_id) {

        formData.append('variation_id', match.variation_id);

        Object.entries(match.attributes).forEach(([key, value]) => {
            formData.append(key, value);
        });
    }

    fetch(
        wc_add_to_cart_params.wc_ajax_url
            .toString()
            .replace('%%endpoint%%', 'add_to_cart'),
        {
            method: 'POST',
            credentials: 'same-origin',
            body: formData
        }
    )
    .then(r => r.json())
    .then(data => {

        btn.dataset.loading = "0"; // 🔥 RESET LOCK

        if (!data || data.error) return;

        if (data.fragments) {
            Object.keys(data.fragments).forEach(sel => {
                const el = document.querySelector(sel);
                if (el) el.outerHTML = data.fragments[sel];
            });
        }

    })
    .catch(() => {
        btn.dataset.loading = "0";
    });

});