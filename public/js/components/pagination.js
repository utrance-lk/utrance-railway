// type: 'prev' or 'next'
const createButton = function (page, type) {
  let html = `<button class='btn btn-round-pagination btn-round-pagination__${type} margin-b-l' data-goto=${type === "prev" ? page - 1 : page + 1}>`;
  if(type === 'prev') {
    html += `
    <svg class='btn-round-pagination--img'>
        <use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-chevron-left'></use>
    </svg>
    <span>Page ${page - 1}</span>
    `;
  } else {
    html += `
    <span>Page ${page + 1}</span>
    <svg class='btn-round-pagination--img'>
        <use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-chevron-right'></use>
    </svg>
    `;
  }
  html += `</button>`;
  return html;
};

const renderButtons = function (page, numResults, resPerPage) {
  const pages = Math.ceil(numResults / resPerPage);

  let button;
  if (page === 1 && pages > 1) {
    // button to go next page
    button = createButton(page, "next");
  } else if (page < pages) {
    // both buttons
    button = `
            ${createButton(page, "prev")}
            ${createButton(page, "next")}
        `;
  } else if (page === pages && pages > 1) {
    // button to go previous page
    button = createButton(page, "prev");
  }

  if(button) { 
    document
    .querySelector(".btn__container")
    .insertAdjacentHTML("afterbegin", button);
  }
};
