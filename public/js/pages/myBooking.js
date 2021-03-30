const carouselSlide=document.querySelector('.upcoming__trips--cards-container');
const carouselImages=document.querySelectorAll('.upcoming__trips--cards-container div');

const prevBtn=document.querySelector('#rewind-button');
const nextBtn=document.querySelector('#fast_forward-button');

let counter=0;
const size=carouselImages[0].clientWidth;
console.log(size);

carouselSlide.style.transform= 'translateX('+(-size*counter)+'px)';

nextBtn.addEventListener('click',()=>{
        //if(counter >= carouselImages.length-1) return;
        carouselSlide.style.transition="transform 0.4s ease-in-out";
        counter++;
        carouselSlide.style.transform='translateX('+(-size*counter)+'px)';
        console.log(counter);
});

prevBtn.addEventListener('click',()=>{
        //if(counter <=0)return ;
        carouselSlide.style.transition="transform 0.4s ease-in-out";
        counter--;
        carouselSlide.style.transform='translateX('+(-size*counter)+'px)';
        console.log(counter);
});

carouselSlide.addEventListener('transitionend', () =>{
    
});


