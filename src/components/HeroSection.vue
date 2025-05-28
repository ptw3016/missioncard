<template>
  <section id="home"
    class="relative overflow-hidden scroll-mt-24 min-h-screen flex items-start justify-start pt-20 md:items-start md:justify-center md:pt-32 text-white">
    <!-- 배경 이미지와 오버레이 -->

    <div class="absolute inset-0 w-full h-full -z-10 overflow-hidden">
      <!-- 모바일용 배경 이미지 -->
      <div class="absolute inset-0 block md:hidden">
        <img v-show="!videoLoaded" :src="mobileBg" alt="모바일 배경" class="absolute inset-0 w-full h-full object-cover z-0 transition-opacity duration-500" />
        <!-- <div class="video-container-mobile relative z-10">
          <iframe v-show="videoLoaded" @load="videoLoaded = true"
            class="video-bg-iframe-mobile"
            src="https://www.youtube.com/embed/0lD664wrGtI?autoplay=1&mute=1&playsinline=1&controls=0&loop=1&playlist=0lD664wrGtI&modestbranding=1&rel=0&showinfo=0"
            frameborder="0"
            allow="autoplay; encrypted-media; fullscreen; picture-in-picture"
            allowfullscreen
            webkit-playsinline
            playsinline
            tabindex="-1"
            aria-hidden="true"
          ></iframe>
        </div> -->
      </div>
      <!-- 데스크톱용 배경 비디오 -->
      <div class="absolute inset-0 hidden md:block">
        <div class="video-container">
          <iframe class="video-bg-iframe"
            src="https://www.youtube.com/embed/cazlmWkEV54?autoplay=1&mute=1&controls=0&loop=1&playlist=cazlmWkEV54&modestbranding=1&rel=0&showinfo=0&vq=hd1080"
            frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
          </iframe>
        </div>
      </div>
      <!-- 오버레이 - 약간 어둡게 -->
      <div class="absolute inset-0 bg-black opacity-0"></div>
      <!-- 애니메이션 요소 -->
      <!-- <div class="absolute inset-0 overflow-hidden">
        <div v-for="i in 5" :key="`circle-${i}`" 
             class="absolute rounded-full mix-blend-overlay animate-float"
             :class="[
               i % 2 === 0 ? 'bg-[#1e4e8f]' : 'bg-[#2a9d8f]',
               i % 3 === 0 ? 'opacity-20' : 'opacity-15'
             ]"
             :style="{
               width: `${100 + i * 50}px`,
               height: `${100 + i * 50}px`,
               top: `${(i * 15) % 80}%`,
               left: `${(i * 20) % 80}%`,
               animationDelay: `${i * 0.5}s`,
               animationDuration: `${10 + i * 2}s`
             }">
        </div>
      </div> -->
    </div>

    <!-- Hero 내용 -->
    <div class="container px-4 text-left z-10 mb-6 h-full flex flex-col">
      <!-- 모바일용 메인/서브 타이틀 이미지 -->
      <div class="block md:hidden flex flex-col items-center mt-12 mb-6">
        <img :src="mobileMainTitle" alt="메인 타이틀" class="w-full max-w-[290px] mb-6 filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.2s;" />
        <img :src="mobileSubtitle" alt="서브 타이틀" class="w-full max-w-[205px] mt-6 mb-6 filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.4s;" />
        <img :src="mobileSubtitle2" alt="서브 타이틀2" class="w-full max-w-[280px] mt-6 filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.6s;" />
      </div>

  
      <div class="w-full flex flex-col md:flex-row justify-center px-8 mb-24 md:mb-4">
        <div class="hidden md:flex flex-col items-center mr-8 space-y-2">
          <img :src="mobileMainTitle" alt="메인 타이틀" class="w-full max-w-[700px] filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.2s;" />
          <img :src="mobileSubtitle" alt="서브 타이틀" class="w-full max-w-[340px] filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.4s;" />
          <img :src="mobileSubtitle2" alt="서브 타이틀2" class="w-full max-w-[540px] pt-0 filter drop-shadow-lg animate-item fade-in-down" style="animation-delay: 0.6s;" />
        </div>
        <!-- <div
          class="flex-1 md:basis-1/3 bg-[#1e4e8f]/10 backdrop-blur-md border border-white/70 rounded-2xl p-3 md:p-4 shadow-2xl animate-item fade-in-right mt-9"
          style="animation-delay: 0.6s;">
          <h3 class="text-white text-md font-bold mb-4 border-b border-white/70 pb-3">기대글</h3>

          <div class="space-y-3">
            <div
              class="bg-white shadow-lg rounded-xl p-3 hover:bg-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-[#2a9d8f] mb-2"><i class="fas fa-quote-left text-lg"></i></div>
              <p class="text-gray-800 text-sm md:text-base mb-3">성령의 바람을 타고 흩어져 나가는 예배를 통해 일상에서 하나님을 만납니다.</p>
              <div class="flex items-center">
                <div
                  class="w-5 h-5 rounded-full bg-[#1e4e8f] flex items-center justify-center text-white font-bold mr-2 text-xs">
                  K</div>
                <span class="text-gray-600 text-xs">김성령 (서울 공동체)</span>
              </div>
            </div>

            <div
              class="bg-white shadow-lg rounded-xl p-3 hover:bg-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-[#57c4aa] mb-2"><i class="fas fa-quote-left text-lg"></i></div>
              <p class="text-gray-800 text-sm md:text-base mb-3">흩어지는 예배를 통해 제 삶의 모든 영역이 예배의 자리로 변화되었습니다.</p>
              <div class="flex items-center">
                <div
                  class="w-5 h-5 rounded-full bg-[#2a9d8f] flex items-center justify-center text-white font-bold mr-2 text-xs">
                  L</div>
                <span class="text-gray-600 text-xs">이은혜 (부산 공동체)</span>
              </div>
            </div>

            <div
              class="bg-white shadow-lg rounded-xl p-3 hover:bg-white hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-[#1e4e8f] mb-2"><i class="fas fa-quote-left text-lg"></i></div>
              <p class="text-gray-800 text-sm md:text-base mb-3">다시 피어나는 예배의 기쁨을 일상 속에서 경험하고 있습니다.</p>
              <div class="flex items-center">
                <div
                  class="w-5 h-5 rounded-full bg-[#57c4aa] flex items-center justify-center text-white font-bold mr-2 text-xs">
                  P</div>
                <span class="text-gray-600 text-xs">박믿음 (제주 공동체)</span>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      
          <!-- 신청서 버튼 -->
      <div class="w-full flex justify-center mt-auto z-20 animate-item fade-in-up" style="animation-delay: 0.8s; animation-duration: 1s;">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSd662pvwo0qhLUThOGLeGKB6wvlq9C5UoCVWI5ozNG7ea1hzQ/viewform" target="_blank" 
          class="px-5 py-3 md:px-8 md:py-5 w-4/5 md:w-2/3 lg:w-1/2 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] backdrop-blur-md rounded-xl border-2 border-white/50 shadow-xl 
                  hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105
                  flex items-center justify-center group overflow-hidden relative animate-item scale-in">
          <div class="absolute -inset-1 bg-white/20 rounded-xl blur-sm animate-pulse"></div>
          <i class="fas fa-edit mr-2 md:mr-4 text-xl md:text-2xl text-white animate-bounce"></i>
          <span class="text-white font-bold text-center text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl relative px-2">
            <span class="inline-block text-center w-full">
              수영로교회 50주년 기념 <br class="block sm:hidden">"흩어지는 예배" 신청서
            </span>
          </span>
          <i class="fas fa-arrow-right ml-2 md:ml-4 text-xl md:text-2xl text-white transition-transform duration-300 group-hover:translate-x-2 animate-pulse"></i>
        </a>
      </div>
      
      <!-- "흩어지는 예배" 소망의 씨앗 심기 버튼 -->
      <div class="w-full flex justify-center mt-4 mb-40 z-20 animate-item fade-in-up" style="animation-delay: 1s; animation-duration: 1s;">
        <a href="#expectations" 
           @click.prevent="smoothScroll('expectations')"
          class="px-5 py-3 md:px-8 md:py-5 w-4/5 md:w-2/3 lg:w-1/2 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] backdrop-blur-md rounded-xl border-2 border-white/50 shadow-xl 
                  hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105
                  flex items-center justify-center group overflow-hidden relative animate-item scale-in">
          <div class="absolute -inset-1 bg-white/20 rounded-xl blur-sm animate-pulse"></div>
          <i class="fas fa-seedling mr-2 md:mr-4 text-xl md:text-2xl text-white animate-bounce"></i>
          <span class="text-white font-bold text-center text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl relative px-2">
            <span class="inline-block text-center w-full">
              "흩어지는 예배" <br class="block sm:hidden">소망의 씨앗 심기
            </span>
          </span>
          <i class="fas fa-arrow-right ml-2 md:ml-4 text-xl md:text-2xl text-white transition-transform duration-300 group-hover:translate-x-2 animate-pulse"></i>
        </a>
      </div>

    </div>

    <!-- 아래로 이동 화살표 버튼 -->
    <button @click="scrollToNextSection"
      class="absolute bottom-8 inset-x-0 mx-auto w-14 h-14 rounded-full bg-white/10 backdrop-blur-sm border border-[#2a9d8f] flex items-center justify-center hover:bg-[#2a9d8f]/20 transition duration-300 animate-bounce z-10">
      <i class="fas fa-chevron-down text-2xl text-[#2a9d8f]"></i>
    </button>
  </section>
