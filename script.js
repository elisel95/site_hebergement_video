let title = $('#title');
let url = $('#url');

$('#validate').click(function(){
    if(title == "" && url == ""){
       
    }else{
        $('#form').hide();
        alert('Votre vidéo a été ajouté.');
    };
});