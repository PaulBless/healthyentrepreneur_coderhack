<?php require_once '../../db/db.php'; ?>
         
                                        <?php   
                                        
                                        $getUserInfo = mysqli_query($connectionString,"SELECT * FROM pharmacists_table join status_table on pharmacists_table.pharmacists_status = status_table.status_id join role_table on pharmacists_table.pharmacists_role = role_table.role_id ORDER BY `pharmacists_timestamp` ASC")or die(mysqli_error($connectionString));
                                        while($userInfo = mysqli_fetch_array($getUserInfo)){  
                                            
                                            $get_users_Id = $userInfo['pharmacists_id'];
                                            $get_users_userId = $userInfo['pharmacists_user_id'];
                                            $get_users_fullname = $userInfo['pharmacists_firstname']." ".$userInfo['pharmacists_lastname'];
                                            $get_users_username = $userInfo['pharmacists_username'];
                                            $get_users_contact = $userInfo['pharmacists_contact'];
                                            $get_users_priority = $userInfo['role_name'];
                                            $get_users_status = $userInfo['status_name'];
                                            $get_users_last_login= $userInfo['pharmacists_timestamp'];   ?>

                                            <tr>
                                            <td><b>#<?php echo $get_users_userId;   ?></b></td>
                                            <td>
                                            <span class="ml-2"><?php echo $get_users_fullname;   ?></span>
                                            </td>

                                            <td>
                                            <?php echo $get_users_username;   ?>
                                            </td>

                                            <td>
                                            <?php echo $get_users_contact;   ?>
                                            </td>

                                            <td>
                                            <?php echo $get_users_priority;   ?>
                                            </td>

                                            <td>
                                                <span class="badge badge-light-secondary"><?php echo $get_users_status;   ?></span>
                                            </td>

                                            <td>
                                                <span class="badge badge-success"><?php echo $get_users_last_login ;  ?></span>
                                            </td>   

                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item edit-user-button" href="javascript:void(0)" data-id="<?php echo $get_users_Id; ?>"><i class="mdi mdi-pencil mr-2 text-primary font-18 vertical-middle" ></i>Edit User</a>
                                                        <a class="dropdown-item delete-user-button" href="javascript:void(0)" data-id="<?php echo $get_users_Id; ?>"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove User</a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>


                                      <?php  }
                                        ?>
                                      