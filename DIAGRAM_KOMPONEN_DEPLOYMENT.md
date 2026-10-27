# 📊 DIAGRAM KOMPONEN & DEPLOYMENT - Verifikasi Admin Perusahaan

## 1️⃣ DIAGRAM KOMPONEN (Component Diagram - UML Style)

```mermaid
component
    component [Terminal]
    component [LoginAdmin] as login
    component [Dashboard] as dashboard
    component [DaftarPerusahaan] as daftar
    component [DetailPerusahaan] as detail
    component [HistoryVerifikasi] as history
    component [AdminController] as controller
    component [AdminMiddleware] as middleware
    component [Perusahaan Model] as model
    component [Config Admin] as config
    component [Database] as db

    interface "ILogin" as ilogin
    interface "IDashboard" as idash
    interface "IManager" as imger
    interface "ISecurity" as isec
    interface "IData" as idata

    login - ilogin
    dashboard - idash
    daftar - imger
    detail - imger
    history - imger
    controller - isec
    middleware - isec
    model - idata
    config - idata
    db - idata

    Terminal : State
    Terminal : Details
    
    daftar ..|> controller
    detail ..|> controller
    history ..|> controller
    login ..|> controller
    dashboard ..|> controller
    
    controller --> middleware
    middleware --> model
    model --> config
    config --> db

    ilogin ..|> idash
    imger ..|> idata
    isec ..|> idata
```

### Struktur Diagram Komponen:

```
┌────────────────────────────────────────────────────────────────┐
│                      ADMIN VERIFICATION SYSTEM                 │
├────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌─────────────┐  ┌──────────────┐  ┌────────────────┐        │
│  │  Terminal   │  │ LoginAdmin   │  │   Dashboard    │        │
│  │             │  │              │  │                │        │
│  │  - State    │  │  + login()   │  │ + dashboard()  │        │
│  │  - Details  │  │  + form()    │  │ + stats()      │        │
│  └─────────────┘  └──────────────┘  └────────────────┘        │
│        │                  │                  │                 │
│        └──────────────────┴──────────────────┘                 │
│                           ▼                                     │
│  ┌────────────────────────────────────────────────────┐        │
│  │        AdminController (8 Methods)                │        │
│  │  ─────────────────────────────────────────────────│        │
│  │  + login()                                         │        │
│  │  + showLoginForm()                                 │        │
│  │  + dashboard()                                     │        │
│  │  + daftarPerusahaan()                              │        │
│  │  + detailPerusahaan()                              │        │
│  │  + verifikasiPerusahaan()                          │        │
│  │  + historyVerifikasi()                             │        │
│  │  + logout()                                        │        │
│  └────────────────────────────────────────────────────┘        │
│        │                                                        │
│        │ uses                                                   │
│        ▼                                                        │
│  ┌────────────────────────────────────────────────────┐        │
│  │       AdminMiddleware (Security Layer)             │        │
│  │  ─────────────────────────────────────────────────│        │
│  │  + handle(Request, Closure): Response             │        │
│  │  • Check admin_id dalam session                    │        │
│  │  • Proteksi admin routes                           │        │
│  │  • Validate authorization                          │        │
│  └────────────────────────────────────────────────────┘        │
│        │                                                        │
│        │ queries                                                │
│        ▼                                                        │
│  ┌────────────────────────────────────────────────────┐        │
│  │     Perusahaan Model (Data Model)                  │        │
│  │  ─────────────────────────────────────────────────│        │
│  │  # status_verifikasi: enum                         │        │
│  │  # alasan_penolakan: text                          │        │
│  │  # verified_by: bigint                             │        │
│  │  # verified_at: timestamp                          │        │
│  └────────────────────────────────────────────────────┘        │
│        │                                                        │
│        │ references                                             │
│        ▼                                                        │
│  ┌────────────────────────────────────────────────────┐        │
│  │          config/admin.php                          │        │
│  │  ─────────────────────────────────────────────────│        │
│  │  + ADMIN_EMAIL                                     │        │
│  │  + ADMIN_PASSWORD                                  │        │
│  └────────────────────────────────────────────────────┘        │
│        │                                                        │
│        │ persists to                                            │
│        ▼                                                        │
│  ┌────────────────────────────────────────────────────┐        │
│  │    Database (MySQL - perusahaans Table)            │        │
│  │  ─────────────────────────────────────────────────│        │
│  │  ◊ id                                              │        │
│  │  ◊ nama_perusahaan                                 │        │
│  │  ◊ email                                           │        │
│  │  ◊ status_verifikasi (NEW)                         │        │
│  │  ◊ alasan_penolakan (NEW)                          │        │
│  │  ◊ verified_by (NEW)                               │        │
│  │  ◊ verified_at (NEW)                               │        │
│  │  ◊ created_at, updated_at                          │        │
│  └────────────────────────────────────────────────────┘        │
│                                                                 │
└────────────────────────────────────────────────────────────────┘
```

