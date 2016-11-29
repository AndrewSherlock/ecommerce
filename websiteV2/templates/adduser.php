<?php

?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-8">
                <h3>Sign Up</h3>
                <form action="<?=(($_GET['action'] == 'adduser')? 'index.php?action=adduser':'index.php?action=edituser&id='.$_GET['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                            <label for="user_name" class="col-xs-2 col-form-label">Name : </label>
                        <div class="col-xs-7">
                            <input type="text" name="user_name" id="user_name" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $userObj->getName():'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                    </div>
                    <div class="form-group row">
                        <label for="user_street1" class="col-md-2 pull-left">Street name : </label>
                        <div class="col-xs-7">
                            <input type="text" name="user_street1" id="user_street1" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $address[0]:'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                    </div>
                    <div class="form-group row">
                        <label for="user_city" class="col-md-2 pull-left">City : </label>
                        <div class="col-xs-7">
                            <input type="text" name="user_city" id="user_city" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $address[1]:'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                    </div>
                    <div class="form-group row">
                        <label for="user_county" class="col-md-2 pull-left">County : </label>
                        <div class="col-xs-7">
                            <input type="text" name="user_county" id="user_county" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $address[2]:'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                    </div>
                    <div class="form-group row">
                        <label for="user_country" class="col-md-2 pull-left">Country : </label>
                        <div class="col-xs-7">
                            <input type="text" name="user_country" id="user_country" class="form-control" value="<?= (($_GET['action'] == 'edituser'))? $address[2]:'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger"></span>
                   </div>
                    <div class="form-group row">
                        <label for="user_phone" class="col-md-2 pull-left">Phone : </label>
                            <div class="col-xs-7">
                                 <input type="tel" pattern="\d{10}" title="Please Enter Your Number in the format 1231234567" name="user_phone" id="user_phone" class="form-control" value="<?= (($_GET['action'] == 'edituser'))?  $userObj->getPhone() :'';?>">
                            </div>
                            <span class="glyphicon glyphicon-asterisk text-danger">
                    </div>
                    <div class="form-group row">
                        <label for="user_email" class="col-md-2 pull-left">Email  : </label>
                        <div class="col-xs-7">
                            <input type="email" name="user_email" id="user_email" class="form-control" value="<?= (($_GET['action'] == 'edituser'))?  $userObj->getEmail():'';?>">
                        </div><span class="glyphicon glyphicon-asterisk text-danger">
                    </div>
                    <?php if(($_GET['action'] == 'adduser') || ($_GET['id'] == $_SESSION['id'])):?>
                    <div class="form-group row">
                        <label for="user_password" class="col-md-2 pull-left"> Password: </label>
                        <div class="col-xs-7">
                            <input type="password" minlength="6" name="user_password" id="user_password" class="form-control">
                        </div><span class="glyphicon glyphicon-asterisk text-danger">
                    </div>
                    <div class="form-group row">
                        <label for="user_confirm" class="col-md-2 pull-left">Confirm password : </label>
                        <div class="col-xs-7">
                            <input type="password" minlength="6" name="user_confirm" id="user_confirm" class="form-control">
                        </div> <span class="glyphicon glyphicon-asterisk text-danger">
                    </div>
                    <?php endif;?>
                    <div class="form-group row">
                        <label class="col-md-12 pull-left">Account Type :</label>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2"> <!--NEED JAVASCRIPT ONLY TO PICK ONE -->
                            <label class="custom-control custom-radio">
                                <input id="radio" name="account" type="radio" value="regular" class="custom-control-input" <?= ((isset($userObj) &&  $userObj->getAccountType() == 'regular'))? 'checked':'';?>>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> Regular</span>
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label class="custom-control custom-radio">
                                <input id="radio" name="account" type="radio" value="gold" class="custom-control-input" <?= ((isset($userObj) && $userObj->getAccountType() == 'gold'))? 'checked':'';?>>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> Gold</span>
                            </label>
                        </div>
                        <?php if(isset($_SESSION['account_type']) && ($_SESSION['account_type'] == 'admin' || $_SESSION['account_type'] == 'editor')) : ?>
                        <div class="col-lg-2">
                            <label class="custom-control custom-radio">
                                <input id="radio" name="account" type="radio" value="editor" class="custom-control-input" <?= ((isset($userObj) && $userObj->getAccountType() == 'editor'))? 'checked':'';?>>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> Editor</span>
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label class="custom-control custom-radio">
                                <input id="radio" name="account"  value="admin" type="radio" class="custom-control-input" <?= ((isset($userObj) && $userObj->getAccountType() == 'admin'))? 'checked':'';?>>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"> Admin</span>
                            </label>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="form-group row">
                        <label for="file_upload" class="col-md-2 pull-left">User Image : </label>
                        <div class="col-xs-7">
                            <input type="file" name="file_upload" id="file_upload" class="col-md-8 text-center">
                        </div>
                    </div>
                    <input type="hidden" name="addedby" value="<?=((isset($_SESSION['userName']))? $_SESSION['userName'] : 'Self');?>">
                    <div class="col-md-9 text-center">
                        <input type="submit" class="btn btn-lg btn-default" value="<?=(($_GET['action'] == 'adduser')? 'Sign Up User' : 'Edit user' )?>">
                        <a href="index.php?action=index" class="btn btn-lg btn-default">Return To Home</a>
                    </div>
                </form>
            </div>
            <?php if($_GET['action'] == 'edituser') :?>
            <div class="col-md-4 edit_image">
                <h2 class="text-center">User Image</h2>
                <img src="<?=$userObj->getImage()?>" alt="<?=$userObj->getName()?>">
            </div>
            <?php endif;?>
        </div>
    </div>
</main>
