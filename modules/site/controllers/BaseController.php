<?php

namespace modules\site\controllers;

use Craft;
use craft\web\Controller;
use modules\site\constants\StatusCodes;

class BaseController extends Controller {
     protected function successResponse($message, $data, $statusCode = StatusCodes::OK) {
        $request = Craft::$app->getRequest();

        Craft::$app->response->statusCode = $statusCode;

        return $this->asJson([
            "success" => true,
            "statusCode" => $statusCode,
            "method" => $request->getMethod(),
            "uri" => $request->getUrl(),
            "data" => $data,
            "message" => $message,
            "timestamp" => date('Y-m-d H:i:s'),
        ]);
     }

    protected function errorResponse($message, $statusCode = StatusCodes::INTERNAL_SERVER_ERROR, $error = null) {
        $request = Craft::$app->getRequest();

        Craft::$app->response->statusCode = $statusCode;

        return $this->asJson([
            "success" => false,
            "statusCode" => $statusCode,
            "method" => $request->getMethod(),
            "uri" => $request->getUrl(),
            "message" => $message,
            "error" => $error,
            "timestamp" => date('Y-m-d H:i:s'),
        ]);
    }
}