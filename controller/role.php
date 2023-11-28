<?php  
// role 0 (visiteur) => aucun acces sauf la page d'acceuil 
// role 1 (client)=> acces uniquement à la liste des enfants
// role 2 (secretariat) => acces a la liste des enfants et la creation des enfants.
// role 3 (admin) => acces a tout
//if ( $_SESSION["role"] > 2)

enum Role : int
{
    case GUEST = 0;
    case CUSTOMER = 1;
    case SECRETARY = 2;
    case ADMIN = 3;
}
