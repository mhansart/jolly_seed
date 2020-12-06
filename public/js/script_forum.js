
const btnNewForum = document.querySelector('.new-forum');
const formNewForum = document.querySelector('.form-new-forum');
const forumImage = document.querySelector('.forum-image');
btnNewForum.addEventListener('click', function(){
    formNewForum.style.display="flex";
    btnNewForum.style.display="none";
})
