<?php

defined('publisher') || exit('publisher: access denied.');

Auth::authorization();
Auth::logOut();

header("Location: ./");

exit();