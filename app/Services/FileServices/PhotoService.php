<?php


namespace App\Services\FileServices;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoService
{
    protected $filenameToStore;
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->filenameToStore;
    }

    /**
     * Stores the Photo
     *
     * @param $file
     * @param $imgName
     * @param $path
     * @return string
     */
    public function storePhoto($file, $imgName, $path)
    {
        if($this->request->hasFile($file)){
            $ext = $this->request->file($file)->extension();
            $filename = $imgName.'.'.$ext;
            Image::make($this->request->file($file))
                ->resize(300,300)
                ->save(public_path($path . $filename));

            return $filename;
        }
    }

    /**
     * Store the path of the Image
     *
     * @param $model
     */

    private function storePath($model)
    {
        $this->request->isMethod('put')
            ? $model->photo()->update(['path' => $this->filenameToStore])
            : $model->photo()->create(['path' => $this->filenameToStore]);
    }


    /**
     * Stores dependent photo
     * @param $model
     */

    public function storeDependentPhoto($model)
    {
        $pin = $this->request->pin;
        $initial = strtolower(substr($this->request->first_name,0,1));
        $lastName = strtolower($this->request->last_name);
        $dependentName = $pin.$initial.$lastName;

        $this->filenameToStore = $this->storePhoto('dependent_photo', $dependentName, '/storage/dependents/');

        $this->storePath($model);

    }

    public function storeServicepersonPhoto($model)
    {
        $number = $model->number;
        $initial = strtolower(substr($model->first_name,0,1));
        $lastName = strtolower($model->last_name);
        $serviceName = $number.$initial.$lastName;

        $this->filenameToStore = $this->storePhoto('photo', $serviceName, '/storage/servicepeople/');

        $this->request->isMethod('put')
            ? $model->photo()->update(['path' => $this->filenameToStore])
            : $model->photo()->create(['path' => $this->filenameToStore]);
    }



}
