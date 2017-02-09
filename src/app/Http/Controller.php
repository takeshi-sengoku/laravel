<?php
namespace App\Http;

use App\Model\Form\FormModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 独自拡張フォームバリデータインターフェース
     *
     * @param Request $request
     * @param FormModel $form_model
     * @param array $omit_keys
     */
    public function formValidate(Request $request, FormModel $form_model, $omit_keys = [])
    {
        $validate_set = $form_model->getValidateSet($omit_keys);
        $this->validate($request, $validate_set['rules'], $validate_set['messages'], $validate_set['attribute']);
    }
}
