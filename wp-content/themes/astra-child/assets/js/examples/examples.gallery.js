(($ => {

    function initializeThumbGallery(wrapper) {

        const $wrapper = $(wrapper);

        const $thumbGalleryDetail = $wrapper.find('.thumb-gallery-detail');
        const $thumbGalleryThumbs = $wrapper.find('.thumb-gallery-thumbs');

        let flag = false;
        const duration = 300;

        // Prevent double initialization
        if ($thumbGalleryDetail.hasClass('owl-loaded')) {
            return;
        }

        $thumbGalleryDetail
            .owlCarousel({
                items: 1,
                margin: 10,
                nav: true,
                dots: false,
                loop: false,
                autoHeight: true,
                navText: [],
                rtl: ($('html').attr('dir') == 'rtl')
            })
            .on('changed.owl.carousel', ({ item }) => {

                if (!flag) {

                    flag = true;

                    $thumbGalleryThumbs.trigger(
                        'to.owl.carousel',
                        [item.index - 1, duration, true]
                    );

                    $thumbGalleryThumbs
                        .find('.owl-item')
                        .removeClass('selected');

                    $thumbGalleryThumbs
                        .find('.owl-item')
                        .eq(item.index)
                        .addClass('selected');

                    flag = false;

                }

            });

        $thumbGalleryThumbs
            .owlCarousel({
                margin: 15,
                items: $wrapper.data('thumbs-items')
                    ? $wrapper.data('thumbs-items')
                    : 4,
                nav: false,
                center: $wrapper.data('thumbs-center') ? true : false,
                dots: false,
                rtl: ($('html').attr('dir') == 'rtl')
            })
            .on('click', '.owl-item', function () {

                $thumbGalleryDetail.trigger(
                    'to.owl.carousel',
                    [$(this).index(), duration, true]
                );

            })
            .on('changed.owl.carousel', ({ item }) => {

                if (!flag) {

                    flag = true;

                    $thumbGalleryDetail.trigger(
                        'to.owl.carousel',
                        [item.index, duration, true]
                    );

                    flag = false;

                }

            });

        $thumbGalleryThumbs
            .find('.owl-item')
            .eq(0)
            .addClass('selected');

    }

    // Make it available globally
    window.initializeThumbGallery = initializeThumbGallery;

    // Initialize galleries already on the page
    theme.fn.intObs('.thumb-gallery-wrapper', function () {

        initializeThumbGallery(this);

    }, {});

})).apply(this, [jQuery]);