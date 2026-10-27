# 📊 TEST CASE ADMIN VERIFICATION - DECISION TABLE FORMAT

## BAGIAN 1: BLACK BOX TESTING - DECISION TABLE

---

### 1.1 LOGIN ADMIN - DECISION TABLE

**Deskripsi**: Menguji semua kombinasi input email dan password

| No | Email | Password | Email Valid | Password Empty | Expected Result | Test Case ID |
|:---:|:---|:---|:---:|:---:|:---|:---:|
| 1 | admin@kerjakuy.com | admin123 | ✓ Valid | ✗ No | ✓ Login Success → Dashboard | TC-BBox-DT-Login-001 |
| 2 | admin@kerjakuy.com | wrongpass | ✓ Valid | ✗ No | ✗ Error: Email atau password salah | TC-BBox-DT-Login-002 |
| 3 | wrong@kerjakuy.com | admin123 | ✓ Valid | ✗ No | ✗ Error: Email atau password salah | TC-BBox-DT-Login-003 |
| 4 | wrong@kerjakuy.com | wrongpass | ✓ Valid | ✗ No | ✗ Error: Email atau password salah | TC-BBox-DT-Login-004 |
| 5 | (empty) | admin123 | ✗ Invalid | ✗ No | ✗ Validation Error: Email required | TC-BBox-DT-Login-005 |
| 6 | admin@kerjakuy.com | (empty) | ✓ Valid | ✓ Yes | ✗ Validation Error: Password required | TC-BBox-DT-Login-006 |
| 7 | (empty) | (empty) | ✗ Invalid | ✓ Yes | ✗ Validation Error: Both required | TC-BBox-DT-Login-007 |
| 8 | invalid-email | admin123 | ✗ Invalid | ✗ No | ✗ Validation Error: Invalid email format | TC-BBox-DT-Login-008 |
| 9 | admin@kerjakuy.com | (space) | ✓ Valid | ✗ No | ✗ Error: Password salah | TC-BBox-DT-Login-009 |

**Kondisi**:
- Kolom "Email Valid": Apakah format email valid
- Kolom "Password Empty": Apakah password kosong
- Kolom "Expected Result": Hasil yang diharapkan

**Catatan Penting**:
- Semua kombinasi email/password invalid → error yang sama
- Validasi format email lebih dulu sebelum credential check
- Session hanya dibuat untuk login success

---

### 1.2 DASHBOARD - DECISION TABLE

**Deskripsi**: Menguji berbagai status admin dan data database

| No | Admin Login | Data Pending | Data Verified | Data Rejected | Total Data | Expected Output | Test Case ID |
|:---:|:---:|:---:|:---:|:---:|:---:|:---|:---:|
| 1 | ✓ Yes | 5 | 3 | 2 | 10 | ✓ Stats: 5 pending, 3 verified, 2 rejected, 10 total | TC-BBox-DT-Dashboard-001 |
| 2 | ✓ Yes | 0 | 5 | 3 | 8 | ✓ Stats: 0 pending, 5 verified, 3 rejected, 8 total | TC-BBox-DT-Dashboard-002 |
| 3 | ✓ Yes | 15 | 10 | 5 | 30 | ✓ Stats: 15 pending (page 1 of 2, 10 items) | TC-BBox-DT-Dashboard-003 |
| 4 | ✗ No | 5 | 3 | 2 | 10 | ✗ Redirect to /admin/login | TC-BBox-DT-Dashboard-004 |
| 5 | ✓ Yes (expired session) | 5 | 3 | 2 | 10 | ✗ Redirect to /admin/login | TC-BBox-DT-Dashboard-005 |

---

### 1.3 DAFTAR PERUSAHAAN - DECISION TABLE (SEARCH & FILTER)

**Deskripsi**: Kombinasi search dan filter status

