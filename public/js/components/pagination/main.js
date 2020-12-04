document
  .querySelector(".btn__container")
  .addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-round-pagination");
    if (btn) {
      clearResults();
      const goToPage = parseInt(btn.dataset.goto, 10);
      renderResults(usersSet, activeUser, goToPage);
    }
  });

const clearResults = function () {
  document.querySelector(".search__results-container").innerHTML = '';
  document.querySelector(".btn__container").innerHTML = "";
};
