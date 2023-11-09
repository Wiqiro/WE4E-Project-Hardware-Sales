
function showRenameInput(button) {
  let form = button.closest(".card-body").querySelector(".catalog-form");
  let name = form.querySelector(".catalog-name");
  let input = form.querySelector(".rename-input");

  if (button.getAttribute("type") !== "submit") {
    event.preventDefault();

    button.setAttribute("type", "submit");
    name.style.display = "none";
    input.style.display = "block";
  }
}

function showForm() {
  document.getElementById("catalog-form").style.display = "block";
  document.getElementById("show-form-button").style.display = "none";
}