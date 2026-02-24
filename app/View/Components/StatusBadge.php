<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBadge extends Component
{
    public string $colorClasses;

    public function __construct(public string $status)
    {
        $this->colorClasses = match ($status) {
            'approved'  => 'bg-green-50 text-green-700',
            'pending'   => 'bg-yellow-100 text-yellow-700',
            default     => 'bg-red-50 text-red-700',
        };
    }

    public function render()
    {
        return view('components.status-badge');
    }
}