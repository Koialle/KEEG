var questionnaire = [ 	[	'1- As-tu déjà essayé de lire des tutos trouvés sur internet ?', 
							[' Juste un petit coup d’œil, histoire de…', '+1 +0 +0'],
							[' J’ai déjà compléter un / plusieurs tutoriels', '+2 +1 +1'],
							[' Non, je ne vois pas vraiment l’intérêt', '+0 +0 +0'] 
						],
						[	'2- Te sens-tu capable de chercher de l\'information par toi-même pour résoudre un problème ?', 
							[' Oui', '+2 +1 +1'],
							[' Non', '-1 +0 +0 ']
						],
						[	'3- T\'intéresses-tu à l\'actualité, à ce qu\'il se passe autour de toi ?', 
							[' Oui', '+1 +1 +1'],
							[' Non', '+0 +0 +0']
						],
						[	'4- Quel type d’études souhaiterais-tu faire plus tard :', 
							[' Court', '-1 -1 +2'],
							[' Long', '+1 +1 +0'],
							[' Je ne sais pas', '+0 +0 +0']
						],
						[	'5- Tu préfères :', 
							[' Avoir des connaissances globales sur tous les domaines accompagnées d\'un peu de pratique', '+2 +2 -1'],
							[' La pratique c\'est le mieux, on peut se spécialiser dans un domaine ! ', '-1 -1 +2'],
							[' Avoir autant de pratique que de théorie appliquée à tous les domaines', '-1 +0 +1']
						],
						[	'6- Tu préfères :', 
							[' Être encadré et garder l\'ambiance du lycée', '-1 +0 +2'],
							[' Être plus autonome et gérer mon temps comme je l\'entends', '+2 +0 -1']
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
	while (j <= 3)
	{
		var reponse = document.getElementById("reponse"+j);
		reponse.style.display = "none";
		var bt = document.getElementById("rep"+j);
		bt.style.display = "none";
		j = j+1;
	}
});	




var iut = 0;
var licence = 0;
var inge = 0;
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
			while (j <= 3)
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

		} else {

			var res_inge = (inge*100 )/6
			var res_licence = (licence*100 )/11
			var res_iut = (iut*100 )/9

			if (res_iut > res_licence && res_iut > res_inge) {
				document.getElementsByClassName("row")[1].textContent = "Tu as obtenu un score de " + Math.round(res_iut) + "% pour le DUT. Attiré par les études courtes et la mise en pratique, l'IUT est une bonne solution pour toi. (École d'ingénieur " + Math.round(res_inge) + "%, licence " + Math.round(res_licence) + "%)" ;
			} else if( licence < res_inge){
				document.getElementsByClassName("row")[1].textContent = "Tu as obtenu un score de " + Math.round(res_inge) + "% pour les écoles d'ingénieurs. Les études longue ne te font pas froid aux yeux, tu aime apprendre de manière assez équilibrée en alternant théorie et pratique. Si tu t'en sens capable, alors les écoles n'attendront que toi ;) (IUT " + Math.round(res_iut) + "%, licence " + Math.round(res_licence) + "%)" ;
			} else {
				document.getElementsByClassName("row")[1].textContent = "Tu as obtenu un score de " + Math.round(res_licence) + "% pour une licence. Très autonome et capable de faire des recherche par toi même, tu préfère les cours théoriques aux expériences. Tu dois cependant être prêt à continuer tes études une fois la licence terminée (École d'ingénieur " + Math.round(res_inge) + "%, IUT " + Math.round(res_iut) + "%)" ;
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
				var val_licence =reponse.value.split(" ")[0];
				var val_inge = reponse.value.split(" ")[1];
				var val_iut = reponse.value.split(" ")[2];

				tab_licence = val_licence.split("");
				tab_inge = val_licence.split("");
				tab_iut = val_licence.split("");

				//On calcul les points pour la licence
				if(tab_licence[0]==="+")
				{
					switch(tab_licence[1])
					{
						case "0": licence = licence + 0;
						break;
						case "1": licence = licence + 1;
						break;
						case "2": licence = licence + 2;
						break;

					}
					
				} else {
					licence = licence - 1;
				}

				//On calcul les points pour le DUT
				switch(tab_iut[1])
				{
					case "0": iut = iut + 0;
					break;
					case "1": iut = iut + 1;
					break;
					case "2": iut = iut + 2;
					break;

				}

				//On calcul les points pour l'inge
				if(tab_inge[0]==="+")
				{
					switch(tab_inge[1])
					{
						case "0": inge = inge + 0;
						break;
						case "1": inge = inge + 1;
						break;
						case "2": inge = inge + 2;
						break;

					}
					
				} else {
					inge = inge - 1;
				}
			}

			j = j+1;
		}
		i= i+1;
	}
		


btNext.addEventListener("mousedown",traitement);
btNext.addEventListener("mouseup",affichage);