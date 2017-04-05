<?php
  // include Database connection file
  include("dbconfig.php");

  // Design initial table header
  $data = '<table class="table table-bordered table-striped">
                      <tr>
                          <th>Term</th>
                          <th>Definition</th>
                          <th>Update</th>
                          <th>Delete</th>
                      </tr>';

  try{
    $query = $db_con->prepare("SELECT term,definition FROM Cards");
    $query->execute();
    $count=$query->rowCount();

    if($count>0){
      while($row = $query->fetchAll(PDO::FETCH_ASSOC)){
        $data .= '<tr>
          <td>'.$row['term'].'</td>
          <td>'.$row['definition'].'</td>
          <td>
              <button onclick="getCard('.$row['cid'].')" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
          </td>
          <td>
              <button onclick="deleteCard('.$row['cid'].')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
          </td>
        </tr>';
      }
    }
    else{
        // records not found
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
    $data .= '</table>';

    echo $data;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }

?>
