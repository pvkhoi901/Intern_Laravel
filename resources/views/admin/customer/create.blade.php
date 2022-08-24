<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Create Customer</title>
</head>

<body>

@if(empty($customer))
    <form method="post" action="{{route('customer.store')}}">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
@else
    <form method="post" action="{{route('customer.update', $customer->id)}}">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
@endif
                    <a href="{{ route('customer.index') }}" class="btn btn-primary" style="margin-left: 25px; margin-top: 10px;">
                        Back
                    </a>
                    <div class="container-fluid">
                        <label for="customer_id" class="form-label">Mã khách hàng</label>
                        <input name="customer_id" id="id" class="form-control mb-2 @error('customer_id') is-invalid @enderror" value="{{ old('customer_id', $customer->customer_id ?? '') }}">
                        @error('customer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="name" class="form-label">Thông tin khách hàng</label>
                        <input name="name" id="id" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ old('name', $customer->name ?? '') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input name="address" id="id" class="form-control mb-2 @error('address') is-invalid @enderror" value="{{ old('address', $customer->address ?? '') }}">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="phone" class="form-label">Điên thoại</label>
                        <input name="phone" type="tel" id="id" class="form-control mb-2 @error('phone') is-invalid @enderror" value="{{ old('phone', $customer->phone ?? '') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="container-fluid">
                        <label for="phone_zalo" class="form-label">Số zalo</label>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        @if(!empty($customer))
                                        @foreach($customer->phone_zalos as $phone_zalo)
                                        <div class="input-group mb-3">
                                            <input type="tel" name="phone_zalo[]" class="form-control m-input" placeholder="" value="{{$phone_zalo->phone_zalo}}" autocomplete="off">
                                            <div class="input-group-append">
                                                <button id="removeRow" type="button" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="input-group mb-3">
                                            <input type="tel" name="phone_zalo[]" class="form-control m-input" placeholder="" value="" autocomplete="off">
                                            <div class="input-group-append">
                                                <button id="removeRow" type="button" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div id="newRow"></div>
                                    <button id="addRow" type="button" class="btn btn-info" style="margin-top: -15px;">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="container-fluid" style="margin-top: 10px;">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="id" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email', $customer->email ?? '') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="contact" class="form-label">Người liên hệ</label>
                        <input name="contact" id="id" class="form-control mb-2" value="{{ old('contact', $customer->contact ?? '') }}">
                        @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="position" class="form-label">Chức vụ</label>
                        <input name="position" id="id" class="form-control mb-2 @error('position') is-invalid @enderror" value="{{ old('position', $customer->position ?? '') }}">
                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="unit" class="form-label">Tên đơn vị</label>
                        <input name="unit" id="id" class="form-control mb-2 @error('unit') is-invalid @enderror" value="{{ old('unit', $customer->unit ?? '') }}">
                        @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="tax_code" class="form-label">Mã số thuế</label>
                        <input name="tax_code" id="id" class="form-control mb-2 @error('tax_code') is-invalid @enderror" value="{{ old('tax_code', $customer->tax_code ?? '') }}">
                        @error('tax_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="container-fluid">
                        <label for="invoice_address" class="form-label">Địa chỉ hóa đơn</label>
                        <textarea name="invoice_address" id="id" class="form-control mb-2 @error('invoice_address') is-invalid @enderror">{{ old('invoice_address', $customer->invoice_address ?? '') }}</textarea>
                        @error('invoice_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="container-fluid">
                        <label for="bank_account" class="form-label">Tài khoản ngân hàng</label>
                        <input name="bank_account" id="id" class="form-control mb-2 @error('bank_account') is-invalid @enderror" value="{{ old('bank_account', $customer->bank_account ?? '') }}">
                        @error('bank_account')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label for="type" class="form-label">Loại khách</label>
                        <select id="type" name="type" class="form-select" aria-label="Default select example">
                            <option value="{{ old('type', $customer->type ?? '')}}" selected disabled hidden>{{ old('type', $customer->type ?? '')}}</option>
                            <option value="Khách vip">Khách vip</option>
                            <option value="Khách thông thường">Khách thông thường</option>
                            <option value="Khách vãng lai">Khách vãng lai</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <input type="checkbox" name="" id="" value=""> Chia sẻ quyền cho kế toán
                        <br>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="" id="" value=""> Khoá tạo đơn hàng, khách hàng đã quá hạn mức
                    </div> -->
                    <div class="mb-3">
                        <label for="term_debt" class="form-label">Mô tả nợ hạn định </label>
                        <textarea name="term_debt" id="" cols="80" rows="5">{{ old('term_debt', $customer->term_debt ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="allowable_debt_limit" class="form-label"> Hạn mức nợ cho phép</label>
                        <input name="allowable_debt_limit" id="id" class="form-control mb-2" value="{{ old('allowable_debt_limit', $customer->allowable_debt_limit ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description_allowable_debt" class="form-label">Mô tả nợ cho phép</label>
                        <textarea name="description_allowable_debt" id="" cols="80" rows="5">{{ old('description_allowable_debt', $customer->description_allowable_debt ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="customer_notes">Ghi chú khách hàng</label>
                        <textarea name="customer_notes" id="default">{{ old('customer_notes', $customer->customer_notes ?? '') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>


    <script th:src="@{/webjars/jquery/jquery.min.js}"></script>
    <script th:src="@{/webjars/popper.js/umd/popper.min.js}"></script>
    <script th:src="@{/webjars/bootstrap/js/bootstrap.min.js}"></script>
    <script th:src="@{/assets/summernote/summernote-bs4.js}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="tel" name="phone_zalo[]" class="form-control m-input" placeholder="" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Xóa</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('.input-group').remove();
        });
    </script>
</body>

</html>