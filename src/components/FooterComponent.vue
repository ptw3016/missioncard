<template>
  <footer class="footer-section">
    <!-- 배경 그라디언트 -->
    <div class="background-gradient"></div>
    
    <!-- 떠다니는 장식 요소들 -->
    <div class="floating-elements">
      <div class="floating-shape shape-1"></div>
      <div class="floating-shape shape-2"></div>
      <div class="floating-shape shape-3"></div>
      <div class="floating-shape shape-4"></div>
      <div class="floating-shape shape-5"></div>
    </div>
    
    <div class="container">
      <div class="footer-content">
        <!-- 로고 및 소개 -->
        <div class="footer-info">
          <div class="footer-logo">
            <div class="logo-icon">
              <i class="fas fa-wind"></i>
            </div>
            <div>
              <h2 class="logo-title">제주선교</h2>
              <p class="logo-subtitle">Jeju Mission!</p>
            </div>
          </div>
          <p class="footer-description">제주도 선교지에서 하나님 나라를 위한 하나님의 바람을 타고, 세상 속에서 다시 피어나는 예배 공동체</p>
          
          <div class="footer-quote">
            <p>
              <i class="fas fa-quote-left quote-icon"></i>
              안에서 밖으로, 교회의 문턱을 넘어 복음의 정신을 실천하는 교회
            </p>
          </div>
        </div>
        
        <!-- 링크 및 정보 -->
        <div class="footer-links">
          <!-- 빠른 링크 -->
          <div class="link-section">
            <h3 class="section-title">
              <span class="title-icon">
                <i class="fas fa-link"></i>
              </span>
              <span>빠른 링크</span>
            </h3>
            <ul class="link-list">
              <li>
                <a href="#home" @click.prevent="scrollToSection" class="footer-link">
                  <i class="fas fa-chevron-right link-arrow"></i>
                  <span>홈</span>
                </a>
              </li>
              <li>
                <a href="#about" @click.prevent="scrollToSection" class="footer-link">
                  <i class="fas fa-chevron-right link-arrow"></i>
                  <span>예배소개</span>
                </a>
              </li>
              <li>
                <a href="#location" @click.prevent="scrollToSection" class="footer-link">
                  <i class="fas fa-chevron-right link-arrow"></i>
                  <span>교회소개</span>
                </a>
              </li>
              <li>
                <a href="#expectations" @click.prevent="scrollToSection" class="footer-link">
                  <i class="fas fa-chevron-right link-arrow"></i>
                  <span>기대글</span>
                </a>
              </li>
              <li>
                <a href="#qna" @click.prevent="scrollToSection" class="footer-link">
                  <i class="fas fa-chevron-right link-arrow"></i>
                  <span>Q&A</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- 카피라이트 및 소셜 미디어 -->
      <div class="footer-bottom">
        <p class="copyright">COPYRIGHT(C) <br class="mobile-break"/>JEJU MISSION.<br class="mobile-break"/>ALL RIGHTS RESERVED</p>
        <div class="social-links">
          <a href="#" @click.prevent="showStatsModal = true" class="social-link">
            <i class="fas fa-chart-line"></i>
          </a> 
        </div>
      </div>
    </div>
    
    <!-- 방문자 통계 모달 -->
    <div v-show="showStatsModal" class="stats-modal" @click="showStatsModal = false">
      <div @click.stop class="modal-content">
        <button @click="showStatsModal = false" class="close-button">
          <i class="fas fa-times"></i>
        </button>
        
        <!-- 비밀번호 입력 폼 -->
        <div v-if="!isPasswordVerified" class="text-center">
          <div class="modal-icon">
            <i class="fas fa-lock"></i>
          </div>
          <h3 class="modal-title">관리자 인증</h3>
          <div class="mb-4">
            <input 
              type="password" 
              v-model="passwordInput" 
              placeholder="비밀번호를 입력하세요" 
              class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#2a9d8f] text-gray-800 dark:text-white"
              @keyup.enter="verifyPassword"
            />
            <p v-if="passwordError" class="text-red-500 text-sm mt-2">{{ passwordError }}</p>
          </div>
          <button 
            @click="verifyPassword" 
            class="bg-gradient-to-r from-[#2a9d8f] to-[#57c4aa] px-6 py-2 rounded-lg text-white font-medium hover:from-[#217f73] hover:to-[#4aa996] transition duration-300 w-full"
            :disabled="isVerifying"
          >
            {{ isVerifying ? '확인 중...' : '확인' }}
          </button>
        </div>
        
        <!-- 방문자 통계 내용 -->
        <div v-else class="text-center">
          <div class="modal-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3 class="modal-title">방문자 통계</h3>
          
          <!-- 요약 정보 -->
          <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg mb-4">
            <div class="flex justify-between items-center mb-2">
              <span class="text-gray-600 dark:text-gray-300">오늘 방문자:</span>
              <span class="text-xl font-bold text-[#2a9d8f]">{{ dailyCount }}명</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600 dark:text-gray-300">전체 방문자:</span>
              <span class="text-xl font-bold text-[#1e4e8f]">{{ totalCount }}명</span>
            </div>
          </div>
          
          <!-- 날짜 범위 선택 -->
          <div class="mb-4 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="w-full sm:w-auto">
              <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">시작일</label>
              <input 
                type="date" 
                v-model="startDate" 
                class="px-3 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#2a9d8f] text-gray-800 dark:text-white"
                :max="endDate"
              />
            </div>
            <div class="w-full sm:w-auto">
              <label class="block text-sm text-gray-600 dark:text-gray-300 mb-1">종료일</label>
              <input 
                type="date" 
                v-model="endDate" 
                class="px-3 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#2a9d8f] text-gray-800 dark:text-white"
                :min="startDate"
                :max="today"
              />
            </div>
            <div class="w-full sm:w-auto sm:self-end">
              <button 
                @click="fetchGraphData" 
                class="w-full sm:w-auto bg-gradient-to-r from-[#2a9d8f] to-[#57c4aa] px-4 py-2 rounded-lg text-white font-medium hover:from-[#217f73] hover:to-[#4aa996] transition duration-300"
                :disabled="isLoadingGraph"
              >
                {{ isLoadingGraph ? '로딩 중...' : '조회하기' }}
              </button>
            </div>
          </div>
          
          <!-- 빠른 기간 선택 버튼 -->
          <div class="flex flex-wrap justify-center gap-2 mb-4">
            <button 
              v-for="(period, index) in datePeriods" 
              :key="index"
              @click="selectDatePeriod(period.days)"
              :disabled="isLoadingGraph"
              class="px-3 py-1 text-sm rounded-full transition-colors"
              :class="activePeriod === period.days ? 'bg-[#2a9d8f] text-white' : 'bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-500'"
            >
              {{ period.label }}
            </button>
          </div>
          
          <!-- 그래프 표시 영역 -->
          <div class="bg-white dark:bg-gray-800 rounded-lg p-4 mb-4 shadow-sm">
            <div v-if="noDataMessage" class="py-10 text-gray-500 dark:text-gray-400 text-center">
              {{ noDataMessage }}
            </div>
            <canvas ref="visitChart" v-show="!noDataMessage" height="250"></canvas>
          </div>
          
          <p class="text-sm text-gray-500 dark:text-gray-400">흩어지는 예배 방문자 통계입니다.</p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { nextTick, ref, onMounted, watch, computed, onBeforeUnmount } from 'vue';
