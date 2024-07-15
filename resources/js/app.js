import './bootstrap';
import 'bootstrap';
import './my.js';


// elenco catture
let zoom= document.querySelector('#zoom');
let img= document.querySelectorAll('#img');

console.log(img);
console.log(zoom);





// fine elenco catture

// logica dettaglio

// fine logica

let search = document.getElementById('search');

search.addEventListener('focus',function(){
    this.style.width='400px';
})

search.addEventListener('blur',function(){
    this.style.width='300px';
})





// swiper
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });