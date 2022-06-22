<?php
namespace App\Traits;

trait TownFinder {

    private function getTownKeys() {
        return collect(request()->keys())->filter(
            fn($key) => str_contains($key, "town_") && $key);
    }
    
    private function getTownIds() {
        $town_ids = [];
        foreach($this->getTownKeys() as $town_key) {
            array_push($town_ids, request($town_key));
        }
        return $town_ids;
    }

}