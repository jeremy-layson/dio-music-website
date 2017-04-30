$(document).ready(function(){
    $('.delete-button').click(function(e){
        var check = confirm("Are you sure you want to delete this item?");
        if (check === false) {
            e.preventDefault();
        }
    });

    $('.switch-input').on('click', function(e){
        $.ajax({
            type: 'POST',
            url: '/api/activate',
            data: {'value': $(this).is(':checked'), 'id': $(this).data('id'), 'type': $(this).data('type')},
            success: function (data){
                
            },
            async:false
        });
    });
});