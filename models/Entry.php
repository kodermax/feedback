<?php namespace Kodermax\FeedBack\Models;

use Model;

/**
 * Entry Model
 */
class Entry extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'kodermax_feedback_entries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public static function add($data)
    {
        $entry = new static;
        $entry->author = array_get($data, 'author');
        $entry->email = array_get($data, 'email');
        $entry->phone = array_get($data, 'phone');
        $entry->body = array_get($data, 'body');
        $entry->save();
        return $entry;
    }
}