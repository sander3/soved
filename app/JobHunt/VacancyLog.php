<?php

namespace App\JobHunt;

class VacancyLog extends Model
{
    const TYPES = [
        'e-mail',
        'telephone_conversation',
        'conversation',
        'chat_message',
        'job_application',
        'social_media',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'message',
        'sender',
        'recipient',
        'subject',
    ];

    /**
     * Get the vacancy that owns the log.
     */
    public function vacancy()
    {
        return $this->belongsTo('App\JobHunt\Vacancy');
    }
}
