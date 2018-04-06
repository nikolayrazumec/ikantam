<?php
defined('_CONTROL') or die;
include_once "/control/exist.php";
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" name="fileinfo">

                <div id='Title1div' class="bs-example">
                    <label class="control-label" for="Title1">Title
                        <span id="Title1Status">(error)</span>
                    </label>
                    <input type="text" name="Title" class="form-control" id="Title1" placeholder="Title" required>
                </div>

                <div id='Text11div' class="bs-example">
                    <label class="control-label" for="Text11">Text
                        <span id="Text1Status">(error)</span>
                    </label> <textarea id="Text1" name="text" class="form-control" rows="3" required
                                       placeholder="Text" ></textarea>
                </div>

                <div class="bs-example">
                    <input type="file" name="file" accept="image/*" required/>
                    <p hidden id='p1' class="bg-danger">Not file, max 4 megabytes</p>

                    <input class="btn btn-primary" type="submit" value="Submit"/>

                </div>

            </form>
        </div>
    </div>
</div>

<script src="assets/js/add.js"></script>
<script src="assets/js/add_and_redact.js"></script>