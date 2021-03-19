<?php

function blade($fileContent = null, $data = [])
{

    foreach ($data as $data_key => $data_val) {

        if (gettype($data_val) === "object" || gettype($data_val) === "array") {
            $data_val = json_encode($data_val, JSON_UNESCAPED_UNICODE);
        }

        $fileContent = str_replace("{{ $$data_key }}", $data_val, $fileContent);
    }

    return $fileContent;
}
