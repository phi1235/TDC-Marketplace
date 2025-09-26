<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center">
            <router-link to="/" class="flex items-center space-x-2">
              <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">TDC</span>
              </div>
              <span class="text-xl font-bold text-gray-900">Marketplace</span>
            </router-link>
          </div>
          
          <nav class="hidden md:flex space-x-8">
            <router-link to="/listings" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
              Danh sách tin
            </router-link>
            <router-link to="/categories" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
              Danh mục
            </router-link>
          </nav>

          <div class="flex items-center space-x-4">
            <template v-if="authStore.isAuthenticated">
              <router-link to="/dashboard" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                Dashboard
              </router-link>
              <button @click="authStore.logout" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                Đăng xuất
              </button>
            </template>
            <template v-else>
              <router-link to="/login" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                Đăng nhập
              </router-link>
              <router-link to="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                Đăng ký
              </router-link>
            </template>
          </div>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">
            Chợ Đồ Học Tập Cũ
            <span class="block text-blue-200">Cho Sinh Viên TDC</span>
          </h1>
          <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
            Kết nối tân sinh viên với đồ học tập cũ chất lượng từ các anh chị khóa trên. 
            Tiết kiệm chi phí, bảo vệ môi trường.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <router-link to="/listings" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-200">
              Khám phá ngay
            </router-link>
            <router-link to="/register" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-200">
              Đăng ký bán
            </router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Tại sao chọn TDC Marketplace?
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Nền tảng uy tín, an toàn và tiện lợi dành riêng cho cộng đồng sinh viên
          </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          <div class="text-center p-6">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Xác thực sinh viên</h3>
            <p class="text-gray-600">Chỉ sinh viên và alumni TDC được xác thực mới có thể tham gia bán hàng</p>
          </div>

          <div class="text-center p-6">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Giá cả hợp lý</h3>
            <p class="text-gray-600">Đồ học tập cũ với giá phải chăng, phù hợp túi tiền sinh viên</p>
          </div>

          <div class="text-center p-6">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Giao dịch trong trường</h3>
            <p class="text-gray-600">Gặp gỡ và trao đổi trực tiếp tại các điểm hẹn trong khuôn viên trường</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Listings Preview -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
          <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Tin đăng mới nhất</h2>
            <p class="text-gray-600">Khám phá những món đồ học tập vừa được đăng bán</p>
          </div>
          <router-link to="/listings" class="text-blue-600 font-semibold hover:text-blue-700">
            Xem tất cả →
          </router-link>
        </div>

        <!-- Placeholder for listings -->
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
          <div v-for="i in 8" :key="i" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-square bg-gray-200 animate-pulse"></div>
            <div class="p-4">
              <div class="h-4 bg-gray-200 rounded animate-pulse mb-2"></div>
              <div class="h-3 bg-gray-200 rounded animate-pulse mb-3 w-2/3"></div>
              <div class="flex justify-between items-center">
                <div class="h-5 bg-green-200 rounded animate-pulse w-20"></div>
                <div class="h-3 bg-gray-200 rounded animate-pulse w-16"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-4 gap-8">
          <div>
            <div class="flex items-center space-x-2 mb-4">
              <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">TDC</span>
              </div>
              <span class="text-xl font-bold">Marketplace</span>
            </div>
            <p class="text-gray-400">
              Nền tảng mua bán đồ học tập cũ dành cho sinh viên Trường Cao đẳng Công nghệ Thủ Đức
            </p>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Liên kết nhanh</h3>
            <ul class="space-y-2 text-gray-400">
              <li><router-link to="/listings" class="hover:text-white">Danh sách tin</router-link></li>
              <li><router-link to="/categories" class="hover:text-white">Danh mục</router-link></li>
              <li><router-link to="/faq" class="hover:text-white">FAQ</router-link></li>
            </ul>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Hỗ trợ</h3>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-white">Hướng dẫn sử dụng</a></li>
              <li><a href="#" class="hover:text-white">Liên hệ</a></li>
              <li><a href="#" class="hover:text-white">Báo cáo vi phạm</a></li>
            </ul>
          </div>
          
          <div>
            <h3 class="text-lg font-semibold mb-4">Pháp lý</h3>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-white">Điều khoản sử dụng</a></li>
              <li><a href="#" class="hover:text-white">Chính sách bảo mật</a></li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
          <p>&copy; 2025 TDC Marketplace. Được phát triển bởi Nhóm E - Chuyên đề Web 1.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()
</script>
