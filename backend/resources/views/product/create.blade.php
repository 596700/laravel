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


                    <input type="text" id="defaultSaveFormProductName" class="form-control" placeholder="製品名"
                        value="{{ old('name') }}" name="name">

                    <small id="defaultRegisterFormProductHelpBlock"
                        class="form-text text-muted mb-4">製品名は英数字記号(-_)にしてください</small>

                    <input type="text" id="defaultSaveFormVendorURL" class="form-control" placeholder="ベンダURL"
                        value="{{ old('vendor_url') }}" name="vendor_url">

                    <select class="mdb-select md-form mb-4 initialized" id="select" name="part" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Operating System">Operating System</option>
                        <option value="Application">Application</option>
                    </select>


                    <button class="btn btn-info btn-block" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
