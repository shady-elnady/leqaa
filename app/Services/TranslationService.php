<?php

namespace App\Services;

use App\Models\Locale;
use App\Models\Scopes\BranchScope;
use Illuminate\Database\Eloquent\Builder;


class TranslationService
{

    public function storeByRequest($request, $keys = [], $row, $modelName)
    {
        $translations = [];
        foreach ($keys as $key) {
            $record = EntityTranslation::updateOrInsert(
                [
                    'entity_type' => $modelName,
                    'entity_id' => $row->id,
                    'locale_id' => $request['locale_id'],
                    'field' => $key
                ],
                ['title' => $request[$key]]
            );
            array_push($translations, $record);
        }
        return $translations;
    }
}
