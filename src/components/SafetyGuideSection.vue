<template>
  <section id="safety-guide" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#f0f9ff] via-white to-[#e6f7ff]">
      <div class="absolute w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- Animated circles -->
          <div v-for="i in 5" :key="i" 
               class="absolute rounded-full mix-blend-multiply animate-float"
               :class="[
                 i % 2 === 0 ? 'bg-[#1e4e8f]' : 'bg-[#ff6b6b]',
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
            <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#e0f2f1] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
            <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#ffcdd2] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
            
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#1e4e8f] to-[#ff6b6b] text-white text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-shield-alt text-white mr-2"></i>안전 & 참여 안내
            </span>
            
            <h2 class="text-3xl md:text-6xl font-bold mb-6 leading-tight">
              <span class="whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#ff6b6b]">흩어지는 예배 안내사항</span>
            </h2>
            
            <div class="relative w-32 h-2 mx-auto mb-8">
              <div class="absolute inset-0 bg-gradient-to-r from-[#1e4e8f] to-[#ff6b6b] rounded-full"></div>
              <div class="absolute inset-0 bg-gradient-to-r from-[#1e4e8f] to-[#ff6b6b] rounded-full animate-pulse"></div>
            </div>
            
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              전국 각지로 흩어지는 예배, <br class="sm:hidden">안전하고 의미있게 참여하기 위한 <br class="sm:hidden">중요 안내사항입니다
            </p>
          </div>

          <!-- Main Content Area -->
          <div class="flex flex-col lg:flex-row gap-12">
            <!-- Left Column: Safety Guide -->
            <div class="lg:w-1/2 scroll-reveal fade-right" data-delay="0.2">
              <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg border border-white border-opacity-30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 mb-8">
                <div class="bg-gradient-to-r from-[#1e4e8f] to-[#3a6ea5] text-white p-5">
                  <h3 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-shield-alt mr-3"></i>
                    이동 시의 안전사항
                  </h3>
                  <p class="mt-2 text-white text-opacity-90">
                    "흩어지는 예배"는 전국 각지로 이동하며 드리는 예배입니다. 이동 중 발생할 수 있는 위험에 대비하여 모든 성도들이 철저하게 안전을 준비하는 것 또한 예배의 일부입니다.
                  </p>
                </div>
                <div class="p-6">
                  <div class="mb-6">
                    <h4 class="text-xl font-semibold text-[#1e4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                      <i class="fas fa-umbrella mr-2"></i>
                      여행자 보험 가입 안내
                    </h4>
                    <p class="text-gray-700 mb-2">
                      배를 타고 이동하시거나, 장거리 차량 이동이 필요한 경우 반드시 여행자 보험에 가입해주시기 바랍니다.
                    </p>
                    <p class="text-sm text-[#3a6ea5] italic pl-4 border-l-2 border-[#3a6ea5]">
                      교회는 이를 강력히 권장하며, 각 교구에서는 성도들의 보험 가입 여부를 사전에 확인해주시기 바랍니다. 예기치 못한 사고나 질병에 대비하는 것은 우리 모두의 책임이며, 동역자와 이웃을 배려하는 마음이기도 합니다.
                    </p>
                  </div>
                  
                  <div>
                    <h4 class="text-xl font-semibold text-[#1e4e8f] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                      <i class="fas fa-list-check mr-2"></i>
                      기타 안전 준비사항
                    </h4>
                    <ul class="space-y-3">
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">차량 정비 및 운전자의 컨디션을 사전에 점검해 주세요. 오랜 거리 운전은 무엇보다 안전이 우선입니다.</p>
                      </li>
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">이동 경로, 네비게이션, 도로상황 등을 미리 확인하여 예상치 못한 상황을 예방하세요.</p>
                      </li>
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">고령자, 어린이, 몸이 불편한 성도와 함께 이동하는 경우 특별한 배려와 주의가 필요합니다.</p>
                      </li>
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">날씨에 대비하여 우비, 썬크림, 모자, 충분한 물 등을 준비해 주세요.</p>
                      </li>
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">교구 교역자, 사랑방 목자와 비상 연락망을 구축하여 실시간 소통이 가능하도록 해 주세요.</p>
                      </li>
                      <li class="flex items-start">
                        <i class="fas fa-check-circle text-[#3a6ea5] mt-1 mr-2"></i>
                        <p class="text-gray-700">장거리 이동에 대비해 휴대폰 충전기, 상비약, 진통제 등 응급 물품을 미리 준비해 주세요.</p>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="mt-6 p-4 bg-[#f0f9ff] rounded-lg transform transition-all duration-500 hover:shadow-lg hover:bg-[#e6f7ff]">
                    <h4 class="text-lg font-semibold text-[#1e4e8f] mb-2 flex items-center">
                      <i class="fas fa-heart mr-2"></i>
                      사명과도 같은 안전
                    </h4>
                    <p class="text-gray-700">
                      복음을 들고 떠나는 우리의 발걸음이 무사히 은혜의 자리로 도착할 수 있도록 철저한 준비로 함께해주시기 바랍니다. 하나님께서 그 걸음을 지키시며, 안전 또한 하나님의 은혜 속에 있음을 기억합시다.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Right Column: Participation Guide -->
            <div class="lg:w-1/2 scroll-reveal fade-left" data-delay="0.4">
              <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg border border-white border-opacity-30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="bg-gradient-to-r from-[#ff6b6b] to-[#ff9e9e] text-white p-5">
                  <h3 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-clipboard-check mr-3"></i>
                    참여 시 꼭 기억할 사항
                  </h3>
                  <p class="mt-2 text-white text-opacity-90">
                    "흩어지는 예배"는 단순한 방문이 아니라, 감사의 마음과 선교적 헌신을 함께 드리는 예배입니다. 참여하시는 모든 성도님께서는 아래의 사항을 꼭 기억해 주세요.
                  </p>
                </div>
                <div class="p-6">
                  <div class="mb-6">
                    <h4 class="text-xl font-semibold text-[#ff6b6b] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                      <i class="fas fa-gift mr-2"></i>
                      "흩어지는 예배 감사헌금봉투" 지참
                    </h4>
                    <p class="text-gray-700 mb-2">
                      수영로교회 50주년을 맞아 특별히 준비된 감사헌금봉투를 미리 받아 준비해주시고, 예배를 드리는 방문 교회에 감사의 마음을 담아 직접 전달해 주세요.
                    </p>
                    <p class="text-sm text-[#ff6b6b] italic pl-4 border-l-2 border-[#ff6b6b]">
                      이 헌금은 하나님께서 주신 사랑을 다시 나누는 선교의 실천이 됩니다.
                    </p>
                  </div>
                  
                  <div class="mb-6">
                    <h4 class="text-xl font-semibold text-[#ff6b6b] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                      <i class="fas fa-book mr-2"></i>
                      주보 1부 제출
                    </h4>
                    <p class="text-gray-700 mb-2">
                      예배를 드린 교회의 주보 1부를 수령하신 후, 교회로 돌아오시면 본당 로비에 설치된 '"흩어지는 예배" 수거함'에 꼭 넣어 주세요.
                    </p>
                    <p class="text-sm text-[#ff6b6b] italic pl-4 border-l-2 border-[#ff6b6b]">
                      이는 참여 확인과 기록, 다음 섬김을 위한 자료로 사용됩니다.
                    </p>
                  </div>
                  
                  <div class="mb-6">
                    <h4 class="text-xl font-semibold text-[#ff6b6b] mb-3 flex items-center transform transition-all duration-300 hover:translate-x-1">
                      <i class="fas fa-camera mr-2"></i>
                      사진 기록과 공유
                    </h4>
                    <p class="text-gray-700 mb-2">
                      예배 중의 모습, 교회 외부, 사랑방 활동, 함께 나눈 은혜의 장면들을 사진으로 남겨 주세요.
                    </p>
                    <p class="text-sm text-[#ff6b6b] italic pl-4 border-l-2 border-[#ff6b6b]">
                      찍은 사진은 교구 교역자에게 카카오톡 등으로 전송해 주시면 됩니다. 이는 교구별 보고와 전체 교회가 함께 기쁨을 나누는 귀한 기록이 될 것입니다.
                    </p>
                  </div>
                  
                  <div class="mt-6 p-4 bg-[#fff5f5] rounded-lg transform transition-all duration-500 hover:shadow-lg hover:bg-[#ffebeb]">
                    <blockquote class="text-gray-700 italic border-l-4 border-[#ff6b6b] pl-4">
                      우리가 흩어진 그 자리마다 하나님의 사랑과 복음이 머물도록, 작은 순종의 실천을 정성껏 감당해 주시기 바랍니다.
                      예배는 예배당이 아니라, 순종하는 자의 삶 가운데 임하십니다.
                    </blockquote>
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

      // 모든 스크롤 애니메이션 요소 관찰 시작
      document.querySelectorAll('.scroll-reveal').forEach(el => {
        observer.observe(el);
      });
    }
  }
};
</script>

<style scoped>
@keyframes float {
  0% {
    transform: translateY(0) translateX(0);
  }
  25% {
    transform: translateY(-10px) translateX(5px);
  }
  50% {
    transform: translateY(0) translateX(10px);
  }
  75% {
    transform: translateY(10px) translateX(5px);
  }
  100% {
    transform: translateY(0) translateX(0);
  }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.hover\:rotate-x-1:hover {
  transform: rotateX(1deg);
}

.fade-slide-enter-active, .fade-slide-leave-active {
  transition: all 0.3s ease;
}

.fade-slide-enter-from, .fade-slide-leave-to {
  transform: translateY(-10px);
  opacity: 0;
}

/* 스크롤 애니메이션 클래스 */
.scroll-reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.8s ease-out;
}

.fade-up.revealed {
  opacity: 1;
  transform: translateY(0);
}

.fade-right.revealed {
  opacity: 1;
  transform: translateX(0);
}

.fade-left.revealed {
  opacity: 1;
  transform: translateX(0);
}

.fade-right {
  transform: translateX(-30px);
}

.fade-left {
  transform: translateX(30px);
}
</style>