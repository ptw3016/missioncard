
<template>
  <section id="mission-pray-section3" class="mission-pray scroll-mt-24 relative overflow-hidden">
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
          <span class="badge-icon">🙏</span>
          <span>선교 기도제목</span>
        </div>
        
        <h2 class="hero-title">
          <span class="subtitle">예수님의 사랑을 전하는</span>
          <span class="main-title">2024년 제주도 <strong>국내 선교</strong></span>
        </h2>
        
        <div class="title-underline"></div>
        
        <p class="hero-description">
          2024년 1월 3일 - 1월 8일
        </p>

        <div class="bible-verse" data-aos="fade-up" data-aos-delay="200">
          <p class="verse-text">
            "그러므로 너희는 가서 모든 민족을 제자로 삼아 아버지와 아들과 성령의 이름으로 세례를 베풀고"
          </p>
          <p class="verse-reference">— 마태복음 28장 19절</p>
        </div>
        
        <div class="hero-badge" data-aos="fade-up" data-aos-delay="300">
          <span class="badge-icon">👨‍👩‍👧‍👦</span>
          <span>철수영희 가정별 기도제목</span>
        </div>
      </div>
      
      <div class="content-grid">
        <!-- Images row for desktop -->
        <div class="images-row">
          <div class="family-card" data-aos="fade-right" data-aos-delay="200">
            <!-- <h3 class="family-title">철수영희 가정별 기도제목</h3> -->
            <div class="image-card family-image-card">
              <div class="image-overlay"></div>
              <img 
                src="@/assets/familycut1.jpg" 
                alt="철수영희 가족사진" 
                class="card-image"/>
              
              <div class="image-content">
                <div class="image-icon">
                  <i class="fas fa-heart"></i>
                </div>
                <h3>철수영희 가정</h3>
                <p>하나님의 사랑을 전하는 선교 가정</p>
              </div>
            </div>
          </div>

          <div class="family-card" data-aos="fade-right" data-aos-delay="200">
            <!-- <h3 class="family-title">제주도 선교지</h3> -->
            <div class="image-card family-image-card">
              <div class="image-overlay"></div>
              <img 
                src="@/assets/main_still_pc.png" 
                alt="제주도 선교지" 
                class="card-image"/>
              
              <div class="image-content">
                <div class="image-icon">
                  <i class="fas fa-cross"></i>
                </div>
                <h3>제주도 선교지</h3>
                <p>하나님의 사랑을 전하는 국내 선교지</p>
              </div>
            </div>
          </div>
          
          
        </div>
        
        <!-- Prayer content -->
        <div class="prayer-content-section">
          <div class="prayer-section" data-aos="fade-right" data-aos-delay="300">
            <div class="section-title">
              <h3>기도제목</h3>
              <div class="prayer-icon">🙏</div>
            </div>
            
            <div class="prayer-items">
              <div class="prayer-card" data-aos="fade-up" data-aos-delay="500">
                <div class="prayer-item">
                  <div class="prayer-number">1</div>
                  <div class="prayer-content">
                    <h4>하나님의 사랑을 전하는 가정이 되도록</h4>
                    <p>우리 가정이 제주 선교지에서 만나는 모든 이들에게 하나님의 사랑과 복음을 삶으로 전할 수 있도록 인도해 주세요.</p>
                  </div>
                </div>
              </div>
              
              <div class="prayer-card" data-aos="fade-up" data-aos-delay="550">
                <div class="prayer-item">
                  <div class="prayer-number">2</div>
                  <div class="prayer-content">
                    <h4>영적 전쟁에서 승리하는 믿음 주시도록</h4>
                    <p>선교지에서 겪게 될 영적 도전과 시험 가운데서도 흔들리지 않는 믿음을 가지고 항상 기도로 무장한 가정 되게 하소서.</p>
                  </div>
                </div>
              </div>
              
              <div class="prayer-card" data-aos="fade-up" data-aos-delay="600">
                <div class="prayer-item">
                  <div class="prayer-number">3</div>
                  <div class="prayer-content">
                    <h4>선교지에 필요한 것들을 채워주시도록</h4>
                    <p>제주 선교 사역을 위한 모든 필요(교통, 숙소, 건강, 물질 등)를 하나님께서 예비해 주시고 인도하여 주시기를 기도합니다.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="support-card" data-aos="fade-up" data-aos-delay="650">
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
.mission-pray {
  position: relative;
  min-height: 100vh;
  padding-top: 104px;
  padding-bottom: 60px;
  padding-left: 15px;
  padding-right: 15px;
  background: linear-gradient(135deg, #0891b2 0%, #0ea5e9 25%, #38bdf8 50%, #7dd3fc 75%, #0284c7 100%);
  overflow: hidden;
  display: flex;
  align-items: center;
}

/* Small screens and up */
@media (min-width: 640px) {
  .mission-pray {
    padding-top: 136px;
  }
}

/* Medium screens and up */
@media (min-width: 768px) {
  .mission-pray {
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
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  animation: float 15s infinite ease-in-out;
}

.shape-1 {
  width: 120px;
  height: 120px;
  top: 10%;
  left: 5%;
  animation-delay: 0s;
}

.shape-2 {
  width: 80px;
  height: 80px;
  top: 20%;
  right: 10%;
  animation-delay: -2s;
}

.shape-3 {
  width: 150px;
  height: 150px;
  bottom: 15%;
  left: 15%;
  animation-delay: -5s;
}

.shape-4 {
  width: 100px;
  height: 100px;
  bottom: 10%;
  right: 5%;
  animation-delay: -7s;
}

.shape-5 {
  width: 70px;
  height: 70px;
  top: 50%;
  left: 50%;
  animation-delay: -9s;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0) rotate(0deg);
  }
  50% {
    transform: translateY(-20px) rotate(10deg);
  }
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 10;
}

