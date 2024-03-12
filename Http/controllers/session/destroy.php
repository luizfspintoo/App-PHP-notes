<?php

use Core\Session;

Session::destroy();
sleep(1);
redirect("/login");