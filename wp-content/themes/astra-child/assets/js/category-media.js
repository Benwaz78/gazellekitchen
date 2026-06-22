jQuery(function ($) {

    function openMedia(inputSelector, previewSelector, removeButtonSelector, title) {
        const mediaFrame = wp.media({
            title: title,
            button: {
                text: 'Use this image'
            },
            library: {
                type: 'image'
            },
            multiple: false
        });

        mediaFrame.on('select', function () {
            const attachment = mediaFrame
                .state()
                .get('selection')
                .first()
                .toJSON();

            /*
             * Save attachment ID only.
             * Never save attachment.url here.
             */
            $(inputSelector).val(attachment.id);

            const previewUrl = attachment.sizes && attachment.sizes.medium
                ? attachment.sizes.medium.url
                : attachment.url;

            $(previewSelector).html(
                '<img src="' + previewUrl + '" alt="" style="max-width:200px;height:auto;display:block;">'
            );

            $(removeButtonSelector).show();
        });

        mediaFrame.open();
    }


    $(document).on('click', '.upload_banner_button', function (e) {
        e.preventDefault();

        openMedia(
            '#category_banner',
            '.banner-preview',
            '.remove-banner-button',
            'Select Desktop Banner'
        );
    });


    $(document).on('click', '.upload_mobile_banner_button', function (e) {
        e.preventDefault();

        openMedia(
            '#mobile_banner_id',
            '.mobile-banner-preview',
            '.remove-mobile-banner',
            'Select Mobile Banner'
        );
    });


    $(document).on('click', '.remove-banner-button', function (e) {
        e.preventDefault();

        $('#category_banner').val('');
        $('.banner-preview').html('');
        $(this).hide();
    });


    $(document).on('click', '.remove-mobile-banner', function (e) {
        e.preventDefault();

        $('#mobile_banner_id').val('');
        $('.mobile-banner-preview').html('');
        $(this).hide();
    });


    /*
     * After creating a new category via AJAX,
     * clear the temporary fields.
     */
    $(document).ajaxComplete(function (event, xhr, settings) {
        if (!settings.data || settings.data.indexOf('action=add-tag') === -1) {
            return;
        }

        $('#category_banner').val('');
        $('#mobile_banner_id').val('');
        $('#category_icon').val('');

        $('.banner-preview').html('');
        $('.mobile-banner-preview').html('');

        $('.remove-banner-button').hide();
        $('.remove-mobile-banner').hide();
    });

});