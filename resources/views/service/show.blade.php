
@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service {{$service->title}}</h1>
        <a href="{{route('services.create')}}" class="btn btn-success">+ Create</a>
    </div>
    <div class="row p-3">
        <div class="card shadow mb-4 col-12">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>
                            Title:
                        </b>
                        {{$service->title}}
                    </li>
                    <li class="list-group-item">
                        <b>
                            Description:
                        </b>
                        {{$service->description}}
                    </li>
                </ul>

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
