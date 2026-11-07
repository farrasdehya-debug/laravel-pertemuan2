# 🚀 Praktikum Rekayasa Web - laravel-pertemuan2

Repository tugas dan praktikum matakuliah **Rekayasa Web** (Kelas 03SIFE003) berbasis framework **Laravel**. Project ini memuat modul data portfolio project, data profil mahasiswa, serta **Panel Admin dengan CRUD Project dan Autentikasi Login**.

---

## 🔐 Kredensial Login Administrator

| Keterangan | Nilai |
| :--- | :--- |
| **URL Login** | [http://localhost:8000/admin/login](http://localhost:8000/admin/login) |
| **Email** | `admin@example.com` |
| **Password** | `password` |

---

## 🛠️ Langkah Menjalankan Aplikasi dengan Laravel Sail (Docker)

1. **Jalankan Docker Desktop** di komputer Anda.
2. **Nyalakan container Sail:**
   ```bash
   sail up -d
   ```
   *(atau `./vendor/bin/sail up -d` jika belum membuat alias)*
3. **Jalankan Migrasi & Seeder Database (Termasuk Akun Admin & Data Dummy):**
   ```bash
   sail artisan migrate:fresh --seed
   ```
4. **Buka di Browser:**
   - **Frontend Beranda:** [http://localhost:8000](http://localhost:8000)
   - **Login Admin:** [http://localhost:8000/admin/login](http://localhost:8000/admin/login)
   - **Admin Dashboard:** [http://localhost:8000/admin](http://localhost:8000/admin)
   - **CRUD Data Project:** [http://localhost:8000/admin/project](http://localhost:8000/admin/project)

---

## 📌 Rute & Halaman yang Tersedia

### 🌐 Halaman Publik (Frontend)
| Method | URL | Route Name | Deskripsi |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | `home` | Halaman utama profil dengan foto & intro |
| `GET` | `/project` | `project.index` | Daftar portofolio project publik |
| `GET` | `/project/{id}` | `project.show` | Detail informasi spesifik project |
| `GET` | `/profile` | `profile` | Halaman data profil mahasiswa |
| `GET` | `/about` | `about` | Halaman tentang aplikasi |
| `GET` | `/contact` | `contact` | Halaman kontak & info kampus |

### 🔐 Autentikasi & Panel Admin (CRUD)
| Method | URL | Route Name | Deskripsi |
| :--- | :--- | :--- | :--- |
| `GET` | `/admin/login` | `admin.login` | Halaman form login admin bertema UNPAM |
| `POST` | `/admin/login` | `admin.login.submit` | Proses validasi kredensial login |
| `POST` | `/admin/logout` | `admin.logout` | Keluar dari sesi login admin |
| `GET` | `/admin` | `admin.home` | Dashboard admin dengan rekapitulasi data |
| `GET` | `/admin/project` | `admin.project.index` | Tabel kelola project dengan pencarian & pagination |
| `GET` | `/admin/project/create`| `admin.project.create` | Form penambahan project baru (+ upload gambar) |
| `POST` | `/admin/project` | `admin.project.store` | Simpan project baru ke database |
| `GET` | `/admin/project/{id}/edit`| `admin.project.edit` | Form edit project (+ preview & ganti gambar) |
| `PUT` | `/admin/project/{id}` | `admin.project.update` | Perbarui data project di database |
| `DELETE`| `/admin/project/{id}` | `admin.project.destroy` | Hapus project dari database |

---

## 📂 Struktur Utama Project

- [`app/Http/Controllers/AuthController.php`](app/Http/Controllers/AuthController.php) : Controller logika login & logout admin.
- [`app/Http/Controllers/Admin/DashboardController.php`](app/Http/Controllers/Admin/DashboardController.php) : Controller dashboard admin.
- [`app/Http/Controllers/Admin/ProjectController.php`](app/Http/Controllers/Admin/ProjectController.php) : Controller CRUD data project.
- [`resources/views/admin/template.blade.php`](resources/views/admin/template.blade.php) : Layout utama admin dengan header kuning UNPAM & sidebar abu-abu.
- [`resources/views/admin/auth/login.blade.php`](resources/views/admin/auth/login.blade.php) : Tampilan login berlatar gedung UNPAM Viktor.
- [`resources/views/admin/dashboard.blade.php`](resources/views/admin/dashboard.blade.php) : Tampilan dashboard admin.
- [`resources/views/admin/project/`](resources/views/admin/project/) : View kelola project (`index.blade.php`, `create.blade.php`, `edit.blade.php`).
- [`database/seeders/UserSeeder.php`](database/seeders/UserSeeder.php) : Seeder akun admin `admin@example.com` / `password`.