.hero-content {
  text-align: center;
  /* margin-bottom: 1rem; */
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50px;
  padding: 0.5rem 1rem;
  margin-bottom: 1.5rem;
  backdrop-filter: blur(5px);
}

.badge-icon {
  margin-right: 0.5rem;
  font-size: 1.2rem;
}

.hero-title {
  display: flex;
  flex-direction: column;
  margin-bottom: 1.5rem;
}

.subtitle {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: 0.5rem;
}

.main-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: white;
}

.main-title strong {
  color: #f0f9ff;
  position: relative;
  display: inline-block;
}

.title-underline {
  width: 80px;
  height: 4px;
  background: white;
  margin: 1.5rem auto;
  border-radius: 2px;
}

.hero-description {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.9);
  max-width: 600px;
  margin: 0 auto;
}

.bible-verse {
  max-width: 800px;
  margin: 2rem auto;
  padding: 1.5rem;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  backdrop-filter: blur(5px);
}

.verse-text {
  font-size: 1.2rem;
  font-style: italic;
  color: white;
  margin-bottom: 0.5rem;
}

.verse-reference {
  font-size: 1rem;
  color: rgba(255, 255, 255, 0.8);
  text-align: right;
}

.content-grid {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.images-row {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  width: 100%;
}

@media (min-width: 1024px) {
  .images-row {
    flex-direction: row;
    justify-content: center;
    gap: 2rem;
  }
  
  .family-card, .mission-card {
    width: 45%;
    max-width: 450px;
  }
  
  /* Make both image cards have the same aspect ratio and size */
  .image-card, .family-image-card {
    aspect-ratio: 1/1;
    height: 350px;
    width: 100%;
  }
}

.family-card, .mission-card {
  display: flex;
  flex-direction: column;
}

.family-card {
  background: transparent;
  border-radius: 10px;
  padding: 1.5rem;
}

.family-title {
  font-size: 1.5rem;
  font-weight: 600;
  color: white;
  margin-bottom: 1rem;
  text-align: center;
}

.family-image-card {
  aspect-ratio: 1/1;
  max-width: 350px;
  margin: 0 auto;
}

.prayer-content-section {
  width: 100%;
}

.prayer-section {
  margin-bottom: 30px;
}

.section-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 20px 30px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.section-title h3 {
  font-size: 1.8rem;
  font-weight: 600;
  color: white;
}

.prayer-icon {
  font-size: 1.8rem;
}

.prayer-items {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.prayer-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 30px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
}

.prayer-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.prayer-item {
  display: flex;
  gap: 20px;
  text-align: left;
}

.prayer-number {
  font-size: 2.5rem;
  font-weight: 700;
  color: rgba(255, 255, 255, 0.7);
  line-height: 1;
}

.prayer-content {
  flex: 1;
}

.prayer-content h4 {
  font-size: 1.4rem;
  font-weight: 600;
  margin-bottom: 10px;
  color: white;
}

.prayer-content p {
  font-size: 1.1rem;
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.8);
}

.support-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 30px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
  margin-bottom: 20px;
}

.support-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.support-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.support-header h4 {
  font-size: 1.5rem;
  font-weight: 600;
  color: white;
}

.support-icon {
  font-size: 1.5rem;
}

.support-content {
  background: rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  padding: 20px;
  text-align: center;
}

.account-info {
  font-size: 1.3rem;
  font-weight: 500;
  color: white;
}

.content-right {
  display: flex;
  align-items: center;
}

.image-card {
  position: relative;
  width: 100%;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  aspect-ratio: 3/4;
}

.image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(8, 145, 178, 0.6));
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
  padding: 2rem;
  z-index: 2;
  color: white;
}

.image-icon {
  width: 50px;
  height: 50px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  backdrop-filter: blur(5px);
}

.image-icon i {
  font-size: 1.5rem;
}

.image-content h3 {
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.image-content p {
  font-size: 1rem;
  opacity: 0.9;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .prayer-item {
    flex-direction: column;
    gap: 15px;
  }
  
  .prayer-number {
    font-size: 2rem;
  }
  
  .prayer-content h4 {
    font-size: 1.3rem;
  }
  
  .prayer-content p {
    font-size: 1rem;
  }
}
</style>