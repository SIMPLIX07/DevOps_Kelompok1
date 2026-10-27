# ⚪ WHITE BOX TESTING - ADMIN VERIFICATION SYSTEM

## Format Kolom:
1. **Test Case ID**: Identifier unik untuk setiap test
2. **Description**: Deskripsi internal logic yang ditest
3. **Test Data**: Input dan kondisi code
4. **Test Step**: Cara execute test atau code path
5. **Expected Result**: Expected behavior dari code
6. **Actual Result**: Hasil sebenarnya (diisi saat testing)

---

## 1. LOGIN METHOD - WHITE BOX TESTING

### TC-WBox-001: Request Validation - Email Required

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-001 |
| **Description** | Validasi request: email field required |
| **Test Data** | Request input:<br/>- email: null/kosong<br/>- password: "admin123" |
| **Test Step** | 1. Submit form login tanpa email<br/>2. Check validation logic (line 15-18)<br/>3. Observe $request->validate() execution<br/>4. Check if validation fail |
| **Expected Result** | ✓ Validation fail di line 15-18<br/>✓ 'required' rule triggered<br/>✓ Error response returned<br/>✓ Validation::make() throws exception<br/>✓ Code tidak lanjut ke line 21 |
| **Actual Result** | [ ] |

---

### TC-WBox-002: Request Validation - Email Format Valid

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-002 |
| **Description** | Validasi format email harus sesuai format |
| **Test Data** | Request input:<br/>- email: "invalid-email-format"<br/>- password: "admin123" |
| **Test Step** | 1. Submit form dengan email invalid<br/>2. Check validation rules (line 15-18)<br/>3. Check 'email' rule enforcement<br/>4. Observe validation response |
| **Expected Result** | ✓ Validation fail: email rule<br/>✓ Error message: "must be a valid email"<br/>✓ Exception thrown before line 21<br/>✓ Config read tidak dijalankan |
| **Actual Result** | [ ] |

---

### TC-WBox-003: Request Validation - Password Required

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-003 |
| **Description** | Validasi request: password field required |
| **Test Data** | Request input:<br/>- email: "admin@kerjakuy.com"<br/>- password: null/kosong |
| **Test Step** | 1. Submit form tanpa password<br/>2. Check validation logic<br/>3. Observe 'required' rule<br/>4. Check error response |
| **Expected Result** | ✓ Validation fail<br/>✓ 'required' rule triggered untuk password<br/>✓ Error response returned<br/>✓ Tidak lanjut ke config read (line 21-22) |
| **Actual Result** | [ ] |

---

### TC-WBox-004: Config Reading - Admin Email

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-004 |
| **Description** | Config dibaca dengan benar (email) |
| **Test Data** | Code execution:<br/>- Line 21: config('admin.admin.email')<br/>- Config file: config/admin.php<br/>- Expected value: 'admin@kerjakuy.com' |
| **Test Step** | 1. Execute login dengan valid input<br/>2. Reach line 21<br/>3. Check config() function call<br/>4. Verify return value<br/>5. Store di variable $adminEmail |
| **Expected Result** | ✓ config() function called<br/>✓ Return value: 'admin@kerjakuy.com'<br/>✓ Variable $adminEmail = 'admin@kerjakuy.com'<br/>✓ Config read dari correct path<br/>✓ No exception thrown |
| **Actual Result** | [ ] |

---

### TC-WBox-005: Config Reading - Admin Password

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-005 |
| **Description** | Config dibaca dengan benar (password) |
| **Test Data** | Code execution:<br/>- Line 22: config('admin.admin.password')<br/>- Config file: config/admin.php<br/>- Expected value: 'admin123' |
| **Test Step** | 1. Execute login dengan valid input<br/>2. Reach line 22<br/>3. Check config() untuk password<br/>4. Verify return value<br/>5. Store di $adminPassword |
| **Expected Result** | ✓ config() function called<br/>✓ Return value: 'admin123'<br/>✓ Variable $adminPassword = 'admin123'<br/>✓ Password read dari config<br/>✓ No exception |
| **Actual Result** | [ ] |

---

