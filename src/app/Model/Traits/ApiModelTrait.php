<?php
namespace App\Model\Traits;

trait ApiModelTrait {

    protected static $instance = null;

    protected $api = null;

    protected $apiModelClassPath = null;

    protected $classPart = '';

    protected function __construct($class_path)
    {
        $this->classPart = substr(substr($class_path, 0, strrpos($class_path, 'Model')), strrpos($class_path, "\\") + 1);
        $api_class = sprintf("sample\\api\\%1\$s\\Api\\%1\$sApi", $this->classPart);
        $this->api = new $api_class();
        $this->api->getApiClient()
            ->getConfig()
            ->addDefaultHeader('X-DatabaseUser', sprintf('sample_%s', strtolower($this->classPart)))
            ->setSSLVerification(false);

        $this->apiModelClassPath = sprintf("sample\\api\\%1\$s\\Model\\%1\$s", $this->classPart);
    }

    protected static function factory()
    {
        $class_path = get_called_class();
        return new $class_path($class_path);
    }

    public static function __callStatic($method, $arguments)
    {
        return (static::$instance ?? static::$instance = static::factory())->$method(...$arguments);
    }

    public function __call($method, $arguments)
    {
        return $this->api->{$method . $this->classPart}(...$arguments);
    }

    public static function getApi()
    {
        return $this->api;
    }

    public static function apiModelFactory ($data) {
        $api_model_class_path = (static::$instance ?? static::$instance = static::factory())->apiModelClassPath;
        return new $api_model_class_path($data);
    }
}
