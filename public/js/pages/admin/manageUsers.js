let activeUser;
let usersSet;

const renderResults = function (users, actUser, page = 1, resPerPage = 10) {
  clearResults();
  // render results of current page
  activeUser = actUser;
  usersSet = users;
  const start = (page - 1) * resPerPage;
  const end = page * resPerPage;

  users.slice(start, end).forEach(renderUser);

  // document
  //   .querySelector(".search__results-container")
  //   .insertAdjacentHTML("beforeend", `<div class="btn__container"></div>`);
  // render pagination buttons
  renderButtons(page, users.length, resPerPage);
};

const renderUser = function (user) {
  let markup = `
    <div class='manage-users__result-card margin-b-m'>
        <div class='manage-users__user'>
            <div class='margin-r-xs'>
                <img src='/public/img/uploads/${
                  user.user_image
                }' alt='profile-avatar' class='manage-users__avatar'/>
            </div>
            <div class='manage-users__nametag'>
                <div class ='manage-users__nametage-name'>${
                  user.first_name
                }</div>
                <div class ='manage-users__nametage-id'>
                    <span>#</span>
                    <span class='user__id'>${user.id}</span>
                </div>
            </div>
        </div>
        <div>
            ${user.user_active_status == 1 ? "Active" : "Deactivated"}
        </div>
        <div>
            ${
              user.user_role === "admin"
                ? "Admin"
                : user.user_role === "user"
                ? "User"
                : "Details Provider"
            }
        </div>`;

  if (user.user_role === "admin" && user.first_name === activeUser.first_name) {
    markup += `<a href='/settings' class='btn btn-box-white margin-r-s'>View</a>`;
  } else {
    markup += `<a href='/users/view?id=${user.id}' class='btn btn-box-white margin-r-s'>View</a>`;
  }

  if (user.user_active_status == 1) {
    if (user.user_role !== "admin") {
      markup += `<a href='/users/deactivate?id=${user.id}&user_active_status=${user.user_active_status}' class='btn btn-box-white btn-box-white--delete'>Deactivate</a>`;
    } else {
      markup += `<a style='visibility: hidden'></a>`;
    }
  } else {
    if (user.user_role !== "admin") {
      markup += `<a href='/users/activate?id=${user.id}&user_active_status=${user.user_active_status}' class='btn btn-box-white btn-box-white--activate'>Activate</a>`;
    } else {
      markup += `<a style='visibility: hidden'></a>`;
    }
  }

  markup += `</div>`;

  document
    .getElementById("manage-users__search-results")
    .insertAdjacentHTML("beforeend", markup);
};

const clearResults = function () {
  document.getElementById("manage-users__search-results").innerHTML = "";
  document.getElementById("pagination").innerHTML = "";
};

// EVENT LISTNERS

document.getElementById("pagination").addEventListener("click", function (e) {
  const btn = e.target.closest(".btn-round-pagination");
  if (btn) {
    clearResults();
    const goToPage = parseInt(btn.dataset.goto, 10);
    renderResults(usersSet, activeUser, goToPage);
  }
});
