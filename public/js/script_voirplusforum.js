const formSendMsg = document.querySelector('.send-msg-forum');
const content = document.querySelector('.ipt-response-forum');
const forumId = document.querySelector('.forum-response-hidden');
const userId = document.querySelector('.forum-response-hidden-user');
const containerForum = document.querySelector('.one-forum');

var heightWindow = window.innerHeight;
const headerForum = document.querySelector('header');
const heightHeaderForum = parseInt(getComputedStyle(headerForum).height,10);

// mainChat.style.minHeight = `${}`

const getSizeForum = ()=>{
    containerForum.style.height = `${heightWindow-heightHeaderForum-270}px`;
}
getSizeForum();

window.addEventListener('resize', function(){
    getSizeForum();
});


const today = ()=>{
    const thisDate = new Date();
    const thisDay = thisDate.getDay();
    let thisMonth = thisDate.getMonth();
    if(thisMonth == 0){
        thisMonth = "Janvier";
    }
    if(thisMonth == 1){
        thisMonth = "Février";
    }
    if(thisMonth == 2){
        thisMonth = "Mars";
    }
    if(thisMonth == 3){
        thisMonth = "Avril";
    }
    if(thisMonth == 4){
        thisMonth = "Mai";
    }
    if(thisMonth == 5){
        thisMonth = "Juin";
    }
    if(thisMonth == 6){
        thisMonth = "Juillet";
    }
    if(thisMonth == 7){
        thisMonth = "Août";
    }
    if(thisMonth == 8){
        thisMonth = "Septembre";
    }
    if(thisMonth == 9){
        thisMonth = "Octobre";
    }
    if(thisMonth == 10){
        thisMonth = "Novembre";
    }
    if(thisMonth == 11){
        thisMonth = "Décembre";
    }
    const thisYear = thisDate.getFullYear();
    return `${thisDay} ${thisMonth} ${thisYear}`
}
function getMessages(contenu){
    // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "controller/requetesAjax/getInfos.php");
    // requeteAjax.open("GET", "controller/getForum.php");
  
    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    requeteAjax.onload = function(){
       const resultat = JSON.parse(requeteAjax.responseText);
       const thisUser = resultat.users.filter((user)=>{ return user.user_id == userId.value});
       const thisForum = resultat.forums.filter((forum)=>{ return forum.forum_id == forumId.value});
       const classResponse = thisForum[0].user_id === thisUser[0].user_id? 'voir-plus-quest': 'voir-plus-response';
       let html = `<div class="${classResponse} d-flex">
       <div class="forum-user-pp" style="background-image:url('uploads/${thisUser[0].user_picture} ')"></div>
       <div>
           <p class="resp-name"><strong>${thisUser[0].user_firstname} ${thisUser[0].user_name}</strong></p>
           <p class="date">${today()}</p>
           <p>${contenu}</p>
       </div>
   </div>`;
        containerForum.innerHTML +=html;
    //   messages.innerHTML = html;
       containerForum.scrollTop = containerForum.scrollHeight;
    }
    requeteAjax.send();
  }

function postMessage(event){
  // 1. Elle doit stoper le submit du formulaire
  event.preventDefault();

  // 2. Elle doit récupérer les données du formulaire
  // const author = document.querySelector('#author');
  if(content.value!==""){

    // 3. Elle doit conditionner les données
    const data = new FormData();
    // data.append('author', author.value);
    data.append('content', content.value);
    data.append('forumId', forumId.value);
    data.append('userId', userId.value);

    // 4. Elle doit configurer une requête ajax en POST et envoyer les données
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'controller/requetesAjax/newMsg.php?task=write');
    
    requeteAjax.onload = function(){
        setTimeout(function(){ 
            getMessages(content.value); 
            content.value = '';
            content.focus();
        }, 300);
    }
    requeteAjax.send(data);
  }
}

formSendMsg.addEventListener('submit', postMessage);
// getMessages();

