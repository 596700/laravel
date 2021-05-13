@extends('layouts.app')

@section('title', '製品登録')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                <form class="border border-light p-5" method="POST" action="{{ route('product.store') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">製品登録</p>

                    <div class="form-group row">
                        <input type="text" id="defaultSaveFormProductName" class="form-control" placeholder="製品名"
                            value="{{ old('name') }}" name="name" required>
                        <small id="defaultSaveFormProductHelpBlock" class="form-text text-muted">製品名は半角英数字記号スペース(-_
                            )にしてください。</small>
                        <div class="invalid-feedback">製品名は半角英数字記号スペース(-_ )にしてください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="text" id="defaultSaveFormVendorURL" class="form-control" placeholder="ベンダURL"
                            value="{{ old('vendor_url') }}" name="vendor_url" required>
                        <small id="defaultSaveFormVendorURLHelpBlock"
                            class="form-text text-muted">
                            ベンダURLはアクセス可能な正しいURLにしてください。<br />
                            例(https://www.google.com/)
                        </small>
                        <div class="invalid-feedback">
                            ベンダURLはアクセス可能な正しいURLにしてください。<br />
                            例(https://www.google.com/)
                        </div>
                    </div>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultSaveFormPart" name="part" required>
                            <option value="" disabled selected>選択肢を選んでください</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Operating System">Operating System</option>
                            <option value="Application">Application</option>
                        </select>
                        <div class="invalid-feedback">適切な選択肢を選んでください。</div>
                    </div>

                    <button class="btn btn-info btn-block" type="submit" id="defaultSaveButton" disabled>Save</button>
                </form>
            </div>
        </div>
    </div>
    @include('javascript.validate_create_product')

@endsection
