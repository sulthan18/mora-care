<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $residentId = auth()->user()->resident->id;

        $activeReports = Report::where('resident_id', $residentId)
            ->whereHas('reportStatuses', function ($query) {
                $query->where('status', '!=', 'completed');
            })->count();

        $completedReports = Report::where('resident_id', $residentId)
            ->whereHas('reportStatuses', function ($query) {
                $query->where('status', 'completed');
            })->count();

        return view('pages.app.profile', compact('activeReports', 'completedReports'));
    }

    public function settings()
    {
        $user = auth()->user();
        return view('pages.app.profile-settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.mimes' => 'Avatar harus berformat jpeg, png, atau jpg.',
            'avatar.max' => 'Ukuran avatar maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.settings')
                ->withErrors($validator)
                ->withInput();
        }

        $user = auth()->user();
        $resident = $user->resident;

        $user->update([
            'name' => $request->name
        ]);

        if ($request->hasFile('avatar')) {
            if ($resident->avatar && $resident->avatar !== 'avatars/default-avatar.png') {
                Storage::delete('public/' . $resident->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            $resident->update([
                'avatar' => $avatarPath
            ]);
        }

        return redirect()->route('profile.settings')
            ->with('success', 'Pengaturan akun berhasil diperbarui');
    }

    public function password()
    {
        return view('pages.app.profile-password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required'
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal 6 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'new_password_confirmation.required' => 'Konfirmasi password baru wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.password')
                ->withErrors($validator)
                ->withInput();
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.password')
                ->withErrors(['current_password' => 'Password lama tidak benar.'])
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile.password')
            ->with('success', 'Password berhasil diubah');
    }

    public function help(){
        return view('user.profile.help');
    }
}