@extends('layouts.app_welcome')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center"><h3>Halaman Home</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection