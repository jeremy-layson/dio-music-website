$(document).ready(function(){
    $('.delete-button').on('click', function(e){
        var ans = confirm("Are you sure you want to delete this song?");
        if (ans === false) {
            e.preventDefault();
        }
        
    });    
});

