import * as k from './main.js';

document
  .querySelector(".btn__container")
  .addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-round-pagination");
    if(btn) {
        const goToPage = parseInt(btn.dataset.goto, 10);
        k.renderResults(k.usersSet, k.activeUser, goToPage);
    }
  });
