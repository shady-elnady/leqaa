<?php

namespace Core\Traits;

trait HasModelNameFromController{

    public function getModelName(bool $isModule = true): ?string{

        // ex: App\Http\Controllers\UserController
        // ex module: Modules\s01Warehousing\Http\Controllers\SourceController
       $controllerClass =  get_class($this);

       // ex: UserController
       $controllerName = class_basename($this);

        // ex: User
       $modelName = str_replace('Controller','',$controllerName) ;

       // ex: App\Models\UserController
        if ($isModule) {
            $modelNamespace = str_replace('Http\Controllers', 'Models', $controllerClass);
        } else {
            // For the base directory
            $modelNamespace = str_replace('App\Http\Controllers', 'App\Models', $controllerClass);
        }


        // ex: App\Models
        $modelNamespace = substr($modelNamespace, 0, strrpos($modelNamespace, '\\'));
//        dd($modelName);

        // ex: App\Models\User
        return $modelNamespace.'\\'.$modelName;
    }

}
