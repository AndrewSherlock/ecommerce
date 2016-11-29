
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-3" style="margin-top: 10px;"></div>
                <div class="col-md-6">
                    <h2 class="text-center">User List</h2>
                </div>
                <div class="col-md-3" style="margin-top: 10px;">
                    <a href="index.php?action=adduser" class="btn-lg btn btn-primary">Add User</a>
                    <a href="index.php?action=admin" class="btn btn-primary btn-lg">Return to admin</a>
                </div>
                <hr>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Join Date</th>
                            <th>Last Login</th>
                            <th>Image</th>
                            <th>Account Type</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < count($userList); $i++) :?>
                        <tr>
                            <td><?= $userList[$i][1]->getName();?></td>
                            <td><?= $userList[$i][1]->getEmail();?></td>
                            <td><?= $userList[$i][1]->getAddress();?></td>
                            <td><?= $userList[$i][1]->getPhone();?></td>
                            <td><?= $userList[$i]['join_date'];?></td>
                            <td><?= (($userList[$i]['last_login'] == '0000-00-00')? 'Never' : $userList[$i]['join_date']);?></td>
                            <td><?= $userList[$i][1]->getImage();?></td>
                            <td><?= $userList[$i][1]->getAccountType();?></td>
                            <td>
                                <a href="index.php?action=edituser&id=<?=$userList[$i]['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon-pencil glyphicon"></span></a>
                                <a href="index.php?action=delete&id=<?=$userList[$i]['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon-remove glyphicon"></span></a>
                            </td>
                        </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
