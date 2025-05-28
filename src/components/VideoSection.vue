<template>
    <section id="teaser" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
      <!-- Animated background -->
      <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#1e4e8f]/10 via-white to-[#2a9d8f]/10">
        <div class="absolute w-full h-full overflow-hidden opacity-10">
          <div class="absolute top-0 left-0 w-full h-full">
            <!-- Animated circles -->
            <div v-for="i in 3" :key="i" 
                 class="absolute rounded-full mix-blend-multiply animate-float"
                 :class="[
                   i % 2 === 0 ? 'bg-[#2a9d8f]' : 'bg-[#1e4e8f]',
                   `w-${20 + i * 16} h-${20 + i * 16}`,
                   `top-${(i * 15) % 80}`,
                   `left-${(i * 20) % 80}`
                 ]"
                 :style="{
                   animationDelay: `${i * 0.5}s`,
                   animationDuration: `${8 + i}s`
                 }">
            </div>
          </div>
        </div>
      </div>
      
      <div class="container mx-auto px-2 md:p-4 relative z-10">
        <div class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700">
          <!-- Header section with floating elements -->
          <div class="text-center mb-16 relative scroll-reveal fade-up">
            <!-- Floating decorative elements -->
            <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#c2e9e5] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
            <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#e0f2f1] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
            
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-film text-[#2a9d8f] mr-2"></i>티저 영상
            </span>
            
            <h2 class="text-3xl md:text-6xl font-bold mb-6 leading-tight whitespace-nowrap md:whitespace-normal">
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">흩어지는 예배의 비전</span>
            </h2>
            
            <div class="relative w-32 h-2 mx-auto mb-8">
              <div class="absolute inset-0 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-full"></div>
              <div class="absolute inset-0 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-full animate-pulse"></div>
            </div>
            
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              성령의 바람을 타고, 세상 속에서 다시 피어나는 "흩어지는 예배"의 비전을 영상으로 만나보세요
            </p>
          </div>
          
          <!-- Video Container -->
          <div class="relative group scroll-reveal fade-up" data-delay="0.2">
            <div class="absolute -inset-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video">
              <!-- 16:9 비율 유지를 위한 aspect-video 클래스 -->
              <iframe 
                class="w-full h-full"
                src="https://www.youtube.com/embed/SfcmsNUARmE?rel=0&modestbranding=1"
                title="흩어지는 예배 티저 영상"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
              </iframe>
            </div>
          </div>
          
          <!-- Key Points -->
          <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 scroll-reveal fade-up" data-delay="0.4">
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#1e4e8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
              <div class="w-14 h-14 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-4">
                <i class="fas fa-eye text-[#1e4e8f] text-2xl"></i>
              </div>
              <h3 class="text-xl font-bold text-[#1e4e8f] mb-3">비전</h3>
              <p class="text-gray-600">성령의 바람을 타고 흩어지는 예배를 통해 세상 가운데 하나님 나라를 확장합니다</p>
            </div>
            
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#2a9d8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
              <div class="w-14 h-14 rounded-full bg-[#c2e9e5] flex items-center justify-center mb-4">
                <i class="fas fa-heart text-[#2a9d8f] text-2xl"></i>
              </div>
              <h3 class="text-xl font-bold text-[#2a9d8f] mb-3">가치</h3>
              <p class="text-gray-600">일상 속에서 예배하는 삶을 통해 모든 영역에서 하나님의 영광을 드러냅니다</p>
            </div>
            
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#1e4e8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
              <div class="w-14 h-14 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-4">
                <i class="fas fa-users text-[#1e4e8f] text-2xl"></i>
              </div>
              <h3 class="text-xl font-bold text-[#1e4e8f] mb-3">공동체</h3>
              <p class="text-gray-600">흩어진 자리마다 다시 피어나는 예배 공동체를 통해 하나님의 임재를 경험합니다</p>
            </div>
          </div>
          
          <!-- Call to Action -->
          <div class="mt-16 text-center scroll-reveal fade-up" data-delay="0.6">
            <a href="#contact" class="inline-block px-8 py-4 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4e8f] focus:outline-none">
              <span class="flex items-center justify-center">
                <i class="fas fa-wind mr-2"></i>
                <span>함께 참여하기</span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    mounted() {
      this.initScrollReveal();
    },
    methods: {
      initScrollReveal() {
        // 스크롤 시 요소들이 나타나는 애니메이션 효과 초기화
        const observerOptions = {
          root: null, // viewport를 root로 사용
          rootMargin: '0px',
          threshold: 0.1 // 요소의 10%가 보일 때 콜백 실행
        };
  
        const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const el = entry.target;
              const delay = el.dataset.delay || 0;
              
              // 애니메이션 적용
              setTimeout(() => {
                el.classList.add('revealed');
              }, delay * 1000);
              
              // 한 번 나타난 요소는 더 이상 관찰하지 않음
              observer.unobserve(el);
            }
          });
        }, observerOptions);
  
        // 'scroll-reveal' 클래스를 가진 모든 요소 관찰
        document.querySelectorAll('.scroll-reveal').forEach(el => {
          observer.observe(el);
        });
      }
    }
  }
  </script>
  
  <style scoped>
  /* 애니메이션 효과 */
  @keyframes float {
    0% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(-20px);
    }
    100% {
      transform: translateY(0px);
    }
  }
  
  .animate-float {
    animation-name: float;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
  }
  
  /* 스크롤 애니메이션 */
  .scroll-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }
  
  .scroll-reveal.revealed {
    opacity: 1;
    transform: translateY(0);
  }
  
  .fade-up {
    transform: translateY(30px);
  }
  
  .fade-right {
    transform: translateX(-30px);
  }
  
  .fade-left {
    transform: translateX(30px);
  }
  
  .fade-down {
    transform: translateY(-30px);
  }
  
  /* 호버 효과 */
  .hover\:rotate-x-1:hover {
    transform: rotateX(1deg);
  }
  </style>