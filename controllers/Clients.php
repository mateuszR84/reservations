<?php namespace Mater\Reservations\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Clients Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Clients extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    public $relationConfig = 'config_relation.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['mater.reservations.clients'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mater.Reservations', 'reservations', 'clients');
    }
}
