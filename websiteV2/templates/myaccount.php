
    <div class="col-md-12">
        <h2 class="text-center"><?=ucfirst($curUser->getName());?> </h2>
        <img src="<?=$curUser->getImage()?>" alt="<?=$curUser->getName()?>" class="center-block" id = "account_img">
        <hr>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h2 class="text-center">Account Information</h2>
            <table class="table table-condensed table-striped table-bordered">
                <tbody class="text-center">
                    <tr>
                        <th>Name : </th>
                        <td><?=ucfirst($curUser->getName());?></td>
                    </tr>
                    <tr>
                        <th>E-mail : </th>
                        <td><?=ucfirst($curUser->getEmail());?></td>
                    </tr>
                    <tr>
                        <th>Phone : </th>
                        <td><?=$curUser->getPhone();?></td>
                    </tr>
                    <tr>
                        <th>Address : </th>
                        <td><?=ucfirst($address[0]);?></td>
                    </tr>
                    <tr>
                        <th>City : </th>
                        <td><?=ucfirst($address[1]);?></td>
                    </tr>
                    <tr>
                        <th>County : </th>
                        <td><?=ucfirst($address[2]);?></td>
                    </tr>
                    <tr>
                        <th>Country : </th>
                        <td><?=ucfirst($address[3]);?></td>
                    </tr>
                    <tr>
                        <th>Account Type : </th>
                        <td><?=ucfirst($curUser->getAccountType());?></td>
                    </tr>
                    <tr>
                        <th>Added By : </th>
                        <td><?=ucfirst($curUser->getAddedBy());?></td>
                    </tr>
                </tbody>
            </table>
            <a href="index.php?action=edituser&id=<?=$validateF->sanitize($_SESSION['id'])?>" class="btn btn-primary btn-lg">Edit</a>
            <a href="index.php?action=delete&id=<?=$validateF->sanitize($_SESSION['id'])?>" class="btn btn-primary btn-lg">Delete</a>
        </div>
    </div>
</main>
