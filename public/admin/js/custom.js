$(document).on('keydown', '.readonly', function(e) {
    e.preventDefault();
});

$(document).on('click', '#place_submit', function(e) {
    e.preventDefault();
    if($('#type_hidden_value').val()!='') $('#place_form').submit();
    else{alert('error');}

});


$(document).on('click', '.type_id', function(e) {
    $('#type_hidden_value').val($(this).attr('data-val'));
});

$(document).on('click', '.ftype_id', function(e) {
    let typeId = $(this).attr('data-val');
    $('#type_hidden_value').val(typeId);
    $('.common').hide();
    if(typeId == 1){
        $('.from_domestic').show();
        $('.to_domestic').show();
    }else{
        $('.from_non_domestic').show();
        $('.to_non_domestic').show();
    }
});

$(document).on('click', '.from_id', function(e) {
    $('#from_type_hidden').val($(this).attr('data-val'));
});

$(document).on('click', '.to_id', function(e) {
    $('#to_type_hidden').val($(this).attr('data-val'));
});

function showAjaxLoaderMessage() {
    swal({
        title: "An input!",
        type: "button",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Write something"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("You need to write something!"); return false
        }
        swal("Nice!", "You wrote: " + inputValue, "success");
    });
}





