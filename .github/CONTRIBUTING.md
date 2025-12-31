# 🤝 Contributing to CV Mahakarya Mandiri Interior

Terima kasih telah tertarik untuk berkontribusi pada proyek ini! Kami sangat menghargai kontribusi dari komunitas.

## 📋 Daftar Isi
- [Code of Conduct](#code-of-conduct)
- [Cara Berkontribusi](#cara-berkontribusi)
- [Development Setup](#development-setup)
- [Pull Request Process](#pull-request-process)
- [Coding Standards](#coding-standards)

## 📖 Code of Conduct

Dengan berpartisipasi dalam proyek ini, Anda diharapkan untuk menjaga lingkungan yang ramah dan profesional.

## 🚀 Cara Berkontribusi

Ada beberapa cara untuk berkontribusi:

### 1. Melaporkan Bug
- Gunakan [Bug Report Template](https://github.com/raselrbnt/CompanyProfile/issues/new?template=bug_report.md)
- Jelaskan bug secara detail dengan langkah reproduksi
- Sertakan screenshot jika memungkinkan

### 2. Mengusulkan Fitur Baru
- Gunakan [Feature Request Template](https://github.com/raselrbnt/CompanyProfile/issues/new?template=feature_request.md)
- Jelaskan use case dan manfaat fitur
- Diskusikan dengan maintainer sebelum mulai coding

### 3. Memperbaiki Kode
- Fork repository
- Buat branch baru untuk fitur/fix Anda
- Submit Pull Request

## 💻 Development Setup

Lihat [DOCUMENTATION.md](../DOCUMENTATION.md) untuk panduan lengkap setup development environment.

### Quick Setup

```bash
# Clone repository
git clone https://github.com/raselrbnt/CompanyProfile.git
cd CompanyProfile

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --seed

# Run development server
php artisan serve
npm run dev
```

## 🔄 Pull Request Process

1. **Fork & Clone**
   ```bash
   git clone https://github.com/YOUR_USERNAME/CompanyProfile.git
   cd CompanyProfile
   ```

2. **Buat Branch Baru**
   ```bash
   git checkout -b feature/nama-fitur-anda
   # atau
   git checkout -b fix/nama-bug-yang-diperbaiki
   ```

3. **Commit Changes**
   - Gunakan commit message yang jelas dan deskriptif
   - Format: `[TYPE] Short description`
   - Contoh:
     ```
     [FEATURE] Add project filtering by category
     [FIX] Resolve image upload validation issue
     [DOCS] Update installation guide
     ```

4. **Push ke Fork Anda**
   ```bash
   git push origin feature/nama-fitur-anda
   ```

5. **Buat Pull Request**
   - Jelaskan perubahan yang Anda buat
   - Reference issue yang terkait (jika ada)
   - Sertakan screenshot untuk perubahan UI

6. **Review Process**
   - Maintainer akan review PR Anda
   - Lakukan perubahan jika diminta
   - PR akan di-merge setelah disetujui

## 📝 Coding Standards

### PHP (Laravel)
- Follow [PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)
- Use type hints untuk parameter dan return types
- Tambahkan docblocks untuk methods yang kompleks
- Run `composer format` sebelum commit (jika tersedia)

### JavaScript
- Gunakan ES6+ syntax
- Ikuti [Airbnb JavaScript Style Guide](https://github.com/airbnb/javascript)
- Format dengan Prettier (jika dikonfigurasi)

### Blade Templates
- Indentasi konsisten (4 spaces)
- Gunakan components untuk reusable elements
- Hindari logic kompleks di views

### Database
- Buat migration untuk setiap perubahan schema
- Tambahkan seeder jika diperlukan
- Gunakan foreign keys dengan cascade appropriately

### Commit Messages
Format commit message:
```
[TYPE] Short description (max 50 chars)

Longer description if needed (wrapped at 72 chars).
Explain what and why, not how.

Fixes #123
```

Types:
- `[FEATURE]` - Fitur baru
- `[FIX]` - Bug fix
- `[DOCS]` - Perubahan dokumentasi
- `[STYLE]` - Formatting, semicolons, dll (no code change)
- `[REFACTOR]` - Code refactoring
- `[TEST]` - Menambah atau memperbaiki tests
- `[CHORE]` - Maintenance tasks

## ✅ Checklist Sebelum Submit PR

- [ ] Kode mengikuti coding standards
- [ ] Sudah di-test secara manual
- [ ] Tidak ada breaking changes (atau sudah didokumentasikan)
- [ ] Documentation sudah di-update (jika perlu)
- [ ] Commit messages jelas dan deskriptif
- [ ] PR description menjelaskan perubahan dengan baik

## 🧪 Testing

Pastikan untuk test perubahan Anda:

```bash
# Run PHP tests
php artisan test

# Run specific test
php artisan test --filter=TestName
```

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev)
- [Project Documentation](../DOCUMENTATION.md)

## ❓ Pertanyaan?

Jika ada pertanyaan, silakan:
- Buka [GitHub Discussions](https://github.com/raselrbnt/CompanyProfile/discussions)
- Atau buat [Issue](https://github.com/raselrbnt/CompanyProfile/issues/new)

---

**Terima kasih telah berkontribusi! 🎉**
