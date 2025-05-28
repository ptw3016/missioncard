<template>
  <section class="church-intro">
    
    <!-- 배경 그라디언트 -->
    <div class="background-gradient"></div>
    
    <!-- 떠다니는 장식 요소들 -->
    <div class="floating-elements">
      <div class="floating-shape shape-1"></div>
      <div class="floating-shape shape-2"></div>
      <div class="floating-shape shape-3"></div>
      <div class="floating-shape shape-4"></div>
    </div>
    
    <div class="container">
      <!-- 헤더 섹션 -->
      <div class="hero-badge">
        <span class="badge-icon">🏝️</span>
        <span>가정별 기도제목</span>
      </div>
      <div class="section-header" data-aos="fade-up">
        <div class="welcome-text">
          <span class="greeting">예소마을</span>
          <h1 class="main-title"><strong>제주 선교</strong><br>8/8 - 8/13</h1>
        </div>
      </div>

      <!-- 메인 컨텐츠 그리드 -->
      <div class="main-grid">
        <!-- 왼쪽 컬럼 -->
        <div class="left-column">
          <!-- 메인 3D 카드 -->
          <div class="hero-card" data-aos="fade-up" data-aos-delay="200">
            <div class="card-3d">
              <div class="card-face front">
                <div class="hero-icon">
                  <div class="icon-3d">🏛️</div>
                </div>
                <div class="hero-content">
                  <h3>하나님의 사랑을<br>전하는 공동체</h3>
                  <p>1985년부터 지역과 함께</p>
                </div>
              </div>
            </div>
          </div>

          <!-- 최근 소식 카드 -->
          <div class="recent-card" data-aos="fade-up" data-aos-delay="300">
            <div class="card-header">
              <h4>최근 소식</h4>
              <span class="amount">새소식</span>
            </div>
            
            <div class="news-list">
              <div class="news-item">
                <div class="news-icon">📢</div>
                <div class="news-content">
                  <span class="news-title">주일예배 안내</span>
                  <span class="news-price">오전 11시</span>
                </div>
              </div>
              
              <div class="news-item">
                <div class="news-icon">🎵</div>
                <div class="news-content">
                  <span class="news-title">찬양팀 모집</span>
                  <span class="news-price">상시모집</span>
                </div>
              </div>
              
              <div class="news-item">
                <div class="news-icon">🤝</div>
                <div class="news-content">
                  <span class="news-title">봉사활동</span>
                  <span class="news-price">매월 둘째주</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 오른쪽 컬럼 -->
        <div class="right-column">
          <!-- 상단 통계 카드들 -->
          <div class="stats-row">
            <div class="stat-card purple" data-aos="fade-up" data-aos-delay="400">
              <div class="stat-icon">👥</div>
              <div class="stat-number">60+</div>
              <div class="stat-label">참여인원</div>
            </div>
            
            <div class="stat-card blue" data-aos="fade-up" data-aos-delay="500">
              <div class="stat-icon">📅</div>
              <div class="stat-number">38년</div>
              <div class="stat-label">역사</div>
            </div>
            
            <div class="stat-card green" data-aos="fade-up" data-aos-delay="600">
              <div class="stat-icon">🏢</div>
              <div class="stat-number">15</div>
              <div class="stat-label">부서</div>
            </div>
          </div>

          <!-- Google Analytics 스타일 카드 -->
          <div class="analytics-card" data-aos="fade-up" data-aos-delay="700">
            <div class="analytics-header">
              <div class="analytics-info">
                <span class="analytics-label">교회 성장률</span>
                <div class="analytics-badge">
                  <span class="badge-icon">📈</span>
                  <span>지속 성장</span>
                </div>
              </div>
            </div>
          </div>

          <!-- 수익 차트 스타일 카드 -->
          <div class="earning-card" data-aos="fade-up" data-aos-delay="800">
            <div class="earning-header">
              <h4>교회 현황</h4>
              <div class="trend-up">📈</div>
            </div>
            <div class="earning-amount">성장세</div>
            <div class="chart-area">
              <svg class="chart" viewBox="0 0 300 100">
                <path d="M0,80 Q75,60 150,40 T300,20" stroke="url(#gradient)" stroke-width="3" fill="none"/>
                <defs>
                  <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#0ea5e9"/>
                    <stop offset="100%" style="stop-color:#06b6d4"/>
                  </linearGradient>
                </defs>
                <circle cx="240" cy="30" r="4" fill="#0ea5e9"/>
              </svg>
            </div>
            <div class="chart-labels">
              <span>2020</span>
              <span>2021</span>
              <span>2022</span>
              <span>2023</span>
              <span>2024</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 하단 미션 카드 -->
      <div class="mission-card" data-aos="fade-up" data-aos-delay="900">
        <div class="mission-content">
          <div class="mission-header">
            <h3>우리의 비전</h3>
            <div class="mission-icon">✨</div>
          </div>
          <blockquote>
            "모든 민족으로 제자를 삼아 아버지와 아들과 성령의 이름으로 세례를 주고 
            내가 너희에게 분부한 모든 것을 가르쳐 지키게 하라"
          </blockquote>
          <cite>- 마태복음 28:19-20</cite>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.church-intro {
  position: relative;
  min-height: 100vh;
  padding-top: 104px;    /* Default: 40px (original) + 4rem (64px header) */
  padding-bottom: 40px;  /* Keep original bottom padding */
  padding-left: 15px;
  padding-right: 15px;
  background: linear-gradient(135deg, #0891b2 0%, #0ea5e9 25%, #38bdf8 50%, #7dd3fc 75%, #0284c7 100%);
  overflow: hidden;
}

/* Small screens and up (sm breakpoint in Tailwind is 640px) */
@media (min-width: 640px) {
  .church-intro {
    padding-top: 136px; /* sm: 40px + 6rem (96px header) */
  }
}

/* Medium screens and up (md breakpoint in Tailwind is 768px) */
@media (min-width: 768px) {
  .church-intro {
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
}

.section-header {
  margin-bottom: 40px;
}

.welcome-text {
  color: white;
}

.greeting {
  font-size: 1.2rem;
  font-weight: 500;
  opacity: 0.9;
  display: block;
  margin-bottom: 10px;
}

.main-title {
  font-size: 2.8rem;
  font-weight: 300;
  line-height: 1.2;
  margin: 0;
}

.main-title strong {
  font-weight: 700;
}

.main-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  margin-bottom: 40px;
}

.left-column {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.right-column {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

/* 3D 히어로 카드 */
.hero-card {
  height: 280px;
  perspective: 1000px;
}

.card-3d {
  width: 100%;
  height: 100%;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 0.6s;
}

.hero-card:hover .card-3d {
  transform: rotateY(5deg) rotateX(5deg);
}

.card-face {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.hero-icon {
  margin-bottom: 20px;
}

.icon-3d {
  font-size: 4rem;
  filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

.hero-content h3 {
  font-size: 1.8rem;
  font-weight: 600;
  color: white;
  margin-bottom: 10px;
  line-height: 1.3;
}

.hero-content p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1.1rem;
}

/* 최근 소식 카드 */
.recent-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 20px;
  padding: 25px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.card-header h4 {
  color: white;
  font-size: 1.3rem;
  font-weight: 600;
  margin: 0;
}

.amount {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  padding: 6px 12px;
  border-radius: 12px;
  font-size: 0.9rem;
  font-weight: 500;
}

.news-list {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.news-item {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 15px;
  background: white;
  border-radius: 16px;
  transition: all 0.3s ease;
}

.news-item:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateX(5px);
}

.news-icon {
  font-size: 1.5rem;
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.news-content {
  flex: 1;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.news-title {
  color: white;
  font-weight: 500;
}

.news-price {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.9rem;
}

/* 통계 카드들 */
.stats-row {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
}

.stat-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 20px;
  padding: 25px 20px;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.stat-card.purple {
  background: linear-gradient(135deg, rgba(6, 182, 212, 0.3), rgba(14, 165, 233, 0.3));
}

.stat-card.blue {
  background: linear-gradient(135deg, rgba(2, 132, 199, 0.3), rgba(56, 189, 248, 0.3));
}

.stat-card.green {
  background: linear-gradient(135deg, rgba(20, 184, 166, 0.3), rgba(45, 212, 191, 0.3));
}

.stat-icon {
  font-size: 2rem;
  margin-bottom: 10px;
}

.stat-number {
  font-size: 1.8rem;
  font-weight: 700;
  color: white;
  display: block;
  margin-bottom: 5px;
}

.stat-label {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.9rem;
}

/* Analytics 카드 */
.analytics-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 20px;
  padding: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.analytics-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.analytics-label {
  color: white;
  font-weight: 500;
  font-size: 1.1rem;
}

.analytics-badge {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(20, 184, 166, 0.2);
  color: rgba(20, 184, 166, 1);
  padding: 8px 12px;
  border-radius: 12px;
  font-size: 0.9rem;
  font-weight: 500;
}

/* 수익 차트 카드 */
.earning-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 20px;
  padding: 25px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.earning-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.earning-header h4 {
  color: white;
  font-size: 1.2rem;
  font-weight: 600;
  margin: 0;
}

.trend-up {
  font-size: 1.5rem;
}

.earning-amount {
  font-size: 2rem;
  font-weight: 700;
  color: white;
  margin-bottom: 20px;
}

.chart-area {
  height: 80px;
  margin-bottom: 15px;
}

.chart {
  width: 100%;
  height: 100%;
}

.chart path {
  stroke: url(#gradient);
}

.chart defs linearGradient stop:first-child {
  stop-color: #0ea5e9;
}

.chart defs linearGradient stop:last-child {
  stop-color: #06b6d4;
}

.chart circle {
  fill: #0ea5e9;
}

.chart-labels {
  display: flex;
  justify-content: space-between;
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.8rem;
}

/* 미션 카드 */
.mission-card {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 40px;
  text-align: center;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.mission-header {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 15px;
  margin-bottom: 25px;
}

.mission-header h3 {
  font-size: 1.8rem;
  font-weight: 600;
  color: white;
  margin: 0;
}

.mission-icon {
  font-size: 2rem;
}

blockquote {
  font-size: 1.2rem;
  line-height: 1.6;
  color: white;
  font-style: italic;
  margin: 0 0 15px 0;
  opacity: 0.9;
}

cite {
  color: rgba(255, 255, 255, 0.8);
  font-weight: 500;
  font-style: normal;
  font-size: 0.95rem;
}

.hero-badge {
  display: flex;
  align-items: center;
  width: fit-content;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 20px;
  padding: 8px 16px;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 16px;
  color: white;
  font-weight: 600;
}

.hero-badge .badge-icon {
  margin-right: 8px;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
  .main-title {
    font-size: 2.2rem;
  }
  
  .main-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .stats-row {
    grid-template-columns: 1fr;
  }
  
  .hero-card {
    height: 240px;
  }
  
  .hero-content h3 {
    font-size: 1.5rem;
  }
  
  .mission-card {
    padding: 30px 20px;
  }
  
  .mission-header {
    flex-direction: column;
    gap: 10px;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 0 15px;
  }
  
  .main-title {
    font-size: 1.8rem;
  }
  
  .stats-row {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .stat-card {
    padding: 20px 15px;
  }
  
  .recent-card,
  .analytics-card,
  .earning-card {
    padding: 20px 15px;
  }
}
</style>