### TC-WBox-006: Condition TRUE - Email Match && Password Match

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-006 |
| **Description** | IF condition TRUE: email === config && password === config |
| **Test Data** | Code path:<br/>- $request->email = 'admin@kerjakuy.com'<br/>- $adminEmail = 'admin@kerjakuy.com'<br/>- $request->password = 'admin123'<br/>- $adminPassword = 'admin123' |
| **Test Step** | 1. Login dengan valid credential<br/>2. Validation pass (line 15-18)<br/>3. Config read (line 21-22)<br/>4. Reach IF condition (line 24)<br/>5. Check boolean evaluation<br/>6. Trace TRUE branch |
| **Expected Result** | ✓ Condition line 24: TRUE<br/>✓ IF branch executed (line 25-28)<br/>✓ session(['admin_id' => 'admin', ...]) called<br/>✓ Session created di $_SESSION<br/>✓ redirect() called<br/>✓ HTTP redirect response returned<br/>✓ ELSE branch (line 30) NOT executed |
| **Actual Result** | [ ] |

---

### TC-WBox-007: Condition FALSE - Email Mismatch

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-007 |
| **Description** | IF condition FALSE: email !== config |
| **Test Data** | Code path:<br/>- $request->email = 'wrong@kerjakuy.com'<br/>- $adminEmail = 'admin@kerjakuy.com'<br/>- $request->password = 'admin123'<br/>- $adminPassword = 'admin123' |
| **Test Step** | 1. Validation pass<br/>2. Config read<br/>3. Reach IF condition (line 24)<br/>4. First part: 'wrong' === 'admin' → FALSE<br/>5. Check short-circuit behavior<br/>6. Observe ELSE execution |
| **Expected Result** | ✓ First condition: FALSE<br/>✓ && operator evaluates to FALSE<br/>✓ Password NOT checked (short-circuit)<br/>✓ Entire condition: FALSE<br/>✓ ELSE branch executed (line 30)<br/>✓ withErrors() returned<br/>✓ IF branch NOT executed |
| **Actual Result** | [ ] |

---

### TC-WBox-008: Condition FALSE - Password Mismatch

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-008 |
| **Description** | IF condition FALSE: password !== config |
| **Test Data** | Code path:<br/>- $request->email = 'admin@kerjakuy.com'<br/>- $adminEmail = 'admin@kerjakuy.com'<br/>- $request->password = 'wrongpass'<br/>- $adminPassword = 'admin123' |
| **Test Step** | 1. Validation pass<br/>2. Config read<br/>3. Reach IF condition<br/>4. First part: TRUE (email match)<br/>5. Second part: 'wrongpass' === 'admin123' → FALSE<br/>6. Entire && evaluate<br/>7. Check branch execution |
| **Expected Result** | ✓ First part: TRUE<br/>✓ Second part: FALSE<br/>✓ Entire condition: TRUE && FALSE = FALSE<br/>✓ ELSE branch executed<br/>✓ withErrors returned<br/>✓ Session NOT created |
| **Actual Result** | [ ] |

---

### TC-WBox-009: Session Creation - Correct Keys & Values

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-009 |
| **Description** | Session dibuat dengan keys dan values yang tepat |
| **Test Data** | Code line 25:<br/>session(['admin_id' => 'admin', 'admin_email' => $adminEmail])<br/>- admin_id: 'admin'<br/>- admin_email: 'admin@kerjakuy.com' |
| **Test Step** | 1. Login dengan valid credential<br/>2. Condition TRUE<br/>3. Reach session() call<br/>4. Check $_SESSION array<br/>5. Verify keys dan values<br/>6. Check session persist |
| **Expected Result** | ✓ session() function called<br/>✓ $_SESSION['admin_id'] = 'admin'<br/>✓ $_SESSION['admin_email'] = 'admin@kerjakuy.com'<br/>✓ Session data persisted<br/>✓ Accessible di middleware check |
| **Actual Result** | [ ] |

---

