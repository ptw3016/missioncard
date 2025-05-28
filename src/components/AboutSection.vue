<template>
  <section id="mission-section" class="mission-hero scroll-mt-24 relative overflow-hidden">
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
      <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">
          <span class="badge-icon">🏝️</span>
          <span>선교지소개</span>
        </div>
        
        <h2 class="hero-title">
          <span class="subtitle">함께 모이고 흩어지며 세상을 변화시키는</span>
          <span class="main-title">제주도 <strong>교회</strong></span>
        </h2>
        
        <div class="title-underline"></div>
        
        <p class="hero-description">
          함께 모이고 흩어지며 세상을 변화시키는 신앙 공동체
        </p>
      </div>
      
      <div class="content-grid">
        <div class="content-left">
          <div class="quote-card" data-aos="fade-right" data-aos-delay="200">
            <p>
              <i class="fas fa-quote-left text-blue-400 mr-2 opacity-50"></i>
              제주는 아름다운 자연환경 속에서 선교의 새로운 기회를 제공하는 곳입니다.
              우리는 제주의 독특한 문화와 환경 속에서 하나님의 사랑을 전하며, 지역 주민들과 함께 신앙 공동체를 이루어 나갑니다.
            </p>
          </div>
          
          <div class="quote-card" data-aos="fade-right" data-aos-delay="400">
            <p>
              <i class="fas fa-quote-left text-sky-400 mr-2 opacity-50"></i>
              제주 선교는 관광지를 넘어 영적 필요가 있는 곳에 복음을 전하는 사명입니다.
              섬 곳곳에 흩어진 작은 마을들과 지역사회에서 그리스도의 빛을 비추며, 
              기도와 예배, 섬김을 통해 제주 땅에 하나님 나라를 세워가는 일에 함께해 주세요.
            </p>
          </div>
          
          <div class="hero-actions" data-aos="fade-up" data-aos-delay="600">
            <button class="primary-button">
              <span class="button-icon"><i class="fas fa-plus-circle"></i></span>
              <span>더 알아보기</span>
            </button>
            <button class="secondary-button">
              <span class="button-icon"><i class="fas fa-phone-alt"></i></span>
              <span>연락하기</span>
            </button>
          </div>
        </div>
        
        <div class="content-right" data-aos="fade-left" data-aos-delay="300">
          <div class="image-card">
            <div class="image-overlay"></div>
            <img 
              src="@/assets/churchbg.jpg" 
              alt="제주교회" 
              class="card-image"/>
            
            <div class="image-content">
              <div class="image-icon">
                <i class="fas fa-heart"></i>
              </div>
              <h3>제주 교회</h3>
              <p>우리는 모든 삶의 영역에서 그리스도의 제자로 살아갑니다</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Stats section -->
      <div class="stats-section">
        <div class="stats-header" data-aos="fade-up">
          <h3>제주 선교 현황</h3>
          <div class="stats-underline"></div>
        </div>
        
        <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-number">5+</div>
            <div class="stat-label">지역 공동체</div>
          </div>
          
          <div class="stat-divider"></div>
          
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">100+</div>
            <div class="stat-label">활동 멤버</div>
          </div>
          
          <div class="stat-divider"></div>
          
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-hands-helping"></i>
            </div>
            <div class="stat-number">10+</div>
            <div class="stat-label">사역 프로젝트</div>
          </div>
          
          <div class="stat-divider"></div>
          
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-handshake"></i>
            </div>
            <div class="stat-number">3+</div>
            <div class="stat-label">협력 단체</div>
          </div>
        </div>
      </div>
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
    }
  }
}
</script>

