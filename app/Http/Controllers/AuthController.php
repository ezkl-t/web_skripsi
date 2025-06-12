<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        // $users = User::all();
        $users = User::where('level', 'siswa')->get();
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('admin.create-siswa');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'namalengkap' => 'required|string|max:255',
                'nisn' => 'required|string|unique:users,nisn|max:20',
                'kelas' => 'required|string|in:XI-1,XI-2,XI-3',
                'password' => 'required|string|min:6',
            ], [
                'namalengkap.required' => 'Nama lengkap harus diisi',
                'nisn.required' => 'NISN harus diisi',
                'nisn.unique' => 'NISN sudah terdaftar',
                'kelas.required' => 'Kelas harus dipilih',
                'kelas.in' => 'Kelas tidak valid',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
            ]);

            User::create([
                'name' => $validated['namalengkap'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
                'level' => 'siswa',
                'password' => $validated['password'], // Akan di-hash otomatis oleh mutator
            ]);

            return redirect()->route('dashboard-admin')->with('success', 'Data siswa berhasil ditambahkan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified student.
     */
    public function show(User $user)
    {
        return view('admin.show-siswa', compact('user'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(User $user)
    {
        return view('admin.edit-siswa', compact('user'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            $validated = $request->validate([
                'namalengkap' => 'required|string|max:255',
                'nisn' => [
                    'required',
                    'string',
                    'max:20',
                    Rule::unique('users', 'nisn')->ignore($user->id),
                ],
                'kelas' => 'required|string|in:XI-1,XI-2,XI-3',
                'password' => 'nullable|string|min:6',
            ], [
                'namalengkap.required' => 'Nama lengkap harus diisi',
                'nisn.required' => 'NISN harus diisi',
                'nisn.unique' => 'NISN sudah terdaftar',
                'kelas.required' => 'Kelas harus dipilih',
                'kelas.in' => 'Kelas tidak valid',
                'password.min' => 'Password minimal 6 karakter',
            ]);

            $updateData = [
                'name' => $validated['namalengkap'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
            ];

            // Hanya update password jika diisi
            if (!empty($validated['password'])) {
                $updateData['password'] = $validated['password']; // Akan di-hash otomatis oleh mutator
            }

            $user->update($updateData);

            return redirect()->route('dashboard-admin')->with('success', 'Data siswa berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('dashboard-admin')->with('success', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display students grades page.
     */
    public function nilaiSiswa()
    {
        $users = User::where('level', 'siswa')->get();
        return view('admin.nilai-siswa', compact('users'));
    }

    /**
     * Display students quiz/exam questions page.
     */
    public function soalSiswa()
    {
        $users = User::where('level', 'siswa')->get();
        return view('admin.soal-siswa', compact('users'));
    }
}