### TC-WBox-010: Redirect Response - Correct Path

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-010 |
| **Description** | Redirect ke correct path (/admin/dashboard) |
| **Test Data** | Code line 26-27:<br/>redirect('/admin/dashboard')->with('success', ...) |
| **Test Step** | 1. Login successful<br/>2. Condition TRUE<br/>3. Session created<br/>4. Reach redirect() call<br/>5. Check redirect target<br/>6. Check flash message |
| **Expected Result** | ✓ redirect() called dengan parameter '/admin/dashboard'<br/>✓ HTTP response code: 302<br/>✓ Location header: /admin/dashboard<br/>✓ Flash message set: 'success' key<br/>✓ Message value: 'Login berhasil'<br/>✓ Client redirected to dashboard |
| **Actual Result** | [ ] |

---

### TC-WBox-011: Error Response - withErrors Format

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-011 |
| **Description** | Error response format untuk login fail |
| **Test Data** | Code line 30:<br/>back()->withErrors(['email' => 'Email atau password admin salah']) |
| **Test Step** | 1. Login invalid (email/password wrong)<br/>2. Condition FALSE<br/>3. ELSE branch executed<br/>4. Check withErrors() call<br/>5. Verify error structure<br/>6. Check error display |
| **Expected Result** | ✓ back() function returns to previous page<br/>✓ withErrors() sets error bag<br/>✓ Error key: 'email'<br/>✓ Error message: 'Email atau password admin salah'<br/>✓ Error accessible dalam view<br/>✓ Error displayed di form |
| **Actual Result** | [ ] |

---

## 2. DASHBOARD METHOD - WHITE BOX TESTING

### TC-WBox-012: Query - Pending Perusahaan WHERE Clause

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-012 |
| **Description** | Query pending perusahaan dengan WHERE status |
| **Test Data** | Code line 38-40:<br/>Perusahaan::where('status_verifikasi', 'pending')<br/>  ->latest()<br/>  ->paginate(10)<br/>Database: 5 pending, 3 verified, 2 rejected |
| **Test Step** | 1. Access dashboard<br/>2. Execute query for pending<br/>3. Check WHERE clause<br/>4. Check ORDER BY<br/>5. Check LIMIT/pagination<br/>6. Count result |
| **Expected Result** | ✓ WHERE clause: status_verifikasi = 'pending'<br/>✓ ORDER BY: created_at DESC (from latest)<br/>✓ LIMIT: 10 (from paginate)<br/>✓ Query result: 5 rows<br/>✓ Pagination metadata included<br/>✓ verified/rejected excluded |
| **Actual Result** | [ ] |

---

### TC-WBox-013: Query - Verified COUNT

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-013 |
| **Description** | Query COUNT untuk verified perusahaan |
| **Test Data** | Code line 42-43:<br/>Perusahaan::where('status_verifikasi', 'verified')<br/>  ->count()<br/>Database: 3 verified |
| **Test Step** | 1. Dashboard execution<br/>2. Query verified count<br/>3. Check WHERE clause<br/>4. Check COUNT aggregate<br/>5. Return type<br/>6. Verify count |
| **Expected Result** | ✓ WHERE applied: status = 'verified'<br/>✓ COUNT aggregate function executed<br/>✓ Result: integer 3<br/>✓ Only count, no full rows<br/>✓ Efficient query |
| **Actual Result** | [ ] |

---

### TC-WBox-014: Query - Rejected COUNT

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-014 |
| **Description** | Query COUNT untuk rejected perusahaan |
| **Test Data** | Code line 45-46:<br/>Perusahaan::where('status_verifikasi', 'rejected')<br/>  ->count()<br/>Database: 2 rejected |
| **Test Step** | 1. Dashboard execution<br/>2. Query rejected count<br/>3. Execute COUNT<br/>4. Return value<br/>5. Verify result |
| **Expected Result** | ✓ WHERE: status = 'rejected'<br/>✓ COUNT executed<br/>✓ Result: integer 2<br/>✓ Correct calculation |
| **Actual Result** | [ ] |

---

