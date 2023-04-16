<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shipping')); ?>

<?php $__env->stopSection(); ?>
<?php
     $productImg = \App\Models\Utility::get_file('uploads/is_cover_image/');
?>
<?php $__env->startSection('content'); ?>
<div class="wrapper">
    <section class="cart-section">
        <div class="container">
            <?php echo e(Form::model($cust_details,array('route' => array('store.customer',$store->slug), 'method' => 'POST'))); ?>

            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="customer-info">
                        <h5><?php echo e(__('Billing information')); ?></h5>
                        <p><?php echo e(__('Fill the form below so we can send you the orders invoice.')); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('name',__('First Name'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::text('name',old('name'),array('class'=>'form-control','placeholder'=>__('Enter Your First Name'),'required'=>'required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('last_name',__('Last Name'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::text('last_name',old('last_name'),array('class'=>'form-control','placeholder'=>__('Enter Your Last Name'),'required'=>'required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('phone',__('Phone'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::text('phone',old('phone'),array('class'=>'form-control','placeholder'=>'(99) 12345 67890','required'=>'required'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('email',__('Email'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::email('email',(Utility::CustomerAuthCheck($store->slug) ? Auth::guard('customers')->user()->email : ''),array('class'=>'form-control','placeholder'=>__('Enter Your Email Address')))); ?>

                            </div>
                        </div>
                        <?php if(!empty($store_payment_setting['custom_field_title_1'])): ?>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_title_1',$store_payment_setting['custom_field_title_1'],array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                    <?php echo e(Form::text('custom_field_title_1',old('custom_field_title_1'),array('class'=>'form-control','placeholder'=>'Enter '.$store_payment_setting['custom_field_title_1'],'required'=>'required'))); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($store_payment_setting['custom_field_title_2'])): ?>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_title_2',$store_payment_setting['custom_field_title_2'],array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                    <?php echo e(Form::text('custom_field_title_2',old('custom_field_title_2'),array('class'=>'form-control','placeholder'=>'Enter '.$store_payment_setting['custom_field_title_1'],'required'=>'required'))); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($store_payment_setting['custom_field_title_3'])): ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('custom_field_title_3',$store_payment_setting['custom_field_title_3'],array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                        <?php echo e(Form::text('custom_field_title_3',old('custom_field_title_3'),array('class'=>'form-control','placeholder'=>'Enter '.$store_payment_setting['custom_field_title_1'],'required'=>'required'))); ?>

                                    </div>
                                </div>
                        <?php endif; ?>
                        <?php if(!empty($store_payment_setting['custom_field_title_4'])): ?>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('custom_field_title_4',$store_payment_setting['custom_field_title_4'],array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                    <?php echo e(Form::text('custom_field_title_4',old('custom_field_title_4'),array('class'=>'form-control','placeholder'=>'Enter '.$store_payment_setting['custom_field_title_1'],'required'=>'required'))); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('billingaddress',__('Address'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::text('billing_address',old('billing_address'),array('class'=>'form-control','placeholder'=>__('Billing Address'),'required'=>'required'))); ?>

                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_country',__('Country'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                
                                <select name="billing_country" id="" class="form-control change_country" required>
                                    <option value=""><?php echo e(__('Select Country')); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($key); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_city',__('City'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                
                                <select name="billing_city" id="city" class="form-control" required>  
                                    <option value=""><?php echo e(__('select city')); ?></option>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('billing_postalcode',__('Postal Code'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                <?php echo e(Form::text('billing_postalcode',old('billing_postalcode'),array('class'=>'form-control','placeholder'=>__('Billing Postal Code'),'required'=>'required'))); ?>

                            </div>
                        </div>
                        <?php if($store->enable_shipping == "on" && $shippings->count() > 0): ?>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('location_id',__('Location'),array("class"=>"form-control-label"))); ?> <span style="color:red">*</span>
                                    <?php echo e(Form::select('location_id', $locations, null,array('class' => 'form-control change_location','required'=>'required'))); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12 col-12">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <div class="customer-info">
                                        <h5><?php echo e(__('Shipping informations')); ?></h5>
                                        <p><?php echo e(__('Fill the form below so we can send you the orders invoice.')); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="addres-btn">
                                        <a class="cart-btn" onclick="billing_data()" id="billing_data" data-toggle="tooltip" data-placement="top" title="Same As Billing Address">
                                            <span class="btn-inner--text"><?php echo e(__('Copy Address')); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_address',__('Address'),array("class"=>"form-control-label"))); ?>

                                <?php echo e(Form::text('shipping_address',old('shipping_address'),array('class'=>'form-control','placeholder'=>__('Shipping Address')))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_country',__('Country'),array("class"=>"form-control-label"))); ?>

                                <?php echo e(Form::text('shipping_country',old('shipping_country'),array('class'=>'form-control','placeholder'=>__('Shipping Country')))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_city',__('City'),array("class"=>"form-control-label"))); ?>

                                <?php echo e(Form::text('shipping_city',old('shipping_city'),array('class'=>'form-control','placeholder'=>__('Shipping City')))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <?php echo e(Form::label('shipping_postalcode',__('Postal Code'),array("class"=>"form-control-label"))); ?>

                                <?php echo e(Form::text('shipping_postalcode',old('shipping_postalcode'),array('class'=>'form-control','placeholder'=>__('Shipping Postal Code')))); ?>

                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="addres-btn">
                                <a href="<?php echo e(route('store.slug',$store->slug)); ?>" class="cart-btn"><?php echo e(__('Return to shop')); ?></a>
                                <button type="submit" class="cart-btn btn"><?php echo e(__('Next step')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div id="location_hide" style="display: none">
                        <div class="shiping-type">
                            <h5><?php echo e(__('Select Shipping')); ?></h5>
                            <div class="radio-group" id="shipping_location_content">

                            </div>
                        </div>
                    </div>
                    <div class="coupon-form">
                        <div class="coupon-header">
                            <h4><?php echo e(__('Coupon')); ?></h4>
                        </div>
                        <div class="coupon-body">
                            <form action="">
                                <div class="input-wrapper">
                                    <input type="text" class="coupon hidd_val" id="stripe_coupon" name="coupon" placeholder="Enter Coupon Code">
                                    <input type="hidden" name="coupon" class="form-control hidden_coupon " value="">
                                </div>
                                <div class="btn-wrapper apply-stripe-btn-coupon">
                                    <button type="submit" class="btn apply-coupon"><?php echo e(__('Apply')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mini-cart internal-box" id="card-summary">
                        <div class="internal-header">
                            <h4><?php echo e(__('Summary')); ?></h4>
                        </div>
                        <div id="cart-body" class="mini-cart-has-item">
                            <?php if(!empty($products)): ?>
                                <?php
                                    $total = 0;
                                    $sub_tax = 0;
                                    $sub_total= 0;
                                ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($product['variant_id']) && !empty($product['variant_id'])): ?>
                                        <div class="mini-cart-body">
                                            <div class="mini-cart-item">
                                                <div class="mini-cart-image">
                                                    <a href="#">
                                                        <img src="<?php echo e($productImg .$product['image']); ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="mini-cart-details">
                                                    <p class="mini-cart-title">
                                                        <a href="#"><?php echo e($product['product_name'].' - ( ' . $product['variant_name'] .' ) '); ?></a>
                                                    </p>
                                                    <?php
                                                        $total_tax=0;
                                                    ?>
                                                    <div class="pvarprice d-flex align-items-center justify-content-between">
                                                        <div class="price">
                                                            <small>
                                                                <?php echo e($product['quantity']); ?> x <?php echo e(\App\Models\Utility::priceFormat($product['variant_price'])); ?>

                                                                <?php if(!empty($product['tax'])): ?>
                                                                    +
                                                                    <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $sub_tax = ($product['variant_price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                            $total_tax += $sub_tax;
                                                                        ?>

                                                                        <?php echo e(\App\Models\Utility::priceFormat($sub_tax).' ('.$tax['tax_name'].' '.($tax['tax']).'%)'); ?>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </small>
                                                            <?php
                                                            $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                            $subtotal = $product['variant_price'] * $product['quantity'];
                                                            $sub_total += $subtotal;
                                                            ?>
                                                        </div>
                                                        <a class="remove_item">
                                                            <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $total += $totalprice;
                                        ?>
                                    <?php else: ?>
                                        <div class="mini-cart-body">
                                            <div class="mini-cart-item">
                                                <div class="mini-cart-image">
                                                    <a href="#">
                                                        <img src="<?php echo e($productImg .$product['image']); ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="mini-cart-details">
                                                    <p class="mini-cart-title">
                                                        <a href="#"><?php echo e($product['product_name']); ?></a>
                                                    </p>
                                                    <?php
                                                        $total_tax=0;
                                                    ?>
                                                    <div class="pvarprice d-flex align-items-center justify-content-between">
                                                        <div class="price">
                                                            <small>
                                                                <?php echo e($product['quantity']); ?> x <?php echo e(\App\Models\Utility::priceFormat($product['price'])); ?>

                                                                <?php if(!empty($product['tax'])): ?>
                                                                    +
                                                                    <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $sub_tax = ($product['price'] * $product['quantity'] * $tax['tax']) / 100;
                                                                            $total_tax += $sub_tax;
                                                                        ?>
    
                                                                        <?php echo e(\App\Models\Utility::priceFormat($sub_tax).' ('.$tax['tax_name'].' '.($tax['tax']).'%)'); ?>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </small>
                                                            <?php
                                                                $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                $subtotal = $product['price'] * $product['quantity'];
                                                                $sub_total += $subtotal;
                                                            ?>
                                                        </div>
                                                        <a class="remove_item">
                                                            <?php echo e(\App\Models\Utility::priceFormat($totalprice)); ?>

                                                        </a>
                                                        <?php
                                                            $total += $totalprice;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mini-cart-footer">
                                    <ul class="cart-summery">
                                        
                                        <li>
                                            <span class="cart-sum-left"> <?php echo e(__('item')); ?></span>
                                            <span class="cart-sum-right"><?php echo e(\App\Models\Utility::priceFormat( !empty($sub_total)?$sub_total:'0')); ?></span>
                                        </li> 
                                       
                                        <?php if($store->enable_shipping == "on"): ?>
                                        <li class="shipping_price_add">
                                                <span class="cart-sum-left"><?php echo e(__('Shipping Price')); ?> </span>
                                                <span class="cart-sum-right shipping_price" data-value=""></span>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <span class="cart-sum-left"><?php echo e(__('Coupon')); ?> </span>
                                            <span class="cart-sum-right dicount_price"><?php echo e(\App\Models\Utility::priceFormat(0)); ?></span>
                                        </li>
                                        <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php
                                                $rate = $taxArr['rate'][$k];
                                            ?>
                                            <span class="cart-sum-left"><?php echo e($tax); ?></span>
                                            <span class="cart-sum-right"> <?php echo e(\App\Models\Utility::priceFormat($rate)); ?> </span>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </ul>
                                    <div class="mini-cart-footer-total-row d-flex align-items-center justify-content-between">
                                        <div class="mini-total-lbl">
                                            <?php echo e(__('Total')); ?>

                                        </div>
                                        <div class="mini-total-price final_total_price" id="total_value">
                                            <input type="hidden" class="product_total" value="<?php echo e($total); ?>">
                                            <input type="hidden" class="total_pay_price" value="<?php echo e(App\Models\Utility::priceFormat($total)); ?>">
                                            <span class="pro_total_price" data-value="<?php echo e(\App\Models\Utility::priceFormat(!empty($total)?$total:0)); ?>"><?php echo e(\App\Models\Utility::priceFormat(!empty($total)?$total:'0')); ?></span> 
                                        </div>
                                    </div>
                                </div>   
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        function billing_data() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        }

        $(document).ready(function () {
            $('.change_location').trigger('change');

            setTimeout(function () {
                var shipping_id = $("input[name='shipping_id']:checked").val();
                getTotal(shipping_id);
            }, 200);
        });

        $(document).on('change', '.shipping_mode', function () {
            var shipping_id = this.value;
            getTotal(shipping_id);
        });

        function getTotal(shipping_id) {
            var pro_total_price = $('.pro_total_price').attr('data-value');
           
            if (shipping_id == undefined) {
                $('.shipping_price_add').hide();
                return false
            } else {
             
                $('.shipping_price_add').show();
            }
            $.ajax({
                url: '<?php echo e(route('user.shipping', [$store->slug,'_shipping'])); ?>'.replace('_shipping', shipping_id),
                data: {
                    "pro_total_price": pro_total_price,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                method: 'POST',
                context: this,
                dataType: 'json',

                success: function (data) {
                    var price = data.price + pro_total_price;
                    $('.shipping_price').html(data.price);
                    $('.shipping_price').attr('data-value', data.price);
                    $('.pro_total_price').html(data.total_price);
                }
            });
        }

        $(document).on('change', '.change_location', function () {
            var location_id = $('.change_location').val();
            if (location_id == 0) {
                $('#location_hide').hide();

            } else {
                $('#location_hide').show();

            }

            $.ajax({
                url: '<?php echo e(route('user.location', [$store->slug,'_location_id'])); ?>'.replace('_location_id', location_id),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                method: 'POST',
                context: this,
                dataType: 'json',

                success: function (data) {
                    var html = '';
                    var shipping_id = '<?php echo e((isset($cust_details['shipping_id']) ? $cust_details['shipping_id'] : '')); ?>';
                    $.each(data.shipping, function (key, value) {
                        var checked = '';
                        if (shipping_id != '' && shipping_id == value.id) {
                            checked = 'checked';
                        }

                        html += '<div class="radio-group"><input type="radio" name="shipping_id" data-id="' + value.price + '" value="' + value.id + '" id="shipping_price' + key + '" class="shipping_mode" ' + checked + '>' +
                            ' <label name="shipping_label" for="shipping_price' + key + '"> ' + value.name + '</label></div>';

                    });
                    $('#shipping_location_content').html(html);
                }
            });
        });

        $(document).on('click', '.apply-coupon', function (e) {
            e.preventDefault();

            var ele = $(this);
            var coupon = ele.closest('.row').find('.coupon').val();
            var hidden_field = $('.hidden_coupon').val();
            var price = $('#card-summary .product_total').val();
            var shipping_price = $('#card-summary .shipping_price').attr('data-value');

            if (coupon == hidden_field && coupon != "") {
                show_toastr('Error', 'Coupon Already Used', 'error');
            } else {
                if (coupon != '') {

                    $.ajax({
                        url: '<?php echo e(route('apply.productcoupon')); ?>',
                        datType: 'json',
                        data: {
                            price: price,
                            shipping_price: shipping_price,
                            store_id: <?php echo e($store->id); ?>,
                            coupon: coupon
                        },
                        success: function (data) {
                            $('#stripe_coupon, #paypal_coupon').val(coupon);
                            if (data.is_success) {
                                $('.hidden_coupon').val(coupon);
                                $('.hidden_coupon').attr(data);

                                $('.dicount_price').html(data.discount_price);

                                var html = '';
                                html += '<span class="text-sm font-weight-bold s-p-total pro_total_price" data-original="' + data.final_price_data_value + '">' + data.final_price + '</span>'
                                $('.final_total_price').html(html);


                                // $('.coupon-tr').show().find('.coupon-price').text(data.discount_price);
                                // $('.final-price').text(data.final_price);
                                show_toastr('Success', data.message, 'success');
                            } else {
                                // $('.coupon-tr').hide().find('.coupon-price').text('');
                                // $('.final-price').text(data.final_price);
                                show_toastr('Error', data.message, 'error');
                            }
                        }
                    })
                } else {
                    $.ajax({
                        url: '<?php echo e(route('apply.removecoupn')); ?>',
                        datType: 'json',
                        data: {
                            price: "price",
                            shipping_price: "shipping_price",
                            slug:<?php echo e($store->id); ?> ,
                            coupon: "coupon"
                        },
                        success: function (data) {
                        }
                    });
                    var hidd_cou = $('.hidd_val').val();

                    if(hidd_cou == ""){
                       var total_pa_val =  $(".total_pay_price").val();
                       $(".final_total_price").html(total_pa_val);
                       $(".dicount_price").html(0.00);

                    }
                    show_toastr('Error', '<?php echo e(__('Invalid Coupon Code.')); ?>', 'error');
                }
            }

        });
        $(document).on('change','.change_country',function(){
            var country = $('.change_country').val();
            $.ajax({
                url : '<?php echo e(route('user.city',[$store->slug,'_country'])); ?>'.replace('_country',country),
                method : 'POST',
                data : {
                    "_token":"<?php echo e(csrf_token()); ?>",
                },
                context : this,
                dataType : 'json',
                success : function(data){
                    $('#city').html('<option value="">Select city</option>'); 
                    $.each(data.cities,function(key,value){
                        $("#city").append('<option value="'+value+'">'+value+'</option>');
                    });
                }
            }); 
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/storefront/theme1/shipping.blade.php ENDPATH**/ ?>