<?php
echo'
                                 <div class="wallet-box-scroll">
                                    <div class="wallet-bradcrumb">
                                       <h2><i class="fas fa-users"></i> Customers List</h2>
                                       <div style="float:right;padding: 5px 10px;"><a href="?addstaff" type="button"><i class="fas fa-plus"></i> ADD STAFF</a></div>
                                    </div>';
                              echo'<div class="wallet-transaction clearfix">';
                              echo'<div class="table-responsive">
                                  <table class="table" style="font-size:12px;">
                                  <thead>
                                    <tr style="color:#001c71;">
                                      <th scope="col"> # </th>
                                      <th scope="col"> FULLNAME </th>
                                      <th scope="col"> EMAIL </th>
                                      <th scope="col"> MOBILE NUMBER </th>
                                      <th scope="col"> CLIENT SINCE </th>
                                      <th scope="col"> E-WALLET </th>
                                      <th scope="col"> EDIT </th>
                                      <th scope="col"> DELETE </th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                               $users = $db->prepare("SELECT * FROM users");
                               $users->execute();
                               if($users->rowCount() > 0){
                                  while($userslist = $users->fetch()){
                                  echo"
                                  <form method='post'>
                                  
                                    <tr>
                                      <td>".$userslist['id']."</td>
                                      <td>".$userslist['fullname']."</td>
                                      <td>".$userslist['emailaddress']."</td>
                                      <td>".$userslist['mobile_number']."</td>
                                      <td>".$userslist['signup_time']."</td> 
                                      <td>".$userslist['ewallet']."</td>
                                      <th scope='row'>
                                      <a class='btn btn-success btn-sm' data-toggle='modal' data-target='#editModal' data-id='".$userslist['id']."'><i class='fas fa-pen'></i> view </a>
                                      </th>
                                      <th scope='row'>
                                      <a onClick=\"javascript: return confirm('Are you sure you want to delete this user?')\" href=?userdel=".$userslist['id']."><i class='fas fa-trash'></i></a>
                                      </th>
                                    </tr>
                                  </form>";
                                  }
                                }
                               else{
                                  echo'
                                  <tr>
                                   <td> No Customers listed </td>
                                  </tr>';
                               }
                              echo'</tbody>
                                   </table>
                                   </div>
                                 </div>
                               </div>
                              ';
?>