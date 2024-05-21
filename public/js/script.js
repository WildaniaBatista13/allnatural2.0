let navbar = document.querySelector('.header .flex .navbar');

let menu_btn = document.querySelector('#menu-btn')

if(menu_btn!=null){
   document.querySelector('#menu-btn').onclick = () =>{
      navbar.classList.toggle('active');
      profile.classList.remove('active');
   }
}

let user_btn = document.querySelector('#user-btn')

if(user_btn!=null){
   document.querySelector('#user-btn').onclick = () =>{
      navbar.classList.toggle('active');
      profile.classList.remove('active');
   }
}


let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}