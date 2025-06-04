<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class ReportStatusUpdated extends Notification
{
    protected $reportStatus;

    public function __construct($reportStatus)
    {
        $this->reportStatus = $reportStatus;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
{
    $report = $this->reportStatus->report;

    if (!$report) {
        return [
            'message' => 'Report not found for this status.',
            'url' => '#',
        ];
    }

    return [
        'message' => 'Status laporan #' . $report->code . ' diubah menjadi ' . $this->reportStatus->status,
        'url' => route('report.show', $report->id),
    ];
}

}
