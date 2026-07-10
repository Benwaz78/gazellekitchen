jQuery(function ($) {

    /**
     * Open WordPress Media Library
     * Reusable for WhatsApp + Instagram
     */
    function openGallery(input, preview) {

        const frame = wp.media({
            title: 'Select Images',
            button: {
                text: 'Add Images'
            },
            multiple: true
        });

        frame.on('select', function () {

            const selection = frame.state().get('selection');

            let ids = input.val()
                ? input.val().split(',')
                : [];

            selection.each(function (attachment) {

                attachment = attachment.toJSON();

                const id = String(attachment.id);

                if (!ids.includes(id)) {

                    ids.push(id);

                    preview.append(`
                        <div class="gazelle-gallery-item" data-id="${id}" style="position:relative;width:150px;">
                            <img src="${attachment.url}" style="width:100%;height:auto;display:block;">
                            <button type="button" class="gazelle-remove-image"
                                style="position:absolute;top:5px;right:5px;">
                                ×
                            </button>
                        </div>
                    `);
                }
            });

            input.val(ids.join(','));

        });

        frame.open();
    }

    /**
     * =========================
     * WHATSAPP GALLERY
     * =========================
     */
    $('#gazelle-wa-upload').on('click', function (e) {
        e.preventDefault();

        openGallery(
            $('#gazelle-wa-input'),
            $('#gazelle-wa-preview')
        );
    });

    /**
     * =========================
     * INSTAGRAM GALLERY
     * =========================
     */
    $('#gazelle-ig-upload').on('click', function (e) {
        e.preventDefault();

        openGallery(
            $('#gazelle-ig-input'),
            $('#gazelle-ig-preview')
        );
    });

    /**
     * =========================
     * REMOVE IMAGE (GLOBAL)
     * =========================
     */
    $(document).on('click', '.gazelle-remove-image', function () {

        const item = $(this).closest('.gazelle-gallery-item');
        const id = item.data('id');

        const wrapper = item.closest('.wrap');

        let input;

        if (wrapper.find('#gazelle-wa-input').length) {
            input = $('#gazelle-wa-input');
        } else {
            input = $('#gazelle-ig-input');
        }

        let ids = input.val()
            ? input.val().split(',')
            : [];

        ids = ids.filter(function (value) {
            return value != id;
        });

        input.val(ids.join(','));

        item.remove();
    });

});