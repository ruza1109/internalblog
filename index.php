<?php

use App\Database\Database;

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/src/Config/helpers.php';

dd(Database::getInstance()); //TODO Remove after testing