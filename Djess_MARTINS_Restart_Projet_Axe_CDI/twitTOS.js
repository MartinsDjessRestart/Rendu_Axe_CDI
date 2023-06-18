const boutonAjout = document.getElementById("bouton-ajout");
const fenetre = document.getElementById("fenetre");
const boutonFermer = document.getElementById("bouton-fermer");

boutonAjout.addEventListener("click", function() {
    fenetre.style.display = "block";
});

boutonFermer.addEventListener("click", function() {
    fenetre.style.display = "none";
});


const supprimerButton = document.getElementById("bouton-supprimer");
const fenetreSuppr = document.getElementById("fenetre-suppr");
const confirmButton = document.getElementById("bouton-confirmer");
const boutonFermerSuppr = document.getElementById("bouton-ferme");

supprimerButton.addEventListener("click", () => {
    fenetreSuppr.style.display = "block";
});

confirmButton.addEventListener("click", () => {
    document.getElementById("formulaire-supprimer").submit();
    fenetreSuppr.style.display = "none";
});

boutonFermerSuppr.addEventListener("click", () => {
    fenetreSuppr.style.display = "none";
});



const heartIcon = document.getElementById('heartIcon');

heartIcon.addEventListener('click', function() {
  heartIcon.style.color = heartIcon.style.color == 'red' ? '' : 'red';
});




document.getElementById("sidebarButton").addEventListener("click", function() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
  });
  
  document.getElementById("closeButton").addEventListener("click", function() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
  });
  
