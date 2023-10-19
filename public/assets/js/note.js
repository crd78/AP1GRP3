// Sélectionne tous les éléments 'input' dans le document
let star = document.querySelectorAll('input');

// Sélectionne un élément avec l'ID 'rating-value'
let showValue = document.querySelector('#rating-value');

// Parcourt tous les éléments 'input'
for (let i = 0; i < star.length; i++) {

	// Ajoute un écouteur d'événements 'click' à chaque étoile
	star[i].addEventListener('click', function() {
		i = this.value;
		
		// Met à jour le contenu de l'élément avec l'ID 'rating-value' pour afficher la note
		showValue.innerHTML = i + " out of 5";
	});
}