### TC-WBox-015: Query - Total COUNT (No WHERE)

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-015 |
| **Description** | Query total count tanpa WHERE clause |
| **Test Data** | Code line 48:<br/>Perusahaan::count()<br/>Database: 10 total perusahaan |
| **Test Step** | 1. Dashboard execution<br/>2. Query total<br/>3. Check if WHERE exists<br/>4. Execute COUNT<br/>5. Return value |
| **Expected Result** | ✓ No WHERE clause<br/>✓ COUNT all records<br/>✓ Result: integer 10<br/>✓ Includes all status |
| **Actual Result** | [ ] |

---

### TC-WBox-016: Compact & View Pass

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-016 |
| **Description** | Data passed ke view menggunakan compact |
| **Test Data** | Code line 50:<br/>return view('admin.dashboard', compact(...))<br/>Variables:<br/>- $pendingPerusahaan<br/>- $verifiedPerusahaan<br/>- $rejectedPerusahaan<br/>- $totalPerusahaan |
| **Test Step** | 1. All queries executed<br/>2. Reach line 50<br/>3. Check compact() array<br/>4. Verify variable names<br/>5. View rendering<br/>6. Check data in view |
| **Expected Result** | ✓ compact() creates array:<br/>  - pendingPerusahaan => collection<br/>  - verifiedPerusahaan => 3<br/>  - rejectedPerusahaan => 2<br/>  - totalPerusahaan => 10<br/>✓ view() renders template<br/>✓ Variables accessible dalam view<br/>✓ Data correctly displayed |
| **Actual Result** | [ ] |

---

## 3. DAFTAR PERUSAHAAN METHOD - WHITE BOX TESTING

### TC-WBox-017: Query Builder Initialization

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-017 |
| **Description** | Query builder di-initialize sebagai base |
| **Test Data** | Code line 54:<br/>$query = Perusahaan::query()<br/>Initial query: SELECT * FROM perusahaans |
| **Test Step** | 1. Method execution<br/>2. Reach line 54<br/>3. Check query() call<br/>4. Verify query builder instance<br/>5. Check initial state |
| **Expected Result** | ✓ Perusahaan::query() returns QueryBuilder<br/>✓ Base query: SELECT * FROM perusahaans<br/>✓ No WHERE/ORDER BY yet<br/>✓ Ready untuk modifications<br/>✓ Instance stored di $query |
| **Actual Result** | [ ] |

---

### TC-WBox-018: Status Filter - Condition TRUE

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-018 |
| **Description** | Status filter applied ketika parameter exist dan tidak kosong |
| **Test Data** | Code line 57-59:<br/>$request->has('status') = TRUE<br/>$request->status = 'pending' (not empty)<br/>Request: ?status=pending |
| **Test Step** | 1. Request dengan status=pending<br/>2. has('status') check<br/>3. status !== '' check<br/>4. Boolean evaluation<br/>5. WHERE applied<br/>6. Check query |
| **Expected Result** | ✓ First condition: has('status') = TRUE<br/>✓ Second condition: 'pending' !== '' = TRUE<br/>✓ Both TRUE → if executes<br/>✓ WHERE clause added<br/>✓ Query: ... WHERE status='pending'<br/>✓ Filter applied correctly |
| **Actual Result** | [ ] |

---

### TC-WBox-019: Status Filter - Condition FALSE (Has but Empty)

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-019 |
| **Description** | Status filter skipped ketika value kosong |
| **Test Data** | Code line 57-59:<br/>$request->has('status') = TRUE<br/>$request->status = '' (empty)<br/>Request: ?status= |
| **Test Step** | 1. Request dengan status kosong<br/>2. has('status') = TRUE<br/>3. status !== '' = FALSE<br/>4. Boolean evaluation<br/>5. Check WHERE |
| **Expected Result** | ✓ First condition: TRUE<br/>✓ Second condition: FALSE<br/>✓ Combined: TRUE && FALSE = FALSE<br/>✓ if block skipped<br/>✓ WHERE NOT added<br/>✓ Query unchanged |
| **Actual Result** | [ ] |

---

