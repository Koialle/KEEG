var questionnaire = [ 	[	'1- A quelle fréquence utilises-tu ton ordinateur/internet ?', 
							[' 1h à 2h par jour, pour vérifier mes mails et rapidement les nouveautés sur FB et Twiter', '+1'],
							[' 3h par jour minimum. Regarder les news de tumblr et ff.net ? Un raid à gérer ? Un script à implémenter ? Il y a plein de chose à faire', '+2'],
							[' 1 à 2 fois par semaine tous au plus, seulement si la situation l\'exige', '-2'] 
						],
						[	'2- As-tu déjà réalisé des projets perso concernant de prêt ou de loin de l’informatique ?', 
							[' Oui', '+1'],
							[' Non', '+0']
						],
						[	'3- Si oui, as-tu déjà diffusé/distribué/partagé (rendu public) un projet perso ?', 
							[' Oui', '+2'],
							[' Non', '+0']
						],
						[	'4- Connais- tu l\'option ISN (Informatique et Science du Numérique) ? Si oui, y-as-tu pris part ?', 
							[' Je ne connais pas cette option ', '+0'],
							[' Je connais l’option mais elle ne m’intéresse pas', '-1'],
							[' J’ai pris l’option', '+1'] 
						],
						[	'5- Pourquoi utilises-tu ton ordinateur ?', 
							[' Travailler', '+2'],
							[' Jouer', '+1'],
							[' Musique/vidéo', '+0'],
							[' Réseau Sociaux', '+0'],
							[' Montage vidéo/ audio/ photo', '+1'] 
						],
						[	'6- As-tu déjà réalisé des projets informatiques dans le cadre de la formation ?', 
							[' Oui', '+1'],
							[' Non', '+0']
						],
						[	'7- Combien d\'heures passes-tu sur ton ordinateur/portable/gameboy/tablette tactile par jour ou par semaine ?', 
							[' Sur mon smartphone dans les transports en commun et à la pause', '+0'],
							[' Une heure ou deux en rentrant le soir pour me détendre', '+1'],
							[' Pas question d’aller me coucher avant d’avoir atteint le niveau 4 du donjon', '+1'] 
						],
						[	'8- A quel âge as-tu découvert internet ?', 
							[' <10', '+2'],
							[' <13', '+1'],
							[' >13', '+0'] 
						],
						[	'9- Connais-tu personnellement des personnes qui travaillent dans l\'informatique ?', 
							[' Oui', '+1'],
							[' Non', '+0']
						],
						[	'10- Si oui, t\'ont-ils influencé dans tes choix d\'orientation ?', 
							[' Oui', '+1'],
							[' Non', '+0']
						],
						[	'11- Est-ce que passer toute la journée à coder derrière ton ordinateur est ta passion ?', 
							[' Oui, je ne vois pas le temps passer', '+2'],
							[' Non, j’ai horreur de ça', '-2'],
							[' Je n’ai jamais essayé ', '+0'] 
						],
						[	'12- Pour toi l\'informatique c\'est un métier :', 
							[' Pour tous le monde', '+1'],
							[' Pour les geeks', '-1'],
							[' Pour les héros contemporains de cet univers', '+1'] 
						],
						[	'13- Pour toi l\'informatique c\'est :', 
							[' Un métier comme un autre', '+0'],
							[' Une vraie passion', '+1'],
							[' Un outil indispensable dont on a besoin pour vivre', '+1'] 
						],
						[	'14- Penses-tu que l\'on peut vivre sans Internet ?', 
							[' … tuer moi maintenant', '+1'],
							[' Je le fais déjà ', '-1'],
							[' Pas tellement, c’est quand même pratique', '+1'] 
						],
						[	'15- Tu t\'intéresses à l’informatique :', 
							[' Par curiosité, tu ne sais pas ce que sais et tu souhaites le découvrir', '+1'],
							[' Car tu veux un métier qui rapporte beaucoup d\'argent', '+1'],
							[' Car je veux faire un métier qui me passionne', '+2'],
							[' Non je ne m\'y intéresse pas, je cherche juste ce que je pourrais faire l\'année prochaine', '+0'] 
						],
						[	'16- L\'informatique :', 
							[' Ça t’effraye, tu as peur que ce soit trop difficile ', '-1'],
							[' T\'amuses, tu prends plaisir à pratiquer', '+1'],
							[' Tu n\'as pas d\'opinion à ce sujet, tu ne sais pas quoi répondre', '+0']
						]
					];

var btNext = document.getElementById("bt_next");

