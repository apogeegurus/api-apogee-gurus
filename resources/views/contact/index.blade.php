
@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contacts</h1></div>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>
                                    @if($contact->status)
                                        <span class="badge badge-success">REPLIED</span>
                                    @else
                                        <span class="badge badge-warning">WAITING TO REPLY</span>

                                    @endif
                                </td>
                                <td class="text-right">
                                    @if($contact->status)
                                        <button class="btn btn-success showMessage" data-message="{{$contact->reply_message}}" >Replied</button>
                                    @else
                                        <button class="btn btn-info" data-id="{{$contact->id}}"  id="openReplyForm" >Reply</button>
                                    @endif
                                        <button class="btn btn-info showMessage" data-message="{{$contact->message}}">View Message</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@include('.modals.replyForm')
@include('.modals.showMessage')
@endsection
@push('script')
    <script>
        $(document).on('click','#openReplyForm',function(){
            let id = $(this).attr('data-id');
            $('#replyId').val(id);
            $('#replyFormModal').modal('show');
        });

        $(document).on('click','.showMessage',function(){
            let message = $(this).attr('data-message');
            $('#replyMessage').text(message);
            $('#showMessageModal').modal('show');
        });
        $(document).on('click','#sendReplyForm',function (e) {
            $(this).attr('disabled',true);
            $('#replyForm').submit();
        })
    </script>
@endpush

