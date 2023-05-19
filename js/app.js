// Comments in ajax
$(document).ready(function (){
    $('#commentForm').submit(function(event) {
        // method that cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur.
        event.preventDefault();
        let comment = $('#InputComment').val();
        let userPseudo = $('#pseudo').val();
        // date not used TO USE
        // let date = new Date;
        $.post('', { comment: comment });
        $('<div><p>' + comment + '</p><footer class="blockquote-footer">Written by<cite title="Source Title"> ' + userPseudo + '</cite></footer></div>').prependTo('#comments');
        //Empty the comments field
        $('#InputComment').val('');
    }) 
})