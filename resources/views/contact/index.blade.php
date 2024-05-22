@extends('layout.main')
@section('title')
Contact Page
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger">
        {{session('delete')}}
    </div>

    @endif
            <div class="card">
                <div class="card-body">
                    <h3 class="text-primary">Contact Lists</h3>


                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)

                            <tr>
                                <th>{{ $contact->id }}</th>
                                <td>{{ $contact->name}}</td>
                                <td>{{ $contact->phone}}</td>
                                <td>{{$contact->description}}</td>
                                <td>{{$contact->created_at->format('h:i a')}}</td>
                                <td>
                                    <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{route('contact.destroy',$contact->id)}}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection
