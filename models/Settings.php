<?php namespace Kodermax\FeedBack\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{

    public $implement = [
        'System.Behaviors.SettingsModel'
    ];

    public $settingsCode = 'kodermax_feedback_settings';

    public $settingsFields = 'fields.yaml';

}