| No | Search Input | Filter Status | Search Field | Expected Result | Count | Test Case ID |
|:---:|:---|:---|:---|:---|:---:|:---:|
| 1 | (none) | (all) | N/A | ✓ Show all perusahaan | 15+ | TC-BBox-DT-Daftar-001 |
| 2 | "Maju" | (all) | Nama | ✓ Show: PT Maju Jaya, CV Teknologi Maju | 2 | TC-BBox-DT-Daftar-002 |
| 3 | "maju" | (all) | Nama | ✓ Case insensitive, show 2 items | 2 | TC-BBox-DT-Daftar-003 |
| 4 | "teknologi@" | (all) | Email | ✓ Show: hello@teknologimaju.com | 1 | TC-BBox-DT-Daftar-004 |
| 5 | "xyz" | (all) | Nama/Email | ✓ Show: No data found | 0 | TC-BBox-DT-Daftar-005 |
| 6 | (none) | pending | N/A | ✓ Show only pending status | 5 | TC-BBox-DT-Daftar-006 |
| 7 | (none) | verified | N/A | ✓ Show only verified status | 8 | TC-BBox-DT-Daftar-007 |
| 8 | (none) | rejected | N/A | ✓ Show only rejected status | 3 | TC-BBox-DT-Daftar-008 |
| 9 | "Maju" | pending | Nama | ✓ Search + filter combined | 1 | TC-BBox-DT-Daftar-009 |
| 10 | "Maju" | verified | Nama | ✓ Search + filter combined | 1 | TC-BBox-DT-Daftar-010 |
| 11 | "xyz" | pending | Nama | ✓ No results | 0 | TC-BBox-DT-Daftar-011 |

---

### 1.4 DETAIL PERUSAHAAN & VERIFIKASI - DECISION TABLE

**Deskripsi**: Menguji aksi verifikasi dengan berbagai kondisi

| No | Status Current | Action | Alasan Input | Alasan Length | Expected Result | Database Update | Test Case ID |
|:---:|:---|:---|:---|:---:|:---|:---:|:---:|
| 1 | pending | Approve | N/A | N/A | ✓ Success message | status=verified, verified_at=now | TC-BBox-DT-Detail-001 |
| 2 | pending | Reject | "Tidak lengkap" | 16 | ✓ Warning message | status=rejected, alasan_penolakan set | TC-BBox-DT-Detail-002 |
| 3 | pending | Reject | (empty) | 0 | ✗ Validation error | ✗ No update | TC-BBox-DT-Detail-003 |
| 4 | pending | Reject | "a"×501 | 501 | ✗ Max length error | ✗ No update | TC-BBox-DT-Detail-004 |
| 5 | verified | Approve | N/A | N/A | ✓ Show detail (no action button) | ✗ No update | TC-BBox-DT-Detail-005 |
| 6 | rejected | Approve | N/A | N/A | ✓ Show detail (no action button) | ✗ No update | TC-BBox-DT-Detail-006 |
| 7 | pending | Access | N/A | N/A | ✓ Download buttons work | N/A | TC-BBox-DT-Detail-007 |
| 8 | (ID 9999) | Access | N/A | N/A | ✗ 404 Error | N/A | TC-BBox-DT-Detail-008 |

---

### 1.5 HISTORY VERIFIKASI - DECISION TABLE

**Deskripsi**: Menguji history dengan berbagai filter

| No | Data in DB | Filter Applied | Expected Display | Count | Test Case ID |
|:---:|:---|:---|:---|:---:|:---:|
| 1 | 5 verified, 3 rejected, 2 pending | All | Verified + Rejected only (no pending) | 8 | TC-BBox-DT-History-001 |
| 2 | 25 verified | All | Page 1: 20 items, Page 2: 5 items | 20/5 | TC-BBox-DT-History-002 |
| 3 | 0 verified, 0 rejected | All | "No data" message | 0 | TC-BBox-DT-History-003 |
| 4 | Mixed data | Sorted by verified_at | Newest first | Latest | TC-BBox-DT-History-004 |

---

## BAGIAN 2: WHITE BOX TESTING - DECISION TABLE

### 2.1 LOGIN METHOD - DECISION TABLE (Code Path Coverage)

**Deskripsi**: Menguji semua code path dan branch dalam method login

