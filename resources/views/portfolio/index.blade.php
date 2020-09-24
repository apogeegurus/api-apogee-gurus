
@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portfolio</h1>
        <a href="{{route('portfolios.create')}}" class="btn btn-success">+ Create</a>
    </div>
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
                <div class="table-responsive">
                    <table class="table table-striped" style="table-layout: fixed">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created Date</th>
                            <th scope="col" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <th scope="row">{{$portfolio->id}}</th>
                                    <td><img src="{{ $portfolio->small_image . '?' . rand(0, 20000) }}" alt=""></td>
                                    <td>{{$portfolio->title}}</td>
                                    <td>{{$portfolio->created_at}}</td>
                                    <td class="text-right">
                                        <a href="{{route('portfolios.edit',['portfolio'=> $portfolio->id])}}" class="btn btn-primary" >Edit</a>
                                        <a href="{{route('portfolios.show',['portfolio'=> $portfolio->id])}}" class="btn btn-primary" >View</a>
                                        <button type="button" class="btn btn-danger delItem" data-url="{{route('portfolios.destroy',['portfolio' =>$portfolio->id ])}}" data-name="{{$portfolio->title}}" data-id="{{$portfolio->id}}" data-toggle="modal" data-target="#deleteModal">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $portfolios->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

