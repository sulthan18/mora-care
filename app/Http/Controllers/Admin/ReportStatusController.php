<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportStatusRequest;
use App\Http\Requests\UpdateReportStatusRequest;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\ReportStatusRepositoryInterface;
use App\Notifications\ReportStatusUpdated;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ReportStatusController extends Controller
{
    private ReportStatusRepositoryInterface $reportStatusRepository;
    private ReportRepositoryInterface $reportRepository;

    public function __construct(ReportStatusRepositoryInterface $reportStatusRepository, ReportRepositoryInterface $reportRepository)
    {
        $this->reportStatusRepository = $reportStatusRepository;
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
        //
    }

    public function create($reportId)
    {
        $report = $this->reportRepository->getReportById($reportId);

        return view('pages.admin.report-status.create', compact('report'));
    }

    public function store(StoreReportStatusRequest $request)
    {
        $data = $request->validated();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('assets/report-status/image', 'public');
        }

        $reportStatus = $this->reportStatusRepository->createReportStatus($data);

        $reportStatus->load('report.resident.user');

        $user = $reportStatus->report->resident?->user;
        if ($user) {
            $user->notify(new ReportStatusUpdated($reportStatus));
        }

        Swal::toast('Data Progress Laporan Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $request->report_id);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $status = $this->reportStatusRepository->getReportStatusById($id);

        return view('pages.admin.report-status.edit', compact('status'));
    }

    public function update(UpdateReportStatusRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('assets/report-status/image', 'public');
        }

        $this->reportStatusRepository->updateReportStatus($data, $id);

        $reportStatus = $this->reportStatusRepository->getReportStatusById($id);
        $reportStatus->load('report.resident.user');

        $user = $reportStatus->report->resident?->user;
        if ($user) {
            $user->notify(new ReportStatusUpdated($reportStatus));
        }

        Swal::toast('Data Progress Laporan Berhasil Diupdate', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $request->report_id);
    }

    public function destroy(string $id)
    {
        $status = $this->reportStatusRepository->getReportStatusById($id);

        $this->reportStatusRepository->deleteReportStatus($id);

        Swal::toast('Data Progress Laporan Berhasil Dihapus', 'success')->timerProgressBar();

        return redirect()->route('admin.report.show', $status->report_id);
    }
}
