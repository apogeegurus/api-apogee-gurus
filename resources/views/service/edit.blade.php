
@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Services</h1>
        <a href="{{route('services.index')}}" class="btn btn-success">Services</a>
    </div>

    <!-- Content Row -->
    <div class="row p-3">
        <div class="card shadow mb-4 col-12">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form style="width: 100%" method="POST" action="{{route('services.update',['service'=> $service->id])}}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="serviceIcon">Icon</label>
                        <input  type="text" class="form-control @error('icon') is-invalid @enderror"  name="icon" id="serviceIcon" value="{{$service->icon }}" >
                        @error('icon')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="serviceTitle">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="serviceTitle" value="{{ $service->title }}" >
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="serviceDesc">Description</label>
                        <textarea class="form-control" name="description" id="serviceDesc" rows="3">{{$service->description}}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="serviceStatus" name="status" @if($service->status) checked @endif >
                        <label class="form-check-label" for="serviceStatus">Active</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

        </div>



    </div>

    <!-- Content Row -->


    @push('script')
        <script>
            $('#serviceStatus').on('change', function(){
                this.value = this.checked ? 1 : 0;

            }).change();
        </script>
    @endpush
@endsection
