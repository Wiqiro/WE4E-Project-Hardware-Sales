function addSpecInput() {
    const inputContainer = document.getElementById("specs-inputs");
    const newInputDiv = document.createElement("div");

    const specInput = document.createElement("div");

    const nameInput = document.createElement("input");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("name", "specs-names[]");
    nameInput.setAttribute("placeholder", "Nom");
    specInput.appendChild(nameInput);

    const valInput = document.createElement("input");
    valInput.setAttribute("type", "text");
    valInput.setAttribute("name", "specs-vals[]");
    valInput.setAttribute("placeholder", "Value");
    specInput.appendChild(valInput);

    newInputDiv.appendChild(specInput);

    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.onclick = function () {
        inputContainer.removeChild(newInputDiv);
    };
    newInputDiv.appendChild(removeButton);

    inputContainer.appendChild(newInputDiv);
}
