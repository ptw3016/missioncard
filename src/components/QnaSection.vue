<template>
  <section id="qna" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#e0f2f1] via-white to-[#e0f2f1]">
      <div class="absolute w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- Animated circles -->
          <div v-for="i in 5" :key="i" 
               class="absolute rounded-full mix-blend-multiply animate-float"
               :class="[
                 i % 2 === 0 ? 'bg-[#1e4e8f]' : 'bg-[#2a9d8f]',
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
          <div class="text-center mb-16 relative scroll-reveal fade-up">
            <!-- Floating decorative elements -->
            <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#e0f2f1] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
            <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#c2e9e5] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
            
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-question-circle text-[#2a9d8f] mr-2"></i>흩어지는 예배에 대한 질문
            </span>
            
            <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">자주 묻는 질문</span>
            </h2>
            
            <div class="relative w-32 h-2 mx-auto mb-8">
              <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full"></div>
              <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full animate-pulse"></div>
            </div>
            
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              성령의 바람을 타고<br class="sm:hidden">흩어지는 예배에 대한<br class="sm:hidden">궁금증을 해결해 드립니다
            </p>
          </div>

          <!-- Main Content Area: Q&A Left, Inquiry Right -->
          <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column: Q&A Accordion -->
            <div class="lg:w-full scroll-reveal fade-right" data-delay="0.2">
              <div 
                v-for="(item, index) in qnaItems" 
                :key="index" 
                class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl overflow-hidden shadow-md border border-white border-opacity-30 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1 scroll-reveal fade-up"
                :data-delay="`${0.3 + index * 0.1}`"
              >
                <button
                  @click="toggleAccordion(index)"
                  class="w-full flex justify-between items-center p-5 text-left focus:outline-none"
                  :class="{ 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white': activeIndex === index }"
                >
                  <span class="font-medium text-lg flex items-center">
                    <i class="fas fa-seedling mr-3 text-[#2a9d8f]" v-if="activeIndex !== index"></i>
                    <i class="fas fa-wind mr-3" v-else></i>
                    {{ item.question }}
                  </span>
                  <i 
                    class="fas transition-transform duration-300" 
                    :class="[
                      activeIndex === index ? 'fa-minus transform rotate-90' : 'fa-plus', 
                      activeIndex === index ? 'text-white' : 'text-[#1e4e8f]'
                    ]"
                  ></i>
                </button>
                <transition name="fade-slide">
                  <div v-if="activeIndex === index" class="p-6 bg-gradient-to-r from-white to-[#e0f2f1] backdrop-blur-lg border border-gray-200 rounded-b-xl shadow-sm">
                    <div class="flex">
                      <div class="flex-shrink-0 w-1.5 bg-gradient-to-b from-[#1e4e8f] to-[#2a9d8f] rounded-full mr-4"></div>
                      <div class="flex-grow">
                        <p class="text-gray-800 leading-relaxed font-medium">{{ item.answer }}</p>
                        <!-- <p v-if="item.additionalInfo" class="mt-4 text-sm text-[#2a9d8f] font-medium bg-[#e0f2f1] p-4 rounded-lg shadow-md border-l-4 border-[#2a9d8f]">
                          <i class="fas fa-info-circle mr-2 text-[#1e4e8f]"></i>
                          {{ item.additionalInfo }}
                        </p> -->
                      </div>
                    </div>
                  </div>
                </transition>
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
  data() {
    return {
      activeIndex: null,
      qnaItems: [
        {
          question: "예배 장소는 누가, 어떻게 정하나요?",
          answer: "개별 선택도 가능하지만, 교구 및 사랑방 단위 참여를 최우선으로 권장합니다."
        },
        {
          question: "6월 8일 예배 시간은 어떻게 되나요?",
          answer: "각 방문 교회의 주일예배 시간에 맞추어 참여합니다. 사전에 꼭 확인해 주세요."
        },
        {
          question: "교구별 배정 교회 외에 다른 교회로 가고 싶으면 어떻게 해야 하나요?",
          answer: "다른 교회도 가능하나, 반드시 교구 담당 목사님과 상의한 후 결정해 주세요. 교구별 협력교회를 중심으로 사역이 이루어지기 때문입니다."
        },
        {
          question: "꼭 교회로 가야 하나요? 집에서도 예배드릴 수 있나요?",
          answer: "현장 예배가 원칙입니다만, 부득이한 상황(질병, 고령 등)에서는 교구 상담 후 별도 조정이 가능합니다."
        },
        {
          question: "직접 방문이 어려우면 어떻게 해야 하나요?",
          answer: "교구에 반드시 미리 알려주세요. 대체 방법을 안내받을 수 있습니다."
        },
        {
          question: "방문하는 교회에 사전 연락이 필요한가요?",
          answer: "네, 반드시 필요합니다. 방문 전 교회에 예배 참석을 알리는 것은 기본적인 예 의입니다."
        },
        {
          question: "교구에서 차량 지원이 있나요?",
          answer: "자차 이동이 어려우신 경우, 교구 교역자에게 상황과 필요 사항을 말씀해 주세 요. 노약자나 차량이 없어 이동이 어려운 30명 이상의 성도들을 위해 버스를 지원하며, 승합차도 함께 지원합니다. 승합차는 원거리(섬, 강원, 충청, 전라) 지역을 우선 지원하고, 경상도 지역은 지원 상황에 따라 조정될 수 있습니다. 필요하신 분들은 반드시 교역자에게 먼저 알려주시기 바랍니다."
        },
        {
          question: "\"흩어지는 예배\"는 선택인가요? 반드시 참여해야 하나요?",
          answer: "6월 8일은 수영로교회 본당 예배가 없습니다. 반드시 \"흩어지는 예배\"에 참여 하실 것을 요청드립니다."
        },
        {
          question: "방문 교회에서 헌금을 드려도 되나요?",
          answer: "네, \"흩어지는 예배 감사헌금 봉투\"를 통해 정성껏 헌금하실 수 있습니다. 단, 헌금 관련 지침은 반드시 교구나 사랑목자를 통해 안내받으시기 바랍니다."
        },
        {
          question: "어린이와 고령자도 함께 참여할 수 있나요?",
          answer: "네, 가능합니다. 단, 노약자 이동을 위해 교구 차량 지원 요청이나 가족 동반을 권장합니다."
        },
        {
          question: "다음 세대(어린이, 학생)는 어떻게 예배드리나요?",
          answer: "주일학교가 없는 교회들도 있습니다. 그런 경우, 부모와 함께 장년 예배에 참여 하게 됩니다."
        },
        {
          question: "예배만 드리고 오면 되는 건가요?",
          answer: "예배를 함께 드리는 것이 가장 중심입니다. 예배드리시는 교회에 식사 부담을 절대 주어서는 안 됩니다. \"흩어지는 예배\"에서 가장 중요한 것은 기쁨으로 함 께하는 자발적인 섬김입니다."
        },
        {
          question: "\"흩어지는 예배\" 후 별도로 모이는 일정이 있나요?",
          answer: "6월 8일 주일은 각자의 자리에서 예배하고 마무리합니다. 별도의 집회나 모임 은 없습니다."
        },
        {
          question: "\"흩어지는 예배\"에서 교구 및 사랑방의 역할은 무엇인가요?",
          answer: "함께 흩어지고 함께 섬기는 중심 역할을 합니다. 공동체 전체가 파송되는 마음 으로 참여해 주세요."
        }
      ],
      newQuestion: {
        name: '',
        email: '',
        question: ''
      }
    };
  },
  mounted() {
    // 스크롤 애니메이션 초기화
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
    },
    toggleAccordion(index) {
      if (this.activeIndex === index) {
        this.activeIndex = null;
      } else {
        this.activeIndex = index;
      }
    },
    submitQuestion() {
      // 여기에 질문 제출 로직을 구현합니다
      alert('질문이 성공적으로 제출되었습니다. 감사합니다!');
      this.newQuestion = {
        name: '',
        email: '',
        question: ''
      };
    },
  }
};
</script>

<style scoped>
/* 애니메이션 효과 */
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

/* 아코디언 애니메이션 */
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: height 0.3s ease, opacity 0.3s ease;
  overflow: hidden;
}

.fade-slide-enter-from,
.fade-slide-leave-to {
  height: 0;
  opacity: 0;
}

/* 3D 효과 */
.hover\:rotate-x-1:hover {
  transform: rotateX(1deg);
}

.perspective-1000 {
  perspective: 1000px;
}
</style>