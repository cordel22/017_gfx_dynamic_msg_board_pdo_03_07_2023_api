<?php
//  forum table
$jsonExportArr = [];
//  if (mysqli_num_rows($r) > 0) {
  /*  end TODO chatgpt idea...
    $row_count = $stmt->rowCount();
    if ($row_count > 0) {   
      end TODO chatgpt idea...*/

      //  Create a table:
      //  TODO
      //  old frontend: tiez daj v <>
      /*  TODO
      echo '<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
        <tr>
          <td align="left" width="50%"><em>' . $words['subject'] . '</em>:</td>
          <td align="left" width="20%"><em>' . $words['posted_by'] . '</em>:</td>
          <td align="center" width="10%"><em>' . $words['posted_on'] . '</em>:</td>
          <td align="center" width="10%"><em>' . $words['replies'] . '</em>:</td>
          <td align="center" width="10%"><em>' . $words['latest_reply'] . '</em>:</td>
        </tr>';
      end old frontend: tiez daj v <>*/
      //  Fetch each thread:
      //  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      
      
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      /*  
        echo '<tr>
                <td align="left"><a href="read.php?tid=' . $row['thread_id'] . '">'
          . $row['subject'] . '</a></td>
                 <td align="left">' . $row['username'] . '</td>
                 <td align="center">' . $row['first'] . '</td>
                 <td align="center">' . $row['responses'] . '</td>
                 <td align="center">' . $row['last'] . '</td>
              </tr>';
*/
        $jsonExportArr[] = $row;



      }
      
      







      
      /*
      echo '</table>';  //  Complete the table.
      */
      //  TODO chat gpt ide:
/*
// Build the data structure for the response
$data = [
  'forum_table' => $jsonExportArr
];

// Convert the data to JSON format
$jsonResponse = json_encode($data);

// Echo the JSON-encoded response
echo $jsonResponse;
  cele do <>, skus len $jsonExortArr*/

  //  end   TODO chat gpt ide:


      //  TODO
      //  we want to send the db export to json..
      //  echo json_encode($jsonExportArr);

    /*   TODO chatgpt idea...
    } else {
      echo '<p>There are currently no messages in this forum.</p>';
    }

    end TODO chatgpt idea...*/
    