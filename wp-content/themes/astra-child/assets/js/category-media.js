jQuery(document).ready(function ($) {

    let frame;

    function openMedia(inputSelector, previewSelector) {

        const mediaFrame = wp.media({
            title: 'Select Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        mediaFrame.on('select', function () {

            const attachment = mediaFrame.state().get('selection').first().toJSON();

            $(inputSelector).val(attachment.id);

            $(previewSelector).html(
                '<img src="' + attachment.url + '" style="max-width:200px;height:auto;" />'
            );

        });

        mediaFrame.open();
    }

    // Desktop
    $('.upload_banner_button').on('click', function (e) {
        e.preventDefault();

        openMedia('#category_banner', '.banner-preview');
    });

    // Mobile (FIXED)
    $('.upload_mobile_banner_button').on('click', function (e) {
        e.preventDefault();

        openMedia('#mobile_banner_id', '.mobile-banner-preview');
    });

    // Auto clear after save
    $(document).ajaxComplete(function (event, xhr, settings) {

        if (settings.data && settings.data.indexOf('action=add-tag') !== -1) {

            $('#category_banner').val('');
            $('#mobile_banner_id').val('');
            $('#category_icon').val('');

            $('.banner-preview').html('');
            $('.mobile-banner-preview').html('');
        }
    });

});