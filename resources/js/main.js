
//delete
let _this,url;
$(document).on('click','.delItem',function(e){
     _this = this;
     url = $(this).attr('data-url');
    $('#itemName').text($(this).attr('data-name'));

});

$('#deleteItemButton').on('click',function(){
    $.ajax({
        type: 'post',
        url: url,
        data: {
            _method: 'Delete'
        },
        success:function(res){
            if(res.success){
                $('#deleteModal').modal('hide');
                _this.closest('tr').remove();

            }
        },
    });
});

//end delete
