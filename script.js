const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.scrollY > 0)
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})
userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
})

/*-----home page slider-----*/
"use strict"
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
    rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'),
    slider = document.querySelector('.slider');

// Ensure the left and right arrow elements are correctly selected
const leftArrowContainer = document.querySelector('.left-arrow');
const rightArrowContainer = document.querySelector('.right-arrow');

/*-----scroll to right-----*/
function scrollRight(){
    rightArrowContainer.disabled = true;
    if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    } else {
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        });
    }
    setTimeout(() => rightArrowContainer.disabled = false, 1000);
}

/*-----scroll to left-----*/
function scrollLeft(){
    leftArrowContainer.disabled = true;
    slider.scrollBy({
        left: -window.innerWidth,
        behavior: "smooth"
    });
    setTimeout(() => leftArrowContainer.disabled = false, 1000);
}

let timerId = setInterval(scrollRight, 7000);

/*-----reset timer to scroll right-----*/
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
}

/*-----scroll event-----*/
slider.addEventListener('click', function(ev){
    if(ev.target === rightArrow || ev.target === rightArrowContainer){
        scrollRight();
        resetTimer();
    } else if(ev.target === leftArrow || ev.target === leftArrowContainer){
        scrollLeft();
        resetTimer();
    }
});

// Add event listeners for the arrow containers
leftArrowContainer.addEventListener('click', function() {
    if (!leftArrowContainer.disabled) {
        scrollLeft();
        resetTimer();
    }
});

rightArrowContainer.addEventListener('click', function() {
    if (!rightArrowContainer.disabled) {
        scrollRight();
        resetTimer();
    }
});

/*-----testimonial slider-----*/
let slides = document.querySelectorAll('.testimonial-item');
let index = 0;

function showSlide(newIndex) {
    slides[index].classList.remove('active');
    index = (newIndex + slides.length) % slides.length;
    slides[index].classList.add('active');
}

function nextSlide() {
    showSlide(index + 1);
}

function prevSlide() {
    showSlide(index - 1);
}

// Ensure the arrow elements are correctly selected
const testimonialLeftArrow = document.querySelector('.testimonial-container .left-arrow');
const testimonialRightArrow = document.querySelector('.testimonial-container .right-arrow');

// Add event listeners for the testimonial arrows
testimonialLeftArrow.addEventListener('click', prevSlide);
testimonialRightArrow.addEventListener('click', nextSlide);

/*-----chat page-----*/
toggleBtn = document.getElementById('toggleBtn');
SideMenu = document.getElementById('SideMenu');

toggleBtn.addEventListener('click', () => {
    SideMenu.classList.toggle('active');
});