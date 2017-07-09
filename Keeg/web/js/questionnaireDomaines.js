var questionnaire = [ 	[	'1- T\'intéresses-tu à l\'actualité, à ce qu\'il se passe autour de toi ?', 
							[' Oui', '+1 +2 +1 +1'],
							[' Non', '+0 +0 +0 -1']
						],
						[	'2- Es-tu capable de faire plusieurs choses en même temps ?', 
							[' Oui', '+0 +0 +1 +1'],
							[' Non', '+0 +0 +0 +0']
						],
						[	'3- Es-tu précis dans ton travail ou tes activités ? As-tu le sens du détail ?', 
							[' Je suis extrêmement attentif/ve aux détails', '+1 +1 +2 +1'],
							[' Je fais en sorte de ne pas faire d’erreur', '+1 +1 +1 +0'],
							[' Je n’attache pas trop d’importance aux détails, l’important c’est que ça marche', '-1 -1 -1 -1']
						],
						[	'4- Aime tu le challenge ?', 
							[' C’est le challenge qui rend le travail intéressant', '+1 +1 +0 +1'],
							[' Non, je ne suis pas très compétitif', '+0 +0 +1 -1'],
							[' Seulement quand je gagne', '+0 +0 +0 -1']
						],
						[	'5- Est-ce que vous avez déjà piraté le réseau Wifi de votre voisin ? Trifouiller des câbles pour connecter des PC est votre petit péché mignon ?', 
							[' J’avoue, mais ne le dites à personne', '+0 +0 +2 +0'],
							[' Non, je n’ai aucune idée de comment faire', '+0 +0 -1 +0']
						],
						[	'6- Pour toi l\'informatique est un outil de créativité ?', 
							[' Oui', '+0 +1 +0 +0'],
							[' Non', '+0 +0 +0 +0']
						],
						[	'7- Souhaite-tu avoir des responsabilités dans ton futur métier ?', 
							[' Beaucoup, un peu comme un chef', '+0 +0 +0 +2'],
							[' De temps en temps, pour que le travail garde un intérêt', '+1 +1 +0 +1'],
							[' Le moins possible', '+0 +0 +0 -2']
						],
						[	'8- Aimes-tu jouer le rôle de médiateur dans une équipe ?', 
							[' Oui', '+0 +0 +0 +2'],
							[' Non', '+0 +0 +0 -2']
						],
						[	'9- Faire une présentation devant un groupe de personnes :', 
							[' Te met mal à l\'aise', '+0 +0 +0 -2'],
							[' Ne t\'embête pas mais tu préfèrerais éviter', '+0 +0 +0 +0'],
							[' Te motive à fond, tu adores échanger', '+0 +1 +0 +2']
						],
						[	'10- Tes voisins t’appellent souvent pour réparer leur ordinateur ?', 
							[' Oui, ils me considèrent comme le sosie de Mc Gyver', '+1 +1 +1 +1'],
							[' Non, je suis celui/celle qui appelle à l’aide', '+0 +0 -1 +0'],
							[' De temps en temps, je ne suis pas un/une spécialiste mais je me débrouille', '+0 +0 +0 +0']
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




var prog = 0;
var web = 0;
var res = 0;
var chef = 0;
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
			document.getElementsByClassName("row")[0].childNodes[0].textContent = "Résultats";

			var res_prog = (prog*100 )/5
			var res_web = (web*100 )/8
			var res_res = (res*100 )/8
			var res_chef = (chef*100 )/11


			document.getElementsByClassName("row")[1].textContent = "Ton profil correspond à " + Math.round(res_prog) + "% à un profil de programmeur, " + Math.round(res_web) + "% à un profil de développeur web, " + Math.round(res_res) + "% à un profil de ingénieur réseau et " + Math.round(res_chef) + "% à un profil de chef de projet";

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
				var val_prog =reponse.value.split(" ")[0];
				var val_web = reponse.value.split(" ")[1];
				var val_res = reponse.value.split(" ")[2];
				var val_chef = reponse.value.split(" ")[3];

				tab_prog = val_prog.split("");
				tab_web = val_web.split("");
				tab_res = val_res.split("");
				tab_chef = val_chef.split("");

				//On calcul les points pour la programmation
				if(tab_prog[0]==="+")
				{
					switch(tab_prog[1])
					{
						case "0": prog = prog + 0;
						break;
						case "1": prog = prog + 1;
						break;
						case "2": prog = prog + 2;
						break;

					}
					
				} else {
					prog = prog - 1;
				}

				//On calcul les points pour le web
				if(tab_web[0]==="+")
				{
					switch(tab_web[1])
					{
						case "0": web = web + 0;
						break;
						case "1": web = web + 1;
						break;
						case "2": web = web + 2;
						break;

					}
				} else {
					web = web - 1;
				}

				//On calcul les points pour le réseau
				if(tab_res[0]==="+")
				{
					switch(tab_res[1])
					{
						case "0": res = res + 0;
						break;
						case "1": res = res + 1;
						break;
						case "2": res = res + 2;
						break;

					}
					
				} else {
					res = res - 1;
				}

				//On calcul les points pour chef de projet
				if(tab_chef[0]==="+")
				{
					switch(tab_chef[1])
					{
						case "0": chef = chef + 0;
						break;
						case "1": chef = chef + 1;
						break;
						case "2": chef = chef + 2;
						break;

					}
					
				} else {

					switch(tab_chef[1])
					{
						case "1": chef = chef - 1;
						break;
						case "2": chef = chef - 2;
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