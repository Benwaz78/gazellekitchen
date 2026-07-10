jQuery(function ($) {

    $(document).on('click', '.gpp-add-feature', function () {
        const list = $(this)
            .closest('.gpp-features-wrapper')
            .find('.gpp-features-list');

        list.append(`
            <div class="gpp-feature-item">
                <input
                    type="text"
                    name="gpp_features[]"
                    class="widefat"
                    placeholder="Example: 5 meals per week">

                <button
                    type="button"
                    class="button gpp-remove-feature">
                    Remove
                </button>
            </div>
        `);
    });

    $(document).on('click', '.gpp-remove-feature', function () {
        $(this).closest('.gpp-feature-item').remove();
    });

});