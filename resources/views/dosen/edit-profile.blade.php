@extends('layouts.app')

@section('content')
@if (session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
@endif
<h1>Edit Profile</h1>
<hr>
<br>
    <form method="POST" action="/dosen/{{auth()->user()->id}}" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            {{-- {{ old('title') ? old('title') : $quote->title}} --}}
            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $dosen->name}}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $dosen->email}}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('No. Telepon') }}</label>

            <div class="col-md-6">
                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') ? old('phone') : $dosen->phone}}" required>

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="bidang_ilmu" class="col-md-4 col-form-label text-md-right">{{ __('Bidang Ilmu') }}</label>

            <div class="col-md-6">
                <input id="bidang_ilmu" type="text" class="form-control{{ $errors->has('bidang_ilmu') ? ' is-invalid' : '' }}" name="bidang_ilmu" value="{{ old('bidang_ilmu') ? old('bidang_ilmu') : $dosen->bidang_ilmu}}" required>

                @if ($errors->has('bidang_ilmu'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('bidang_ilmu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') ? old('address') : $dosen->address}}" required>

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @csrf
        @method('PUT')
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Edit') }}
                </button>
            </div>
        </div>
    </form>
@endsection
