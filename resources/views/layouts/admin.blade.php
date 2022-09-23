<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <link href="{{ asset('contents/admin') }}/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/adminpress.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/toastr.css" id="theme" rel="stylesheet">

    <script src="{{asset('contents/admin')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/sweetalert.min.js"></script>

    @livewireStyles
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        @include('layouts.includes.header')
        @include('layouts.includes.sidebar')

        <div class="page-wrapper">
            <br>
            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer print_none text-center"> © 2022 3I Engineers </footer>

        </div>

    </div>



    <script src="{{ asset('contents/admin') }}/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('contents/admin') }}/js/waves.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sidebarmenu.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/dashboard1.js"></script>
    <script src="{{ asset('contents/admin') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sweetalert/code.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // Device Category , Sub Category, Brand Dropdownlist Select Event
        $(document).ready(function() {
            $('select[name="CategoryID"]').on('change', function() {
                var CategoryID = $(this).val();
                if (CategoryID) {
                    $.ajax({
                        url: "{{ route('Category-wise-Brand') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            CategoryID: CategoryID
                        },
                        success: function(data) {
                            if (data == "") {
                                $('#BranId_val[name="BranID"]').empty();
                                $('#BranId_val[name="BranID"]').append('<option value="">Data Not Found! </option>');
                                $('#SizeId_val[name="SizeID"]').empty();
                                $('#SizeId_val[name="SizeID"]').append('<option value="">Data Not Found!</option>');
                                //  $('#ThicId_val[name="ThicID"]').empty();
                                // $('#ThicId_val[name="ThicID"]').append('<option value="">Data Not Found!</option>');

                            } else {

                                $('#BranId_val[name="BranID"]').empty();
                                $('#BranId_val[name="BranID"]').append('<option value="">Select Sub Category</option>');
                                $('#SizeId_val[name="SizeID"]').empty();
                                $('#SizeId_val[name="SizeID"]').append('<option value="">Select Brand</option>');
                                // $('#ThicId_val[name="ThicID"]').empty();
                                // $('#ThicId_val[name="ThicID"]').append('<option value="">Select </option>');

                                //  alert(data);
                                $.each(data, function(key, value) {
                                    $('#BranId_val[name="BranID"]').append('<option value="' + value.BranId + '">' + value.BranName + '</option>');
                                });
                            }

                        },

                    });
                } else {

                }
            });
            // Brand Wise productSize
            $('select[name="BranID"]').on('change', function() {
                var BranId = $(this).val();
                if (BranId) {
                    $.ajax({
                        url: "{{ route('Brand-wise-size') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            BranId: BranId
                        },
                        success: function(data) {
                            if (data == "") {

                                $('#SizeId_val[name="SizeID"]').empty();
                                $('#SizeId_val[name="SizeID"]').append('<option value="">Data Not Found!</option>');
                                //  $('#ThicId_val[name="ThicID"]').empty();
                                //  $('#ThicId_val[name="ThicID"]').append('<option value="">Data Not Found!</option>');

                            } else {

                                $('#SizeId_val[name="SizeID"]').empty();
                                $('#SizeId_val[name="SizeID"]').append('<option value="">Select Device Brand</option>');
                                //  $('#ThicId_val[name="ThicID"]').empty();
                                //  $('#ThicId_val[name="ThicID"]').append('<option value="">Select Thickness</option>');

                                $.each(data, function(key, value) {
                                    $('#SizeId_val[name="SizeID"]').append('<option value="' + value.SizeId + '">' + value.SizeName + '</option>');
                                });
                            }

                        },
                    });
                } else {

                }
            });

            // product Size Wise Thickness
            /*
            $('select[name="SizeID"]').on('change', function() {
                var Size = $(this).val();
                if (Size) {
                    $.ajax({
                        url: "{{ route('size-wise-thickness') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            Size: Size
                        },
                        success: function(data) {
                            if (data == "") {

                                $('#ThicId_val[name="ThicID"]').empty();
                                $('#ThicId_val[name="ThicID"]').append('<option value="">Data Not Found!</option>');

                            } else {

                              // $('#ThicId_val[name="ThicID"]').empty();
                             //   $('#ThicId_val[name="ThicID"]').append('<option value="">Select Thickness</option>');

                                $.each(data, function(key, value) {
                                    $('#ThicId_val[name="ThicID"]').append('<option value="' + value.ThicId + '">' + value.ThicName + '</option>');
                                });
                            }

                        },
                    });
                } else {

                }
            });
            */

        });



        /* ================= Add To Cart  ================= */
        function addToCartDevice() {


            // alert('okkkk');
            /* ====== Catch Value ====== */
            var CategoryId = $('select[name="CategoryID"]').val();
            var BranId = $('select[name="BranID"]').val();
            var Size = $('select[name="SizeID"]').val();
            //  var Thickness = $('select[name="ThicID"]').val();

            // alert(Size);
            // Name
            var CategoryName = $('select[name="CategoryID"] option:selected').text();
            var BrandName = $('select[name="BranID"] option:selected').text();
            var SizeName = $('select[name="SizeID"] option:selected').text();



            var remarks = $('input[name="remarks"]').val();
            var UnitPrice = $('input[name="UnitPrice"]').val();
            var Qunatity = $('input[name="Qunatity"]').val();
            // alert(remarks);
            /* ====== Ajax Call ====== */
            $.ajax({
                url: "{{ route('product-purchase.addToCart') }}",
                type: "POST",
                dataType: "json",
                data: {
                    CategoryId: CategoryId,
                    BranId: BranId,
                    Size: Size,
                    // Thickness: 0,
                    UnitPrice: UnitPrice,
                    Qunatity: Qunatity,
                    // Name
                    CategoryName: CategoryName,
                    BrandName: BrandName,
                    SizeName: SizeName,
                    Remarks: remarks,
                },
                success: function(data) {
                    getOrderListInAddToCart();
                    // Clear

                    $('#CategoryID').val('');
                    $('#BranID').val('');
                    $('#SizeID').val('');
                    $('#Remarks').val('');
                    $('#UnitPrice').val('');
                    // $('#Qunatity').val('');

                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                },
            });

            /* _________ */
        }
        /* ================= Add To Cart Order List ================= */
        function getOrderListInAddToCart() {
            /* ====== Ajax Call ====== */
            $.ajax({
                url: "{{ route('product-purchase-listIn.addToCart') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {

                    var totalAmount = 0;

                    var rows = "";
                    $.each(response.carts, function(key, value) {
                        totalAmount += value.subtotal;
                        rows += `
                        <tr>
                        <td>${value.options.CategoryName}</td>
                        <td>${value.options.BrandName}</td>
                        <td>${value.options.SizeName}</td>
                        <td>${value.options.Remarks ?? ""}</td>
                        <td>${value.price} * ${value.qty}</td>
                        <td> ${value.subtotal} </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            ${value.qty > 1
                                ? ` <button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                : ` <button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`
                            }
                            <input type="text" class="form-control custom-form-control2" min="1" value="${value.qty}">
                            <button type="button" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                            </div>
                        </td>
                        <td>
                            <a style="cursor:pointer"  type="submit" title="delete" id="${value.rowId}" onclick="removeToCart(this.id)"><i class="fa fa-trash fa-lg delete_icon"></i></a>
                        </td>
                        </tr>

                `
                    });
                    $('#addToCartOrderList').html(rows);

                    $('input[id="NetAmount"]').val(totalAmount);
                    $('input[id="PayAmount"]').val(totalAmount);
                    $('input[id="temporaryField"]').val(totalAmount);

                },
            });
            /* _________ */
        }
        getOrderListInAddToCart();

        // Qunatity Increment
        function cartIncrement(rowId) {
            $.ajax({
                type: 'POST',
                url: "{{ route('QunatityIncrement') }}",
                data: {
                    rowId: rowId
                },
                dataType: 'json',
                success: function(data) {
                    getOrderListInAddToCart();
                }
            });
        }

        // Qunatity Decrement
        function cartDecrement(rowId) {
            $.ajax({
                type: 'POST',
                url: "{{ route('QunatityDecrement') }}",
                data: {
                    rowId: rowId
                },
                dataType: 'json',
                success: function(data) {
                    getOrderListInAddToCart();
                }
            });
        }

        // Remove Cart
        function removeToCart(id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('remove-cart') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    getOrderListInAddToCart();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }
    </script>
    @livewireScripts
    @yield('livewire_script')
</body>

</html>
