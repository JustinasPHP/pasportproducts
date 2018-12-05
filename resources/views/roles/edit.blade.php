@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Edit role')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('role.update', $role->id)}}" method="POST" class="form">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-check-label">{{__('Title')}}</label>
                                <input class="form-control" type="text" name="title" id="title" value="{{$role->title}}">
                                @if($errors->has('title'))
                                    <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="discount" class="form-check-label">{{__('Discount')}}</label>
                                <input class="form-control" type="numeric" name="discount" id="discount" value="{{$role->discount}}">
                                @if($errors->has('discount'))
                                    <div class="alert alert-danger">{{$errors->first('discount')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{__('Patvirtinti')}}</button>
                                <a href="{{ route('role.index') }}" class="btn btn-success">{{__('Grįžti')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
