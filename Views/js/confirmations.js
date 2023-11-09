function confirmDeleteCommand() {
  return confirm("Etes-vous sur de voulour supprimer cette commande ?");
}

function confirmDeleteCatalog(event) {
  if (event.submitter.name === "remove") {
    return confirm(
      "Etes-vous sur de voulour supprimer ce catalogue ?\nTous les produits en faisant partie seront automatiquement supprimés"
    );
  } else {
    return true;
  }
}

function confirmDeleteProduct() {
  if (event.submitter.name === "remove") {
    return confirm("Etes-vous sur de voulour supprimer ce produit ?");
  } else {
    return true;
  }
}
