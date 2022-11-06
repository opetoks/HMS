<?php
echo'
                                 <div class="wallet-box-scroll">
                                    <div class="wallet-bradcrumb">
                                       <h2><i class="fas fa-users"></i> Staff List</h2>
                                       <div style="float:right;padding: 5px 10px;"><a href="?addstaff" type="button"><i class="fas fa-plus"></i> ADD STAFF</a></div>
                                    </div>';
                              echo'<div class="wallet-transaction clearfix">';
                              echo'<div class="table-responsive">
                                  <table class="table" style="font-size:12px;">
                                  <thead>
                                    <tr style="color:#001c71;">
                                      <th scope="col">STAFF ID</th>
                                      <th scope="col"> POSITION </th>
                                      <th scope="col"> ADMIN ROLE </th>
                                      <th scope="col"> NAME </th>
                                      <th scope="col"> CONTACT </th>
                                      <th scope="col"> EMAIL </th>
                                      <th scope="col"> EDIT ROLE</th>
                                      <th scope="col"> DELETE STAFF </th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                               $staff = $db->prepare("SELECT * FROM staff");
                               $staff->execute();
                               if($staff->rowCount() > 0){
                                  while($stafflist = $staff->fetch()){
                                  echo"
                                  <form method='post'>
                                  
                                    <tr>
                                      <td>".$stafflist['staff_id']."</td>
                                      <td>".$stafflist['postion']."</td>
                                      <td>".$stafflist['staff_role']."</td>
                                      <td>".$stafflist['fullname']."</td>
                                      <td>".$stafflist['contact']."</td> 
                                      <td>".$stafflist['saffmail']."</td>
                                      <th scope='row'>
                                        <a href='editstaff.php?id=".$stafflist['staffNo']."' class='btn btn-success btn-sm' type='button'><i class='fas fa-eye'></i></a>
                                      </th>
                                      <th scope='row'>
                                      <a onClick=\"javascript: return confirm('Are you sure you want to delete this staff?')\" href=?del=".$stafflist['staff_id']."><i class='fas fa-trash'></i></a>
                                      </th>
                                    </tr>
                                  </form>";
                                  }
                                }
                               else{
                                  echo'
                                  <tr>
                                   <td> No staff listed </td>
                                  </tr>';
                               }
                              echo'</tbody>
                                   </table>
                                   </div>
                                 </div>
                               </div>
                              ';
?>