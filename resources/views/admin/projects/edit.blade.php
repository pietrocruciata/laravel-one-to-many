@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Edit Project</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.projects.update', $project) }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name project" value="{{old('name',$project->name)}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="description">{{old('description', $project->description)}}</textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">link github</label>
                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="link github" value="{{old('link_git',$project->link_git)}}">
            </div>

            <button class="btn btn-primary">Edit</button>
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