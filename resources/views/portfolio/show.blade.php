
@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portfolio {{$portfolio->title}}</h1>
        <a href="{{route('portfolios.create')}}" class="btn btn-success">+ Create</a>
    </div>
    <div class="row p-3">
        <div class="card shadow mb-4 col-12">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>
                            Title:
                        </b>
                        {{$portfolio->title}}
                    </li>
                    <li class="list-group-item">
                        <b>
                            Description:
                        </b>
                        {{$portfolio->description}}
                    </li>
                    <li class="list-group-item">
                        <img src="{{$portfolio->original_image}}" id="shownImage" alt="">
                    </li>
                </ul>

            </div>
        </div>

    </div>


@endsection

