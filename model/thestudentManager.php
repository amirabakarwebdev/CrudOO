<?php

/*
 * Manager des objets de type thestudent
 */

class thestudentManager
{
    private $db;

    public function __construct(MyPDO $connect)
    {
        $this->db = $connect;
    }

    // on sélectionne les étudiants de la section actuelle grâce à son id
    public function selectionnerStudentBySectionId(int $idsection): array {

        if($idsection===0) return [];

        $sql="SELECT thestudent.*
	FROM thestudent
    INNER JOIN thesection_has_thestudent
		ON thesection_has_thestudent.thestudent_idthestudent= thestudent.idthestudent
    WHERE  thesection_has_thestudent.thesection_idthesection=?;";

        $recup = $this->db->prepare($sql);
        $recup->bindValue(1,$idsection,PDO::PARAM_INT);
        $recup->execute();

        if($recup->rowCount() ===0) return [];

        return $recup->fetchAll(PDO::FETCH_ASSOC);

    }

    // on sélectionne les étudiants de la section actuelle grâce à son id
    public function selectionnerStagiaire(): array {

        $sql="SELECT thestudent.*, thesection.thetitle
	FROM thestudent
    left JOIN thesection_has_thestudent
		ON thesection_has_thestudent.thestudent_idthestudent= thestudent.idthestudent left JOIN thesection ON thesection.idthesection = thesection_has_thestudent.thesection_idthesection;";

        $recup = $this->db->query($sql);


        if($recup->rowCount() ===0) return [];

        return $recup->fetchAll(PDO::FETCH_ASSOC);

    }

    public function ajouterStagiaire(thestudent $data): bool {
        $sql = "INSERT INTO thestudent(thename, thesurname) VALUES (?,?)";

        $insert = $this->db->prepare($sql);
        $insert->bindValue(1, $data->getThename(), PDO::PARAM_STR);
        $insert->bindValue(2, $data->getThesurname(), PDO::PARAM_STR);

        try{
            $insert->execute();
            return true;
        }catch(PDOExeception $e){
            echo $e->getCode();
            return false;
        }
      }
   }