<?php

namespace modules\site\services;

use Craft;
use craft\elements\Entry;
use craft\elements\User;
use yii\base\Component;

class AvailabilitiesService extends Component {
    public function updateAvailability($playerId, $competitionId, $status) {
        $playerEntry = User::find()->id($playerId)->one();
        $competitionEntry = Entry::find()->section("competitions")->id($competitionId)->one();

        // Check for existing availability entry
        $existingAvailabilityEntry = Entry::find()->section("availabilities")->relatedTo($playerEntry, $competitionEntry)->one();

        if ($existingAvailabilityEntry) dd("already exist");
        
        return $this->createAvailability($playerEntry, $competitionEntry, "available");
    }

    public function createAvailability($playerEntry, $competitionEntry, $status) {
        $availabilityEntry = new Entry();
        $availabilityEntry->typeId = Craft::$app->entries->getEntryTypeByHandle("availability")->id;
        $availabilityEntry->sectionId = Craft::$app->entries->getSectionByHandle("availabilities")->id;

        $availabilityEntry->title = "temp";
        $availabilityEntry->setFieldValue("playerField", [$playerEntry->id]);
        $availabilityEntry->setFieldValue("competitionField", [$competitionEntry->id]);
        $availabilityEntry->setFieldValue("availabilityField", $status);

        $success = Craft::$app->elements->saveElement($availabilityEntry);

        return $availabilityEntry;
    }
}