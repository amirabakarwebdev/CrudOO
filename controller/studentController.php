<?php
/*
 * Contrôleur gérant les étudiants, la variable GET adminStudents
 *doit être présente pour acceder à ce contrôlleur
 * (et on doit être connecté evidemment)
*/

if (isset($_GET['addstagiaire'])){
    /*
     * On veut ajouter un stagiaire
     */

}else{

/*
 * Page d'accueil
 */


// Récupérer tous les stagiaires avec les sections dans lesquels ils sont, afficher les stagiaires
// qui n'ont pas de section également

    // on va chercher les stagiaires avec section et les stagiaire sans section
    $recup = $thestudentM->selectionnerStagiaire();
    echo $twig->render('admin/student/accueilAdminstudent.html.twig', ["student"=>$recup]);

}