### Interface/Port Diagram:

```
┌─ Provided Interface
│  - Login Interface
│  - Authentication Interface
│  - Verification Interface
│
├─ Required Interface
│  - Database Connection
│  - File Storage
│  - Session Management
│
└─ Internal Components
   - Routes Handler
   - Blade Templates
   - Middleware Security
   - Model Relationships
```

---

## 2️⃣ DIAGRAM PENYEBARAN (Deployment Diagram - UML Style)

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                    Deployment Architecture                                   │
└─────────────────────────────────────────────────────────────────────────────┘

┌──────────────────────────────────────┐
│         Client Device                 │
│  <<device>>                           │
│  :Web Browser                         │
│────────────────────────────────────────│
│  ┌────────────────────────────────┐   │
│  │  <<execution environment>>      │   │
│  │  :Browser Engine                │   │
│  │  ────────────────────────────   │   │
│  │  - HTML Renderer                │   │
│  │  - JavaScript Engine            │   │
│  │  - CSS Parser                   │   │
│  └────────────────────────────────┘   │
│           │                            │
│           │ HTTP/HTTPS                 │
│           ▼                            │
│  ┌────────────────────────────────┐   │
│  │  UI Components                  │   │
│  │  - Login Form                   │   │
│  │  - Dashboard Views              │   │
│  │  - Admin Tables                 │   │
│  └────────────────────────────────┘   │
└──────────────────────────────────────┘
           │
           │ HTTP/HTTPS (Port 80/443)
           ▼
