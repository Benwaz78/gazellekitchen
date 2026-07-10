  <section class="section bg-grey">
        <div class="container">
            <h3>Catering Menus</h3>
            <div class="row">
                                    <?php
                    $product_categories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                    ]);

                    foreach ($product_categories as $category) {

                        set_query_var('category', $category);

                        get_template_part(
                            'template-parts/components/menu-category-list'
                        );
                    }
                    ?>
            </div>
        </div>
    </section>
