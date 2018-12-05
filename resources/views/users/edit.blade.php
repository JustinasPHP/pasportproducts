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

                        <form action="{{ route('user.update', [$user->id])}}" method="POST" class="form">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-check-label">{{__('Name')}}</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-check-label">{{__('Email')}}</label>
                                <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            @if($roles->count())
                                <div class="form-group">
                                    <label class="">{{__('Roles')}}</label>
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" id="role_{{$role->id}}" name="role_id[]" class="form-check-input" value="{{$role->id}}" {{ in_array($role->id, array_keys($user->roles->groupBy('id')->toArray())) ? 'checked="checked"': ''}}>
                                            <label for="role_{{$role->id}}" class="">{{$role->title}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{__('Patvirtinti')}}</button>
                                <a href="{{ route('user.index') }}" class="btn btn-success">{{__('Grįžti')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