┌──────────────────────────────────────────────────────────────┐
│                    Web Server Device                          │
│  <<device>>                                                   │
│  :Application Server                                          │
│────────────────────────────────────────────────────────────────│
│                                                                │
│  ┌──────────────────────────────────────────────────────┐    │
│  │  <<execution environment>>                            │    │
│  │  :Web Server Engine (Apache/Nginx)                    │    │
│  │  ──────────────────────────────────────────────────   │    │
│  │  - Request Handler                                    │    │
│  │  - Response Manager                                   │    │
│  │  - SSL/TLS Support                                    │    │
│  └──────────────────────────────────────────────────────┘    │
│           │                                                    │
│           ├─────────────────┬─────────────────┐               │
│           ▼                 ▼                 ▼               │
│  ┌────────────────────┐  ┌─────────────┐  ┌──────────┐       │
│  │ PHP Engine         │  │ Framework   │  │ Routing  │       │
│  │ <<exec env>>       │  │ Laravel     │  │ System   │       │
│  │                    │  │             │  │          │       │
│  │ - PHP 8.0+         │  │ - MVC       │  │ - Routes │       │
│  │ - FPM/CGI          │  │ - ORM       │  │ - Paths  │       │
│  │ - Extensions       │  │ - Blade     │  │ - Groups │       │
│  └────────────────────┘  └─────────────┘  └──────────┘       │
│           │                                                    │
│           ▼                                                    │
│  ┌──────────────────────────────────────────────────────┐    │
│  │  <<artifact>>                                         │    │
│  │  :AdminController.php                                 │    │
│  │  ──────────────────────────────────────────────────   │    │
│  │  - login()                                            │    │
│  │  - dashboard()                                        │    │
│  │  - verifikasiPerusahaan()                             │    │
│  │  - historyVerifikasi()                                │    │
│  └──────────────────────────────────────────────────────┘    │
│           │                                                    │
│           ├──────────────────┬──────────────────┐             │
│           ▼                  ▼                  ▼             │
│  ┌─────────────────┐ ┌──────────────┐ ┌──────────────┐      │
│  │ AdminMiddleware │ │ Blade Views  │ │ Perusahaan   │      │
│  │ <<artifact>>    │ │ <<artifact>> │ │ Model        │      │
│  │                 │ │              │ │ <<artifact>> │      │
│  │ - Security      │ │ - login      │ │ - Relations  │      │
│  │ - Session Check │ │ - dashboard  │ │ - Scopes     │      │
│  │ - Auth Guard    │ │ - detail     │ │ - Mutators   │      │
│  └─────────────────┘ │ - history    │ └──────────────┘      │
│           │          └──────────────┘         │              │
│           │                                   ▼              │
│           └───────────────────────────► ┌──────────────┐     │
│                                         │ config/      │     │
│                                         │ admin.php    │     │
│                                         │              │     │
│                                         │ ADMIN_EMAIL  │     │
│                                         │ ADMIN_PASS   │     │
│                                         └──────────────┘     │
└──────────────────────────────────────────────────────────────┘
           │
           │ TCP (Port 3306)
           ▼
┌──────────────────────────────────────────────────────────────┐
│               Database Server Device                          │
│  <<device>>                                                   │
│  :Database Server                                             │
│────────────────────────────────────────────────────────────────│
│                                                                │
│  ┌──────────────────────────────────────────────────────┐    │
│  │  <<execution environment>>                            │    │
│  │  :MySQL RDBMS                                         │    │
│  │  ──────────────────────────────────────────────────   │    │
│  │  - Query Engine                                       │    │
│  │  - Transaction Manager                                │    │
│  │  - Connection Pool                                    │    │
│  └──────────────────────────────────────────────────────┘    │
│           │                                                    │
│           ▼                                                    │
│  ┌──────────────────────────────────────────────────────┐    │
│  │  <<artifact>>                                         │    │
│  │  :perusahaans Table                                   │    │
│  │  ──────────────────────────────────────────────────   │    │
│  │  ◊ id (PK)                                            │    │
│  │  ◊ nama_perusahaan                                    │    │
│  │  ◊ email                                              │    │
│  │  ◊ status_verifikasi (NEW)                            │    │
│  │  ◊ alasan_penolakan (NEW)                             │    │
│  │  ◊ verified_by (NEW)                                  │    │
│  │  ◊ verified_at (NEW)                                  │    │
│  │  ◊ created_at, updated_at                             │    │
│  └──────────────────────────────────────────────────────┘    │
│                                                                │
└──────────────────────────────────────────────────────────────┘

           │
           │ File I/O
           ▼
