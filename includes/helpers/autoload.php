<?php

foreach(glob(__DIR__ . '/*_helper.php') as $helper) {
    include_once($helper);
}