
@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portfolios</h1>
        <a href="{{route('portfolios.index')}}" class="btn btn-success">Portfolios</a>
    </div>

    <!-- Content Row -->
    <div class="row p-3">
        <div class="card shadow mb-4 col-12">
            <div class="card-body">
                <form style="width: 100%" method="post" action="{{route('portfolios.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="portfolioTitle">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="portfolioTitle" value="{{ old('title') }}" >
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="portfolioDescription">Description</label>
                        <textarea class="form-control" name="description" id="portfolioDescription" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="portfolioUrl">Url</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="portfolioUrl" value="{{ old('url') }}" >
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="portfolioFile" name="image"
                                       aria-describedby="inputGroupFileAddon01">

                                <label class="custom-file-label" for="portfolioFile">Choose file</label>
                            </div>
                            @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

        </div>



    </div>

    <!-- Content Row -->

@endsection
@push('script')
    <script src="{{asset('ckEditor5/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#portfolioDescription' ),{
            minHeight: '300px'
        } )
            .then( editor => {

            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
