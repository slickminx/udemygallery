
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php 
                            // if($database->dbc){
                            //     echo 'true';
                            // }

                           // $stmt = User::find_all_users();
                            //var_dump($stmt);
                            //echo $stmt;
                          //  $stmt = User::find_user_by_id(4);
                    

                            // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            //    echo $row['username'] . "<br/>";
                            // }
                            //echo var_dump($stmt);

                          //  $user = User::instantation($stmt);
                           

                            //echo $user->username;
                            
                           // echo $stmt['username'];

                           //Video 47
                                //Commented out in Video 48
                            //   $users = User::find_all_users();
                            //    // var_dump($users);
                            //   foreach($users as $user){
                            //     echo $user->id . "<br>";
                            //   }

                            //Video 48
                            $found_user = User::find_user_by_id(4);
                            //var_dump($found_user);
                            
                            echo $found_user->username;

                            //$pictures = new Pictures();
                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                </div>
                <!-- /.container-fluid -->