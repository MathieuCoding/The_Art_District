// Comments in ajax
$(document).ready(function (){
    // console.log('bienvenue dans mon code jquery');
    $('#commentForm').submit(function(event) {
        // n'envoie pas les données, stop la propagation de l'évènement
        event.preventDefault();
        let comment = $('#InputComment').val();
        let userPseudo = $('#pseudo').val();
        // date not used
        let date = new Date;
        // console.log(comment);
        $.post('', { comment: comment });
        $('<div><p>' + comment + '</p><footer class="blockquote-footer">Written by<cite title="Source Title"> ' + userPseudo + '</cite></footer></div>').prependTo('#comments');
        //On vide le champ de commentaire
        $('#InputComment').val('');

    }) 
})