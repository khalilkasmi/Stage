# Stage
# Planning

* Initial meeting (younes et boukouchi) ( 13, february mercredi apres-midi)
	- Theme
	- Meetings planning
	- Devs meetup
	- Workflow 
* Needs assesment 
	- Formation Laravel/Composer
	- Design patterns
	- Tools
* Needs assesment feedback (younes) ( 13, february mercredi apres-midi) 
* Research and informations gathering (www.autoescape.fr - https://www.drivy.com) ( 20,february  mercredi apres-midi) 

* Wireframes and ui design (equipe synergie media) ( 20, february mercredi apres-midi) 
* wireframes review (younes) ( 20, february mercredi apres-midi) 

* Database and application architecture (13, March mercredi )
* Database review (younes) (13, March mercredi )

* Development process (coding) (10, April mercredi )
* Devlopment (final) review (10, April mercredi )


* Funtional and ui testing (equipe synergie media) (24, April mercredi)

* Development and improvement (24 - 3 semaines avant la presentation, April mercredi)

* Documentation and release plan (3 semaines avant la presentation, April mercredi)

# Cahier des charges


1 - Contexte et définition du projet

Le projet est un annuaire de recherche des agences de location des voitures dans tout le Maroc, qui va permettre aux gens de trouver des locations parmi plusieurs locations ayant été ajoutées par des entreprises qui peuvent être des personnes morales ou des personnes physiques.

2 - Objectif du projet

L’objectif premier du site web est d’offrir aux visiteurs la possibilité de chercher des locations, de trier les résultats des recherches afin de les amener à passer des réservations de voitures.
Le site réservera un espace pour que les entreprises puissent gérer leurs agences et voitures.

3 - Périmètre du projet

-	Nous nous concentrerons sur les entreprises qui offrent leurs services au Maroc 
-	Une entreprise de location doit être conforme aux critères du site afin de bénéficier des services du site web
-	L’Age du conducteur doit être au moins 21 ans 

4 - Description fonctionnelle des besoins

Un visiteur peut se profiter de plusieurs services y parmi : la recherché d’une location en précisant quelque paramètre : ville, date et temps de début et fin de location, l’Age du conducteur et un code promotionnel est optionnel le visiteur peut aussi préciser un lieu de restitution diffèrent.
Le visiteur peut aussi consulter les différents résultats de la recherche et les filtre en spécifiant de nouveaux critères [Agences – Type des voitures – kilométrage – Transmission – lie de prise en charge – capacité de la voiture … etc.], après la consultation des résultats le visiteur peut passer une réservation en fournissant des informations personnelles [nom, prénom, Email, Date de naissance, Carte d’identité national, téléphone, le numéro de vol est optionnel] et des information de paiement [le numéro de la carte bancaire, le cryptogramme et la date de fin de validité], il doit aussi choisir une option de protection ; le system peut lui recommander une option selon son Age. Après la confirmation de la demande par Email le système créera un compte par default du visiteur avec son Email et un mot de passe généré par défaut et le système envoi un email avec un lien pour changer le mot de passe.
Après la demande le visiteur devient attiquement un client dont il peut effectuer des recherches et des réservations, contacter le service client et ajouter des avis et noter des agences et des voitures, il peut même envoyer des plaints, gérer son profile [modification et suppression]

Le site web offres des services au entreprise de location des voitures dont ces derniers peuvent s’inscrire en précisant leurs informations [Raison sociale, adresse, logo, téléphone, fax, ville, statues juridique, description, email, mot de passe] elle doit aussi spécifier un code patente pour que système puisse vérifier la crédibilité de l’entreprise. Cette dernière peut spécifier des agences qui appartient à elle en spécifiant [ville, nombre total de voitures, nombre de voitures disponibles, nombre de voiture louées, l’adresse, Email, Téléphone] comme elle peut supprimer une agence ou modifier sont profile. Elle peut aussi gérer son parc de voitures comme l’ajout d’une voiture en spécifiant [matricule, agence, type, marque, nombre de places, couleur, description, années, état, assurance ou option de protection approprié, le statut (loué, disponible, en phase d’entretien, date de disponibilité)]. Les informations de la voiture plus précisément le statut peut être modifié, comme elle peut supprimer des voitures. Elle peut même consulter des statistiques sur les locations et ses agences et le parc des voitures.
L’entreprise peut fournir des codes promotionnels que les clients peuvent indiquer dans la recherche pour bénéficier des réductions.

Le gérant est un utilisateur qui peut approuver une inscription d’une entreprise, approuver la création d’une agence ou supprimer une entreprise, il peut aussi supprimer des comtes des client suite à des plaintes ou des réclamations comme il peut répondre à ces derniers.

Le système peut réagir dans plusieurs cas y inclus l’envoi des emails de confirmation d’une location et des emails de nouveautés, vérifier les informations de paiement et d’une entreprise [en utilisant le code patente]. Comme il peut offrir du support aux clients et visiteurs [smart bot].
Le système offre à l’agence des points pour chaque location d’une voiture, ces points seront utilisés pour trier le résultat de la recherche du client ou visiteur. Il est capable aussi de recalculer le prix total d’une location selon les options de protections choisis.
