@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Users')}}</div>
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
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            @if($users->count())
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{!!  implode(', ', array_values($user->roles->pluck('title')->toArray()))!!}</td>
                                        <td>
                                            <form action="{{route('user.edit', ['id' => $user->id])}}" method="GET">
                                                <button type="submit" class="btn btn-info" >{{__('Edit user')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                        <div class="col-md-3">
{{--                            {{$users->links()}}--}}
                            <a href="{{ route('user.create') }}" class="btn btn-success">{{__('Create user')}}</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
