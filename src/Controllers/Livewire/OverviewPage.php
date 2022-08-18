<?php

namespace Wainwright\CasinoDog\Controllers\Livewire;

use Livewire\Component;
use Wainwright\CasinoDog\CasinoDog;
use Illuminate\Support\Facades\Cache;

class OverviewPage extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-landing-page' => '$refresh',
    ];

    public function mount() {
        $this->cache_state = $this->cache_state();
    }

    public function cache_state() {
        try {
        $var = Cache::get('cache_state_var');
        if($var) {
            return $var;
        } else {
            Cache::set('cache_state_var', now(), 5); // 10 seconds
            $var = Cache::get('cache_state_var');
            if(!$var) {
                return false;
            } else {
                return $var;
            }
        }
        } catch(Exception $e) {
            return $e;
        }
    }
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        return view('wainwright::livewire.overview-page');
    }
}
