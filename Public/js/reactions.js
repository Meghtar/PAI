function like(post_id) {
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/?page=like',
        data: { 
            'post_id': post_id,
    },
        success: function(){
            let likes = parseInt($("#likes"+post_id).html());
            $("#likes"+post_id).html(likes + 1);
    }
});
}

function dislike(post_id) {
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/?page=dislike',
        data: { 
            'post_id': post_id,
    },
        success: function(){
            let likes = parseInt($("#dislikes"+post_id).html());
            $("#dislikes"+post_id).html(likes + 1);
    }
});
}