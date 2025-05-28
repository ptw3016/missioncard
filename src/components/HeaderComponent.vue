<template>
  <header 
    :class="{ 'bg-white/90 backdrop-blur-md shadow-lg': isScrolled, 'bg-transparent': !isScrolled }"
    class="fixed w-full z-50 px-6 sm:px-8 md:px-10 md:transition-all md:duration-500">
    <div class="container mx-auto max-w-[1200px] px-2 md:px-5 my-1 sm:my-2 py-2 sm:py-4 md:py-6">
      <div class="flex justify-between items-center">
        <!-- 로고 영역 -->
        <div class="flex items-center cursor-pointer group" @click="smoothScroll('home')"> 
          <div class="relative w-10 h-10 sm:w-12 sm:h-12 mr-2 sm:mr-3 flex items-center justify-center flex-shrink-0">
            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-[#0891b2] to-[#0ea5e9] opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
            <i class="fas fa-mountain text-white text-lg sm:text-2xl relative z-10 group-hover:animate-pulse"></i>
          </div>
          <div class="min-w-0">
            <h1 :class="['text-base sm:text-lg md:text-xl font-bold transition-colors duration-300 flex items-center whitespace-nowrap', isScrolled ? 'text-[#0891b2]' : 'text-white']">
              <span>제주도 선교</span>
              <span class="mx-1 text-[0.625rem] sm:text-xs md:text-sm opacity-80">|</span>
              <span class="text-[0.625rem] sm:text-xs md:text-lg font-medium">모바일 선교카드</span>
            </h1>
            <span :class="['text-xs sm:text-sm tracking-wider transition-colors duration-300', isScrolled ? 'text-[#38bdf8]' : 'text-white/80']">
              Jeju Biyang-do Mission!
            </span>
          </div>
        </div>

        <!-- 데스크톱 네비게이션 -->
        <nav class="hidden md:flex items-center">
          <div class="flex md:flex-nowrap whitespace-nowrap space-x-6 lg:space-x-8 overflow-x-auto">
            <a href="#home"
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('home')">
              <span class="flex items-center h-8">
                <i class="fas fa-home text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">홈</span>
              </span>
            </a>
            <a href="#about"
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('about')">
              <span class="flex items-center h-8">
                <i class="fas fa-info-circle text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">예배소개</span>
              </span>
            </a>
            <!-- <a href="#location"
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('location')">
              <span class="flex items-center h-8">
                <i class="fas fa-map-marker-alt text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">교회소개</span>
              </span>
            </a> -->
            <!-- <a href="video"
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('video')">
              <span class="flex items-center h-8">
                <i class="fas fa-film text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">영상소개</span>
              </span>
            </a> -->
            <!-- <a href="#expectations" 
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('expectations')">
              <span class="flex items-center h-8">
                <i class="fas fa-seedling text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">기대글</span>
              </span>
            </a> -->
            <!-- <a href="#qna"
              :class="['nav-link', 'font-semibold', 'text-lg', isScrolled ? 'text-[#0891b2]' : 'text-white']"
              @click.prevent="smoothScroll('qna')">
              <span class="flex items-center h-8">
                <i class="fas fa-comments text-sm mr-2 w-5 text-center" :class="isScrolled ? 'text-[#38bdf8]' : 'text-white/80'"></i>
                <span class="drop-shadow-[0px_1px_2px_rgba(0,0,0,0.3)]">QnA</span>
              </span>
            </a> -->
          </div>
          <div class="relative overflow-visible ml-4">
            <!-- 도움말 버튼 -->
            <button 
            @click="startTour" 
            class="focus:outline-none px-4 py-1 rounded-full transition-all duration-300 transform hover:scale-110 hover:shadow-xl border"
            :class="isScrolled ? 'bg-white/100 shadow-lg border-[#0ea5e9]/100' : 'bg-white/40 text-white hover:bg-white/60 backdrop-blur-sm shadow-md border-[#0ea5e9]/80'"
          >
            <i class="fas fa-question-circle text-lg" :class="isScrolled ? 'text-[#0ea5e9]' : 'text-white'"></i>
          </button>
            <div v-if="showHelpBubble" class="absolute top-full mt-2 left-1/2 transform -translate-x-1/2 z-50">
              <div class="relative mt-2">
                <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent border-b-[8px] border-b-[#0ea5e9]/80"></div>
                <div class="p-3 bg-[#0891b2]/50 rounded-3xl shadow-xl border border-[#0ea5e9]/0 whitespace-nowrap relative">
                  <button @click="showHelpBubble = false" class="absolute top-1/2 right-3 transform -translate-y-1/2 w-5 h-5 bg-[#0891b2]/0 rounded-full border-[#0ea5e9]/100 flex items-center justify-center text-white hover:text-[#0891b2] shadow-sm transition-colors">
                    <i class="fas fa-times text-xs"></i>
                  </button>
                  <div class="flex items-center space-x-2 ml-2 mr-7">
                    <i class="fas fa-lightbulb text-white text-sm"></i>
                    <span class="text-white font-medium animate-pulse">가이드북 둘러보기</span>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </nav>

        <!-- 모바일 버전 버튼 영역 -->
        <div class="md:hidden flex items-center space-x-2 sm:space-x-3 flex-shrink-0">
          <!-- 모바일 도움말 버튼 -->
          <div class="relative overflow-visible ml-3 sm:ml-5">
          <button 
            @click="startTour" 
            class="focus:outline-none p-2.5 sm:p-3.5 rounded-full transition-all duration-300 transform hover:scale-110 hover:shadow-xl border"
            :class="isScrolled ? 'bg-gradient-to-r from-[#0891b2] to-[#0ea5e9] text-white shadow-lg border-[#38bdf8]/50' : 'bg-white/40 text-white hover:bg-white/60 backdrop-blur-sm shadow-md border-[#7dd3fc]/80'"
          >
            <i class="fas fa-question-circle text-xl sm:text-2xl" :class="isScrolled ? 'text-white' : 'text-white'"></i>
          </button>
          <div v-if="showHelpBubble" class="absolute top-full mt-2 right-0 transform translate-x-[20px] sm:translate-x-[40px] sm:right-auto sm:left-1/2 sm:transform sm:-translate-x-1/2 z-50">
              <div class="relative mt-2">
                <div class="absolute -top-2 w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent border-b-[8px] border-b-[#7dd3fc]/80 right-[30px] sm:right-[50px] sm:right-auto sm:left-1/2 sm:transform sm:-translate-x-1/2"></div>
                <div class="p-1.5 sm:p-2 bg-[#0ea5e9]/80 rounded-3xl shadow-xl border border-[#7dd3fc]/0 whitespace-nowrap relative">
                  <button @click="showHelpBubble = false" class="absolute top-1/2 right-2 sm:right-3 transform -translate-y-1/2 w-3.5 h-3.5 sm:w-4 sm:h-4 bg-[#0ea5e9]/0 rounded-full border-[#7dd3fc]/100 flex items-center justify-center text-white hover:text-[#0891b2] shadow-sm transition-colors">
                    <i class="fas fa-times text-[10px] sm:text-xs"></i>
                  </button>
                  <div class="flex items-center space-x-1 sm:space-x-2 ml-1.5 sm:ml-2 mr-5 sm:mr-6">
                    <i class="fas fa-lightbulb text-white text-xs sm:text-sm"></i>
                    <span class="text-white text-xs sm:text-sm font-medium animate-pulse">가이드북 둘러보기</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 모바일 메뉴 버튼 -->
          <button 
            @click="$emit('toggle-menu')" 
            class="focus:outline-none p-2.5 sm:p-3.5 rounded-full transition-all duration-300 transform hover:scale-110 hover:shadow-xl border"
            :class="isScrolled ? 'bg-gradient-to-r from-[#38bdf8] to-[#0891b2] text-white animate-pulse-slow shadow-lg border-[#38bdf8]/50' : 'bg-white/40 text-white hover:bg-white/60 backdrop-blur-sm shadow-md border-[#7dd3fc]/80'"
          >
            <i class="fas fa-bars text-xl sm:text-2xl" :class="isScrolled ? 'text-white' : 'text-white'"></i>
          </button>
        </div>
      </div>
    </div>
    
    <!-- 구분선 -->
    <div class="w-full h-px bg-white/30" v-if="!isScrolled"></div> 
    <div class="w-full h-px bg-gradient-to-r from-[#0891b2]/10 via-[#0ea5e9]/10 to-[#38bdf8]/10" v-else></div> 
  </header>

  <!-- 가이드 투어 오버레이 및 툴팁 -->
  <div v-if="isTourActive" class="fixed inset-0 bg-black/70 z-[60] transition-opacity duration-500" @click="endTour"></div>
  
  <!-- 하이라이트 효과 -->
  <div v-if="isTourActive && currentTooltip && currentTooltip.targetId" 
    class="highlight-element fixed z-[55] border-2 border-[#0ea5e9] rounded-md shadow-lg pointer-events-none"
    :style="highlightPosition">
    <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-[#0ea5e9] flex items-center justify-center text-white text-xs">
      {{ currentTooltipIndex + 1 }}
    </div>
  </div>
  
  <!-- 툴팁 컴포넌트 -->
  <div v-for="(tooltip, index) in tooltips" :key="index" v-show="isTourActive && currentTooltipIndex === index"
    :class="['fixed z-[70] p-5 bg-gradient-to-br from-white to-[#f8f9fa] rounded-xl shadow-2xl max-w-xs transform transition-all duration-500 border border-[#0ea5e9]/10', 
    tooltip.position]">
    <div class="flex items-start justify-between mb-3">
      <div class="flex items-start">
        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-[#0891b2] via-[#0ea5e9] to-[#38bdf8] flex items-center justify-center text-white mr-3 shadow-md">
          <i :class="[tooltip.icon, 'text-lg']"></i>
        </div>
        <h3 class="text-[#0891b2] font-bold text-lg mt-1">{{ tooltip.title }}</h3>
      </div>
      <button @click.stop="endTour" class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-gray-800 transition-colors bg-gray-100 hover:bg-gray-200 rounded-full">
        <i class="fas fa-times text-sm"></i>
      </button>
    </div>
    <p class="text-gray-700 mb-4 leading-relaxed">{{ tooltip.description }}</p>
    <div class="flex justify-between items-center">
      <button v-if="index > 0" @click.stop="prevTooltip" 
        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 rounded-md text-gray-700 text-sm transition-colors flex items-center space-x-1 shadow-sm">
        <i class="fas fa-arrow-left text-xs"></i>
        <span>이전</span>
      </button>
      <div class="flex-grow"></div>
      <button v-if="index < tooltips.length - 1" @click.stop="nextTooltip" 
        class="px-3 py-1.5 bg-gradient-to-r from-[#0891b2] via-[#0ea5e9] to-[#38bdf8] hover:from-[#077991] hover:via-[#0c8fc0] hover:to-[#269dd3] rounded-md text-white text-sm transition-colors flex items-center space-x-1 shadow-sm">
        <span>다음</span>
        <i class="fas fa-arrow-right text-xs"></i>
      </button>
      <button v-else @click.stop="endTour" 
        class="px-3 py-1.5 bg-gradient-to-r from-[#0891b2] via-[#0ea5e9] to-[#38bdf8] hover:from-[#077991] hover:via-[#0c8fc0] hover:to-[#269dd3] rounded-md text-white text-sm transition-colors flex items-center space-x-1 shadow-sm">
        <span>완료</span>
        <i class="fas fa-check text-xs"></i>
      </button>
    </div>
    <!-- 툴팁 화살표 -->
    <div class="tooltip-arrow" :class="tooltip.arrowPosition"></div>
  </div>
</template>

<script>
export default {
  props: ['isScrolled'],
  emits: ['toggle-menu'],
  data() {
    return {
      isTourActive: false,
      currentTooltipIndex: 0,
      highlightPosition: {
        top: '0px',
        left: '0px',
        width: '0px',
        height: '0px'
      },
      tooltips: [
        {
          title: '홈 화면',
          description: '흩어지는 예배 사역에 대한 소개와 주요 정보를 확인할 수 있습니다.',
          position: 'top-1/4 left-1/2 -translate-x-1/2',
          arrowPosition: 'arrow-bottom',
          icon: 'fas fa-home',
          targetId: 'home'
        },
        {
          title: '예배소개',
          description: '흩어지는 예배 사역의 비전과 목적에 대해 자세히 알아보세요.',
          position: 'top-1/3 left-1/2 -translate-x-1/2',
          arrowPosition: 'arrow-bottom',
          icon: 'fas fa-info-circle',
          targetId: 'about'
        },
        {
          title: '안전 & 참여 안내',
          description: '흩어지는 예배에 참여하기 위한 안전 수칙과 참여 시 꼭 기억할 사항을 확인하세요.',
          position: 'bottom-1/3 right-1/4',
          arrowPosition: 'arrow-left',
          icon: 'fas fa-shield-alt',
          targetId: 'safety-guide'
        },
        {
          title: '교회소개',
          description: '전국에 흩어져 있는 예배 공동체의 위치를 확인할 수 있습니다.',
          position: 'top-1/3 right-1/4',
          arrowPosition: 'arrow-left',
          icon: 'fas fa-map-marker-alt',
          targetId: 'location'
        },
        {
          title: '기대글',
          description: '사역에 참여한 분들의 기대와 소망을 확인해보세요.',
          position: 'top-1/2 right-1/4',
          arrowPosition: 'arrow-left',
          icon: 'fas fa-seedling',
          targetId: 'expectations'
        },
        {
          title: 'Q&A',
          description: '자주 묻는 질문과 답변을 통해 더 자세한 정보를 얻을 수 있습니다.',
          position: 'top-1/2 left-1/4',
          arrowPosition: 'arrow-right',
          icon: 'fas fa-question-circle',
          targetId: 'qna'
        }
      ],
      showHelpBubble: true,
    }
  },
  computed: {
    currentTooltip() {
      return this.tooltips[this.currentTooltipIndex] || null;
    }
  },
  methods: {
    smoothScroll(id) {
      const el = document.getElementById(id);
      if (el) {
        const headerHeight = document.querySelector('header')?.offsetHeight || 80; 
        const elementPosition = el.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - headerHeight; 
 
        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
      }
    },
    startTour() {
      this.isTourActive = true;
      this.currentTooltipIndex = 0;
      document.body.style.overflow = 'hidden'; // 스크롤 방지
      this.$nextTick(() => {
        this.updateHighlightPosition();
      });
    },
    endTour() {
      this.isTourActive = false;
      document.body.style.overflow = ''; // 스크롤 복원
    },
    nextTooltip() {
      if (this.currentTooltipIndex < this.tooltips.length - 1) {
        this.currentTooltipIndex++;
        this.$nextTick(() => {
          this.updateHighlightPosition();
        });
      }
    },
    prevTooltip() {
      if (this.currentTooltipIndex > 0) {
        this.currentTooltipIndex--;
        this.$nextTick(() => {
          this.updateHighlightPosition();
        });
      }
    },
    updateHighlightPosition() {
      const tooltip = this.currentTooltip;
      if (!tooltip || !tooltip.targetId) return;
      
      const targetElement = document.getElementById(tooltip.targetId);
      if (!targetElement) return;
      
      const rect = targetElement.getBoundingClientRect();
      
      this.highlightPosition = {
        top: rect.top + 'px',
        left: rect.left + 'px',
        width: rect.width + 'px',
        height: rect.height + 'px'
      };
      
      // 필요한 경우 대상 요소로 스크롤
      if (rect.top < 0 || rect.bottom > window.innerHeight) {
        const headerHeight = document.querySelector('header')?.offsetHeight || 80;
        const scrollPosition = window.pageYOffset + rect.top - headerHeight - 20;
        window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
      }
    }
  }
}
</script>

<style scoped>
.nav-link {
  position: relative;
  padding-bottom: 4px; 
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: 0;
  left: 0;
  background-image: linear-gradient(to right, #0891b2, #0ea5e9);
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}

.nav-link:hover {
  transform: none !important;
}

/* 툴팁 화살표 스타일 */
.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-style: solid;
}

.arrow-bottom {
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  border-width: 10px 10px 0;
  border-color: white transparent transparent;
}

.arrow-top {
  top: -10px;
  left: 50%;
  transform: translateX(-50%);
  border-width: 0 10px 10px;
  border-color: transparent transparent white;
}

.arrow-left {
  left: -10px;
  top: 50%;
  transform: translateY(-50%);
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

.arrow-right {
  right: -10px;
  top: 50%;
  transform: translateY(-50%);
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* 하이라이트 효과 애니메이션 */
.highlight-element {
  animation: pulse-highlight 2s infinite;
}

@keyframes pulse-highlight {
  0% {
    box-shadow: 0 0 0 0 rgba(42, 157, 143, 0.7);
  }
  70% {
    box-shadow: 0 0 0 10px rgba(42, 157, 143, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(42, 157, 143, 0);
  }
}
</style>
