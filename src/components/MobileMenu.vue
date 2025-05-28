<template>
  <div v-if="isOpen" class="fixed inset-0 z-50 md:hidden">
    <!-- 배경 오버레이 -->
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm animate-fade-in" @click="closeMenu"></div>
    
    <!-- 메뉴 패널 -->
    <div class="absolute right-0 top-0 h-full w-72 flex flex-col overflow-hidden bg-white text-gray-800 shadow-2xl transform transition-all duration-500 border-l border-white/80 animate-slide-in" :class="{'animate-slide-out': isClosing}" @click.stop>
      <!-- 배경 애니메이션 요소 -->
      <div class="absolute inset-0 overflow-hidden">
        <div v-for="i in 3" :key="`circle-${i}`" 
             class="absolute rounded-full mix-blend-soft-light animate-float opacity-30"
             :class="i % 2 === 0 ? 'bg-[#2a9d8f]' : 'bg-[#1e4e8f]'"
             :style="{
               width: `${100 + i * 50}px`,
               height: `${100 + i * 50}px`,
               top: `${(i * 25) % 80}%`,
               left: `${(i * 30) % 80}%`,
               animationDelay: `${i * 0.8}s`,
               animationDuration: `${12 + i * 3}s`
             }">
        </div>
      </div>
      
      <!-- 헤더 영역 -->
      <div class="relative z-10 flex items-center justify-between p-6 pt-10 border-b border-[#2a9d8f]/20 bg-white animate-fade-in" style="animation-delay: 0.3s">
        <div class="flex items-center">
          <div class="w-12 h-12 rounded-full border-2 border-[#2a9d8f] bg-transparent flex items-center justify-center mr-3 shadow-sm">
            <i class="fas fa-wind text-[#2a9d8f] text-xl"></i>
          </div>
          <div>
            <h2 class="text-xl font-bold text-[#0f3b7d] drop-shadow-sm flex items-center whitespace-nowrap">
              <span class="text-base">흩어지는 예배</span>
              <span class="mx-0.5 text-xs opacity-80">|</span>
              <span class="text-xs font-medium">모바일 가이드북</span>
            </h2>
            <p class="text-xs text-[#1a8a7d] font-medium">Spread out! Bloom again!</p>
          </div>
        </div>
        <button @click="closeMenu" class="absolute top-2 right-2 w-10 h-10 rounded-full bg-white flex items-center justify-center text-gray-600 hover:text-[#1e4e8f] hover:bg-white/50 transition-all duration-300 hover:scale-110 focus:outline-none">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <!-- 네비게이션 메뉴 -->
      <nav class="relative z-10 flex-1 overflow-y-auto flex flex-col p-4 space-y-0">
        <!-- <a href="#" @click.prevent="handleHelp"
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] flex items-center justify-center mr-3 shadow-sm">
            <i class="fas fa-question-circle text-white text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">도움말</span>
        </a> -->
        <a href="#home" @click.prevent="smoothScroll('home')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-home text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">홈</span>
        </a>
        
        <a href="#about" @click.prevent="smoothScroll('about')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-info-circle text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">예배소개</span>
        </a>

        <a href="#location" @click.prevent="smoothScroll('location')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-map-marker-alt text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">교회소개</span>
        </a>

        <!-- <a href="#video" @click.prevent="smoothScroll('video')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-film text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">영상소개</span>
        </a> -->
        
        <a href="#expectations" @click.prevent="smoothScroll('expectations')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-seedling text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">기대글</span>
        </a>
        
        <a href="#qna" @click.prevent="smoothScroll('qna')" 
           class="mobile-nav-link flex items-center py-3 px-4 rounded-lg hover:bg-white/70 transition-all duration-300 transform hover:translate-x-2 animate-fade-in-up"
           style="animation-delay: 0.5s">
          <div class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center mr-3">
            <i class="fas fa-comments text-[#2a9d8f] text-lg"></i>
          </div>
          <span class="font-semibold text-lg text-[#2c3e50]">QnA</span>
        </a>
      </nav>
      
      <!-- 푸터 영역 -->
      <div class="mt-auto p-4 border-t border-[#2a9d8f]/20 bg-white animate-fade-in" style="animation-delay: 0.9s">
        <div class="flex space-x-4 justify-center">
          <!-- <a href="#" class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center hover:border-[#2a9d8f] transition-all duration-300 hover:scale-110">
            <i class="fab fa-facebook-f text-[#0f3b7d] text-lg"></i>
          </a>
          <a href="#" class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center hover:border-[#2a9d8f] transition-all duration-300 hover:scale-110">
            <i class="fab fa-instagram text-[#0f3b7d] text-lg"></i>
          </a> -->
          <a href="#" class="w-12 h-12 rounded-full border border-[#2a9d8f]/50 bg-transparent flex items-center justify-center hover:border-[#2a9d8f] transition-all duration-300 hover:scale-110">
            <i class="fab fa-youtube text-[#0f3b7d] text-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['isOpen'],
  emits: ['close', 'help'],
  data() {
    return {
      isClosing: false
    };
  },
  methods: {
    closeMenu() {
      this.isClosing = true;
      setTimeout(() => {
        this.$emit('close');
        this.isClosing = false;
      }, 300); // Match this with the animation duration
    },
    smoothScroll(id) {
      this.closeMenu(); // Use the new closeMenu method instead of directly emitting
      // 메뉴가 닫힌 후 스크롤 실행
      this.$nextTick(() => {
        const el = document.getElementById(id);
        if (el) {
          const headerHeight = document.querySelector('header')?.offsetHeight || 80;
          const elementPosition = el.getBoundingClientRect().top + window.pageYOffset;
          const offsetPosition = elementPosition - headerHeight; 
          window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
        }
      });
    },
    handleHelp() {
      this.$emit('help');
    }
  }
}
</script>

<style scoped>
.mobile-nav-link {
  position: relative;
  overflow: hidden;
}

.mobile-nav-link::before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 0;
  height: 2px;
  background-image: linear-gradient(to right, #2a9d8f, #1e4e8f);
  transition: width 0.3s ease;
}

.mobile-nav-link:hover::before {
  width: 100%;
}

@keyframes float {
  0% {
    transform: translateY(0) translateX(0);
  }
  50% {
    transform: translateY(-20px) translateX(10px);
  }
  100% {
    transform: translateY(0) translateX(0);
  }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

@keyframes fade-in {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slide-in {
  from { transform: translateX(100%); }
  to { transform: translateX(0); }
}

@keyframes slide-out {
  from { transform: translateX(0); }
  to { transform: translateX(100%); }
}

@keyframes fade-in-up {
  from { 
    opacity: 0;
    transform: translateY(10px);
  }
  to { 
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.3s ease-out forwards;
}

.animate-slide-in {
  animation: slide-in 0.4s ease-out forwards;
}

.animate-slide-out {
  animation: slide-out 0.3s ease-in forwards;
}

.animate-fade-in-up {
  animation: fade-in-up 0.5s ease-out forwards;
  opacity: 0;
}

.drop-shadow-glow {
  filter: drop-shadow(0 0 3px rgba(42, 157, 143, 0.5));
}

/* Add glass effect */
.glass-effect {
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}
</style>
