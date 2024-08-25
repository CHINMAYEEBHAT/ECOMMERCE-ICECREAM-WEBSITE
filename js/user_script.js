const profile = document.querySelector('#user-btn');
profile.addEventListener('click', function(){
    const userBox =document.querySelector('.header .flex .profile-detail');
    userBox.classList.toggle('active');
})


let searchForm = document.querySelector('.header .flex .search-form');
    document.querySelector('#search-btn').onclick = () =>{
        searchForm.classList.toggle('active');
        profile.classList.remove('active');
} 
let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
} 

const imgBox= document.querySelector('.slider-container');
const slides= document.getElementsByClassName('slideBox');
var i = 0;

function nextSlide(){
slides[i].classList.remove('active');
i=(i+1) % slides.length;
slides[i].classList.add('active');
}

function prevSlide(){
slides[i].classList.remove('active');
i= (i-1 + slides.length) % slides.length;
slides[i].classList.add('active');
}