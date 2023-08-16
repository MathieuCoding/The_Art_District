///////////// Comment section made in ajax using jQuery /////////////////////////
$(document).ready(function (){
    $('#commentForm').submit(function(event) {
        // method that cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur
        event.preventDefault();
        // store de comment's value in a variable
        let comment = $('#InputComment').val();
        // store de username's value in a variable
        let userPseudo = $('#pseudo').val();
        // date to be used in the comment section if needed
        // let date = new Date;
        // HTTP POST request request '' page and send comment data
        $.post('', { comment: comment });
        // Insert new comment at the beginning of the #comments section
        $('<div><p>' + comment + '</p><footer class="blockquote-footer">Written by<cite title="Source Title"> ' + userPseudo + '</cite></footer></div>').prependTo('#comments');
        //Empty the comment's field
        $('#InputComment').val('');
    }) 
})