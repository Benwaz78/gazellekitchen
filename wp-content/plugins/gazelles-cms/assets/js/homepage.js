jQuery(function ($) {

    function media(callback) {

        const frame = wp.media({
            title: 'Select Image',
            button: { text: 'Use Image' },
            multiple: false
        });

        frame.on('select', function () {
            callback(frame.state().get('selection').first().toJSON());
        });

        frame.open();
    }

    $('.gau-home-desktop').on('click', function (e) {
        e.preventDefault();

        media(function (img) {
            $('#gau_home_desktop').val(img.id);
            $('.gau-preview-desktop').html('<img src="' + img.url + '" style="max-width:100%;">');
        });
    });

    $('.gau-home-mobile').on('click', function (e) {
        e.preventDefault();

        media(function (img) {
            $('#gau_home_mobile').val(img.id);
            $('.gau-preview-mobile').html('<img src="' + img.url + '" style="max-width:100%;">');
        });
    });

});