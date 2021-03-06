<?php
namespace core\http;

/**
 * Class Response
 * Deals with HTTP Response
 * @package core\http
 */
class Response{
    /**
     * Render a view
     * @param string $view Path and filename without '.php' extension
     * @param array $data Array with variables that can be seen on view
     */
    public static function view(string $view, array $data){
        extract($data);
        include ROOT_DIR."/app/view/{$view}.php";
    }

    /**
     * @param $data Object or Array to be send
     * @return string Return JSON String
     */
    public static function json($data) : string{
        Header::set("Content-Type", "application/json");

        $json = json_encode($data, JSON_PARTIAL_OUTPUT_ON_ERROR);
        echo $json;
        return $json;
    }
}
