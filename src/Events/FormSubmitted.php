<?php

namespace Goodwong\LaravelForm\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Goodwong\LaravelForm\Entities\Form;
use Goodwong\LaravelForm\Entities\FormSubmission;

class FormSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  integer  $user
     * @param  Form  $form
     * @param  FormSubmission  $submission
     * @return void
     */
    public function __construct($user_id, Form $form, FormSubmission $submission)
    {
        $this->user_id = $user_id;
        $this->form = $form;
        $this->submission = $submission;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