### TC-WBox-020: Status Filter - Condition FALSE (No Parameter)

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-020 |
| **Description** | Status filter skipped ketika parameter tidak ada |
| **Test Data** | Code line 57-59:<br/>$request->has('status') = FALSE<br/>Request: (no status param) |
| **Test Step** | 1. Request tanpa status parameter<br/>2. has('status') check<br/>3. Boolean evaluation<br/>4. Check if execution |
| **Expected Result** | ✓ First condition: FALSE<br/>✓ if block skipped (short-circuit)<br/>✓ Second condition NOT checked<br/>✓ WHERE NOT added<br/>✓ Base query returned |
| **Actual Result** | [ ] |

---

### TC-WBox-021: Search Filter - OR Logic

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-021 |
| **Description** | Search filter dengan OR clause untuk nama dan email |
| **Test Data** | Code line 62-68:<br/>Search: 'Maju'<br/>Database:<br/>- PT Maju Jaya<br/>- CV Teknologi Maju<br/>- hello@teknologimaju.com |
| **Test Step** | 1. Request: ?search=Maju<br/>2. has('search') check<br/>3. Closure function<br/>4. Check LIKE operator<br/>5. OR logic<br/>6. Execute query |
| **Expected Result** | ✓ WHERE closure executed<br/>✓ First WHERE: nama LIKE '%Maju%'<br/>✓ OR operator<br/>✓ Second WHERE: email LIKE '%Maju%'<br/>✓ Wildcard: both sides<br/>✓ Case-insensitive LIKE<br/>✓ Both conditions checked |
| **Actual Result** | [ ] |

---

### TC-WBox-022: Search with use() Variable Capture

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-022 |
| **Description** | Variable capture dalam closure menggunakan use() |
| **Test Data** | Code line 64:<br/>use($search) → $search captured<br/>$search = 'Maju' |
| **Test Step** | 1. Search value di variable<br/>2. Closure function<br/>3. use($search) declaration<br/>4. Access $search inside closure<br/>5. Use dalam LIKE |
| **Expected Result** | ✓ $search variable captured<br/>✓ Accessible inside closure<br/>✓ Value: 'Maju'<br/>✓ Used dalam LIKE clauses<br/>✓ No undefined variable error |
| **Actual Result** | [ ] |

---

### TC-WBox-023: Query Execution & Pagination

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-023 |
| **Description** | Query execution dengan paginate(15) |
| **Test Data** | Code line 70:<br/>$perusahaan = $query->latest()->paginate(15)<br/>Database: 25 perusahaan |
| **Test Step** | 1. All filters applied to $query<br/>2. latest() applied<br/>3. paginate(15) called<br/>4. Query execute<br/>5. Check pagination |
| **Expected Result** | ✓ latest() = ORDER BY created_at DESC<br/>✓ paginate(15) = LIMIT 15<br/>✓ Query executed<br/>✓ Result: LengthAwarePaginator<br/>✓ Pagination meta: total=25, per_page=15, current_page=1<br/>✓ Page 1: 15 items, Page 2: 10 items |
| **Actual Result** | [ ] |

---

## 4. VERIFIKASI METHOD - WHITE BOX TESTING

### TC-WBox-024: Validation Rules - status_verifikasi

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-024 |
| **Description** | Validation rule untuk status_verifikasi |
| **Test Data** | Code line 84-87:<br/>status_verifikasi: 'required|in:verified,rejected' |
| **Test Step** | 1. Submit verifikasi form<br/>2. Validation check line 84-87<br/>3. Check required rule<br/>4. Check in() rule<br/>5. Verify validation |
| **Expected Result** | ✓ Validation rule: required<br/>✓ Validation rule: in:verified,rejected<br/>✓ Status must exist<br/>✓ Status must be 'verified' atau 'rejected'<br/>✓ Other values rejected<br/>✓ Validation fail untuk invalid status |
| **Actual Result** | [ ] |

---

### TC-WBox-025: Validation Rules - alasan_penolakan

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-025 |
| **Description** | Validation rule untuk alasan_penolakan |
| **Test Data** | Code line 87:<br/>alasan_penolakan: 'nullable|string|max:500' |
| **Test Step** | 1. Validation check<br/>2. Check nullable rule<br/>3. Check string rule<br/>4. Check max:500 rule<br/>5. Test with various input |
| **Expected Result** | ✓ nullable: field optional (dapat kosong)<br/>✓ string: harus string type<br/>✓ max:500: max 500 characters<br/>✓ Input > 500 char: fail validation<br/>✓ Input null: pass validation<br/>✓ Input numeric: fail validation |
| **Actual Result** | [ ] |

