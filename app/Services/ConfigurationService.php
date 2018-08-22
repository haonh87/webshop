<?php

namespace App\Services;

use App\Models\Configuration;

/**
 * Class ConfigurationService
 * @package App\Services
 */
class ConfigurationService
{
    /**
     * ConfigurationService constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * Get configuration list
     *
     * @param string $field
     * @param string $value
     * @param string $operation
     * @param int $pagination
     * @return mixed
     */
    public function getConfigurationList($pagination = 0, $field = '', $value = '', $operation = '')
    {
        if ($field && $value && $operation) {
            $configurations = Configuration::where($field, $operation, $value)->get();
        } else {
            $configurations = Configuration::paginate($pagination);
        }

        return $configurations;
    }

    /**
     * Create new configuration
     *
     * @param $input
     * @return bool
     */
    public function createNewConfiguration($input)
    {

        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $configuration = new Configuration();
                $configuration->fill($input);
                if ($configuration->save()) {
                    \DB::commit();
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $exception) {
                \DB::rollback();
                \Log::error('DB Error', [$exception->getMessage()]);
                return false;
            }
        }
        return false;
    }


    /**
     * Update old configuration
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateConfiguration($id, $input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $configuration = Configuration::findOrFail($id);
                $configuration->fill($input);

                if ($configuration->save()) {
                    \DB::commit();
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $exception) {
                \DB::rollback();
                \Log::error('DB Error', [$exception->getMessage()]);
                return false;
            }
        }
        return false;
    }


    /**
     * Delete configuration
     *
     * @param $id
     * @return bool
     */
    public function deleteConfiguration($id)
    {
        $configuration = configuration::findOrFail($id);
        if ($configuration->delete()) {
            return true;
        } else {
            return false;
        }
    }
}