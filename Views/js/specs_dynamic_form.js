function addSpecInput(name, value) {
    const inputContainer = document.getElementById("specs-inputs");
    const newInputDiv = document.createElement("div");

    const specInput = document.createElement("div");

    const nameInput = document.createElement("input");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("name", "specs-names[]");
    nameInput.setAttribute("placeholder", "Nom");
    nameInput.setAttribute("value", name);

    specInput.appendChild(nameInput);

    const valInput = document.createElement("input");
    valInput.setAttribute("type", "text");
    valInput.setAttribute("name", "specs-vals[]");
    valInput.setAttribute("placeholder", "Valeur");
    valInput.setAttribute("value", value);

    specInput.appendChild(valInput);

    newInputDiv.appendChild(specInput);

    const removeButton = document.createElement("button");
    removeButton.textContent = "Supprimer";
    removeButton.setAttribute("class", "generalBtn mb-2");
    removeButton.onclick = function () {
        inputContainer.removeChild(newInputDiv);
    };
    newInputDiv.appendChild(removeButton);

    inputContainer.appendChild(newInputDiv);
}
