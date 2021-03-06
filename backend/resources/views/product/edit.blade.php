@extends('layouts.app')

@section('title', '製品編集')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">


                <form class="border border-light p-5" method="POST"
                    action="{{ route('product.update', ['product' => $product->id]) }}">
                    @method('PATCH')
                    @csrf

                    <p class="h4 mb-4 text-center">製品編集</p>

                    <div class="form-group row">
                        <input type="text" id="defaultUpdateFormProductName" class="form-control" placeholder="製品名"
                            value="{{ $product->name }}" name="name">
                        <small id="defaultUpdateFormProductNameHelpBlock" class="form-text text-muted">製品名は半角英数字記号スペース(-_
                            )にしてください。</small>
                        <div class="valid-feedback">適切な製品名の形式となっています。</div>
                        <div class="invalid-feedback">製品名は半角英数字記号スペース(-_ )にしてください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="text" id="defaultUpdateFormVendorURL" class="form-control" placeholder="ベンダURL"
                            value="{{ $product->vendor_url }}" name="vendor_url">
                        <small id="defaultUpdateFormVendorURLHelpBlock" class="form-text text-muted">
                            ベンダURLはアクセス可能な正しいURLにしてください。<br />
                            例(https://www.google.com/)
                        </small>
                        <div class="valid-feedback">
                            適切なベンダURLの形式となっています。
                        </div>
                        <div class="invalid-feedback">
                            ベンダURLはアクセス可能な正しいURLにしてください。<br />
                            例(https://www.google.com/)
                        </div>
                    </div>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultUpdateFormPart" name="part" required>
                            <option value="{{ $product->part }}" selected>{{ $product->part }}</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Operating System">Operating System</option>
                            <option value="Application">Application</option>
                        </select>
                        <div class="valid-feedback">適切な選択となっています。</div>
                        <div class="invalid-feedback">適切な選択肢を選んでください。</div>
                    </div>


                    <button class="btn btn-info btn-block" type="submit" id="defaultUpdateButton">Update</button>

                </form>

            </div>
        </div>
    </div>
@include('javascript.validate_update_product')

@endsection