| No | Request Email | Request Password | Config Email | Config Password | Condition Result | Code Path | Expected Action | Test Case ID |
|:---:|:---|:---|:---|:---|:---:|:---|:---|:---:|
| 1 | admin@kerjakuy.com | admin123 | admin@kerjakuy.com | admin123 | (email === config && password === config) = TRUE | IF (Line 24) | Session created, redirect /admin/dashboard | TC-WBox-DT-Login-001 |
| 2 | admin@kerjakuy.com | wrongpass | admin@kerjakuy.com | admin123 | (email === config && password !== config) = FALSE | ELSE (Line 30) | withErrors returned | TC-WBox-DT-Login-002 |
| 3 | wrong@kerjakuy.com | admin123 | admin@kerjakuy.com | admin123 | (email !== config && password === config) = FALSE | ELSE (Line 30) | withErrors returned | TC-WBox-DT-Login-003 |
| 4 | (empty) | (empty) | admin@kerjakuy.com | admin123 | Validation fail | Validation (Line 15-18) | Error returned before condition | TC-WBox-DT-Login-004 |
| 5 | invalid | admin123 | admin@kerjakuy.com | admin123 | Validation fail | Validation (Line 15-18) | Email validation error | TC-WBox-DT-Login-005 |

**Analisis Kondisi**:
- `&&` operator: Kedua kondisi harus TRUE
- Short-circuit evaluation: Jika email FALSE, password tidak di-check

---

### 2.2 DASHBOARD METHOD - DECISION TABLE (Query Coverage)

**Deskripsi**: Menguji setiap database query

| No | Query Target | WHERE Clause | Aggregate | Expected Query | Test Data | Expected Result | Test Case ID |
|:---:|:---|:---|:---|:---|:---|:---|:---:|
| 1 | Perusahaan | status = 'pending' | No (paginate 10) | SELECT * ... WHERE status='pending' ORDER BY created_at DESC LIMIT 10 | 5 pending in DB | Return 5 items, pagination enabled | TC-WBox-DT-Dashboard-001 |
| 2 | Perusahaan | status = 'verified' | COUNT | SELECT COUNT(*) WHERE status='verified' | 3 verified | Return integer 3 | TC-WBox-DT-Dashboard-002 |
| 3 | Perusahaan | status = 'rejected' | COUNT | SELECT COUNT(*) WHERE status='rejected' | 2 rejected | Return integer 2 | TC-WBox-DT-Dashboard-003 |
| 4 | Perusahaan | None | COUNT | SELECT COUNT(*) | 10 total | Return integer 10 | TC-WBox-DT-Dashboard-004 |
| 5 | View | N/A | N/A | view('admin.dashboard', compact(...)) | All above data | Variables passed to view | TC-WBox-DT-Dashboard-005 |

---

### 2.3 DAFTAR PERUSAHAAN METHOD - DECISION TABLE (Filter Logic)

**Deskripsi**: Menguji conditional filtering logic

| No | has('status') | status value | has('search') | search value | WHERE Applied | Condition | Test Case ID |
|:---:|:---:|:---:|:---:|:---:|:---|:---|:---:|
| 1 | TRUE | 'pending' | FALSE | N/A | WHERE status='pending' | if TRUE → apply | TC-WBox-DT-Daftar-001 |
| 2 | TRUE | '' (empty) | FALSE | N/A | None | if TRUE but value empty → skip | TC-WBox-DT-Daftar-002 |
| 3 | FALSE | N/A | FALSE | N/A | None | if FALSE → skip | TC-WBox-DT-Daftar-003 |
| 4 | FALSE | N/A | TRUE | 'Maju' | WHERE (nama LIKE '%Maju%' OR email LIKE '%Maju%') | if TRUE → apply OR clause | TC-WBox-DT-Daftar-004 |
| 5 | TRUE | 'verified' | TRUE | 'Maju' | Kedua filter combined | Both apply together | TC-WBox-DT-Daftar-005 |

**Kondisi Testing**:
- `$request->has()` → parameter exists di request
- `$request->status !== ''` → value bukan empty string
- Closure `use($search)` → variable capture

---

### 2.4 VERIFIKASI METHOD - DECISION TABLE (Branch Coverage)

