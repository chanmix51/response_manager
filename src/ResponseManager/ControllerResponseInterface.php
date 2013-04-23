<?php
namespace ResponseManager;

interface ControllerResponseInterface
{
    /**
     * createResponseFrom
     *
     * Returns a text response from a controller response.
     * @param ControllerReponse $response
     * @return String
     */
    public function createResponse();
}
