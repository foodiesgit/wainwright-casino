<?php

namespace Wainwright\CasinoDog\Controllers\Livewire;

use Livewire\Component;

class AlertBanner extends Component
{

    public $message;
    public function mount()
    {
        $this->alert = $this->alert();

    }
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-alert-banner' => '$refresh',
    ];

    public function alert($message = NULL)
    {
        if($message === NULL) {
        $default = [
            'active' => false,
            'style' => 'success',
            'message' => $this->message,
        ];
        } else {
            $default = [
                'active' => true,
                'style' => 'success',
                'message' => $this->message,
            ];
        }

        return $default;
    }


    public function set_alert($message)
    {
        $this->alert = $this->alert($message);
        $this->emit('refresh-alert-banner');
    }



    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        return view('wainwright::livewire.notification-alert-banner');
    }
}
