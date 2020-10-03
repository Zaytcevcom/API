<?php

declare(strict_types=1);

namespace api\controllers;

/**
 * @OA\Info(title="API Documentation", version="1.0")
 */
class MainController
{
    protected $request  = null;
    protected $response = null;
    protected $args     = null;
    protected $params   = [];

    protected $user_id      = null;
    protected $access_token = null;

    public function __construct($request, $response, $args)
    {
        $this->request  = $request;
        $this->response = $response;
        $this->args     = $args;
        
        $this->setParams();
    }

    protected function setParams()
    {
        foreach($this->request->getQueryParams() as $key => $value) {
            $this->params[$key] = $value;
        }

        foreach($this->request->getParsedBody() as $key => $value) {
            $this->params[$key] = $value;
        }
    }

    public function getParams()
    {
        return $this->params;
    }

    /* *** Check request params ********************************* */

    public function checkRequireFields($fields)
    {
        $data = [];

        $params = $this->getParams();

        foreach ($fields as $field) {
            if (!isset($params[$field])) {
                $data[] = $field;
            }    
        }

        return $data;
    }

    public function needFields($fields)
    {
        $message = 'Missing a required field: `' . $fields[0] . '`';

        return $this->error(1, $message);
    }

    public function getToStringOrNull(string $param)
    {
        $params = $this->getParams();

        if (isset($params[$param])) {
            return (string)trim($params[$param]);
        }

        return null;
    }

    public function getToString(string $param) : string
    {
        $data = $this->getToStringOrNull($param);

        if ($data === null) {
            return (string)'';
        }

        return (string)$data;
    }

    public function getToIntOrNull(string $param)
    {
        $params = $this->getParams();

        if (isset($params[$param])) {
            return (int)$params[$param];
        }

        return null;
    }

    public function getToInt(string $param) : int
    {
        $data = $this->getToIntOrNull($param);

        if ($data === null) {
            return (int)0;
        }

        return (int)$data;
    }

    public function getToArrayInt(string $param) : array
    {
        $data = [];

        $params = $this->getParams();

        if (isset($params[$param])) {

            $arr = explode(',', trim($params[$param]));

            foreach ($arr as $value) {
                $data[] = (int)$value;
            }
        }

        return array_unique($data);
    }

    public function getToArrayString(string $param) : array
    {
        $data = [];

        $params = $this->getParams();

        if (isset($params[$param])) {

            $arr = explode(',', trim($params[$param]));

            foreach ($arr as $value) {

                $value = (string)trim($value);

                if ($value == '') {
                    continue;
                }
                
                $data[] = $value;
            }
        }

        return array_unique($data);
    }

    public function getToPhoneOrNull(string $param)
    {
        $params = $this->getParams();

        if (isset($params[$param])) {
            return (string)$this->phoneTrim($params[$param]);
        }

        return null;
    }

    /* *** Check count and offset ******************************* */

    public function checkCount(int $count = null, int $max_value = null) : int
    {
        $count = (int)$count;

        if ($count <= 0) {
            $count = $max_value;
        }

        if ($max_value !== null && $count > $max_value) {
            $count = $max_value;
        }

        return (int)$count;
    }

    public function checkOffset(int $count = null) : int
    {
        $count = (int)$count;

        if ($count < 0) {
            $count = 0;
        }

        return (int)$count;
    }

    /* *** Response ********************************************* */

    /**
     * @param mixed $data
     * @param int $status
     * @param string $reason
     */
    protected function response($data = null, int $status = 200, string $reason = '')
    {
        $response = $this->response;

        if ($data !== null) {
            $response
                ->getBody()
                //->write(json_encode($data));
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

        return $response
            ->withHeader('Access-Control-Allow-Origin', $this->request->getHeaderLine('HTTP_ORIGIN'))
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withStatus($status, $reason);
    }

    /**
     * @param int $code
     * @param string $message
     */
    public function error(int $code, string $message = '')
    {
        $data = [
            'code'    => $code,
            'message' => $message
        ];

        return $this->failure($data, 405, $data['message']);
    }

    /**
     * Return success response
     */
    public function success($data)
    {
        return $this->response(['response' => $data], 200);
    }

    /**
     * Return error response
     */
    public function failure($data = null, int $status = 405, string $reason = '')
    {
        return $this->response(['error' => $data], $status, $reason);
    }

    /**
     * Return response - Method not allowed
     */
    public function methodNotAllowed()
    {
        $data = [
            'code'    => 405,
            'message' => 'Method not allowed'
        ];

        return $this->failure($data, 405, $data['message']);
    }

    /* *** Unique *********************************************** */

    /**
     * Return unique string
     */
    public function uniqid(string $str = '')
    {
        return time() . '.' . md5($str . 'z' . uniqid());
    }

    /* *** Checking ********************************************* */
    
    public function phoneCheck(string $phone = null) : int
    {
        $phone = $this->phoneTrim($phone);

        $length = strlen($phone);

        if ($length == 11) {
            return 1;
        }

        return 0;
    }

    public function phoneTrim(string $phone = null)
    {
        $arr = [' ', '(', ')', '+', '-', '.'];

        $str = str_replace($arr, '', $phone);

        if ($str == '') {
            return null;
        }

        return $str;
    }
}