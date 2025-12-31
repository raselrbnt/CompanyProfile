# 📖 Dokumentasi CV Mahakarya Mandiri Interior

## 📋 Daftar Isi
- [Tentang Proyek](#tentang-proyek)
- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Menjalankan Proyek](#menjalankan-proyek)
- [Kredensial Default](#kredensial-default)
- [Struktur Proyek](#struktur-proyek)
- [Testing Email](#testing-email)
- [Troubleshooting](#troubleshooting)
- [Changelog](#changelog)

---

## 🎯 Tentang Proyek

Website Company Profile untuk **CV Mahakarya Mandiri Interior** - perusahaan yang bergerak di bidang jasa desain dan konstruksi interior.

**Teknologi yang Digunakan:**
- Laravel 11.x
- PHP 8.3.11
- MySQL 8.0.30
- Tailwind CSS
- Alpine.js
- Vite

---

## ✨ Fitur

### Frontend (Public)
- ✅ Halaman Home dengan hero section
- ✅ Halaman Layanan (Services)
- ✅ Halaman Proyek/Portofolio dengan galeri
- ✅ Halaman Tentang Kami (About) dengan team members
- ✅ Halaman Kontak dengan form
- ✅ Responsive design untuk semua ukuran layar
- ✅ Navbar auto-hide on scroll down
- ✅ Smooth transitions dan animations

### Backend (Admin Panel)
- ✅ Dashboard admin dengan statistik
- ✅ CRUD Layanan (Services) dengan icon & image upload
- ✅ CRUD Proyek (Projects) dengan featured image
- ✅ CRUD Galeri Proyek (Project Images)
- ✅ CRUD Anggota Tim (Team Members) dengan photo
- ✅ Kelola Pesan Kontak dengan status read/unread
- ✅ Authentication & Authorization
- ✅ Admin middleware protection
- ✅ Responsive admin layout dengan sidebar overlay
- ✅ Modal konfirmasi delete dengan Alpine.js
- ✅ Success notifications dengan auto-dismiss (3 detik)
- ✅ File upload management
- ✅ Forgot password dengan email reset
- ✅ Auto-logout untuk non-admin users

---

## 💻 Persyaratan Sistem

- **PHP:** >= 8.1
- **Composer:** Latest version
- **Node.js:** >= 16.x
- **npm:** >= 8.x
- **MySQL/MariaDB:** >= 5.7 / >= 10.3
- **Web Server:** Apache/Nginx (atau Laragon untuk Windows)

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/raselrbnt/CompanyProfile.git
cd CompanyProfile
```

### 2. Checkout ke Branch Feature (Optional)

```bash
# Untuk menggunakan versi dengan admin panel lengkap
git checkout feature/admin-panel-optimization
```

### 3. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 4. Setup Environment

```bash
# Copy file .env.example ke .env
cp .env.example .env   # Linux/Mac
copy .env.example .env  # Windows

# Generate application key
php artisan key:generate
```

### 5. Konfigurasi Database

Buat database MySQL:
```sql
CREATE DATABASE mahakarya_interior;
```

Update file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mahakarya_interior
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi Database & Seeding

```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder (data awal + admin user)
php artisan db:seed
```

### 7. Link Storage

```bash
php artisan storage:link
```

---

## ⚙️ Konfigurasi

### Email Configuration (MailHog untuk Testing Lokal)

Update `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@mahakarya-interior.test"
MAIL_FROM_NAME="Mahakarya Interior"
```

**Setup MailHog:**
1. Download MailHog: https://github.com/mailhog/MailHog/releases
2. Jalankan `mailhog.exe`
3. Akses web UI: http://127.0.0.1:8025

**Alternative: Log Driver (untuk testing cepat)**

Update `.env`:
```env
MAIL_MAILER=log
```

Email akan tersimpan di: `storage/logs/laravel.log`

### Storage Configuration

Pastikan folder berikut writable:
```
storage/app/public/
storage/framework/
storage/logs/
```

Windows:
```bash
# Tidak perlu chmod di Windows, pastikan folder tidak read-only
```

Linux/Mac:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

---

## 🎮 Menjalankan Proyek

### Development Mode

**Terminal 1 - Laravel Development Server:**
```bash
php artisan serve
```
Server berjalan di: **http://127.0.0.1:8000**

**Terminal 2 - Vite Asset Compilation:**
```bash
npm run dev
```

### Production Build

```bash
# Compile assets untuk production
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Menggunakan Laragon (Windows)

1. Buka Laragon
2. Klik **"Start All"**
3. Akses: `http://mahakarya-interior.test`

---

## 🔐 Kredensial Default

### Admin Login
- **URL:** http://127.0.0.1:8000/admin/dashboard
- **URL Login:** http://127.0.0.1:8000/login
- **Email:** admin@example.com
- **Password:** password

> ⚠️ **Penting:** Ganti kredensial default sebelum deployment production!

---

## 📁 Struktur Proyek

```
mahakarya-interior/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ServiceController.php
│   │   │   │   ├── ProjectController.php
│   │   │   │   ├── TeamMemberController.php
│   │   │   │   ├── ProjectImageController.php
│   │   │   │   └── ContactMessageController.php
│   │   │   ├── HomeController.php
│   │   │   ├── ServiceController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── AboutController.php
│   │   │   └── ContactController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   ├── Models/
│   │   ├── Service.php
│   │   ├── Project.php
│   │   ├── ProjectImage.php
│   │   ├── TeamMember.php
│   │   ├── ContactMessage.php
│   │   └── User.php
│   └── View/Components/
│       └── AdminLayout.php
├── database/
│   ├── migrations/
│   │   ├── 2025_05_12_135951_create_services_table.php
│   │   ├── 2025_05_12_140430_create_projects_table.php
│   │   ├── 2025_05_12_140515_create_project_images_table.php
│   │   ├── 2025_05_12_140552_create_contact_messages_table.php
│   │   └── 2025_05_12_140619_create_team_members_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── AdminUserSeeder.php
│       ├── ServiceSeeder.php
│       ├── ProjectSeeder.php
│       └── TeamMemberSeeder.php
├── resources/
│   ├── views/
│   │   ├── admin/              # Admin views
│   │   │   ├── dashboard.blade.php
│   │   │   ├── services/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   ├── projects/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   └── images/
│   │   │   ├── team/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   └── messages/
│   │   │       ├── index.blade.php
│   │   │       └── show.blade.php
│   │   ├── layouts/
│   │   │   ├── admin.blade.php
│   │   │   ├── app.blade.php
│   │   │   └── navigation.blade.php
│   │   ├── home.blade.php
│   │   ├── services/
│   │   ├── projects/
│   │   ├── about.blade.php
│   │   └── contact.blade.php
│   └── css/
│       └── app.css
├── routes/
│   ├── web.php
│   └── auth.php
└── public/
    └── storage/                # Symlink ke storage/app/public
```

---

## 📧 Testing Email (Forgot Password)

### 1. Setup MailHog

```bash
# Download & jalankan MailHog
mailhog.exe
```

### 2. Test Forgot Password

1. Buka: http://127.0.0.1:8000/login
2. Klik **"Forgot your password?"**
3. Masukkan email: `admin@example.com`
4. Klik **"Email Password Reset Link"**
5. Buka MailHog: http://127.0.0.1:8025
6. Lihat email yang masuk
7. Copy link reset password
8. Paste di browser & reset password

### Alternative: Log Driver (untuk testing cepat)

Update `.env`:
```env
MAIL_MAILER=log
```

Email akan tersimpan di:
```
storage/logs/laravel.log
```

---

## 🛠️ Troubleshooting

### Error: "Target class [admin] does not exist"

```bash
# Clear all cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Regenerate autoload
composer dump-autoload
```

### Error: Storage link not found

```bash
php artisan storage:link
```

### Error: Permission denied (Linux/Mac)

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Migration Error

```bash
# Fresh migration with seeding
php artisan migrate:fresh --seed
```

### Vite not running

```bash
# Kill existing process
taskkill /F /IM node.exe  # Windows
killall node              # Linux/Mac

# Run again
npm run dev
```

### Database Connection Error

1. Pastikan MySQL/MariaDB berjalan
2. Cek kredensial di `.env`
3. Cek apakah database sudah dibuat:
   ```bash
   php artisan tinker
   DB::connection()->getPdo();
   ```

### Checkbox Validation Error (tidak tercentang = error)

Sudah diperbaiki! Pattern yang digunakan:
```php
// Jangan gunakan validation 'boolean' atau 'nullable|boolean'
// Gunakan manual check:
$validated['is_active'] = $request->has('is_active') ? true : false;
```

---

## 📝 Perintah Artisan Berguna

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize (production)
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Database
php artisan migrate
php artisan migrate:fresh --seed
php artisan db:seed

# Queue (jika digunakan)
php artisan queue:work

# Tinker (testing cepat)
php artisan tinker
```

---

## 📊 Database Schema

### Users Table
- id, name, email, password, is_admin, remember_token, timestamps

### Services Table
- id, name, description, icon, image, order, is_active (indexed), timestamps

### Projects Table
- id, title, description, client, location, completion_date (indexed), featured_image, is_featured (indexed), timestamps

### Project Images Table
- id, project_id, image_path, caption, order, timestamps

### Team Members Table
- id, name, position, bio, photo, email, phone, order (indexed), is_active (indexed), timestamps

### Contact Messages Table
- id, name, email, phone, subject, message, is_read (indexed), timestamps

---

## 🔒 Security Notes

1. **Ganti kredensial default** sebelum production
2. **Update APP_KEY** dengan: `php artisan key:generate`
3. **Set APP_DEBUG=false** di production
4. **Gunakan HTTPS** di production
5. **Setup proper file permissions**
6. **Backup database** secara rutin
7. **Update dependencies** secara berkala:
   ```bash
   composer update
   npm update
   ```
8. **AdminMiddleware** sudah menggunakan auto-logout untuk non-admin users
9. **CSRF Protection** aktif di semua forms
10. **Password hashing** menggunakan bcrypt

---

## 🎨 Customization

### Mengubah Logo/Brand
- Update di: `resources/views/layouts/navigation.blade.php`
- Update di: `resources/views/layouts/admin.blade.php`

### Mengubah Warna Theme
- Edit: `tailwind.config.js`
- Edit: `resources/css/app.css`

### Menambah Menu
- Frontend: `resources/views/layouts/navigation.blade.php`
- Admin: `resources/views/layouts/admin.blade.php`
- Routes: `routes/web.php`

### Mengubah Notifikasi Auto-Dismiss Time
Edit di blade files:
```javascript
setTimeout(() => { notification.remove(); }, 3000); // Ubah 3000 (3 detik)
```

---

## 📈 Performance Optimization

### Database Indexes
Indexes sudah ditambahkan pada kolom yang sering di-query:
- **services**: `is_active`, `order`
- **projects**: `completion_date`, `is_featured`
- **team_members**: `is_active`, `order`
- **contact_messages**: `is_read`

### Query Optimization
- Eager loading untuk relasi (`with('images')`)
- Menggunakan `latest()` instead of `orderBy('created_at', 'desc')`
- Menggunakan `limit()` instead of `take()`
- Database indexes pada kolom WHERE/ORDER BY

### Asset Optimization
```bash
# Production build
npm run build

# Laravel optimization
php artisan optimize
```

### Caching Strategy
```bash
# Cache routes, config, views
php artisan route:cache
php artisan config:cache
php artisan view:cache

# Clear all cache
php artisan optimize:clear
```

---

## 🎯 Features Detail

### Admin Panel Features

#### 1. Services Management
- Create, Read, Update, Delete services
- Upload icon (SVG, PNG, JPG, JPEG)
- Upload service image
- Set order for display
- Toggle active/inactive status
- Pagination (10 items per page)

#### 2. Projects Management
- CRUD operations for projects
- Upload featured image
- Set completion date
- Mark as featured project
- Manage project images gallery
- Client information

#### 3. Project Images Gallery
- Multiple images per project
- Add caption to images
- Set display order
- Delete images

#### 4. Team Members Management
- CRUD for team members
- Upload photo
- Add bio, position
- Contact info (email, phone)
- Set display order
- Toggle active/inactive

#### 5. Contact Messages
- View all messages
- Mark as read/unread
- View message details
- Delete messages
- Pagination

#### 6. Dashboard
- Total services count
- Total projects count
- Total team members count
- Unread messages count
- Latest 5 projects
- Latest 5 messages

### Frontend Features

#### 1. Home Page
- Hero section
- Featured projects (3 items)
- Services preview (4 items)
- Team members preview (4 items)

#### 2. Services Page
- List all active services
- Service details with icon & image

#### 3. Projects Page
- All projects with pagination
- Project detail with gallery
- Client info & completion date

#### 4. About Page
- Company information
- Team members display

#### 5. Contact Page
- Contact form
- Form validation
- Success message

---

## 🔄 Changelog

### Version 1.1.0 (2025-12-31) - Admin Panel Optimization
- ✅ Complete admin panel with CRUD
- ✅ Responsive admin layout with sidebar overlay
- ✅ Delete confirmation modal with Alpine.js
- ✅ Auto-hide navbar on scroll
- ✅ Database query optimization (eager loading, indexes)
- ✅ Email password reset configuration
- ✅ Mobile-first responsive design
- ✅ Success notifications with auto-dismiss (3 seconds)
- ✅ Clean up unused code and imports
- ✅ Remove unused files (welcome.blade.php, delete-modal.blade.php)
- ✅ Database indexes for performance
- ✅ Standardize query methods using `latest()` scope
- ✅ Admin middleware with auto-logout
- ✅ Checkbox validation fix

### Version 1.0.0 (Initial Release)
- ✅ Basic company profile website
- ✅ Frontend pages (Home, Services, Projects, About, Contact)
- ✅ Authentication with Laravel Breeze

---

## 📞 Support & Contact

Jika ada pertanyaan atau masalah:
1. Cek [Troubleshooting](#troubleshooting) section
2. Review file `storage/logs/laravel.log`
3. Buat issue di GitHub repository: https://github.com/raselrbnt/CompanyProfile/issues

---

## 🤝 Contributing

Kontribusi selalu diterima! Silakan:
1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📄 License

[Sesuaikan dengan lisensi proyek Anda]

---

## 🙏 Credits

- **Laravel:** https://laravel.com
- **Tailwind CSS:** https://tailwindcss.com
- **Alpine.js:** https://alpinejs.dev
- **MailHog:** https://github.com/mailhog/MailHog

---

**Built with ❤️ using Laravel & Tailwind CSS**
