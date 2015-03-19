var questionnaire = [ 	[	'1- Te sens-tu capable de chercher de l\'information par toi-même pour résoudre un problème ?', 
							[' Oui', '+0 +2 +2 +0'],
							[' Non', '+0 -1 -1 +0']
						],
						[	'2- Connais-tu personnellement des personnes qui travaillent dans l\'informatique ?', 
							[' Oui', '+0 +0 +0 +1'],
							[' Non', '-+0 +0 +0 +0']
						],
						[	'3- Si oui, t\'ont-ils influencé dans tes choix d\'orientation ?', 
							[' Oui', '+0 +0 +1 +1'],
							[' Non', '+0 +0 +0 +0']
						],
						[	'4- T\'investis-tu dans les réseaux sociaux, forum ?', 
							[' Oui', '+0 +0 +1 +2'],
							[' Non', '+0 +0 +0 +0']
						],
						[	'5- T\'intéresses-tu à l\'actualité, à ce qu\'il se passe autour de toi ?', 
							[' Oui', '+0 +1 +2 +1'],
							[' Non', '+0 +0 -1 +0']
						],
						[	'6- Es-tu précis dans ton travail ou tes activités ? As-tu le sens du détail ?', 
							[' Je suis extrêmement attentif/ve aux détails', '+1 +1 +1 +0'],
							[' Je fais en sorte de ne pas faire d’erreur', '+0 +0 +0 +0'],
							[' Je n’attache pas trop d’importance aux détails, l’important c’est que ça marche', '+0 +1 +0 +0']
						],
						[	'7- Est-ce que vous avez déjà piraté le réseau Wifi de votre voisin ? Trifouiller des câbles pour connecter des PC est votre petit péché mignon ?', 
							[' J’avoue, mais ne le dites à personne', '+0 +1 +1 +0'],
							[' Non, je n’ai aucune idée de comment faire', '+0 +0 +0 +0']
						],
						[	'8- Pour toi l\'informatique est un outil de créativité ?', 
							[' Oui', '+2 +0 +0 +0'],
							[' Non', '-1 +0 +0 +0']
						],
						[	'9- Tes voisins t’appellent souvent pour réparer leur ordinateur ?', 
							[' Oui, ils me considèrent comme le sosie de Mc Gyver', '+0 +1 +0 +1'],
							[' Non, je suis celui/celle qui appelle à l’aide', '+0 +0 +0 +0'],
							[' De temps en temps, je ne suis pas un/une spécialiste mais je me débrouille', '+0 +1 +0 +0']
						],
						[	'10- Tu t\'intéresses à l’informatique :', 
							[' Par curiosité, tu ne sais pas ce que sais et tu souhaites le découvrir', '+0 +1 +1 +1'],
							[' Car tu veux un métier qui rapporte beaucoup d\'argent', '+0 +0 +0 +0'],
							[' Car je veux faire un métier qui me passionne', '+1 +1 +1 +0'],
							[' Non je ne m\'y intéresse pas, je cherche juste ce que je pourrais faire l\'année prochaine', '+0 +1 +0 +0']
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
	while (j <= 4)
	{
		var reponse = document.getElementById("reponse"+j);
		reponse.style.display = "none";
		var bt = document.getElementById("rep"+j);
		bt.style.display = "none";
		j = j+1;
	}
});	




var creativite = 0;
var autonomie = 0;
var curiosite = 0;
var com = 0;
var i = 0;

	function affichage()
	{
		if (i < questionnaire.length)
		{

			var question = document.getElementById("question");
			question.textContent = questionnaire[i][0];

			j = 1;

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
			while (j <= 4)
			{
				var reponse = document.getElementById("reponse"+j);
				reponse.style.display = "none";
				var bt = document.getElementById("rep"+j);
				bt.style.display = "none";
				j = j+1;
			}

			//Décoche la réponse
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

		//Affiche les résultats une fois que le questionnaire est terminé
		} else {

			var res_crea = (creativite*100 )/4
			var res_aut = (autonomie*100 )/7
			var res_cur = (curiosite*100 )/9
			var res_com = (com*100 )/7


			document.getElementsByClassName("row")[1].textContent = "Taux de créativité = " + Math.round(res_crea) + "% " + 
																	"Taux de autonomie = " + Math.round(res_aut) + "% " + 
																	"Taux de curiosité = " + Math.round(res_cur) + "% " + 
																	"Taux de communication = " + Math.round(res_com) + "% ";
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
				var val_crea =reponse.value.split(" ")[0];
				var val_aut = reponse.value.split(" ")[1];
				var val_cur = reponse.value.split(" ")[2];
				var val_com = reponse.value.split(" ")[3];


				tab_crea = val_crea.split("");
				tab_aut = val_aut.split("");
				tab_cur = val_cur.split("");
				tab_com = val_com.split("");

				//On calcul les points pour la créativité
				if(tab_crea[0]==="+")
				{
					switch(tab_crea[1])
					{
						case "0": creativite = creativite + 0;
						break;
						case "1": creativite = creativite + 1;
						break;
						case "2": creativite = creativite + 2;
						break;

					}
					
				} else {
					creativite = creativite - 1;
				}

				//On calcul les points pour l'autonomie
				if(tab_aut[0]==="+")
				{
					switch(tab_aut[1])
					{
						case "0": autonomie = autonomie + 0;
						break;
						case "1": autonomie = autonomie + 1;
						break;
						case "2": autonomie = autonomie + 2;
						break;

					}
				} else {
					autonomie = autonomie - 1;
				}

				//On calcul les points pour la curiosité
				if(tab_cur[0]==="+")
				{
					switch(tab_cur[1])
					{
						case "0": curiosite = curiosite + 0;
						break;
						case "1": curiosite = curiosite + 1;
						break;
						case "2": curiosite = curiosite + 2;
						break;

					}
					
				} else {
					curiosite = curiosite - 1;
				}

				//On calcul les points pour la communication
				if(tab_com[0]==="+")
				{
					switch(tab_com[1])
					{
						case "0": com = com + 0;
						break;
						case "1": com = com + 1;
						break;
						case "2": com = com + 2;
						break;

					}
					
				} else {
					com = com - 1;
				}
			}

			j = j+1;
		}
		i= i+1;
	}
		


btNext.addEventListener("mousedown",traitement);
btNext.addEventListener("mouseup",affichage);