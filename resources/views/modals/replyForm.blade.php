<div class="modal fade" id="replyFormModal" tabindex="-1" role="dialog" aria-labelledby="replyFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form style="padding: 15px" method="post" id="replyForm" action="{{route('contacts.reply')}}">
                @csrf
                <input type="hidden" name="id" id="replyId">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Reply Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reply_message" required></textarea>
                </div>
                <input type="button" id="sendReplyForm" value="Send" class="btn btn-success">
            </form>
        </div>
    </div>
</div>

