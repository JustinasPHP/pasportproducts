@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('New product  ')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('product.store') }}" method="POST" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-check-label">{{__('Title')}}</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                                @if($errors->has('title'))
                                        <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price" class="form-check-label">{{__('Price')}}</label>
                                <input class="form-control" min="0"  name="price" id="price" placeholder="Price" value="0.01">
                                @if($errors->has('price'))
                                    <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{__('Patvirtinti')}}</button>
                                <a href="{{ route('product.index') }}" class="btn btn-success">{{__('Grįžti')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
