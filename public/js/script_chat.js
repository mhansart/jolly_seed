import {ajaxGet, ajaxPost} from './src/helpers.js';
const messagerieMenu = document.getElementById('menu-messagerie');
messagerieMenu.classList.add('active');
const containerChats = document.querySelector('.msgs-chat');
const formSendMsg = document.querySelector('.send-msg-chat');
const content = document.querySelector('.ipt-response-chat');
const receiverId = document.querySelector('.receiver-id');
const userId = document.querySelector('.chat-response-hidden-user');
window.addEventListener('load', function()
	{
	containerChats.scrollTo(0,10000000);
	}, false);
const today = ()=>{
    const thisDate = new Date();
    const thisDay = thisDate.getDate();
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
    const thisHour = thisDate.getHours();
    const thisMin = thisDate.getMinutes();
    return `${thisDay} ${thisMonth} ${thisYear} ${thisHour}h${thisMin}`
}

function getMessages(contenu){
    ajaxGet("ajax/getInfos.php").then((reponse) => {
       const resultat = JSON.parse(reponse);
       const noChat = document.querySelector('.no-chat');
       if(noChat){
       noChat.innerHTML="";
       }
       const oldNewResponse = document.querySelector('.new-response-chat');
       if(oldNewResponse){
       oldNewResponse.classList.remove('new-response-chat');
       }

       const thatUser = resultat.users.filter((user)=>{ return user.user_id == receiverId.value});
       let html = `<div class="sender-user new-response-chat" style="opacity:0">
                    <div class="infos-msg-text">
                        <div class="msg-text-chat" >${contenu}</div><div class="msg-date-chat">${today()}</div></div></div>`;
        containerChats.innerHTML +=html;
        containerChats.scrollTop = containerChats.scrollHeight;
        let opacity = 0; 
        let intervalID = 0; 
        window.onload = fadeIn;
        function fadeIn() { 
            setInterval(show, 80); 
        } 
  
        function show() { 
            const newResponse = document.querySelector('.new-response-chat');
            opacity = Number(window.getComputedStyle(newResponse) 
                             .getPropertyValue("opacity")); 
            if (opacity < 1) { 
                opacity = opacity + 0.1; 
                newResponse.style.opacity = opacity;
            } else { 
                clearInterval(intervalID); 
            } 
        } 
        fadeIn();
    })
  }

function postMessage(event){

  event.preventDefault();

  if(content.value!==""){

    const data = new FormData();
 
    data.append('content', content.value);
    data.append('receiverId', receiverId.value);
    data.append('userId', userId.value);

    ajaxPost("ajax/newResponseChat.php?task=write",data).then(() => {
        setTimeout(function(){ 
            getMessages(content.value); 
            content.value = '';
            content.focus();
        }, 300);
    })
  }
}

formSendMsg.addEventListener('submit', postMessage);

