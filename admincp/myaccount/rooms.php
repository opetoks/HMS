<?php
echo'
                                 <div class="wallet-box-scroll">
                                    <div class="wallet-bradcrumb">
                                       <h2><i class="fas fa-bed"></i> Rooms List</h2>
                                    </div>';
                              echo'<div class="wallet-transaction clearfix">';
                              echo'<div class="table-responsive">
                                  <table class="table" style="font-size:12px;">
                                  <thead>
                                    <tr style="color:#001c71;">
                                      <th scope="col">ROOM ID</th>
                                      <th scope="col"> ROOM NUMBER </th>
                                      <th scope="col"> DESCRIPTION </th>
                                      <th scope="col"> ROOM TYPE </th>
                                      <th scope="col"> STATUS </th>
                                      <th scope="col"> PRICE </th>
                                      <th scope="col"> View room</th>
                                      <th scope="col"> Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                               $rooms = $db->prepare("SELECT * FROM Rooms");
                               $rooms->execute();
                               if($rooms->rowCount() > 0){
                                  while($roomlist = $rooms->fetch()){
                                    if($roomlist["Rstatus"] == 'YES'){
                                      $roomlist["Rstatus"] = "Available";
                                    }
                                  echo"
                                  <form method='post'>
                                  
                                    <tr>
                                      <td>".$roomlist['roomID']."</td>
                                      <td>".$roomlist['roomNo']."</td>
                                      <td>".$roomlist['roomDescription']."</td>
                                      <td>".$roomlist['roomType']."</td>
                                      <td>".$roomlist['Rstatus']."</td> 
                                      <td>".$roomlist['price']."</td>
                                      <th scope='row'>
                                        <a href='viewrooms.php?id=".$roomlist['roomNo']."' class='btn btn-success btn-sm' type='button'><i class='fas fa-eye'></i></a>
                                      </th>
                                      <th scope='row'>
                                      <a onClick=\"javascript: return confirm('Are you sure you want to delete this room?')\" href=?del=".$roomlist['roomID']."><i class='fas fa-trash'></i></a>
                                      </th>
                                    </tr>
                                  </form>";
                                  }
                                }
                               else{
                                  echo'
                                  <tr>
                                   <td> No rooms listed </td>
                                  </tr>';
                               }
                              echo'</tbody>
                                   </table>
                                   </div>
                                 </div>
                               </div>
                              ';
?>