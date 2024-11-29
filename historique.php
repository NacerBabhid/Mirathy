<?php

                include "connexion_PDO.inc.php";

                /*use Illuminate\Support\Facades\Auth;

                $user_id = Auth::id();*/
                $date = '5/25/2023';//cette variable doit etre suprimé et son appel
                //doit etre remplaçer par la valeur date du creation dans la base de 
                //donne, $row['CreatedAt']

                $user_id = $_SESSION['user_id'];//cette ligne est à remplaçait par le code si dessous
                /*use Illuminate\Support\Facades\Auth;

                $user_id = Auth::id();*/

                $rowsPerPage= 10;

                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                $startRow = ($current_page - 1) * $rowsPerPage;

                $pdo = connectMyDB();

                $query = "SELECT * FROM defunts WHERE user_id = ? LIMIT ?,?";

                $stmt = $pdo->prepare($query);

                $values = [$user_id,$startRow,$rowsPerPage];

                $stmt->execute($values);

                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo'<table class="table table-striped" align ="center">
                <thead class="thead-dark">
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Date d\'enregistrement</th>
                </tr>
                </thead>';

                foreach($rows as $row){
                    echo'<tr class="clickable-row" onclick="rowClick(\''.$row['defunt_id'].'\')"><td>'.(($row['nom']!="")?$row['nom']:"N/A").'</td><td>'.(($row['prenom']!="")?$row['prenom']:"N/A").'</td><td>'.$date.'</td></tr>';
                }
                echo'</table>';


                //le nombre total des enregistrement
                $totalRows = 10;

                //calculer le nombre total des pages
                $totalPages = ceil($totalRows / $rowsPerPage);

                echo '<br>';
                if ($current_page > 1) {
                    echo '<a href="?page=' . ($current_page - 1) . '">Previous</a> ';
                }
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '">' . $i . '</a> ';
                }
                if ($current_page < $totalPages) {
                    echo '<a href="?page=' . ($current_page + 1) . '">Next</a>';
                }
                ?>
                