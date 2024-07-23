@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Sembako Dashboard</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Manage Categories</a>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
        </div>
    </div>
</div>
@endsection
