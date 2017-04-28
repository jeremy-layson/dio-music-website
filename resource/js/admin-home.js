$(document).ready(function(){
    $('.delete-button').click(function(e){
        var check = confirm("Are you sure you want to delete this item?");
        if (check === false) {
            e.preventDefault();
        }
    });

    $('.switch-input').click(function(e){
        alert($(this).attr('data-value'));
    });
});