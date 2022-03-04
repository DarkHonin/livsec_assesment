@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user())
                <groceries-component />
            @else
                Welcome
            @endif
        </div>
    </div>
</div>
@endsection
