
<template>
  <section id="hero" class="main-hero scroll-mt-24 relative overflow-hidden">
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
      <div class="hero-content text-left" data-aos="fade-up">
         <div class="hero-badge">
          <span class="badge-icon">🌊</span>
          <span>제주도 선교</span>
         </div> 
        
        <h1 class="hero-title">
          <span class="subtitle">세모마을 국내선교</span>
          <span class="main-title">제주도 <strong>선교</strong><br>8/8 - 8/13</span>
        </h1>
        
        <div class="title-underline"></div>
        
        <!-- <p class="hero-description">
          제주도 선교를 위한 특별한 미션카드로 함께하는 신앙 여정
        </p> -->
        
        <!-- <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">
          <button class="primary-button">
            <span class="button-icon"><i class="fas fa-map-marked-alt"></i></span>
            <span>미션 시작하기</span>
          </button>
          <button class="secondary-button">
            <span class="button-icon"><i class="fas fa-info-circle"></i></span>
            <span>더 알아보기</span>
          </button>
        </div> -->
      </div>
      
      <div class="content-grid">
        <!-- <div class="content-left" data-aos="fade-right" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-pray"></i>
            </div>
            <h3>기도와 예배</h3>
            <p>비양도 선교를 위한 기도와 예배를 통해 영적 성장을 경험하세요</p>
          </div>
          
          <div class="feature-card" data-aos="fade-right" data-aos-delay="400">
            <div class="feature-icon">
              <i class="fas fa-hands-helping"></i>
            </div>
            <h3>섬김과 나눔</h3>
            <p>지역 주민들과 함께하는 섬김과 나눔의 시간을 가져보세요</p>
          </div>
        </div> -->
        
        <!-- <div class="content-right" data-aos="fade-left" data-aos-delay="300">
          <div class="image-card main-image">
            <div class="image-overlay"></div>
            <img 
              src="@/assets/jeju-do_cut.png" 
              alt="비양도" 
              class="card-image"/>
            
            <div class="image-content">
              <div class="image-icon">
                <i class="fas fa-mountain"></i>
              </div>
              <h3>비양도</h3>
              <p>제주 앞바다의 아름다운 섬, 하나님의 사랑이 필요한 곳</p>
            </div>
          </div>
        </div> -->
      </div>
      
      <!-- Highlight section -->
      <!-- <div class="highlight-section" data-aos="fade-up" data-aos-delay="500">
        <div class="highlight-card">
          <div class="highlight-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="highlight-content">
            <h3>특별한 미션 카드</h3>
            <p>비양도 선교를 위한 특별한 미션 카드로 재미있게 참여하고 의미 있는 경험을 쌓아보세요.</p>
          </div>
        </div>
      </div> -->
    </div>
    
    <!-- 아래로 스크롤 버튼 -->
    <div class="scroll-down-button-container">
      <button @click="scrollToNextSection" class="scroll-down-button" aria-label="Scroll down">
        <i class="fas fa-chevron-down"></i>
      </button>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.initAOS();
  },
  methods: {
    initAOS() {
      // AOS 라이브러리를 사용하여 스크롤 애니메이션 초기화
      if (typeof AOS !== 'undefined') {
        AOS.init({
          duration: 800,
          easing: 'ease-in-out',
          once: true
        });
      } else {
        // AOS가 로드되지 않은 경우 기본 애니메이션 적용
        document.querySelectorAll('[data-aos]').forEach(el => {
          el.classList.add('aos-animate');
        });
      }
    },
    scrollToNextSection() {
      // 다음 섹션의 ID를 정확히 지정해야 합니다.
      // 예: 'mission-section', 'about-section' 등
      const nextSection = document.getElementById('mission-pray-section3'); // 'mission-section' ID를 가진 요소로 스크롤합니다. 실제 ID로 변경해주세요.
      if (nextSection) {
        nextSection.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }
}
</script>

<style scoped>
.main-hero {
  position: relative;
  min-height: 100vh;
  padding-top: 104px;    /* Default: 40px (original) + 4rem (64px header) */
  padding-bottom: 60px;
  padding-left: 15px;
  padding-right: 15px;
  background: url('@/assets/island1.jpg') center/cover no-repeat;
  overflow: hidden;
  display: flex;
  align-items: flex-start; /* 변경: flex-end -> flex-start */
  /* 버튼이 하단 중앙에 오도록 flex-direction 변경 */
  flex-direction: column; 
  justify-content: flex-end; /* 변경: space-between -> flex-end */
}

/* Small screens and up (sm breakpoint in Tailwind is 640px) */
@media (min-width: 640px) {
  .main-hero {
    padding-top: 136px; /* sm: 40px + 6rem (96px header) */
    align-items: center;
    /* background: linear-gradient(135deg, #0c4a6e 0%, #0369a1 25%, #0284c7 50%, #0ea5e9 75%, #38bdf8 100%); */ /* 배경 이미지 유지를 위해 주석 처리 */
    background-position: right center; /* 이미지 우측 정렬 추가 */
    /* sm 이상에서는 다시 기본 정렬로 */
    flex-direction: column;
    justify-content: center;
  }
}

/* Medium screens and up (md breakpoint in Tailwind is 768px) */
@media (min-width: 768px) {
  .main-hero {
    padding-top: 152px; /* md: 40px + 7rem (112px header) */
  }
}

.background-gradient {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 132, 255, 0.46);
  backdrop-filter: blur(1px);
  z-index: 1; /* 다른 콘텐츠와의 레이어 순서 명확화 */
}

