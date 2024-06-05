@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Create project</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.projects.store') }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{old('name')}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"> {{old('description')}}</textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">link github</label>
                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="link github" value="{{old('link_git')}}">
            </div>

            <button class="btn btn-primary">Create</button>
            <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Back</a>
        </form>

        @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
    </div>
  </section>
</main>

@endsection