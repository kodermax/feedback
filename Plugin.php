<?php namespace Kodermax\FeedBack;

use System\Classes\PluginBase;
use Backend;
/**
 * FeedBack Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'kodermax.feedback::lang.plugin.name',
            'description' => 'kodermax.feedback::lang.plugin.description',
            'author'      => 'Maksim Karpychev',
            'icon'        => 'icon-leaf'
        ];
    }
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'kodermax.feedback::lang.settings.label',
                'description' => 'kodermax.feedback::lang.settings.description',
                'category'    => 'Marketing',
                'icon'        => 'icon-cog',
                'class'       => 'Kodermax\FeedBack\Models\Settings',
                'order'       => 100
            ]
        ];
    }
    public function registerNavigation()
    {
        return [
            'reviews' => [
                'label' => 'kodermax.feedback::lang.menu.label',
                'url'   => Backend::url('kodermax/feedback/entries'),
                'icon'        => 'icon-picture-o',
                'permissions' => ['kodermax.*'],
                'order'       => 500,
            ],
        ];
    }
    public function registerComponents()
    {
        return [
            'Kodermax\FeedBack\Components\Form' => 'ContactForm'
        ];
    }
    public function registerMailTemplates()
    {
        return [
            'kodermax.feedback::emails.message' => 'kodermax.feedback::lang.email.message',
        ];
    }
}
