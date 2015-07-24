<?php namespace Kodermax\FeedBack\Components;
use Flash;
use Exception;
use Cms\Classes\ComponentBase;
use Kodermax\FeedBack\Models\Entry as EntryModel;
use Kodermax\Feedback\Models\Settings;
use Event;
use Mail;
use Validator;
use ValidationException;

class Form extends ComponentBase
{
    /**
     * Feedback form validation rules.
     * @var array
     */
    public $formValidationRules = [
        'author' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required'],
        'body' => ['required'],
    ];
    public $customMessages =  [
        'author.required' => 'Поле Имя не заполнено!',
        'email.required' => 'Поле Email не заполнено!',
        'phone.required' => 'Поле Телефон не заполнено!',
        'body.required' => 'Поле Сообщение не заполнено!'
    ];

    public function componentDetails()
    {
        return [
            'name'        => 'Form Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onPost()
    {

            // Build the validator
            $validator = Validator::make(post(), $this->formValidationRules, $this->customMessages);
            // Validate
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            //Add to Database
            $entry = EntryModel::add(post());

            // If everything is fine - send an email
        try {
            Mail::send('kodermax.feedback::emails.message', post(), function ($message) {
                $message->from(post('email'), post('author'))
                    ->to(Settings::get('recipient_email'), Settings::get('recipient_name'))
                    ->subject(Settings::get('subject'));
            });
        }
        catch (Exception $ex) {

        }
        $this->page["confirmation_text"] = Settings::get('confirmation_text');
        return ['error' => false];
    }
    public function onRun() {
        $this->addJs('assets/js/main.js');
    }
}