**Deskripsi**: Menguji kedua branch: verified vs rejected

| No | status_verifikasi Input | Validation Result | Condition Result | Code Branch | Attributes Updated | Exception | Test Case ID |
|:---:|:---|:---:|:---:|:---|:---|:---:|:---:|
| 1 | 'verified' | ✓ PASS | === 'verified' TRUE | IF (Line 89) | status=verified, verified_at=now(), alasan=null | No | TC-WBox-DT-Verifikasi-001 |
| 2 | 'rejected' | ✓ PASS | === 'verified' FALSE | ELSE (Line 96) | status=rejected, alasan=input, verified_at=now() | No | TC-WBox-DT-Verifikasi-002 |
| 3 | 'pending' (invalid) | ✗ FAIL | N/A | Validation | None | Validation exception | TC-WBox-DT-Verifikasi-003 |
| 4 | (empty) | ✗ FAIL | N/A | Validation | None | Required validation | TC-WBox-DT-Verifikasi-004 |
| 5 | 'verified' | ✓ PASS | TRUE | IF | status=verified | ✓ save() success | TC-WBox-DT-Verifikasi-005 |
| 6 | 'verified' | ✓ PASS | TRUE | IF | status=verified | ✗ DB error (exception) | TC-WBox-DT-Verifikasi-006 |

**Coverage Path**:
- Verified path: ✓ Fully tested
- Rejected path: ✓ Fully tested
- Exception handling: ✓ Covered

---

### 2.5 HISTORY METHOD - DECISION TABLE (Query Logic)

**Deskripsi**: Menguji WHERE NOT EQUAL dan ORDER BY

| No | WHERE Clause | ORDER BY | Test Data | Expected Result | Query Result | Test Case ID |
|:---:|:---|:---|:---|:---|:---|:---:|
| 1 | status != 'pending' | verified_at DESC | 5 pending, 3 verified, 2 rejected | Show verified + rejected only | 5 items | TC-WBox-DT-History-001 |
| 2 | status != 'pending' | verified_at DESC | 10 verified | Sorted by verified_at DESC (newest first) | 10 items sorted | TC-WBox-DT-History-002 |
| 3 | status != 'pending' | verified_at DESC | 0 data | Empty result | 0 items | TC-WBox-DT-History-003 |
| 4 | status != 'pending' | verified_at DESC | Paginate 20 | Page 1: 20 items, page 2: remaining | Paginator | TC-WBox-DT-History-004 |

---

### 2.6 LOGOUT METHOD - DECISION TABLE

**Deskripsi**: Menguji session manipulation dan redirect

| No | Session Before | forget() Called | Session After | Redirect | Flash Message | Test Case ID |
|:---:|:---|:---|:---|:---|:---|:---:|
| 1 | [admin_id, admin_email, lang] | ✓ Yes ['admin_id', 'admin_email'] | [lang] | redirect('/') | 'Anda telah logout...' | TC-WBox-DT-Logout-001 |
| 2 | [admin_id, admin_email] | ✓ Yes ['admin_id', 'admin_email'] | [] | redirect('/') | 'Anda telah logout...' | TC-WBox-DT-Logout-002 |
| 3 | [] (empty) | ✓ Yes [] | [] | redirect('/') | 'Anda telah logout...' | TC-WBox-DT-Logout-003 |

---

## BAGIAN 3: SUMMARY TABLE & COVERAGE

### 3.1 Black Box Decision Table Summary

| Feature | Total Conditions | Test Cases | Coverage |
|:---|:---:|:---:|:---:|
| Login Admin | 9 combinations | 9 | 100% |
| Dashboard | 5 combinations | 5 | 100% |
| Daftar Perusahaan | 11 combinations | 11 | 100% |
| Detail & Verifikasi | 8 combinations | 8 | 100% |
| History | 4 combinations | 4 | 100% |
| **TOTAL BLACK BOX** | **37** | **37** | **100%** |

### 3.2 White Box Decision Table Summary

