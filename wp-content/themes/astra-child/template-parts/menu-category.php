   <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="moving-card-title">Catering Menus Categories</h4>
                    <div class="owl-carousel owl-theme show-nav-title" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false,
                    'responsive':{
                            '0':{'items':1},
                            '576':{'items':2},
                            '768':{'items':3},
                            '992':{'items':4},
                            '1200':{'items':4}
                        }
                    }">
                      
                   <?php
                    $categories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                    ]);
                    ?>


                    <?php if (!empty($categories) && !is_wp_error($categories)) : ?>

                        <?php foreach ($categories as $cat) : 
                             // Do not display WooCommerce's default Uncategorized category.
                            if ($cat->slug === 'uncategorized') {
                                continue;
                            }
                            
                            
                        ?>
                            

                            <?php
                            $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

                            $image = $thumbnail_id
                                ? wp_get_attachment_url($thumbnail_id)
                                : get_stylesheet_directory_uri() . '/assets/img/menu-category-default.jpg';
                            ?>

                            <div>

                                <?php
                                get_template_part(
                                    "template-parts/components/category-menu-card",
                                    null,
                                    [
                                        'term_id'     => $cat->term_id,
                                        'name'        => $cat->name,
                                        'description' => $cat->description,
                                        'link'        => get_term_link($cat),
                                        'image'       => $image
                                    ]
                                );
                                ?>

                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>