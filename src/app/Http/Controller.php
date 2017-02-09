<?php
namespace App\Http;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\Form\FormModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function formValidate(Request $request, FormModel $form_model, $omit_keys = [])
    {
        $validate_set = $form_model->getValidateSet($omit_keys);
        $this->validate($request, $validate_set['rules'], $validate_set['messages'], $validate_set['attribute']);
    }
}
