<?php

namespace Core\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TranslationService;
use Core\Traits\HasHumanReadableName;
use Core\Traits\HasModelNameFromController;
use Core\Traits\ModuleTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BaseController extends Controller
{

    use ModuleTrait, HasModelNameFromController, HasHumanReadableName;

    protected string $base_dir;
    protected string $base_route;
    protected string $modelName;
    protected string $getMySingularName;
    protected string $modelPluralName;
    protected $formRequest;
    protected $employeeBranchId;

    protected $key;


    public function __construct()
    {
        $this->base_dir = strtolower($this->getModuleName());
        $this->base_route = preg_replace('/^\w\d\d/', "", $this->base_dir);
        $this->modelName = $this->getModelName();
        $this->modelPluralName = $this->getPluralName($this->modelName);
        $this->getMySingularName = $this->getMySingularName($this->modelName);
        $this->getMySingularName = preg_replace('/\_/', "-", $this->getMySingularName($this->modelName));
        $this->getMySingularName = preg_replace('/\_/', "-", $this->getMySingularName($this->modelName));
        //        $this->employeeBranchId = Employee::find(Auth::guard('admin')->user()->employee_id)->branch_id ?? null;
    }

    public function index()
    {
        $records = $this->modelName::latest()->get();
        return view("$this->base_dir::$this->modelPluralName.index", get_defined_vars());
    }

    public function create()
    {
        //test
        return view("$this->base_dir::$this->modelPluralName.create");
    }

    public function store()
    {
        $request = app($this->formRequest);
        $data = $this->prepareRecord($request);
        $record = app($this->getModelName())::create($data);
        if (isset($request->locale_id)) {
            $this->translateModel($record, $this->key, $request);
        }
        return back()->with('success', __('created_successfully'));
    }

    public function edit($uuid)
    {
        $record = $this->modelName::withoutGlobalScope('translations')->with('translations')->whereUuid($uuid)->first();
        if (!$record) {
            abort(404);
        }
        return view("$this->base_dir::$this->modelPluralName.create", get_defined_vars());
    }

    public function update($uuid)
    {
        $record = $this->modelName::whereUuid($uuid)->first();
        if (!$record) {
            abort(404);
        }
        $request = app($this->formRequest);
        $data = $this->prepareRecord($request);
        if ($record->reference_number && $record->reference_number == $data['reference_number']) {
            data_forget($data, 'reference_number');
        }
        $record->update($data);
        if (isset($request->locale_id)) {
            $this->translateModel($record, $this->key, $request);
        }
        return back()->with('success', __('Updated_successfully'));
    }

    public function translateModel($record, $key, $request)
    {
        $recordsToCreate = array_map(function ($trans, $localeId) use ($key) {
            return [
                "$key" => $trans,
                'locale_id' => $localeId,
            ];
        }, $request->$key, $request->locale_id);

        foreach ($recordsToCreate as $recordRequest) {
            (new TranslationService())->storeByRequest($recordRequest, ['name'], $record, get_class($record));
        }
    }
    public function prepareRecord($request)
    {
        $data = [];
        $table = app($this->getModelName())->getTable();
        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        // $branchId = $this->getModelName() != Branch::class ? json_decode(session('branch_id'))[0] : null;
        foreach ($columns as $column) {
            if (isset($request->$column)) {
                $data[$column] = $request[$column];
            }
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(
    //     $uuid,
    // ) {
    //     $record = $this->modelName::whereUuid($uuid)->first();
    //     abort_if(!$record, 404);
    //     $request = app($this->formRequest);
    //     $data = $this->prepareRecord($request);
    //     $record->update($data);
    //     if (isset($request->locale_id)) {
    //         $this->translateModel($record, $this->key, $request);
    //     }
    //     return to_route("dashboard.$this->base_route.$this->getMySingularName.index")->with('success', __('Updated_Successfully'));
    // }

    public function show($uuid)
    {
        $record = $this->modelName::whereUuid($uuid)->first();
        if (!$record) {
            abort(404);
        }
        return view("$this->base_dir::$this->modelPluralName.show", get_defined_vars());
    }

    public function destroy($uuid)
    {
        $record = $this->modelName::whereUuid($uuid)->first();
        abort_if(!$record, 404);
        try {
            DB::beginTransaction();

            $record->delete();

            DB::commit();
            return back()->with('success', __('Deleted_Successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('Cant Deleted.!'));
        }
    }
}
