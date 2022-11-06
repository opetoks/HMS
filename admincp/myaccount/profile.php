<div class="wallet-box-scroll">
                        <div class="wallet-bradcrumb">
                           <h2><i class="fas fa-user"></i> Profile</h2>
                        </div>
                        <div class="profile-page-area clearfix">
                           <form name="profile" method="post">
                           <div class="profile-page-area-main">
                              
                              <div class="profile-information-right">
                                 <div class="profile-information-box">
                                    
                                    <div class="theme-input-box">
                                       <label>First Name</label>
                                       <input type="text" name="firstname" value="<?php if(isset($row['firstname'])) { echo $row['firstname']; } ?>" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>Last Name</label>
                                       <input type="text" name="lastname" value="<?php if(isset($row['lastname'])) { echo $row['lastname']; } ?>" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>Email</label>
                                       <input type="email" name="emailaddress" value="<?php if(isset($row['emailaddress'])) { echo $row['emailaddress']; } ?>" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>Phone</label>
                                       <input type="number" name="mobile_number" value="<?php if(isset($row['mobile_number'])) { echo $row['mobile_number']; } ?>" class="theme-input">
                                    </div>
                                    <div class="profile-btn">
                                       <button class="theme-btn" type="submit" name="profilebtn">Save</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </form>
                           <div class="profile-reset-password">
                              <div class="profile-information-box">
                                 <h2 class="dashboard-title">Reset Password</h2>
                                    <div class="theme-input-box">
                                       <label>Email</label>
                                       <input type="email" name="" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>Old Password</label>
                                       <input type="Password" name="" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>New Password</label>
                                       <input type="Password" name="" class="theme-input">
                                    </div>
                                    <div class="theme-input-box">
                                       <label>Confirm Password</label>
                                       <input type="Password" name="" class="theme-input">
                                    </div>
                                    <div class="profile-btn">
                                       <button type="submit" name="resetbtn" class="theme-btn">Update</button>
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>