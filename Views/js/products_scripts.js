function showRenameInput(button) {
    console.log("salut");
    let form = button.closest(".card-body").querySelector(".product-form");
    let name = form.querySelector(".product-name");
    let input = form.querySelector(".rename-input");
  
    if (button.getAttribute("type") !== "submit") {
      event.preventDefault();
  
      button.setAttribute("type", "submit");
      name.style.display = "none";
      input.style.display = "block";
    }
  }
  