import { ajaxGet, ajaxPost, today } from "./src/helpers.js";
const messagerieMenu = document.getElementById("menu-messagerie");
messagerieMenu.classList.add("active");
const containerChats = document.querySelector(".msgs-chat");
const formSendMsg = document.querySelector(".send-msg-chat");
const content = document.querySelector(".ipt-response-chat");
const receiverId = document.querySelector(".receiver-id");
const userId = document.querySelector(".chat-response-hidden-user");

// montre le bas du chat au chargement de la page
window.addEventListener(
  "load",
  function () {
    containerChats.scrollTo(0, 10000000);
  },
  false
);

// fonction qui poste le message après la requete ajax
function getMessages(contenu) {
  ajaxGet("ajax/getInfos.php").then(() => {
    const needHour = true;
    const noChat = document.querySelector(".no-chat");
    if (noChat) {
      noChat.innerHTML = "";
    }
    const oldNewResponse = document.querySelector(".new-response-chat");
    if (oldNewResponse) {
      oldNewResponse.classList.remove("new-response-chat");
    }
    let html = `<div class="sender-user new-response-chat" style="opacity:0">
                    <div class="infos-msg-text">
                        <div class="msg-text-chat" >${contenu}</div><div class="msg-date-chat">${today(
      needHour
    )}</div></div></div>`;
    containerChats.innerHTML += html;
    containerChats.scrollTop = containerChats.scrollHeight;
    let opacity = 0;
    let intervalID = 0;
    window.onload = fadeIn;
    function fadeIn() {
      setInterval(show, 80);
    }

    function show() {
      const newResponse = document.querySelector(".new-response-chat");
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

//   fonction qui envoie le message vers le php , requete ajax
function postMessage(event) {
  event.preventDefault();
  if (content.value !== "") {
    const data = new FormData();
    data.append("content", content.value);
    data.append("receiverId", receiverId.value);
    data.append("userId", userId.value);

    ajaxPost("ajax/newResponseChat.php?task=write", data).then(() => {
      setTimeout(function () {
        getMessages(content.value);
        content.value = "";
        content.focus();
      }, 300);
    });
  }
}

formSendMsg.addEventListener("submit", postMessage);
