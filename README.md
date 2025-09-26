# TDC Marketplace 🎓🛍️

**Website Chợ Đồ Học Tập Cũ cho Sinh Viên Trường Cao đẳng Công nghệ Thủ Đức**

Nền tảng kết nối người bán (sinh viên/alumni) và người mua (tân sinh viên) để trao đổi đồ học tập cũ trong phạm vi trường. Admin chịu trách nhiệm kiểm duyệt nội dung, đảm bảo môi trường giao dịch an toàn – minh bạch.

## 🏗️ Kiến trúc & Công nghệ

**Frontend:** Vue 3 + Vite, Pinia, Vue Router, Axios, VeeValidate, TailwindCSS
**Backend:** Laravel 10, Sanctum, Spatie Permission (RBAC), FormRequest, Queue/Mail, Storage WebP  
**Database:** MySQL 8; Search: Laravel Scout + Meilisearch
**Triển khai:** Docker/Sail, Nginx + PHP-FPM; GitHub Actions (CI)

## 📁 Cấu trúc dự án
```
TDC-Marketplace/
├── backend/                 # Laravel 10 API
│   ├── app/
│   │   ├── Http/Controllers/Api/
│   │   ├── Models/
│   │   └── Requests/
│   ├── database/migrations/
│   ├── routes/api.php
│   └── docker/             # Docker configuration
├── frontend/               # Vue 3 SPA
│   ├── src/
│   │   ├── components/
│   │   ├── views/
│   │   ├── stores/        # Pinia stores
│   │   └── router/
│   └── public/
├── docker-compose.yml      # Development environment
└── README.md
```

## 🚀 Cài đặt & Chạy dự án

### Yêu cầu hệ thống
- Docker & Docker Compose
- Node.js 20+ (cho frontend development)
- Git

### 1. Clone repository
```bash
git clone https://github.com/phi1235/TDC-Marketplace.git
cd TDC-Marketplace
```

### 2. Khởi động services với Docker
```bash
# Khởi động tất cả services (MySQL, Laravel, Vue, Redis, Meilisearch)
docker-compose up -d

# Xem logs
docker-compose logs -f
```

### 3. Setup Backend (Laravel)
```bash
# Vào container Laravel
docker exec -it tdc-laravel bash

# Cài đặt dependencies & chạy migrations
composer install
php artisan migrate --seed
php artisan key:generate
php artisan storage:link

# Publish packages
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

### 4. Setup Frontend (Vue)
```bash
# Nếu chạy development ngoài Docker
cd frontend
npm install
npm run dev

# Hoặc sử dụng Docker (đã được setup)
# Frontend sẽ tự động chạy tại http://localhost:5173
```

### 5. Truy cập ứng dụng
- **Frontend:** http://localhost:5173
- **Backend API:** http://localhost:8000
- **Meilisearch:** http://localhost:7700

## 🔧 Cấu hình môi trường

### Backend (.env)
```env
APP_NAME="TDC Marketplace"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_DATABASE=tdc_marketplace
DB_USERNAME=laravel
DB_PASSWORD=password

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700
MEILISEARCH_KEY=masterKey123

SANCTUM_STATEFUL_DOMAINS=localhost:5173,127.0.0.1:5173
```

### Frontend (.env)
```env
VITE_API_URL=http://localhost:8000/api
VITE_APP_NAME="TDC Marketplace"
```

## 👥 Phân chia công việc (4 thành viên × 10 chức năng)

### Frontend (Trần Quốc Nam)
1. Trang chủ & Trang danh mục
2. Đăng ký/Đăng nhập (form, giao diện)
3. Trang hồ sơ cá nhân & chỉnh sửa thông tin
4. Đăng tin rao vật (form FE)
5. Giao diện tìm kiếm & filter nâng cao
6. Phân trang (Trang chủ)
7. Trang chi tiết sản phẩm/tin rao
8. Lưu lịch sử tìm kiếm & gợi ý thông minh
9. Skeleton loading + Dark mode
10. Trang tin tức / thông báo nội bộ

### Backend API (Nguyễn Châu Phi)
11. API đăng ký/đăng nhập (JWT/Sanctum)
12. Phân quyền người dùng (RBAC)
13. API CRUD tin rao + duyệt tin (Admin)
14. Danh sách yêu thích
15. API thông báo (queue + email)
16. API báo cáo vi phạm
17. API khiếu nại/tranh chấp
18. API tìm kiếm (Scout/Meili)
19. Xác thực sinh viên (email .edu/thẻ SV)
20. Audit log (ghi vết thao tác)

### Features (Lê Đồng Minh Tuấn)
21. Đề xuất tin rao liên quan
22. Quản lý tin rao của tôi
23. Địa điểm giao dịch (pickup point)
24. QR xác nhận giao/nhận
25. Bộ lọc nâng cao cho admin
26. Trang thống kê cho admin
27. Rating & review seller
28. Analytics hành vi (lượt xem, tìm kiếm)
29. Moderation nâng cao (lọc từ khóa)
30. Gợi ý theo ngành/kỳ học

### Admin & System (Trương Tuấn Dũng)
31. Quản lý người dùng (khóa/mở tài khoản)
32. Quản lý danh mục
33. Trang quản trị tổng quan (dashboard)
34. Upload & tối ưu ảnh (resize, webp)
35. Phân trang (Admin)
36. Trang FAQ & Liên hệ
37. Quản lý thông báo hệ thống (admin push)
38. Export dữ liệu báo cáo (CSV/Excel)
39. Trang điều khoản & lưu consent
40. Giám sát lỗi & cảnh báo hệ thống

## 🗄️ Cơ sở dữ liệu

### Các bảng chính
- `users` - Người dùng (buyer/seller/admin)
- `seller_profiles` - Hồ sơ người bán
- `categories` - Danh mục sản phẩm
- `listings` - Tin rao đồ cũ
- `offers` - Đề nghị mua
- `messages` - Tin nhắn chat
- `reviews` - Đánh giá seller
- `campus_pickups` - Điểm giao dịch trong trường
- `reports` - Báo cáo vi phạm
- `disputes` - Tranh chấp
- `notifications` - Thông báo
- `legal_docs` - Tài liệu pháp lý
- `user_consents` - Đồng ý điều khoản
- `audit_logs` - Nhật ký hệ thống

## 🧪 Testing & Development

### Chạy tests
```bash
# Backend tests
docker exec -it tdc-laravel php artisan test

# Frontend tests
cd frontend
npm run test
```

### Code quality
```bash
# Laravel Pint (code formatting)
docker exec -it tdc-laravel ./vendor/bin/pint

# ESLint + Prettier (frontend)
cd frontend
npm run lint
npm run format
```

## 🚀 Triển khai Production

### Build frontend
```bash
cd frontend
npm run build
```

### Optimize backend
```bash
docker exec -it tdc-laravel php artisan config:cache
docker exec -it tdc-laravel php artisan route:cache
docker exec -it tdc-laravel php artisan view:cache
```

## 📝 API Documentation

API documentation sẽ được tự động generate bằng Laravel API Documentation tools.

## 🤝 Đóng góp

1. Fork repository
2. Tạo feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Tạo Pull Request

## 📄 License

Dự án được phát triển bởi **Nhóm E - Chuyên đề Phát triển Web 1**  
Trường Cao đẳng Công nghệ Thủ Đức

---

**Liên hệ:** [Thông tin liên hệ của nhóm]