<style scoped>
.mission-hero {
  position: relative;
  min-height: 100vh;
  padding-top: 104px;    /* Default: 40px (original) + 4rem (64px header) */
  padding-bottom: 60px;
  padding-left: 15px;
  padding-right: 15px;
  background: linear-gradient(135deg, #0891b2 0%, #0ea5e9 25%, #38bdf8 50%, #7dd3fc 75%, #0284c7 100%);
  overflow: hidden;
  display: flex;
  align-items: center;
}

/* Small screens and up (sm breakpoint in Tailwind is 640px) */
@media (min-width: 640px) {
  .mission-hero {
    padding-top: 136px; /* sm: 40px + 6rem (96px header) */
  }
}

/* Medium screens and up (md breakpoint in Tailwind is 768px) */
@media (min-width: 768px) {
  .mission-hero {
    padding-top: 152px; /* md: 40px + 7rem (112px header) */
  }
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
  top: 70%;
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

/* 히어로 콘텐츠 스타일 */
.hero-content {
  max-width: 800px;
  margin: 0 auto 60px;
  text-align: center;
  color: white;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.2);
  padding: 8px 16px;
  border-radius: 50px;
  margin-bottom: 24px;
  backdrop-filter: blur(5px);
}

.badge-icon {
  font-size: 1.2rem;
}

.hero-title {
  display: flex;
  flex-direction: column;
  margin-bottom: 24px;
  line-height: 1.2;
}

.subtitle {
  font-size: 1.4rem;
  font-weight: 400;
  opacity: 0.9;
  margin-bottom: 10px;
}

.main-title {
  font-size: 3.5rem;
  font-weight: 300;
  margin-bottom: 15px;
}

.main-title strong {
  font-weight: 700;
}

.title-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(to right, #38bdf8, #0ea5e9);
  margin: 0 auto 24px;
  border-radius: 2px;
}

.hero-description {
  font-size: 1.2rem;
  line-height: 1.6;
  max-width: 700px;
  margin: 0 auto 32px;
  opacity: 0.9;
}

/* 콘텐츠 그리드 */
.content-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 60px;
}

.content-left {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.quote-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.quote-card:hover {
  transform: translateY(-5px);
}

.quote-card p {
  color: white;
  font-size: 1.1rem;
  line-height: 1.6;
}

.hero-actions {
  display: flex;
  gap: 16px;
  margin-top: 16px;
}

.primary-button, .secondary-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px 24px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  transition: all 0.3s ease;
  cursor: pointer;
  border: none;
}

.primary-button {
  background: white;
  color: #0891b2;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.secondary-button {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  backdrop-filter: blur(5px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.primary-button:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.secondary-button:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: translateY(-3px);
}

.button-icon {
  font-size: 1.2rem;
}

/* 이미지 카드 */
.content-right {
  perspective: 1000px;
}

.image-card {
  position: relative;
  height: 450px;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.6s;
  transform-style: preserve-3d;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.content-right:hover .image-card {
  transform: rotateY(5deg) rotateX(5deg);
}

.image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(8, 145, 178, 0.6));
  z-index: 1;
}

.card-image {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.7s ease-in-out;
}

.image-card:hover .card-image {
  transform: scale(1.1);
}

.image-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 30px;
  z-index: 2;
  color: white;
  transform: translateY(5px);
  opacity: 0.95;
  transition: all 0.3s ease;
}

.image-card:hover .image-content {
  transform: translateY(0);
  opacity: 1;
}

.image-icon {
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}

.image-content h3 {
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.image-content p {
  font-size: 1.1rem;
  opacity: 0.9;
}

/* 통계 섹션 */
.stats-section {
  margin-top: 80px;
}

.stats-header {
  text-align: center;
  margin-bottom: 40px;
}

.stats-header h3 {
  font-size: 2rem;
  font-weight: 700;
  color: white;
  margin-bottom: 16px;
}

.stats-underline {
  width: 60px;
  height: 3px;
  background: linear-gradient(to right, #38bdf8, #0ea5e9);
  margin: 0 auto;
  border-radius: 2px;
}

.hero-stats {
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  max-width: 900px;
  margin: 0 auto;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.stat-item {
  flex: 1;
  text-align: center;
  color: white;
}

.stat-icon {
  width: 50px;
  height: 50px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 16px;
  font-size: 1.5rem;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.stat-label {
  font-size: 1rem;
  opacity: 0.8;
}

.stat-divider {
  width: 1px;
  height: 80px;
  background: rgba(255, 255, 255, 0.3);
}

/* 반응형 디자인 */
@media (max-width: 768px) {
  .content-grid {
    grid-template-columns: 1fr;
    gap: 40px;
  }
  
  .hero-stats {
    flex-direction: column;
    gap: 30px;
  }
  
  .stat-divider {
    width: 80%;
    height: 1px;
  }
  
  .main-title {
    font-size: 2.5rem;
  }
  
  .subtitle {
    font-size: 1.2rem;
  }
  
  .hero-actions {
    flex-direction: column;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 15px;
  }
  
  .main-title {
    font-size: 2rem;
  }
  
  .subtitle {
    font-size: 1rem;
  }
  
  .hero-description {
    font-size: 1rem;
  }
  
  .quote-card p {
    font-size: 1rem;
  }
}
</style>
