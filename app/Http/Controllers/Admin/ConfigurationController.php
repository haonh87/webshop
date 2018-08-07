<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Services\ConfigurationService;

class ConfigurationController extends Controller
{


    /**
     * @var ConfigurationService
     */
    protected $configurationService;

    /**
     * ConfigurationController constructor.
     * @param ConfigurationService $configurationService
     */
    public function __construct(ConfigurationService $configurationService)
    {
        $this->configurationService = $configurationService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $configurations = $this->configurationService->getConfigurationList(PAGINATE);
        $configurationAll = $this->configurationService->getConfigurationList();
        return view('admin.configurations.index', compact('configurations'))
            ->with('$configurationAll', $configurationAll);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConfigurationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ConfigurationRequest $request)
    {
        $data = $request->all();
        $data['create_user_id'] = \Auth::user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $createConfiguration = $this->configurationService->createNewConfiguration($data);
        if ($createConfiguration) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\ConfigurationController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ConfigurationController@index')->withInput();
    }


    /**
     * Update old product size
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function update(ConfigurationRequest $request, $id)
    {
        $data = $request->all();
        $data['modified_user_id'] = \Auth::user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $updateConfiguration= $this->configurationService->updateConfiguration($id, $data);
        if ($updateConfiguration) {
            $message = 'Item updated successfully.';
            return redirect()->action('Admin\ConfigurationController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ConfigurationController@index')->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->configurationService->deleteConfiguration($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\ConfigurationController@index')->with('message', $message);
    }


}
