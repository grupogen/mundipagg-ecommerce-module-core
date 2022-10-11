<?php

namespace Mundipagg\Core\Kernel\Exceptions;

use JsonSerializable;

abstract class AbstractMundipaggCoreException
    extends \Exception
    implements JsonSerializable
{

     /**
      * Specify data which should be serialized to JSON
      *
      * @link   https://php.net/manual/en/jsonserializable.jsonserialize.php
      * @return mixed data which can be serialized by <b>json_encode</b>,
      * which is a value of any type other than a resource.
      * @since  5.4.0
      */
    public function jsonSerialize(): mixed
    {
        $obj = new \stdClass();

        $obj->type = static::class;
        $obj->code = $this->getCode();
        $obj->message = $this->getMessage();
        $obj->file = $this->getFile();
        $obj->line = $this->getLine();
        $obj->trace = $this->getTraceAsString();

        return $obj;
    }
}