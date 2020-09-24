
@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Services</h1>
        <a href="{{route('services.create')}}" class="btn btn-success">+ Create</a>
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
                            <th scope="col">Status</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created Date</th>
                            <th scope="col" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <th scope="row">{{$service->id}}</th>
                                    <th>
                                        <input type="checkbox" @if($service->status) checked @endif data-toggle="toggle" data-id="{{$service->id}}" data-onstyle="outline-success" data-offstyle="outline-danger">

                                    </th>
                                    <td>{{$service->icon}}</td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->created_at}}</td>
                                    <td class="text-right">
                                        <a href="{{route('services.edit',['service'=> $service->id])}}" class="btn btn-primary" >Edit</a>
                                        <a href="{{route('services.show',['service'=> $service->id])}}" class="btn btn-primary" >View</a>
                                        <button type="button" class="btn btn-danger delItem" data-url="{{route('services.destroy',['service' =>$service->id ])}}" data-name="{{$service->title}}" data-id="{{$service->id}}" data-toggle="modal" data-target="#deleteModal">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $services->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection
@push('script')
    <script>

        $(document).ready(function(){
            //status change
            $('input:checkbox').change(function() {
                this.value = this.checked ? 1 : 0;
                let id = $(this).attr('data-id');
                $.ajax({
                    method: 'post',
                    url: '{{route('services.changeStatus')}}',
                    data:{
                        id: id,
                        val: this.value,
                    }
                });

            });
            //status change end

            //delete service modal open

        });

    </script>
@endpush
