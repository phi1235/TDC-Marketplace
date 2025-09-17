# TDC Marketplace 🎓🛍️

Website mua bán đồ dùng học tập cũ và mới dành cho tân sinh viên trường TDC.
Bao gồm frontend (Vue 3 + Vite) và backend (Laravel 10 + Docker).

## 📁 Cấu trúc
- `backend/`: Laravel + REST API + Auth + Docker
- `frontend/`: Vue 3 + Vite + Pinia + TailwindCSS

## 🚀 Cài đặt nhanh (dev)
```bash
# Clone repo
git clone git@github.com:phi1235/TDC-Marketplace.git
cd TDC-Marketplace

# Laravel backend
cd backend
cp .env.example .env
docker compose up -d --build
docker exec -it laravel-app php artisan migrate --seed

# Vue frontend
cd ../frontend
npm install
npm run dev
```