/* 데스크탑용 그라데이션 오버레이 */
@media (min-width: 640px) {
  .background-gradient {
    background: linear-gradient(to right, 
      rgba(0, 80, 160, 0.75) 0%,    /* 왼쪽 시작: 진한 파란색 */
      rgba(0, 80, 160, 0.75) 40%,   /* 40%까지 진한 파란색 유지 */
      rgba(0, 80, 160, 0.3) 55%,   /* 55%에서 파란색 약하게 투명 */
      transparent 70%               /* 70%에서 완전 투명, 이후 이미지 노출 */
    );
    /* backdrop-filter: none; */ /* 데스크탑에서는 블러 효과를 제거할 수 있습니다 (선택 사항) */
  }
}

.floating-elements {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.floating-shape {
  position: absolute;
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  animation: float 15s infinite ease-in-out; 
}

.scroll-down-button-container {
  position: absolute; /* 변경: main-hero 기준으로 절대 위치 */
  bottom: 30px; /* 변경: 하단에서부터의 위치 */
  left: 50%;
  transform: translateX(-50%);
  z-index: 10; /* 다른 요소들 위에 오도록 */
}

.scroll-down-button {
  background-color: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.5);
  color: white;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.3s ease;
  animation: bounce 2s infinite;
}

.scroll-down-button:hover {
  background-color: rgba(255, 255, 255, 0.4);
  transform: translateY(-3px);
}

.scroll-down-button i {
  font-size: 20px;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-10px);
  }
  60% {
    transform: translateY(-5px);
  }
}

.shape-1 {
  width: 80px;
  height: 80px;
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 120px;
  height: 120px;
  top: 20%;
  right: 15%;
  animation-delay: -2s;
}

.shape-3 {
  width: 60px;
  height: 60px;
  bottom: 25%;
  left: 20%;
  animation-delay: -4s;
}

.shape-4 {
  width: 100px;
  height: 100px;
  bottom: 15%;
  right: 20%;
  animation-delay: -6s;
}

.shape-5 {
  width: 140px;
  height: 140px;
  top: 40%;
  left: 30%;
  animation-delay: -8s;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
  }
  25% {
    transform: translateY(-15px) rotate(5deg);
  }
  50% {
    transform: translateY(0) rotate(0deg);
  }
  75% {
    transform: translateY(15px) rotate(-5deg);
  }
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  margin-left: 15px;
  margin-right: 15px;
  padding-left: 15px;
  padding-right: 15px;
  position: relative;
  z-index: 10;
}

.hero-content {
  text-align: left;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  background-color: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(4px);
  padding: 0.5rem 1rem;
  border-radius: 9999px;
  margin-bottom: 1.5rem;
  color: white;
  font-weight: 600;
}

.badge-icon {
  margin-right: 0.5rem;
  font-size: 1.25rem;
}

