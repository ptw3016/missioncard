
<template>
  <section class="mission-pray-section">
    
    <!-- 배경 그라디언트 -->
    <div class="background-gradient"></div>
    
    <!-- 떠다니는 장식 요소들 -->
    <div class="floating-elements">
      <div class="floating-shape shape-1"></div>
      <div class="floating-shape shape-2"></div>
      <div class="floating-shape shape-3"></div>
      <div class="floating-shape shape-4"></div>
    </div>
    
    <div class="container mx-auto px-4">
      <!-- 헤더 섹션 -->
      <div class="hero-badge">
        <span class="badge-icon">🙏</span>
        <span>가정별 기도제목</span>
      </div>
      
      <div class="section-header" data-aos="fade-up">
        <div class="welcome-text">
          <span class="greeting">예수님의 사랑을 전하는</span>
          <h1 class="main-title"><strong>2024년 제주도 국내 선교</strong><br>2024년 1월 3일 - 1월 8일</h1>
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
                <div class="hero-content text-center">
                  <div class="family-image">
                    <img src="@/assets/familycut1.jpg" alt="철수영희 가정" class="rounded-lg shadow-lg mx-auto" />
                  </div>
                  <h3 class="mt-4 text-xl font-bold">철수영희 가정</h3>
                  <p class="text-sm opacity-80">가정별 기도제목</p>
                </div>
              </div>
            </div>
          </div>

          <!-- 선교지 사진 카드 -->
          <div class="mission-image-card" data-aos="fade-up" data-aos-delay="300">
            <img src="@/assets/main_still_pc.png" alt="선교지 사진" class="rounded-lg shadow-lg w-full" />
          </div>
        </div>

        <!-- 오른쪽 컬럼 -->
        <div class="right-column">
          <!-- 말씀 카드 -->
          <div class="mission-card scripture-card" data-aos="fade-up" data-aos-delay="400">
            <div class="mission-content">
              <div class="mission-header">
                <h3>말씀</h3>
                <div class="mission-icon">✝️</div>
              </div>
              <blockquote>
                "그러므로 너희는 가서 모든 민족을 제자로 삼아 아버지와 아들과 성령의 이름으로 세례를 베풀고"
              </blockquote>
              <cite>— 마태복음 28장 19절</cite>
            </div>
          </div>

          <!-- 기도제목 카드 -->
          <div class="prayer-card" data-aos="fade-up" data-aos-delay="500">
            <div class="prayer-header">
              <h3>기도제목</h3>
              <div class="prayer-icon">🙏</div>
            </div>
            
            <div class="prayer-items">
              <div class="prayer-item">
                <div class="prayer-number">1</div>
                <div class="prayer-content">
                  <h4>하나님의 사랑을 전하는 가정이 되도록</h4>
                  <p>우리 가정이 제주 선교지에서 만나는 모든 이들에게 하나님의 사랑과 복음을 삶으로 전할 수 있도록 인도해 주세요.</p>
                </div>
              </div>
              
              <div class="prayer-item">
                <div class="prayer-number">2</div>
                <div class="prayer-content">
                  <h4>영적 전쟁에서 승리하는 믿음 주시도록</h4>
                  <p>선교지에서 겪게 될 영적 도전과 시험 가운데서도 흔들리지 않는 믿음을 가지고 항상 기도로 무장한 가정 되게 하소서.</p>
                </div>
              </div>
              
              <div class="prayer-item">
                <div class="prayer-number">3</div>
                <div class="prayer-content">
                  <h4>선교지에 필요한 것들을 채워주시도록</h4>
                  <p>제주 선교 사역을 위한 모든 필요(교통, 숙소, 건강, 물질 등)를 하나님께서 예비해 주시고 인도하여 주시기를 기도합니다.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- 후원 카드 -->
          <div class="support-card" data-aos="fade-up" data-aos-delay="600">
            <div class="support-header">
              <h4>후원 안내</h4>
              <div class="support-icon">💰</div>
            </div>
            <div class="support-content">
              <p class="account-info">후원계좌 : 1234 -123455 -123 (세모은행)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'MissionPraySection2',
}
</script>

<style scoped>
.mission-pray-section {
  position: relative;
  min-height: 100vh;
  padding-top: 104px;
  padding-bottom: 40px;
  background: linear-gradient(135deg, #0891b2 0%, #0ea5e9 25%, #38bdf8 50%, #7dd3fc 75%, #0284c7 100%);
  overflow: hidden;
}

/* Small screens and up */
@media (min-width: 640px) {
  .mission-pray-section {
    padding-top: 136px;
  }
}

/* Medium screens and up */
@media (min-width: 768px) {
  .mission-pray-section {
    padding-top: 152px;
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
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  pointer-events: none;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
}

.shape-1 {
  width: 300px;
  height: 300px;
  top: -100px;
  right: -100px;
}

.shape-2 {
  width: 200px;
  height: 200px;
  bottom: -50px;
  left: -50px;
}

.shape-3 {
  width: 150px;
  height: 150px;
  top: 30%;
  left: 10%;
}

.shape-4 {
  width: 100px;
  height: 100px;
  bottom: 20%;
  right: 10%;
}

.container {
  position: relative;
  z-index: 10;
  max-width: 1200px;
  margin: 0 auto;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  border-radius: 30px;
  padding: 8px 16px;
  margin-bottom: 20px;
}

.badge-icon {
  margin-right: 8px;
}

.section-header {
  margin-bottom: 40px;
}

.greeting {
  display: block;
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 10px;
}

.main-title {
  font-size: 2.5rem;
  font-weight: 300;
  color: white;
  line-height: 1.2;
}

.main-title strong {
  font-weight: 700;
}

.main-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 30px;
}

@media (min-width: 768px) {
  .main-grid {
    grid-template-columns: 1fr 1fr;
  }
}

.left-column, .right-column {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.hero-card, .mission-image-card, .scripture-card, .prayer-card, .support-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 30px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
}

.hero-card:hover, .mission-image-card:hover, .scripture-card:hover, .prayer-card:hover, .support-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.card-3d {
  perspective: 1000px;
}

.card-face {
  backface-visibility: hidden;
  transition: transform 0.6s;
}

.family-image img {
  width: 200px;
  height: 200px;
  object-fit: cover;
}

.mission-header, .prayer-header, .support-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.mission-header h3, .prayer-header h3, .support-header h4 {
  font-size: 1.5rem;
  font-weight: 600;
  color: white;
}

.mission-icon, .prayer-icon, .support-icon {
  font-size: 1.5rem;
}

blockquote {
  font-size: 1.2rem;
  font-style: italic;
  color: white;
  margin: 20px 0;
  line-height: 1.6;
}

cite {
  display: block;
  text-align: right;
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.8);
  margin-top: 10px;
}

.prayer-items {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.prayer-item {
  display: flex;
  gap: 15px;
}

.prayer-number {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  font-weight: bold;
  color: white;
  flex-shrink: 0;
}

.prayer-content h4 {
  font-size: 1.1rem;
  font-weight: 600;
  color: white;
  margin-bottom: 8px;
}

.prayer-content p {
  color: rgba(255, 255, 255, 0.9);
  line-height: 1.6;
}

.support-content {
  background: rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  padding: 15px;
  text-align: center;
}

.account-info {
  font-weight: 600;
  color: white;
}
</style>