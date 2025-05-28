<template>
  <section id="pray-section" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#f5f0ff] via-white to-[#e6e7ff]">
      <div class="absolute w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- Animated circles -->
          <div v-for="i in 5" :key="i" 
               class="absolute rounded-full mix-blend-multiply animate-float"
               :class="[
                 i % 2 === 0 ? 'bg-[#6b4e8f]' : 'bg-[#6b6bff]',
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
      <div>
        <div class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700">
          <div class="text-center mb-16 relative scroll-reveal fade-up" data-delay="0">
            <!-- Floating decorative elements -->
            <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#e0e2f1] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
            <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#d2cdff] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
            
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#6b4e8f] to-[#6b6bff] text-white text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-pray text-white mr-2"></i>함께 기도해요
            </span>
            
            <h2 class="text-3xl md:text-6xl font-bold mb-6 leading-tight md:leading-[70px]">
              <span class="whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-[#6b4e8f] to-[#6b6bff]">"흩어지는 예배"를 위해<br> 함께 기도합시다!</span>
            </h2>
            
            <div class="relative w-32 h-2 mx-auto mb-8">
              <div class="absolute inset-0 bg-gradient-to-r from-[#6b4e8f] to-[#6b6bff] rounded-full"></div>
              <div class="absolute inset-0 bg-gradient-to-r from-[#6b4e8f] to-[#6b6bff] rounded-full animate-pulse"></div>
            </div>
            
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              성령의 바람을 타고, <br class="sm:hidden">세상 속에서 다시 피어나는 <br>"흩어지는 예배"의 비전을 위한 기도제목
            </p>
          </div>

          <!-- Main Content Area - Full Width -->
          <div class="w-full scroll-reveal fade-up" data-delay="0.2">
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg border border-white border-opacity-30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 mb-8">
              <!-- <div class="bg-gradient-to-r from-[#6b4e8f] to-[#6b6bff] text-white p-5">
                <h3 class="text-2xl font-bold flex items-center">
                  <i class="fas fa-praying-hands mr-3"></i>
                  "흩어지는 예배"를 위한 10가지 기도제목
                </h3>
                <p class="mt-2 text-white text-opacity-90">
                  하나님의 임재가 충만한 예배, 교회의 연합, 선교적 비전과 안전한 여정을 위한 기도
                </p>
              </div> -->
              <div class="p-6 md:p-10">
                <!-- 2열 레이아웃으로 기도제목 배치 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                  <!-- 왼쪽 열: 기도제목 1-5 -->
                  <div>
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 1
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        우리가 흩어지는 모든 예배 장소마다 성령의 임재가 충만히 임하시고, 예배가 예배당 에만 머물지 않고 도시와 농어촌, 삶의 현장과 이웃들 속으로 생명력 있게 흘러 가게 하여 주소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 2
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        수영로교회가 맺어온 결연 교회들과 그리스도 안에서 진정한 연합을 이루게 하시고, 전국으로 흩어지는 예배를 통해 서로를 격려하고 세워주는 아름다운 교제의 열매가 풍성하게 맺히게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 3
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        “흩어지는 예배”를 통해 수영로교회의 사랑방과 마을 공동체가 더욱 끈끈하게 하나가 되게 하시고, 그동안 공동체와 멀어졌던 성도들이 다시 따뜻한 공동체의 품으로 돌아오는 은혜의 시간이 되게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 4
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        수영로교회의 모든 성도와 교역자들이 농어촌과 미래자립교회를 방문할 때, 우월감 이나 비교하는 마음이 아니라 그리스도의 겸손과 섬김의 마음으로 진심을 다해 예배하며 교회를 격려하게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6 md:mb-0">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 5
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        16개 교회로 파송되는 다음세대 아이들이 한국교회의 현실을 올바르게 이해하고 체험하며, 그들의 마음속에 교회를 사랑하고 헌신하는 거룩한 씨앗이 심어져 미래 한국교회의 소망이 되게 하소서.
                      </p>
                    </div>
                  </div>
                  
                  <!-- 오른쪽 열: 기도제목 6-10 -->
                  <div>
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 6
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        108개 교회에 참여하는 2000명 가까운 청년들이 “흩어지는 예배”를 통해 하나님의 넓은 사역 현장을 경험하게 하시고, 이를 통해 그들 안에 선교적 비전이 확장되며 하나님 나라를 위한 열정과 헌신이 새롭게 회복되게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 7
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        노약자, 장애인, 사랑방에 속하지 않은 성도들까지 수영로교회의 모든 지체가 한 사람도 소외됨 없이 “흩어지는 예배”에 기쁨으로 참여하게 하시고, 각자의 형편에 맞는 교회와 예배 장소로 인도하셔서 함께 은혜를 나누는 복된 시간이 되게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 8
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        부산을 넘어 전국 각지와 해외 선교지까지 흩어지는 성도들의 모든 이동 경로와 여정을 안전하게 보호하여 주시고, 특히 섬 지역이나 접근이 어려운 곳으로 향하는 성도들을 주님의 강한 손으로 붙드시고 인도하여 주소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 9
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        “Spread out! Bloom again!”이라는 “흩어지는 예배”의 비전과 같이, 수영로교회가 단순히 모이기만 하는 교회가 아니라 세상 속으로 담대히 흩어져 주님의 복음을 선포하며, 하나님 나라의 아름다운 꽃을 피우는 선교적 교회의 정체성을 온전히 회복하게 하소서.
                      </p>
                    </div>
                    
                    <div class="mb-6">
                      <h4 class="text-xl font-semibold text-[#6b4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                        <i class="fas fa-praying-hands mr-2"></i>
                        기도제목 10
                      </h4>
                      <p class="text-gray-700 mb-4 pl-4 border-l-2 border-[#6b4e8f]">
                        수영로교회의 거룩한 도전이 일회성 행사로 그치지 않고 침체된 한국교회에 새로운 활력과 소망을 불어넣는 영적 각성의 계기가 되게 하시며, 모든 참여 교회들이 함께 교회의 본질을 회복하고 성령의 새 바람을 경험하는 축복의 시간이 되게 하소서.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        root: null,
        rootMargin: '0px',
        threshold: 0.1
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const delay = el.dataset.delay || 0;
            
            setTimeout(() => {
              if (el.classList.contains('fade-up')) {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
              } else if (el.classList.contains('fade-right')) {
                el.style.opacity = '1';
                el.style.transform = 'translateX(0)';
              } else if (el.classList.contains('fade-left')) {
                el.style.opacity = '1';
                el.style.transform = 'translateX(0)';
              }
            }, delay * 1000);
            
            observer.unobserve(el);
          }
        });
      }, observerOptions);

      document.querySelectorAll('.scroll-reveal').forEach(el => {
        observer.observe(el);
      });
    }
  }
};
</script>

<style scoped>
/* 애니메이션 효과 */
@keyframes float {
  0% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(5deg);
  }
  100% {
    transform: translateY(0) rotate(0deg);
  }
}

.animate-float {
  animation-name: float;
  animation-duration: 6s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
}

/* 스크롤 애니메이션 초기 상태 */
.scroll-reveal {
  transition: opacity 0.8s ease, transform 0.8s ease;
}

.fade-up {
  opacity: 0;
  transform: translateY(30px);
}

.fade-right {
  opacity: 0;
  transform: translateX(-30px);
}

.fade-left {
  opacity: 0;
  transform: translateX(30px);
}

/* 회전 효과 */
.hover\:rotate-x-1:hover {
  transform: rotateX(1deg) rotateY(1deg);
}
</style>