.hero-title {
  display: flex;
  flex-direction: column;
  margin-bottom: 1.5rem;
  color: white;
}

.subtitle {
  font-size: 2.3rem;
  font-weight: 500;
  opacity: 0.9;
  margin-bottom: 0.5rem;
}

.main-title {
  font-size: 5rem;
  font-weight: 700;
  line-height: 1.2;
}

.main-title strong {
  color:rgb(191, 233, 255);
  position: relative;
  display: inline-block;
}

.title-underline {
  width: 100px;
  height: 4px;
  background: linear-gradient(to right, #bae6fd, #7dd3fc);
  margin: 1.5rem 0;
  border-radius: 2px;
}

.hero-description {
  font-size: 1.25rem;
  color: rgba(255, 255, 255, 0.9);
  max-width: 700px;
  margin: 0 0 2rem;
  line-height: 1.6;
}

.hero-actions {
  display: flex;
  justify-content: flex-start;
  gap: 1rem;
  margin-bottom: 3rem;
}

.primary-button, .secondary-button {
  display: flex;
  align-items: center;
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  font-weight: 600;
  transition: all 0.3s ease;
  cursor: pointer;
}

.primary-button {
  background-color: white;
  color: #0284c7;
  border: none;
}

.primary-button:hover {
  background-color: #f0f9ff;
  transform: translateY(-2px);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

.secondary-button {
  background-color: transparent;
  color: white;
  border: 2px solid rgba(255, 255, 255, 0.7);
}

.secondary-button:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.button-icon {
  margin-right: 0.5rem;
}

.content-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 2rem;
  margin-bottom: 3rem;
}

@media (min-width: 768px) {
  .content-grid {
    grid-template-columns: 1fr 1fr;
  }
}

.feature-card {
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(4px);
  border-radius: 1rem;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  transition: all 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-5px);
  background-color: rgba(255, 255, 255, 0.15);
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

.feature-icon {
  width: 3rem;
  height: 3rem;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  color: white;
  font-size: 1.25rem;
}

.feature-card h3 {
  font-size: 1.25rem;
  font-weight: 600;
  color: white;
  margin-bottom: 0.75rem;
}

.feature-card p {
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.6;
}

.image-card {
  position: relative;
  border-radius: 1rem;
  overflow: hidden;
  height: 100%;
  min-height: 350px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.main-image {
  transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
  transition: all 0.5s ease;
}

.main-image:hover {
  transform: perspective(1000px) rotateY(0) rotateX(0);
}

.image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(2, 132, 199, 0.7));
  z-index: 1;
}

.card-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.image-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 1.5rem;
  z-index: 2;
  color: white;
}

.image-icon {
  width: 3rem;
  height: 3rem;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  font-size: 1.25rem;
}

.image-content h3 {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.image-content p {
  font-size: 1rem;
  opacity: 0.9;
}

.highlight-section {
  margin-top: 2rem;
}

.highlight-card {
  display: flex;
  align-items: center;
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(4px);
  border-radius: 1rem;
  padding: 1.5rem;
  transition: all 0.3s ease;
}

.highlight-card:hover {
  background-color: rgba(255, 255, 255, 0.15);
  transform: translateY(-5px);
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

.highlight-icon {
  width: 3.5rem;
  height: 3.5rem;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 1.5rem;
  color: #bae6fd;
  font-size: 1.5rem;
  flex-shrink: 0;
}

.highlight-content h3 {
  font-size: 1.25rem;
  font-weight: 600;
  color: white;
  margin-bottom: 0.5rem;
}

.highlight-content p {
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.6;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  margin-left: 15px;
  margin-right: 15px;
  position: relative;
  z-index: 10;
}
  .main-title {
    font-size: 3rem;
  }

  .subtitle {
  font-size: 1.7rem;
  font-weight: 500;
  opacity: 0.9;
  margin-bottom: 0.5rem;
}
  
  .hero-actions {
    flex-direction: column;
    align-items: center;
  }
  
  .primary-button, .secondary-button {
    width: 100%;
    justify-content: center;
  }
  
  .highlight-card {
    flex-direction: column;
    text-align: center;
  }
  
  .highlight-icon {
    margin-right: 0;
    margin-bottom: 1rem;
  }
}
</style>