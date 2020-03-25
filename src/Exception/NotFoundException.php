<?php

namespace App\Exception;

class NotFoundException extends AbstractException implements IException
{
    public function handleError()
    {
        return "<h2>NOT FOUND</h2>
        <b>Error message:</b> " . $this->getMessage() .
        "<br><b>Code:</b> " . $this->getCode() .
        "<br><b>File:</b> " . $this->getFile() .
        "<br><b>On line:</b> " . $this->getLine() .
        "<br><b>Trace:</b> " . $this->getTraceAsString();
    }
}