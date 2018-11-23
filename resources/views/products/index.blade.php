@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Products')}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Price</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            @if($products->count())
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>button</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                            <div class="col-md-3">{{$products->links()}}
                                <a href="{{ route('product.create') }}" class="btn btn-success">{{__('Create product')}}</a>
                            </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