</template>

<script>
import mobileMainTitle from '@/assets/mobilemaintitle.png';
import mobileSubtitle from '@/assets/mobilesubtitle.png';
import mobileSubtitle2 from '@/assets/mobilesubtitle2.png';
import mobileBg from '@/assets/mobilebg.gif';

export default {
  data() {
    return { 
      mobileMainTitle, mobileSubtitle, mobileSubtitle2,
      videoLoaded: false,
      mobileBg
    };
  },
  methods: {
    scrollToNextSection() {
      const nextSection = document.getElementById('about');
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      }
    },
    smoothScroll(id) {
      const element = document.getElementById(id);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }
}
</script>

<style scoped>
.video-container-mobile {
  position: absolute;
  inset: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
  z-index: 0;
  pointer-events: none;
}

.video-bg-iframe-mobile {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  transform: translate(-50%, -50%);
  pointer-events: none;
}

.video-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: url('@/assets/main_still_pc.png') center/cover no-repeat;
}

.video-bg-iframe {
  position: absolute;
  top: 0;
  left: 50%;
  width: 100%;
  height: 100%;
  transform: translateX(-50%);
  pointer-events: none;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  aspect-ratio: 16/9;
  object-position: center top;
  object-fit: cover;
}

.shadow-text {
  -webkit-filter: drop-shadow(0 0px 2px rgba(0, 0, 0, 0.5));
  filter: drop-shadow(0 2px 2px rgba(0, 0, 0, 0.5));
}

.animate-item {
  opacity: 0;
  animation-duration: 0.8s;
  animation-fill-mode: forwards;
}

.fade-in-down {
  animation-name: fadeInDown;
}

.fade-in-up {
  animation-name: fadeInUp;
}

.fade-in-left {
  animation-name: fadeInLeft;
}

.fade-in-right {
  animation-name: fadeInRight;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }

  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(30px);
  }

  to {
    opacity: 1;
    transform: translateX(0);
  }
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

.text-shadow-glow {
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
}

@keyframes scale-in {
  0% {
    transform: scale(0.5);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.scale-in {
  animation: scale-in 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

@media (max-width: 768px) {
  .video-bg {
    width: 100vw;
    height: 100vh;
    transform: translate(-50%, -50%) scale(1);
  }
}
</style>
