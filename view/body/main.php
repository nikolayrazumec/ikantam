<?php defined('_CONTROL') or die;
//include_once 'lib/Status.classes.php';
//use MyClasses\Status as Status;
//$status = Status::getInstance();
?>
<div class="container">
    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <div class="form-group">
                    <label for="SelectStatus">Сортировать по:</label>


                    <button type="button" onclick="getClient()" class="btn btn-info">Подобрать клиента</button>
                </div>
            </div>
        </div>

        <div hidden class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-danger" id="notify">
            <h4>Идет подбор клиента, подождите!</h4>
        </div>

        <div hidden class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-success" id="form_god">
            <h4>Успех, можно выбрать другого клиента</h4>
        </div>

    </div>
</div>


<script src="assets/js/main.js"></script>