---

### TC-WBox-026: Find Perusahaan by ID

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-026 |
| **Description** | Query findOrFail untuk get perusahaan |
| **Test Data** | Code line 81:<br/>Perusahaan::findOrFail($id)<br/>Test ID: 5 (exists) |
| **Test Step** | 1. Execute method dengan id=5<br/>2. Validation pass<br/>3. Reach findOrFail()<br/>4. Check query<br/>5. Verify result |
| **Expected Result** | ✓ Query: SELECT * FROM perusahaans WHERE id=5<br/>✓ Record found<br/>✓ Perusahaan model returned<br/>✓ Model instance created<br/>✓ Accessible untuk update |
| **Actual Result** | [ ] |

---

### TC-WBox-027: Verified Branch - IF Path

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-027 |
| **Description** | IF branch: status === 'verified' |
| **Test Data** | Code line 89-95:<br/>$request->status_verifikasi = 'verified'<br/>Condition: === 'verified' = TRUE |
| **Test Step** | 1. Validation pass<br/>2. Model found<br/>3. Reach IF condition line 89<br/>4. status === 'verified'<br/>5. Condition TRUE<br/>6. Trace IF block |
| **Expected Result** | ✓ Condition: TRUE<br/>✓ IF block executed<br/>✓ Attributes updated:<br/>  - status_verifikasi = 'verified'<br/>  - verified_by = 1<br/>  - verified_at = now()<br/>  - alasan_penolakan = null<br/>✓ Model save() called<br/>✓ Database UPDATE executed<br/>✓ Redirect with success message |
| **Actual Result** | [ ] |

---

### TC-WBox-028: Rejected Branch - ELSE Path

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-028 |
| **Description** | ELSE branch: status !== 'verified' |
| **Test Data** | Code line 96-103:<br/>$request->status_verifikasi = 'rejected'<br/>$request->alasan_penolakan = 'Tidak lengkap'<br/>Condition: === 'verified' = FALSE |
| **Test Step** | 1. Validation pass<br/>2. Model found<br/>3. Reach IF condition<br/>4. status === 'verified' FALSE<br/>5. ELSE block executed<br/>6. Trace attributes |
| **Expected Result** | ✓ IF condition: FALSE<br/>✓ ELSE block executed<br/>✓ Attributes updated:<br/>  - status_verifikasi = 'rejected'<br/>  - alasan_penolakan = input<br/>  - verified_by = 1<br/>  - verified_at = now()<br/>✓ Model save() called<br/>✓ Database UPDATE executed<br/>✓ Redirect with warning message |
| **Actual Result** | [ ] |

---

### TC-WBox-029: Model Save - Database UPDATE

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-029 |
| **Description** | Model save() method update database |
| **Test Data** | Code line 95 & 103:<br/>$perusahaan->save()<br/>Database: perusahaans table |
| **Test Step** | 1. Model attributes modified<br/>2. Reach save() call<br/>3. Check UPDATE query<br/>4. Verify database state<br/>5. Check timestamp |
| **Expected Result** | ✓ save() method called<br/>✓ UPDATE query generated<br/>✓ WHERE id = $id<br/>✓ SET updated_at = current_timestamp<br/>✓ Database record updated<br/>✓ Changes persisted |
| **Actual Result** | [ ] |

---

### TC-WBox-030: Exception Handling - Try Block

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-030 |
| **Description** | Normal execution dalam try block |
| **Test Data** | Code line 88 (try) - 103:<br/>No exception scenario |
| **Test Step** | 1. All validation pass<br/>2. No database error<br/>3. Execute try block<br/>4. Code flow normal<br/>5. Catch block skipped |
| **Expected Result** | ✓ try block executed normally<br/>✓ No exception thrown<br/>✓ All code executed<br/>✓ Redirect returned<br/>✓ catch block NOT executed<br/>✓ Normal response |
| **Actual Result** | [ ] |

