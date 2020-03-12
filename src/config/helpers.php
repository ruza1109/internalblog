<?php

    function env($envKey)
    {
        $content = file_get_contents(".env");
        $row = explode(PHP_EOL,$content);
        $param = [];

        foreach ($row as $key)
        {
            if($key)
            {
                $key = explode("=", $key);
                $param += [
                    $key[0] => $key[1]
                ];
            }
        }

        return $param[$envKey];
    }