| Method | Code Paths | Test Cases | Branch Coverage | Statement Coverage |
|:---|:---:|:---:|:---:|:---:|
| login() | 2 (IF/ELSE) | 5 | 100% | 100% |
| dashboard() | 4 (multiple queries) | 5 | 100% | 100% |
| daftarPerusahaan() | 3 (filter combinations) | 5 | 100% | 100% |
| verifikasiPerusahaan() | 2 (IF/ELSE) + 1 (try-catch) | 6 | 100% | 100% |
| historyVerifikasi() | 1 (single path) | 4 | 100% | 100% |
| logout() | 1 (single path) | 3 | 100% | 100% |
| **TOTAL WHITE BOX** | **13** | **28** | **100%** | **100%** |

---

## BAGIAN 4: EXECUTION CHECKLIST

### Decision Table Test Execution Tracking

**Black Box Tests**:
- [ ] TC-BBox-DT-Login-001 s/d 009 (9 cases)
- [ ] TC-BBox-DT-Dashboard-001 s/d 005 (5 cases)
- [ ] TC-BBox-DT-Daftar-001 s/d 011 (11 cases)
- [ ] TC-BBox-DT-Detail-001 s/d 008 (8 cases)
- [ ] TC-BBox-DT-History-001 s/d 004 (4 cases)
- **Total: 37 test cases**

**White Box Tests**:
- [ ] TC-WBox-DT-Login-001 s/d 005 (5 cases)
- [ ] TC-WBox-DT-Dashboard-001 s/d 005 (5 cases)
- [ ] TC-WBox-DT-Daftar-001 s/d 005 (5 cases)
- [ ] TC-WBox-DT-Verifikasi-001 s/d 006 (6 cases)
- [ ] TC-WBox-DT-History-001 s/d 004 (4 cases)
- [ ] TC-WBox-DT-Logout-001 s/d 003 (3 cases)
- **Total: 28 test cases**

**Grand Total: 65 test cases**

---

## BAGIAN 5: HOW TO USE DECISION TABLE

### Cara Menggunakan Decision Table:

1. **Baca Header Table**: Kolom kiri menunjukkan input/kondisi, kolom tengah logic/action, kolom kanan expected result

2. **Follow Execution Path**:
   - Untuk setiap test case, ikuti kombinasi input sesuai row
   - Verifikasi conditional logic (IF/ELSE, AND/OR)
   - Check database state sebelum dan sesudah

3. **Record Result**:
   - ✓ PASS: Hasil actual = expected
   - ✗ FAIL: Ada perbedaan
   - ⚠ WARN: Ada peringatan/warning

4. **Coverage Analysis**:
   - Black Box: Menguji semua kombinasi input/output
   - White Box: Menguji internal logic dan branching

### Contoh Eksekusi TC-BBox-DT-Login-001:

```
Test Case ID: TC-BBox-DT-Login-001
Input:
  - Email: admin@kerjakuy.com
  - Password: admin123
  
Expected:
  - Email Valid: ✓
  - Login Success
  - Redirect to Dashboard
  - Session created

Execution:
1. Buka /admin/login
2. Input email: admin@kerjakuy.com
3. Input password: admin123
4. Click Login
5. Observe result

Result:
  ✓ PASS / ✗ FAIL / ⚠ WARN
```

---

## CATATAN PENTING

### Keunggulan Decision Table:
✅ Menangkap semua kombinasi input  
✅ Memudahkan identifikasi missing test cases  
✅ Efisien untuk testing logic kompleks  
✅ Mudah di-track dan di-maintain  
✅ Bisa di-convert ke Excel dengan mudah  

### Tips untuk Tester:
1. Jalankan black box tests terlebih dahulu
2. Gunakan decision table untuk systematic testing
3. Dokumentasikan setiap hasil dengan detail
4. Identifikasi edge cases dari kombinasi kondisi
5. Verifikasi state perubahan di database

---

**Document Version**: 2.0  
**Format**: Decision Table  
**Total Test Cases**: 65 (37 Black Box + 28 White Box)  
**Coverage**: 100% Input/Output & Code Path  
**Ready for Excel**: YES (Copy table ke Excel dan maintain struktur)
