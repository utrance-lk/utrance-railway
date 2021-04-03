let count = 0;

function renderNewsCard(newsArray) {
  let myElement = document.querySelector(".slider-container");
  // myElement.style.overflow = "hidden";
  // const html = `<button id='prevBtn'>Prev</button>
  //              <button id='nextBtn'>Next</button>`;
  // document.querySelector(".newsfeed").insertAdjacentHTML("afterend", html);
  newsArray.forEach(myFunction);
  count = 0;
  newsArray.forEach(myFunction2);
  count = 0;
  newsArray.forEach(myFunction3);

  const carouselSlide = document.querySelector(".carousel-slide");
  const carouselImages = document.querySelectorAll(".newscard-small");

  const prevBtn = document.querySelector("#prevBtn");
  const nextBtn = document.querySelector("#nextBtn");

  let counter = 1;

  // const size = carouselSlide.clientWidth;
  // console.log(size);

  // carouselSlide.style.transform = 'translate('+(-size*counter)+'px)';

  nextBtn.addEventListener("click", () => {
    if (counter >= carouselImages.length - 1) return;
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    counter++;
    carouselSlide.style.transform = "translateX(" + -300 * counter + "px)";
  });

  prevBtn.addEventListener("click", () => {
    if (counter <= 0) return;
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    counter--;
    carouselSlide.style.transform = "translateX(" + -300 * counter + "px)";
  });

  carouselSlide.addEventListener("transitionend", () => {
    if (carouselImages[counter].id == "lastclone") {
      carouselSlide.style.transition = "none";
      counter = carouselImages.length - 2;
      carouselSlide.style.transform = "translateX(" + -250 * counter + "px)";
    }

    if (carouselImages[counter].id == "firstclone") {
      carouselSlide.style.transition = "none";
      counter = carouselImages.length - counter;
      carouselSlide.style.transform = "translateX(" + -250 * counter + "px)";
    }
  });

  // document.querySelector(".carousel-slide").insertAdjacentHTML("beforebegin", htm);
  // document.querySelector(".carousel-slide").insertAdjacentHTML("beforeend", firsthtml);

  myFunction1();
}

function myFunction(news) {
  count++;
  if (count == 6) {
    const markup = `<div class='newscard-small' id='lastclone'>
            <div class='newscard-small__img-box'>
                <img src='/public/img/NewsImages/${news.NewsImage}' class='newscard-small__img' alt='news-img' width='60' height='60'>
                <div class='newscard-small__view-btn'>
                <a class="parentclass" href='/news/news01?id=${news.News_id}'>
                    <span id ='view' class='view'>View</span>
                </a>
                    <svg class='newscard-small__icon'>
                        <use xlink:href='/public/img/svg/sprite.svg#icon-chevron-right'></use>
                    </svg>
                </div>
            </div>
            <div class='newscard-small__content'>
            ${news.Content}
            </div>
        </div>`;
    // document.querySelector(".newsfeed").innerHTML=markup;
    document
      .querySelector(".carousel-slide")
      .insertAdjacentHTML("beforeend", markup);
  }
}

function myFunction2(news) {
  count++;
  const markup = `<div class='newscard-small' id=${count}>
    <div class='newscard-small__img-box'>
        <img src='/public/img/NewsImages/${news.NewsImage}' class='newscard-small__img' alt='news-img' width='60' height='60'>
        <div class='newscard-small__view-btn'>
        <a class="parentclass" href='/news/news01?id=${news.News_id}'>
            <span id ='view' class='view'>View</span>
        </a>
            <svg class='newscard-small__icon'>
                <use xlink:href='/public/img/svg/sprite.svg#icon-chevron-right'></use>
            </svg>
        </div>
    </div>
    <div class='newscard-small__content'>
    ${news.Content}
    </div>
</div>`;
  // document.querySelector(".newsfeed").innerHTML=markup;
  document
    .querySelector(".carousel-slide")
    .insertAdjacentHTML("beforeend", markup);
}

function myFunction3(news) {
  count++;
  if (count == 1) {
    const markup = `<div class='newscard-small' id='firstclone'>
            <div class='newscard-small__img-box'>
                <img src='/public/img/NewsImages/${news.NewsImage}' class='newscard-small__img' alt='news-img' width='60' height='60'>
                <div class='newscard-small__view-btn'>
                <a class="parentclass" href='/news/news01?id=${news.News_id}'>
                    <span id ='view' class='view'>View</span>
                </a>
                    <svg class='newscard-small__icon'>
                        <use xlink:href='/public/img/svg/sprite.svg#icon-chevron-right'></use>
                    </svg>
                </div>
            </div>
            <div class='newscard-small__content'>
            ${news.Content}
            </div>
        </div>`;
    // document.querySelector(".newsfeed").innerHTML=markup;
    document
      .querySelector(".carousel-slide")
      .insertAdjacentHTML("beforeend", markup);
  }
}

function myFunction1() {
  const els = document.querySelectorAll(".view");

  for (var i = 0; i < els.length; i++) {
    els[i].onclick = function (e) {
      let newsContent = e.target
        .closest(".newscard-small")
        .querySelector(".newscard-small__content").innerText;
      let newNewsContent = newsContent.trim();
      $.ajax({
        url: "getNewNews",
        method: "post",
        data: { index1: newNewsContent },
        success: function (data) {
          document
            .querySelector(".content-title")
            .insertAdjacentHTML("beforeend", html);
        },
      });
    };
  }
}
