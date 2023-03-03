let title = $('#title');
let url = $('#url');

$('#validate').click(function(){
    if(title == "" && url == ""){
       
    }else{
        $('#form').hide();
        alert('Votre vidéo a été ajouté.');
    };
});

$('.delete').click(function(){
    $(".video_full").append('<p>Votre vidéo a été supprimer</p>');
    alert('Votre vidéo a été supprimer!');
})