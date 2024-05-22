@extends('layout.main')

@section('title')
Create Contact
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-primary mb-3">Create Contact</h5>
                <form action="{{ route('contact-store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name">
                        <label for="floatingName">Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="phone" id="floatingPhone" placeholder="Phone">
                        <label for="floatingPhone">Phone</label>
                      </div>

                      <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Write a description" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Description</label>
                      </div>

                      <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
