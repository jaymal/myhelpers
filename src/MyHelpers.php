<?php 

namespace Helpful\MyHelpers;


/**
 *  A class used as my personal collection of custom helpers
 *
 * @author Jamal Aruna <arunajamal@yahoo.com>
 */
class MyHelpers
{
    
    /**
     * Output API response in Json
     *
     * @param array  $data            data to encode
     * @param string $status          action status to be fail,success or error
     * @param int    $code            http response code
     * @param string $message         optional display message with the response
     * @param array  $headers         header type to
     * @param int    $encodingOptions optional json encodiing options
     *
     * @return json
     */
    function printJson($data = [], $status='success', $code = 201, $message='', array $headers = [], $encodingOptions = 0)
    {
        if (!in_array($status, ['fail', "success", "error"])) {
            throw new \Exception(
                'Invalide status value'
            );

        }
        $data = ['data'  => $data ];
        $data += ['status' => $status, 'code'=> $code, 'message' => $message ];

        header('Content-Type: application/json');
        http_response_code($code); //for php >= 5.4 

        $jsonData  = json_encode($data, $encodingOptions);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    'Unable to encode data to JSON in %s: %s',
                    __CLASS__,
                    json_last_error_msg()
                )
            );
        }

        return $jsonData;

    }

}
