<template>
  <section class="mission-hero">
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
          <span>제주 선교</span>
        </div>
        
        <h1 class="hero-title">
          <span class="subtitle">예수님의 사랑을 전하는</span>
          <span class="main-title">제주도 <strong>선교 여행</strong></span>
          <span class="date">2024년 8월 8일 - 8월 13일</span>
        </h1>
        
        <p class="hero-description">
          아름다운 제주에서 함께하는 선교 활동에 여러분을 초대합니다.
          하나님의 말씀을 전하고 지역 주민들과 소통하며 사랑을 나누는 특별한 시간이 될 것입니다.
        </p>
        
        <div class="hero-actions">
          <button class="primary-button">
            <span class="button-icon">✉️</span>
            <span>참가 신청하기</span>
          </button>
          <button class="secondary-button">
            <span class="button-icon">📋</span>
            <span>일정 확인하기</span>
          </button>
        </div>
      </div>
      
      <div class="hero-cards" data-aos="fade-up" data-aos-delay="200">
        <div class="hero-card-wrapper">
          <div class="hero-card">
            <div class="card-icon">🙏</div>
            <h3>기도와 예배</h3>
            <p>매일 아침 함께 드리는 예배와 기도 시간을 통해 영적으로 성장합니다.</p>
          </div>
        </div>
        
        <div class="hero-card-wrapper" data-aos-delay="300">
          <div class="hero-card">
            <div class="card-icon">🤝</div>
            <h3>봉사 활동</h3>
            <p>지역 주민들을 위한 다양한 봉사 활동으로 그리스도의 사랑을 실천합니다.</p>
          </div>
        </div>
        
        <div class="hero-card-wrapper" data-aos-delay="400">
          <div class="hero-card">
            <div class="card-icon">🌊</div>
            <h3>자연 체험</h3>
            <p>아름다운 제주의 자연을 경험하며 하나님의 창조 섭리를 느낍니다.</p>
          </div>
        </div>
      </div>
      
      <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
        <div class="stat-item">
          <div class="stat-number">6</div>
          <div class="stat-label">일간 일정</div>
        </div>
        
        <div class="stat-divider"></div>
        
        <div class="stat-item">
          <div class="stat-number">30+</div>
          <div class="stat-label">참가 인원</div>
        </div>
        
        <div class="stat-divider"></div>
        
        <div class="stat-item">
          <div class="stat-number">10+</div>
          <div class="stat-label">활동 프로그램</div>
        </div>
      </div>
    </div>
  </section>
</template>

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

.date {
  font-size: 1.6rem;
  font-weight: 500;
  opacity: 0.9;
}

.hero-description {
  font-size: 1.2rem;
  line-height: 1.6;
  max-width: 700px;
  margin: 0 auto 32px;
  opacity: 0.9;
}

.hero-actions {
  display: flex;
  justify-content: center;
  gap: 16px;
  margin-bottom: 40px;
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

/* 히어로 카드 스타일 */
.hero-cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-bottom: 60px;
}

.hero-card-wrapper {
  perspective: 1000px;
}

.hero-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.6s;
  transform-style: preserve-3d;
  height: 100%;
}

.hero-card-wrapper:hover .hero-card {
  transform: rotateY(5deg) rotateX(5deg);
}

.card-icon {
  font-size: 3rem;
  margin-bottom: 20px;
  filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

.hero-card h3 {
  font-size: 1.5rem;
  font-weight: 600;
  color: white;
  margin-bottom: 12px;
}

.hero-card p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1rem;
  line-height: 1.5;
}

/* 히어로 통계 스타일 */
.hero-stats {
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  max-width: 700px;
  margin: 0 auto;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.stat-item {
  flex: 1;
  text-align: center;
  color: white;
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
  height: 50px;
  background: rgba(255, 255, 255, 0.3);
}

/* 반응형 디자인 */
@media (max-width: 768px) {
  .hero-cards {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .main-title {
    font-size: 2.5rem;
  }
  
  .subtitle {
    font-size: 1.2rem;
  }
  
  .date {
    font-size: 1.3rem;
  }
  
  .hero-actions {
    flex-direction: column;
    gap: 12px;
  }
  
  .hero-stats {
    flex-direction: column;
    gap: 20px;
  }
  
  .stat-divider {
    width: 80%;
    height: 1px;
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
  
  .date {
    font-size: 1.1rem;
  }
  
  .hero-description {
    font-size: 1rem;
  }
}
</style>
