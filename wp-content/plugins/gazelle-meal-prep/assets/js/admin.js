jQuery(function ($) {

    $('.gmp-upload').on('click', function (e) {
        e.preventDefault();

        const button = $(this);
        const target = button.data('target');

        const frame = wp.media({
            title: 'Select Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        frame.on('select', function () {

            const img = frame.state().get('selection').first().toJSON();

            // set hidden input
            $('#' + target).val(img.id);

            // FIXED preview logic
            let previewClass = '';

            if (target === 'desktop_banner_id') {
                previewClass = '.desktop-preview';
            }

            if (target === 'mobile_banner_id') {
                previewClass = '.mobile-preview';
            }

            if (target === 'content_image_id') {
                previewClass = '.content-preview';
            }

            $(previewClass).html(
                '<img src="' + img.url + '" style="max-width:200px;height:auto;display:block;">'
            );
        });

        frame.open();
    });

});