<?php
namespace ResponseManager;

interface ControllerResponseInterface
{
    /**
     * createResponseFrom
     *
     * Returns a text response.
     * @return String
     */
    public function createResponse();
}
