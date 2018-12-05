@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Roles')}}</div>
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
                                <td>Discount</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            @if($roles->count())
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->title}}</td>
                                        <td>{{$role->discount}}</td>

                                        <td>
                                            <form action="{{route('role.edit', ['id' => $role->id])}}" method="GET">
                                                <button type="submit" class="btn btn-info" >{{__('Edit role')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                        <div class="col-md-3">
                            {{$roles->links()}}
                            <a href="{{ route('role.create') }}" class="btn btn-success">{{__('Create role')}}</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
