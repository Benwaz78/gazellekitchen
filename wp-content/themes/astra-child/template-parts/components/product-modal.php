<div class="modal fade shop" id="productModal" 
tabindex="-1" aria-labelledby="menuProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden">

            <!-- Header -->
            <div class="modal-header border-0 pb-0">
                <button
                    type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-2 px-1 px-lg-2 pb-2 pb-lg-2" id="productModalBody">
                <?php get_template_part( "template-parts/components/product-content" ) ?>
            </div>

        </div>
    </div>
</div>