┌──────────────────────────────────────────────────────────────┐
│               File Storage Device                             │
│  <<device>>                                                   │
│  :Storage Server                                              │
│────────────────────────────────────────────────────────────────│
│                                                                │
│  ┌──────────────────────────────────────────────────────┐    │
│  │  Storage Volumes                                      │    │
│  │  ──────────────────────────────────────────────────   │    │
│  │  /public/storage/                                     │    │
│  │  ├── sertifikat/       (Dokumen Sertifikat)          │    │
│  │  │   └── [file-names]                                │    │
│  │  └── perusahaan/       (Foto Profil & Upload)        │    │
│  │      └── [file-names]                                │    │
│  └──────────────────────────────────────────────────────┘    │
│                                                                │
└──────────────────────────────────────────────────────────────┘
```

### Deployment Components:

| Device | Komponen | Fungsi |
|--------|----------|--------|
| **Client** | Web Browser | Interface pengguna |
| **Web Server** | PHP Engine + Laravel | Menjalankan aplikasi |
| **Web Server** | AdminController | Logika bisnis |
| **Web Server** | Middleware + Views | Security & UI |
| **Database** | MySQL Server | Penyimpanan data |
| **Storage** | File System | Upload dokumen |

### Connection Protocols:

```
Client ←→ Web Server: HTTP/HTTPS (Port 80/443)
Web Server ←→ Database: TCP/IP (Port 3306)
Web Server ←→ Storage: Local File I/O
```

---

## 🔄 ALUR PROSES

### Alur Login Admin:
```
1. Admin akses /admin/login
   ↓
2. Masukkan email & password
   ↓
3. AdminController::login() validasi
   ↓
4. Cek config/admin.php
   ↓
5. Jika benar → Simpan session
   ↓
6. Redirect ke /admin/dashboard
```

### Alur Verifikasi Perusahaan:
```
1. Admin akses /admin/dashboard
   ↓
2. Klik "Lihat Detail" perusahaan
   ↓
3. AdminController::detailPerusahaan()
   ↓
4. Model Query database
   ↓
5. Tampilkan detail + dokumen
   ↓
6. Admin pilih approve/reject
   ↓
7. AdminController::verifikasiPerusahaan()
   ↓
8. Update status di database
   ↓
9. Redirect dengan success message
```

---

## 📝 STRUKTUR FILE KOMPONEN

```
app/Http/
├── Controllers/
│   └── AdminController.php ...................... Controller utama
├── Middleware/
│   └── AdminMiddleware.php ....................... Security middleware

config/
└── admin.php ................................... Config admin

database/
└── migrations/
    └── 2025_04_13_*.php .......................... Migration database

resources/views/admin/
├── loginAdmin.blade.php ......................... View login
├── dashboard.blade.php .......................... View dashboard
├── daftarPerusahaan.blade.php .................. View daftar
├── detailPerusahaan.blade.php .................. View detail
└── historyVerifikasi.blade.php ................. View history

routes/
└── web.php ..................................... Admin routes
```

---

## 🔐 FLOW SECURITY

```
Request Admin
    ↓
Router matches /admin/* route
    ↓
AdminMiddleware::handle()
    ↓
Check session['admin_id']
    ↓
┌─────────────────┐
│ Ada session?    │
└┬────────────────┘
 │
 ├─ YES → Lanjut ke Controller
 │        ↓
 │       Execute AdminController method
 │        ↓
 │       Return Response
 │
 └─ NO → Redirect ke /admin/login
         Show error message
```

---

## 💾 DATABASE SCHEMA

```sql
perusahaans Table:
├── id (PK)
├── nama_perusahaan
├── email
├── password
├── telepon
├── npwp
├── alamat
├── sertifikat (file path)
├── foto_profil (file path)
├── status_verifikasi (NEW) ← pending|verified|rejected
├── alasan_penolakan (NEW) ← NULL jika approved
├── verified_by (NEW) ← Admin ID
├── verified_at (NEW) ← Timestamp
├── created_at
├── updated_at
```

---

## 📊 STATISTIK KOMPONEN

| Item | Jumlah |
|------|--------|
| Views/Templates | 5 |
| Routes | 6 |
| Controller Methods | 8 |
| Middleware | 1 |
| Models | 1 |
| Database Columns (Baru) | 4 |
| Config Files | 1 |

---

**Terakhir Diperbarui**: 13 April 2026  
**Status**: ✅ Production Ready