//Chargement de la première combinaison Question/Réponses au chargement de la page
window.addEventListener("load", function(){
	j = 1;

	var question = document.getElementById("question");
	question.textContent = questionnaire[0][0];

	while (j < questionnaire[0].length)
	{
		var reponse = document.getElementById("reponse"+j);
		reponse.textContent = questionnaire[0][j][0];

		var rep = document.getElementById("rep"+j);
		rep.value =questionnaire[0][j][1];

		reponse.style.display = "inline";
		rep.style.display = "inline";

		j = j+1;
	}

	//On masque les boutons qui n'ont pas de réponses associées
	while (j <= 5)
	{
		var reponse = document.getElementById("reponse"+j);
		reponse.style.display = "none";
		var bt = document.getElementById("rep"+j);
		bt.style.display = "none";
		j = j+1;
	}
});	




var resultat = 0;
var i = 0;

	function affichage()
	{
		if (i < questionnaire.length)
		{

			var question = document.getElementById("question");
			question.textContent = questionnaire[i][0];

			j = 1;


			if (question.textContent[0] === "5")
			{
				while (j < questionnaire[i].length)
				{
					var rep = document.getElementById("rep"+j);
					rep.type = "checkbox";

					j = j+1;
				}
			} else if (question.textContent[0] === "6")
			{
				while (j < 6)
				{
					var rep = document.getElementById("rep"+j);
					rep.type = "radio";

					j = j+1;
				}
			}



			j=1
			//On associe une réponse à un bouton et on donne une nouvelle valeur à ce bouton
			while (j < questionnaire[i].length)
			{
				var reponse = document.getElementById("reponse"+j);
				reponse.textContent = questionnaire[i][j][0];

				var rep = document.getElementById("rep"+j);
				rep.value = questionnaire[i][j][1];

				reponse.style.display = "inline";
				rep.style.display = "inline";

				j = j+1;
			}

			//On masque les boutons qui n'ont pas de réponses associées
			while (j <= 5)
			{
				var reponse = document.getElementById("reponse"+j);
				reponse.style.display = "none";
				var bt = document.getElementById("rep"+j);
				bt.style.display = "none";
				j = j+1;
			}

			//Décoche la réponse précédement cochée
			var j = 1;
			while (j < questionnaire[i].length)
			{
				var reponse = document.getElementById("rep"+j);


				if (reponse.checked)
				{
					reponse.checked = false;
				}

				j = j+1;
			}

		//Affiche les résultats une fois que toute les questions ont été affichées
		} else {
			var pourcentage = Math.round((resultat*100)/24) ;

			if (pourcentage > 70) {

			document.getElementsByClassName("row")[1].textContent = "Ton profil informatique correspond à " + pourcentage + " %. Apparemment tu en sais déjà beaucoup sur l’informatique. Pourquoi ne pas continuer sur cette voie ? Tu sembles bien partie, tu pourrais te plaire dans une formation informatique.";

			} else if (pourcentage > 50) {

			document.getElementsByClassName("row")[1].textContent = "Ton profil informatique correspond à " + pourcentage + " %. Utiliser un ordinateur, ça, tu sais faire. Mais de là à franchir la barrière pour programmer tu n’es pas encore sûr. Essaye un peu. Fait quelques recherches, les petits tutoriels disponibles sur le site pour voir si ça te plait. Quoiqu’il en soit, l’informatique reste une option valable pour toi.";

			} else {

			document.getElementsByClassName("row")[1].textContent = "Ton profil informatique correspond à " + pourcentage + " %. Tu n’as pas l’air d’être un adepte de la technologie. Si c’est vraiment le cas, réfléchis y à 2 fois avant de te lancer dans une filière informatique.";

			}
		}
	}

	function traitement()
	{
	//On ajoute la valeur de la réponse au résultat
		j = 1;
		while (j < questionnaire[i].length)
		{
			var reponse = document.getElementById("rep"+j);

			if (reponse.checked)
			{
				//On récupère l'opérateur d'un côté et la valeur de l'autre
				tab_rep = reponse.value.split("");
				var valeur = tab_rep[1];

				if(tab_rep[0]==="+")
				{
					switch(valeur)
					{
						case "0": resultat = resultat + 0;
						break;
						case "1": resultat = resultat + 1;
						break;
						case "2": resultat = resultat + 2;
						break;

					}
					
				} else {
					switch(valeur)
					{
						case "1": resultat = resultat - 1;
						break;
						case "2": resultat = resultat - 2;
						break;

					}
				}
			}

			j = j+1;
		}
		i= i+1;
	}
		


btNext.addEventListener("mousedown",traitement);
btNext.addEventListener("mouseup",affichage);