---

### TC-WBox-031: Exception Handling - Catch Block

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-031 |
| **Description** | Exception caught dan error returned |
| **Test Data** | Code line 104-106:<br/>Catch block untuk \Exception<br/>Simulate: Database connection error |
| **Test Step** | 1. Validation pass<br/>2. During save()<br/>3. Database error occur<br/>4. Exception thrown<br/>5. Catch block trigger<br/>6. Error handling |
| **Expected Result** | ✓ Exception thrown<br/>✓ catch (\Exception $e) triggered<br/>✓ Error message captured: $e->getMessage()<br/>✓ withErrors(['error' => ...]) returned<br/>✓ back() redirect<br/>✓ Error message displayed<br/>✓ Database NOT updated |
| **Actual Result** | [ ] |

---

## 5. HISTORY METHOD - WHITE BOX TESTING

### TC-WBox-032: WHERE NOT EQUAL Clause

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-032 |
| **Description** | WHERE status != 'pending' |
| **Test Data** | Code line 107:<br/>Perusahaan::where('status_verifikasi', '!=', 'pending')<br/>Database:<br/>- 5 pending<br/>- 8 verified<br/>- 3 rejected |
| **Test Step** | 1. Method execution<br/>2. WHERE clause with operator '!='<br/>3. Check negation logic<br/>4. Execute query<br/>5. Count result |
| **Expected Result** | ✓ WHERE clause: status_verifikasi != 'pending'<br/>✓ Pending excluded from result<br/>✓ Only verified + rejected returned<br/>✓ Result count: 11 (8+3)<br/>✓ Correct exclusion |
| **Actual Result** | [ ] |

---

### TC-WBox-033: Latest by Specific Column

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-033 |
| **Description** | latest() dengan specific column (verified_at) |
| **Test Data** | Code line 108:<br/>::latest('verified_at')<br/>Default: created_at DESC<br/>Custom: verified_at DESC |
| **Test Step** | 1. Query building<br/>2. latest('verified_at') called<br/>3. Check ORDER BY<br/>4. Execute query<br/>5. Verify ordering |
| **Expected Result** | ✓ latest() parameter: 'verified_at'<br/>✓ ORDER BY: verified_at DESC<br/>✓ Not created_at<br/>✓ Newest verified first<br/>✓ Correct sorting |
| **Actual Result** | [ ] |

---

### TC-WBox-034: Pagination 20 Per Page

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-034 |
| **Description** | paginate(20) untuk history |
| **Test Data** | Code line 109:<br/>->paginate(20)<br/>Database: 50 verified/rejected |
| **Test Step** | 1. Query finalized<br/>2. paginate(20) called<br/>3. Check LIMIT<br/>4. Check pagination<br/>5. Calculate pages |
| **Expected Result** | ✓ LIMIT: 20 per page<br/>✓ Total pages: 3 (50 records)<br/>✓ Page 1: 20 items<br/>✓ Page 2: 20 items<br/>✓ Page 3: 10 items<br/>✓ Pagination metadata correct |
| **Actual Result** | [ ] |

---

## 6. LOGOUT METHOD - WHITE BOX TESTING

### TC-WBox-035: Session Forget - Key Removal

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-035 |
| **Description** | session()->forget() remove specific keys |
| **Test Data** | Code line 113:<br/>session()->forget(['admin_id', 'admin_email'])<br/>Session before:<br/>- admin_id<br/>- admin_email<br/>- lang |
| **Test Step** | 1. Admin session active<br/>2. Reach forget() call<br/>3. Check keys array<br/>4. Execute forget<br/>5. Check session state |
| **Expected Result** | ✓ session()->forget() called<br/>✓ Keys removed: admin_id, admin_email<br/>✓ $_SESSION['admin_id'] removed<br/>✓ $_SESSION['admin_email'] removed<br/>✓ Other keys kept: lang<br/>✓ Keys accessible check: null |
| **Actual Result** | [ ] |

---

