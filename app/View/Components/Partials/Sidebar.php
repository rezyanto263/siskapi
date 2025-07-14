<?php

namespace App\View\Components\Partials;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{
    private User $user;
    private string $role;
    public array $items;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->role = $this->user->role->nama;
        $this->items = $this->sidebarItems($this->role);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.sidebar');
    }

    private function sidebarItems($role)
    {
        return match ($role) {
            Role::MAHASISWA => [
                [
                    'label' => null,
                    'navigations' => [
                        ['text' => 'Dashboard', 'icon' => 'layout-dashboard', 'route' => 'mahasiswa.dashboard'],
                    ]
                ],
                [
                    'label' => 'Menu Mahasiswa',
                    'navigations' => [
                        ['text' => 'Kegiatan Mahasiswa', 'icon' => 'certificate', 'route' => 'mahasiswa.kegiatan'],
                        ['text' => 'Notifikasi', 'icon' => 'bell', 'route' => 'mahasiswa.notification', 'counter' => $this->user->unreadNotifications()->count()],
                    ]
                ]
            ],

            Role::KEPALA_PRODI => [
                
            ],

            Role::BAAK => [

            ],

            Role::UPAPKK => [

            ]
        };
    }
}
