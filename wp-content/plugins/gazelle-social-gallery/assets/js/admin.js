jQuery(document).ready(function ($) {

    function openMedia(button, input, preview) {

        let frame = wp.media({
            title: 'Select Images',
            button: { text: 'Use Images' },
            multiple: true
        });

        $(button).on('click', function (e) {
            e.preventDefault();

            frame.open();
        });

        frame.on('select', function () {

            let selection = frame.state().get('selection').toJSON();

            let ids = [];
            let html = '';

            selection.forEach(item => {
                ids.push(item.id);
                html += `<img src="${item.url}" style="width:100px;height:auto;border-radius:8px;">`;
            });

            $(input).val(ids.join(','));
            $(preview).html(html);
        });
    }

    // WhatsApp
    openMedia('#gazelle-wa-upload', '#gazelle-wa-input', '#gazelle-wa-preview');

    // Instagram
    openMedia('#gazelle-ig-upload', '#gazelle-ig-input', '#gazelle-ig-preview');

});