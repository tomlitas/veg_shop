@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
           <div class="card">
                <div class="card-header"><h4>Image Upload</h4></div>
                <div class="card-body">
                    <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('imade')
                               <div class="alert alert-dander">{{ $message }}</div>
                            @enderror
                        </div> 
                        <button class="btn btn-success m-3">Upload</button>
                   </form>
                   @foreach ($images as $image)
                        <img src="{{ asset($image->path) }}" alt="drugelis">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection