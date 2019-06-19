<?php
/*
 * Contrôleur gérant les étudiants, la variable GET adminStudents
 *doit être présente pour acceder à ce contrôlleur
 * (et on doit être connecté evidemment)
*/

if (isset($_GET['addstagiaire'])){

}else{



/*
 * Page d'accueil
 */


// Récupérer tous les stagiaires avec les sections dans lesquels ils sont, afficher les stagiaires
//
echo $twig->render("admin/student/accueilAdminstudent.html.twig", []);

}