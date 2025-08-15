<?php

namespace modules\site\controllers;

use Craft;
use modules\site\Site;
use modules\site\constants\StatusCodes;

class AvailabilitiesController extends BaseController {
    // URL: actions/site/availabilities/set-availability
    public function actionSetAvailability() {
        $playerId = $this->request->getQueryParam("player-id");
        $competitionId = $this->request->getQueryParam("competition-id");

        if (!$playerId) return $this->errorResponse("missing query param: playerId", StatusCodes::BAD_REQUEST);
        if (!$competitionId) return $this->errorResponse("missing query param: competitionId", StatusCodes::BAD_REQUEST);

        $updatedAvailability = Site::getInstance()->availabilities->updateAvailability($playerId, $competitionId, "available");

        return $this->successResponse("Successfully updated availability", $updatedAvailability);
    }
}