import Chart from 'chart.js/auto';

const dailyCount = ref(0);
const totalCount = ref(0);
const showStatsModal = ref(false);
const isPasswordVerified = ref(false);
const passwordInput = ref('');
const passwordError = ref('');
const isVerifying = ref(false);
const isLoadingGraph = ref(false);
const visitChart = ref(null);
const chartInstance = ref(null);
const graphData = ref([]);
const today = computed(() => {
  const now = new Date();
  return `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
});
const startDate = ref('');
const endDate = ref(today.value);
const activePeriod = ref(30);
const noDataMessage = ref('');

// 날짜 기간 옵션
const datePeriods = [
  // { label: '1일', days: 1 },
  { label: '7일', days: 7 },
  { label: '30일', days: 30 },
  { label: '90일', days: 90 },
  { label: '1년', days: 365 }
];

// n일 전 날짜 구하기
function getDateBefore(days) {
  const date = new Date();
  date.setDate(date.getDate() - days);
  return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
}

// 기간 선택 함수
function selectDatePeriod(days) {
  activePeriod.value = days;
  // 종료일을 시작일 기준으로 설정
  const [y, m, d] = startDate.value.split('-').map(Number);
  const start = new Date(y, m - 1, d);
  const end = new Date(start);
  end.setDate(start.getDate() + (days - 1));
  endDate.value = `${end.getFullYear()}-${String(end.getMonth() + 1).padStart(2, '0')}-${String(end.getDate()).padStart(2, '0')}`;
  fetchGraphData();
}

// 그래프 데이터 가져오기
function fetchGraphData() {
  isLoadingGraph.value = true;
  noDataMessage.value = '';
  
  // 이전 차트 인스턴스 정리
  if (chartInstance.value) {
    chartInstance.value.stop();
    chartInstance.value.destroy();
    chartInstance.value = null;
  }
  
  fetch('https://spread0608.com/spread0608/api/visit.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      password: passwordInput.value,
      startDate: startDate.value,
      endDate: endDate.value
    })
  })
  .then(res => res.json())
  .then(data => {
    isLoadingGraph.value = false;
    
    if (data.success && data.auth_success) {
      graphData.value = data.graph_data || [];
      
      if (graphData.value.length === 0) {
        noDataMessage.value = '선택한 기간에 방문 데이터가 없습니다.';
      } else {
        // 차트 렌더링
        renderChart();
      }
    }
  })
  .catch(err => {
    isLoadingGraph.value = false;
    noDataMessage.value = '데이터를 불러오는데 실패했습니다.';
    console.error('그래프 데이터 로드 실패:', err);
  });
}

// 차트 렌더링
function renderChart() {
  if (chartInstance.value) {
    chartInstance.value.stop();
    chartInstance.value.destroy();
  }
  
  nextTick(() => {
    if (!visitChart.value) {
      console.error('Canvas element not found');
      noDataMessage.value = '차트를 표시할 수 없습니다.';
      return;
    }
    
    try {
      const ctx = visitChart.value.getContext('2d');
      if (!ctx) {
        console.error('Failed to get 2D context from canvas');
        noDataMessage.value = '차트를 표시할 수 없습니다.';
        return;
      }
      
      // 날짜와 방문자 수 데이터 추출
      const isDetailed = graphData.value.length > 0 && graphData.value[0].visit_time !== undefined;
      const isHourly   = !isDetailed && graphData.value.length > 0 && graphData.value[0].visit_hour !== undefined;
      const labels = isDetailed
        ? graphData.value.map(item => item.visit_time.slice(11,16))
        : isHourly
          ? graphData.value.map(item => `${item.visit_hour}시`)
          : graphData.value.map(item => { const date = new Date(item.visit_date); return `${date.getMonth()+1}/${date.getDate()}`; });
      
      const counts = graphData.value.map(item => item.count);
      
      // 차트 설정
      const config = {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: '방문자 수',
            data: counts,
            backgroundColor: 'rgba(42, 157, 143, 0.2)',
            borderColor: 'rgba(42, 157, 143, 1)',
            borderWidth: 2,
            tension: 0.3,
            pointBackgroundColor: 'rgba(42, 157, 143, 1)',
            pointRadius: 4,
            pointHoverRadius: 6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          animation: false,
          plugins: {
            legend: { display: false },
            tooltip: {
              callbacks: {
                title(tooltipItems) {
                  const idx = tooltipItems[0].dataIndex;
                  const item = graphData.value[idx];
                  if (item.visit_time) return item.visit_time;
                  if (item.visit_date) return item.visit_date;
                  return `${item.visit_hour}시`;
                }
              }
            }
          }
        }
      };
      
      // 안전한 차트 생성: 오류 시 재시도
      try {
        chartInstance.value = new Chart(ctx, config);
      } catch(err) {
        console.error('차트 생성 실패, 재시도:', err);
        chartInstance.value?.destroy();
        chartInstance.value = new Chart(ctx, config);
      }
    } catch (error) {
      console.error('Error rendering chart:', error);
      noDataMessage.value = '차트 렌더링 중 오류가 발생했습니다.';
    }
  });
}

// 비밀번호 검증 함수
const verifyPassword = () => {
  if (!passwordInput.value) {
    passwordError.value = '비밀번호를 입력해주세요.';
    return;
  }
  
  isVerifying.value = true;
  passwordError.value = '';
  
  fetch('https://spread0608.com/spread0608/api/visit.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      password: passwordInput.value
    })
  })
  .then(res => res.json())
  .then(data => {
    isVerifying.value = false;
    
    if (data.success && data.auth_success) {
      isPasswordVerified.value = true;
      dailyCount.value = data.daily_count;
      totalCount.value = data.total_count;
      
      // 인증 성공 후 그래프 데이터 로드
      graphData.value = data.graph_data || [];
      
      if (graphData.value.length === 0) {
        noDataMessage.value = '방문 데이터가 없습니다.';
      } else {
        // 차트 렌더링
        renderChart();
      }
    } else {
      passwordError.value = data.message || '비밀번호가 일치하지 않습니다.';
    }
  })
  .catch(err => {
    isVerifying.value = false;
    passwordError.value = '서버 오류가 발생했습니다. 다시 시도해주세요.';
    console.error('비밀번호 검증 오류:', err);
  });
};

// 모달이 닫힐 때 비밀번호 인증 상태 초기화
watch(showStatsModal, (newValue) => {
  if (!newValue) {
    if (chartInstance.value) {
      chartInstance.value.stop();
      chartInstance.value.destroy();
      chartInstance.value = null;
    }
    isPasswordVerified.value = false;
    passwordInput.value = '';
    passwordError.value = '';
  }
});

// 컴포넌트가 제거될 때 차트 인스턴스 정리
onBeforeUnmount(() => {
  if (chartInstance.value) {
    chartInstance.value.stop();
    chartInstance.value.destroy();
  }
});

const scrollToSection = (event) => {
  console.log('scrollToSection called for href:', event.currentTarget.getAttribute('href'));
  const targetId = event.currentTarget.getAttribute('href');

  nextTick(() => {
    console.log('Attempting to find element with ID (inside nextTick):', targetId);
    try {
      const targetElement = document.querySelector(targetId);
      console.log('Found element (inside nextTick):', targetElement);
      if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
        console.log('Scrolling to element (inside nextTick)...');
      } else {
        console.error(`Element with ID '${targetId}' not found (inside nextTick).`);
      }
    } catch (error) {
      console.error('Error during querySelector or scrollIntoView (inside nextTick):', error);
    }
  });
};

onMounted(() => {
  //fetch('https://spread0608.com/spread0608/api/visit.php')
  //  .then(res => res.json())
  //  .then(data => {
  //    if (data.success) {
  //      dailyCount.value = data.daily_count;
  //      totalCount.value = data.total_count;
  //      // DB에서 첫 방문 날짜로 시작일 설정
  //      startDate.value = data.earliest_date || getDateBefore(30);
  //    }
  //  })
  //  .catch(err => console.error('방문자 수 로드 실패', err));
});
</script>

<style scoped>
.footer-section {
  position: relative;
  padding: 80px 15px 40px;
  background: linear-gradient(135deg, #0891b2 0%, #0ea5e9 25%, #38bdf8 50%, #7dd3fc 75%, #0284c7 100%);
  overflow: hidden;
  color: white;
}

.background-gradient {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(1px);
}

.floating-elements {
  position: absolute;
  width: 100%;
  height: 100%;
  pointer-events: none;
  overflow: hidden;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: float 8s ease-in-out infinite;
}

.shape-1 {
  width: 60px;
  height: 60px;
  top: 10%;
  left: 5%;
  animation-delay: 0s;
}

.shape-2 {
  width: 80px;
  height: 80px;
  bottom: 20%;
  right: 10%;
  animation-delay: 2s;
}

.shape-3 {
  width: 40px;
  height: 40px;
  top: 40%;
  left: 80%;
  animation-delay: 4s;
}

.shape-4 {
  width: 100px;
  height: 100px;
  top: 20%;
  right: 30%;
  animation-delay: 6s;
}

.shape-5 {
  width: 70px;
  height: 70px;
  bottom: 15%;
  left: 40%;
  animation-delay: 3s;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  25% { transform: translateY(-20px) rotate(90deg); }
  50% { transform: translateY(-10px) rotate(180deg); }
  75% { transform: translateY(-30px) rotate(270deg); }
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  position: relative;
  z-index: 2;
  width: 100%;
}

.footer-content {
  display: flex;
  flex-direction: column;
  margin-bottom: 60px;
}

@media (min-width: 768px) {
  .footer-content {
    flex-direction: row;
    justify-content: space-between;
  }
}

.footer-info {
  margin-bottom: 40px;
}

@media (min-width: 768px) {
  .footer-info {
    width: 40%;
    margin-bottom: 0;
  }
}

.footer-logo {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.logo-icon {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
}

.logo-icon i {
  font-size: 24px;
  color: white;
}

.logo-title {
  font-size: 24px;
  font-weight: 700;
  margin: 0;
}

.logo-subtitle {
  font-size: 14px;
  opacity: 0.8;
  margin: 0;
}

.footer-description {
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 20px;
  opacity: 0.9;
}

.footer-quote {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 16px;
  padding: 20px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.footer-quote p {
  font-style: italic;
  font-size: 14px;
  margin: 0;
}

.quote-icon {
  margin-right: 8px;
}

.footer-links {
  display: grid;
  grid-template-columns: 1fr;
  gap: 30px;
}

@media (min-width: 768px) {
  .footer-links {
    width: 50%;
    grid-template-columns: repeat(2, 1fr);
  }
}

.section-title {
  display: flex;
  align-items: center;
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 20px;
}

.title-icon {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 10px;
}

.link-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.link-list li {
  margin-bottom: 12px;
}

.footer-link {
  display: flex;
  align-items: center;
  color: white;
  text-decoration: none;
  transition: all 0.3s ease;
}

.footer-link:hover {
  transform: translateX(5px);
  opacity: 0.8;
}

.link-arrow {
  font-size: 10px;
  margin-right: 8px;
}

.footer-bottom {
  display: flex;
  flex-direction: column;
  align-items: center;
  border-top: 1px solid rgba(255, 255, 255, 0.2);
  padding-top: 30px;
}

@media (min-width: 768px) {
  .footer-bottom {
    flex-direction: row;
    justify-content: space-between;
  }
}

.copyright {
  font-size: 14px;
  opacity: 0.8;
  margin-bottom: 20px;
  text-align: center;
}

@media (min-width: 768px) {
  .copyright {
    margin-bottom: 0;
    text-align: left;
  }
  
  .mobile-break {
    display: none;
  }
}

.social-links {
  display: flex;
  gap: 16px;
}

.social-link {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-decoration: none;
  transition: all 0.3s ease;
}

.social-link:hover {
  transform: translateY(-3px);
  background: rgba(255, 255, 255, 0.3);
}

/* 모달 스타일 */
.stats-modal {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(5px);
  z-index: 50;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 16px;
}

.modal-content {
  background: white;
  border-radius: 16px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 500px;
  max-height: 80vh;
  overflow-y: auto;
  padding: 24px;
  position: relative;
  border: 1px solid rgba(255, 255, 255, 0.4);
}

.close-button {
  position: absolute;
  top: 12px;
  right: 12px;
  background: none;
  border: none;
  font-size: 16px;
  cursor: pointer;
  color: #666;
}

.modal-icon {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: rgba(8, 145, 178, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 16px auto 16px;
}

.modal-icon i {
  font-size: 24px;
  color: #0891b2;
}

.modal-title {
  font-size: 24px;
  font-weight: 700;
  color: #333;
  margin-bottom: 24px;
}
</style>