### TC-WBox-036: Redirect to Root

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-036 |
| **Description** | redirect('/') untuk homepage |
| **Test Data** | Code line 114:<br/>redirect('/') |
| **Test Step** | 1. Forget() executed<br/>2. redirect() called<br/>3. Check parameter<br/>4. HTTP response<br/>5. Browser redirect |
| **Expected Result** | ✓ redirect('/') called<br/>✓ HTTP 302 response<br/>✓ Location: /<br/>✓ Redirect to homepage<br/>✓ Client navigated<br/>✓ Session cleared |
| **Actual Result** | [ ] |

---

### TC-WBox-037: Flash Message Setting

| Komponen | Detail |
|:---|:---|
| **Test Case ID** | TC-WBox-037 |
| **Description** | with() set flash message |
| **Test Data** | Code line 114:<br/>with('success', 'Anda telah logout dari panel admin') |
| **Test Step** | 1. redirect() chained<br/>2. with() method called<br/>3. Check key: 'success'<br/>4. Check message<br/>5. Session store |
| **Expected Result** | ✓ with() set flash data<br/>✓ Key: 'success'<br/>✓ Value: 'Anda telah logout dari panel admin'<br/>✓ Available di $_SESSION['flash']<br/>✓ Single-request accessible<br/>✓ Auto-cleared after read |
| **Actual Result** | [ ] |

---

## SUMMARY & COVERAGE ANALYSIS

### Code Path Coverage

| Method | Total Paths | Tested | Coverage |
|:---|:---:|:---:|:---:|
| login() | 2 (IF/ELSE) | 2 | 100% |
| dashboard() | 1 (linear) | 1 | 100% |
| daftarPerusahaan() | 3 (filter combos) | 3 | 100% |
| verifikasiPerusahaan() | 2 (IF/ELSE) + 1 (try-catch) | 3 | 100% |
| historyVerifikasi() | 1 (linear) | 1 | 100% |
| logout() | 1 (linear) | 1 | 100% |
| **TOTAL** | **10 paths** | **11 tests** | **100%** |

### Statement Coverage

| Method | Statements | Tested | Coverage |
|:---|:---:|:---:|:---:|
| login() | 10 | 10 | 100% |
| dashboard() | 8 | 8 | 100% |
| daftarPerusahaan() | 10 | 10 | 100% |
| verifikasiPerusahaan() | 20 | 20 | 100% |
| historyVerifikasi() | 5 | 5 | 100% |
| logout() | 3 | 3 | 100% |
| **TOTAL** | **56 statements** | **56** | **100%** |

---

## EXECUTION CHECKLIST

### White Box Test Cases

**Login Method**
- [ ] TC-WBox-001 to TC-WBox-011 (11 cases)

**Dashboard Method**
- [ ] TC-WBox-012 to TC-WBox-016 (5 cases)

**Daftar Perusahaan Method**
- [ ] TC-WBox-017 to TC-WBox-023 (7 cases)

**Verifikasi Method**
- [ ] TC-WBox-024 to TC-WBox-031 (8 cases)

**History Method**
- [ ] TC-WBox-032 to TC-WBox-034 (3 cases)

**Logout Method**
- [ ] TC-WBox-035 to TC-WBox-037 (3 cases)

**Total: 37 White Box Test Cases**

---

## NOTES FOR TESTER

### White Box Testing Requirements:
1. **Source Code Access**: Harus bisa membaca source code
2. **Debugger**: Gunakan debugger untuk step-through code
3. **Database Inspector**: Monitor database state
4. **Code Coverage Tool**: Track statement/branch coverage
5. **Request Monitoring**: Monitor HTTP request/response

### Testing Approach:
1. Use breakpoints di decision points
2. Monitor variable values di setiap step
3. Check database state before/after operations
4. Verify all code paths executed
5. Test error scenarios dengan exception

### Code Coverage Verification:
```
Coverage Target: 100%
- Statement Coverage: 100%
- Branch Coverage: 100%
- Path Coverage: 100%
```

---

**Document Version**: 1.0  
**Format**: White Box Testing (Detailed Format)  
**Total Test Cases**: 37  
**Code Coverage**: 100% Paths & Statements  
**Ready for Execution**: YES
