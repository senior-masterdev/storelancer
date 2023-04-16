<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Customer Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('head-title'); ?>
    <?php echo e(__('Welcome').', '.\Illuminate\Support\Facades\Auth::guard('customers')->user()->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- <div class="course-page hero-section">
        <div class="container-lg">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="course-page-text">
                        <div class="course-category">
                            <div class="course-back">
                                <a href="<?php echo e(route('store.slug',$store->slug)); ?>">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <?php echo e(__('Back to home')); ?>

                                </a>
                            </div>
                            <div class="design-span">
                                <span><?php echo e(!empty($course->category_id->name)?$course->category_id->name:''); ?></span>
                            </div>
                        </div>
                        <div class="category-heading">
                            <h2><?php echo e(__('Products you purchased')); ?></h2>
                            <p><?php echo e(__('Lorem Ipsum is simply dummy text of the printing and typesetting industry')); ?>. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php if($storethemesetting['enable_header_img'] == 'on'): ?>
        <section class="slice slice-xl bg-cover bg-size--cover home-banner" data-offset-top="#header-main" style="background-image: url(<?php echo e(asset(Storage::url('uploads/store_logo/'.(!empty($storethemesetting['header_img'])?$storethemesetting['header_img']:'home-banner.png')))); ?>); background-position: center center;">
            <span class="mask bg-dark opacity-3"></span>
            <div class="container py-6">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="h1 text-white store-title">
                            <?php echo e(__('Products you purchased')); ?>

                        </h2>

                        <a href="<?php echo e(route('store.slug',$store->slug)); ?>" class="btn btn-white btn-white btn-icon rounded-pill hover-translate-y-n3 mt-4" id="pro_scroll">
                            <span class="btn-inner--text"><?php echo e(__('Back to home')); ?></span>
                            <span class="btn-inner--icon"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="slice slice-lg delimiter-bottom">
        <div class="container">

                <?php if(!empty($orders) && count($orders) > 0): ?>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('Order')); ?></th>
                                    <th scope="col" class="sort"><?php echo e(__('Date')); ?></th>
                                    <th scope="col" class="sort"><?php echo e(__('Value')); ?></th>
                                    <th scope="col" class="sort"><?php echo e(__('Payment Type')); ?></th>
                                    <th scope="col" class="text-right"><?php echo e(__("Action")); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row">
                                            <a href="<?php echo e(route('customer.order',[$store->slug,Crypt::encrypt($order->id)])); ?>" class="btn btn-sm btn-white btn-icon rounded-pill text-dark">
                                                <span class="btn-inner--text"><?php echo e('#'.$order->order_id); ?></span>
                                            </a>
                                        </th>
                                        <td class="order">
                                            <span class="h6 text-sm font-weight-bold mb-0"><?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?></span>
                                        </td>

                                        <td>
                                            
                                            <span class="value text-sm mb-0"><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></span>
                                        </td>
                                        <td>
                                            <span class="taxes text-sm mb-0"><?php echo e($order->payment_type); ?></span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <?php if($order->status != 'Cancel Order'): ?>
                                                    <button type="button" class="btn btn-sm <?php echo e(($order->status == 'pending')?'btn-soft-info':'btn-soft-success'); ?> btn-icon rounded-pill">
                                                        <span class="btn-inner--icon">
                                                         <?php if($order->status == 'pending'): ?>
                                                                <i class="fas fa-check soft-success"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-check-double soft-success"></i>
                                                            <?php endif; ?>
                                                        </span>
                                                        <?php if($order->status == 'pending'): ?>
                                                            <span class="btn-inner--text">
                                                                <?php echo e(__('Pending')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="btn-inner--text">
                                                                <?php echo e(__('Delivered')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-sm btn-soft-danger btn-icon rounded-pill">
                                                        <span class="btn-inner--icon">
                                                            <?php if($order->status == 'pending'): ?>
                                                                <i class="fas fa-check soft-success"></i>
                                                            <?php else: ?>
                                                                <i class="fa fa-check-double soft-success"></i>
                                                            <?php endif; ?>
                                                        </span>
                                                        <span class="btn-inner--text">
                                                            <?php echo e(__('Cancel Order')); ?>: <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                        </span>
                                                    </button>
                                            <?php endif; ?>
                                            <!-- Actions -->
                                                <div class="actions ml-3">
                                                    <a href="<?php echo e(route('customer.order',[$store->slug,Crypt::encrypt($order->id)])); ?>" class="action-item mr-2"  data-toggle="tooltip" data-title="<?php echo e(__('Details')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <tr>
                        <td colspan="7">
                            <div class="text-center">
                                <i class="fas fa-folder-open text-gray" style="font-size: 48px;"></i>
                                <h2><?php echo e(__('Opps...')); ?></h2>
                                <h6> <?php echo __('No data Found.'); ?> </h6>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(".add_to_cart").click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var variants = [];
            $(".variant-selection").each(function (index, element) {
                variants.push(element.value);
            });

            if (jQuery.inArray('', variants) != -1) {
                show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
                return false;
            }
            var variation_ids = $('#variant_id').val();

            $.ajax({
                url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
                type: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    variants: variants.join(' : '),
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $("#shoping_counts").html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                    console.log('error');
                }
            });
        });

        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('store.addtowishlist', [$store->slug,'__product_id'])); ?>'.replace('__product_id', id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {

                    if (response.status == "Success") {

                        show_toastr('Success', response.message, 'success');
                        $('.wishlist_' + response.id).removeClass('add_to_wishlist');
                        $('.wishlist_' + response.id).html('<i class="fas fa-heart"></i>');
                        $('.wishlist_count').html(response.count);
                    } else {
                        console.log(response.status);
                        show_toastr('Error', response.error, 'error');
                    }
                },
                error: function (result) {
                }
            });
        });

        $(".productTab").click(function (e) {
            e.preventDefault();
            $('.productTab').removeClass('active')

        });

        $("#pro_scroll").click(function () {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer/resources/views/storefront/theme1/customer/index.blade.php ENDPATH**/ ?>