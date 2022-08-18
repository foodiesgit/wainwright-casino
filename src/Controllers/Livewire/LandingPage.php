<?php

namespace Wainwright\CasinoDog\Controllers\Livewire;

use Livewire\Component;
use Wainwright\CasinoDog\CasinoDog;
use Illuminate\Support\Str;
class LandingPage extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-landing-page' => '$refresh',
    ];


    public function send_alert($message)
    {
        $alert = new CasinoDog();
        $alert->send_alert($message);
    }
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('wainwright::livewire.landing-page');
    }
}
