<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 21/11/2016
 * Time: 22:01
 */?>
<main>
    <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="text-center">Contact Us</h2>
            <form action="index.php?action=contact&sent=true" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="contact_email" class="col-xs-2 col-form-label">Contact Email : </label>
                    <div class="col-xs-7">
                        <input type="text" name="contact_email" id="contact_email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subject" class="col-xs-2 col-form-label">Subject : </label>
                    <div class="col-xs-7">
                        <input type="text" name="subject" id="subject" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-xs-2 col-form-label">Message : </label>
                    <div class="col-xs-7">
                        <textarea rows="8" name="message" id="message" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-primary btn-lg">
                    <a href="" class="btn btn-primary btn-lg">Return</a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</main>
