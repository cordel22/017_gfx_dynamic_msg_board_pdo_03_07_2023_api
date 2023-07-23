<?php
//  Retrieve all the languages...

//  seems like duplicit TODO
$jsonExportArr = [];
$forumlang = [];

$q = "SELECT lang_id, lang FROM languages ORDER BY lang_eng ASC";
                          
                          $stmt = $pdo->query($q);
                          $row_count = $stmt -> rowCount();
                          
                          if ($row_count > 0) {
                            
                            while ($menu_row = $stmt->fetch(PDO::FETCH_NUM)) {
                              /*  TODO dont print, needs front cuz to json
                              echo "<option value=\"$menu_row[0]\">$menu_row[1]</option>\n";
                              */
                              $jsonExportArr[] = $menu_row;
                            }
                            $forumlang =  $jsonExportArr;
                          }
                          //  mysqli_free_result($r);
                          $stmt->closeCursor();