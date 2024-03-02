<?php

use Core\Session;

Session::destroy();
sleep(2);
redirect("/login");