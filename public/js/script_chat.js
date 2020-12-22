// $(function(){
//     $("#formcom").submit(function(){
//        const nom = $(this).find("input[name=nom]").val();
//        const message = $(this).find("input[name=message]").val();
//        $.post("controller/chatController.php",{nom:nom, message:message},function(data){
//            alert(data.nom);
//            $('#messages').append(`<div>${nom}:${message}</div>`)
//        })
//        return false;
//     })

// });


const messagerieMenu = document.getElementById('menu-messagerie');
messagerieMenu.classList.add('active');

