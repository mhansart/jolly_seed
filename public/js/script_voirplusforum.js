import { ajaxGet, ajaxPost, today } from "./src/helpers.js";
const formSendMsg = document.querySelector(".send-msg-forum");
const content = document.querySelector(".ipt-response-forum");
const forumId = document.querySelector(".forum-response-hidden");
const userId = document.querySelector(".forum-response-hidden-user");
const forumMenu = document.getElementById("forum-menu");
const containerForum = document.querySelector(".one-forum");

forumMenu.classList.add("active");

// fonction qui va chercher les infos du user (ajax GET) et fait apparaitre les message après la requete ajax
function getMessages(contenu) {
  ajaxGet("ajax/getInfos.php").then((reponse) => {
    const needHour = false;
    const oldNewResponse = document.querySelector(".new-response-forum");
    if (oldNewResponse) {
      oldNewResponse.classList.remove("new-response-forum");
    }
    const resultat = JSON.parse(reponse);
    const thisUser = resultat.users.filter((user) => {
      return user.user_id == userId.value;
    });
    const thisForum = resultat.forums.filter((forum) => {
      return forum.forum_id == forumId.value;
    });
    const classResponse =
      thisForum[0].user_id === thisUser[0].user_id
        ? "voir-plus-quest"
        : "voir-plus-response";
    let html = `<div class="${classResponse} d-flex new-response-forum" style="opacity:0">
       <div class="forum-user-pp" style="background-image:url('uploads/${
         thisUser[0].user_picture
       } ')"></div>
       <div>
           <p class="resp-name"><strong>${thisUser[0].user_firstname} ${
      thisUser[0].user_name
    }</strong></p>
           <p class="date">${today(needHour)}</p>
           <p>${contenu}</p>
       </div>
   </div>`;
    containerForum.innerHTML += html;
    let opacity = 0;
    let intervalID = 0;
    window.onload = fadeIn;
    function fadeIn() {
      setInterval(show, 100);
    }

    function show() {
      const newResponse = document.querySelector(".new-response-forum");
      opacity = Number(
        window.getComputedStyle(newResponse).getPropertyValue("opacity")
      );
      if (opacity < 1) {
        opacity = opacity + 0.1;
        newResponse.style.opacity = opacity;
      } else {
        clearInterval(intervalID);
      }
    }
    fadeIn();
  });
}

// fonction qui envoie la requete ajax POST
function postMessage(event) {
  event.preventDefault();
  if (content.value !== "") {
    const data = new FormData();

    data.append("content", content.value);
    data.append("forumId", forumId.value);
    data.append("userId", userId.value);

    ajaxPost("ajax/newMsg.php?task=write", data).then(() => {
      setTimeout(function () {
        getMessages(content.value);
        content.value = "";
        content.focus();
      }, 300);
    });
  }
}

formSendMsg.addEventListener("submit", postMessage);
