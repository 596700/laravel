@extends('layouts.app')

@section('title', 'バージョン編集')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">


                <form class="border border-light p-5" method="POST"
                    action="{{ route('version.update', ['version' => $version->id]) }}">
                    @method('PATCH')
                    @csrf

                    <p class="h4 mb-4 text-center">バージョン編集</p>

                    <input type="text" id="defaultSaveFormVersion" class="form-control" placeholder="バージョン名"
                        value="{{ $version->version }}" name="version">
                    <br />

                    <button class="btn btn-info btn-block" type="submit">Save</button>

                </form>

            </div>
        </div>
    </div>

@endsection
