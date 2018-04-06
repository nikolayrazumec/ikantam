<?php defined('_CONTROL') or die; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">IKANTAM</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?= $cPagesInclud::$page == 'main' ? "active" : ""; ?>"><a href="/">Main</a>
                            </li>

                            <?php
                            /**
                            uncomment
                            if you need pagination*/

                            if (!empty($_SESSION["user_name"])) {
                                foreach ($cPagesInclud::SHOWPAGE as $key => $value) {
                                    echo '<li class="' . ($cPagesInclud::$page == $key ? "active" : "") . '"><a href="?page=' . $key . '">' . $value . '</a></li>';
                                }
                            }
                            ?>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <?php
                            if (!empty($_SESSION["user_name"])) {
                                echo '<li><a href="?page=' . $cPagesInclud::MYLOGIN['exit'] . '">' . $_SESSION["user_name"] . '/' . $cPagesInclud::MYLOGIN['exit'] . '</a></li>';
                            } else {
                                echo '<li><a href="?page=' . $cPagesInclud::MYLOGIN['login'] . '">' . $cPagesInclud::MYLOGIN['login'] . '</a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>