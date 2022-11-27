@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Glavni meni') }}
                </div>
                <h5 class="card-header">
                    @if(Auth::user()->user_role === 'superAdmin' || Auth::user()->user_role === 'admin')
                        <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Dodajte +</a>
                    @endif
                </h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Predmeti</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr>
                                    @if ($todo->completed)
                                        <td scope="row"><a href="{{ route('todo.edit', $todo->id) }}" style="color: black"><s>{{ $todo->title }}</s></a></td>
                                    @else
                                        <td scope="row"><a href="{{ route('todo.edit', $todo->id) }}" style="color: black">{{ $todo->title }}</a></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a>
                                        @if(Auth::user()->user_role === 'superAdmin')
                                        <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    @if(Auth::user()->user_role === 'superAdmin' || Auth::user()->user_role === 'admin')
                                        No Items Added!
                                    @endif    
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-body">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto fuga quos eos molestias. Explicabo, reiciendis
                            cum ex sapiente magni officiis excepturi eligendi officia
                            dolorem enim culpa eius vitae tempore earum?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
