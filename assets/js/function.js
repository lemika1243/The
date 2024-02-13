function getInput(nameInput) {
    // Récupère les éléments input ayant le nom de l'input
    var inputs = document.getElementsByName(nameInput);
    var value = "";
    // Vérifie si au moins un élément a été trouvé
    if (inputs.length > 0) {
        // Accède à la valeur du premier élément trouvé
        value = inputs[0];
    } 
    return value;
}