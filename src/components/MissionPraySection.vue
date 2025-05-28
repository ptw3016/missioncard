
<template>
  <section class="mission-pray">
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
      <div class="pray-content" data-aos="fade-up">
        <div class="pray-badge">
          <span class="badge-icon">🙏</span>
          <span>기도제목</span>
        </div>
        
        <h2 class="pray-title">
          <span class="subtitle">예수님의 사랑을 전하는</span>
          <span class="main-title">2024년 제주도 <strong>국내 선교</strong></span>
          <span class="date">2024년 1월 3일 - 1월 8일</span>
        </h2>
        
        <div class="family-section">
          <h3 class="family-title">철수영희 가정별 기도제목</h3>
          
          <div class="family-content">
            <div class="family-image">
              <img src="@/assets/familycut1.jpg" alt="가족 사진" class="family-photo" />
            </div>
            
            <div class="mission-image">
              <img src="@/assets/main_still_pc.png" alt="선교지 사진" class="mission-photo" />
            </div>
          </div>
        </div>
        
        <div class="prayer-items" data-aos="fade-up" data-aos-delay="200">
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
        
        <div class="support-info" data-aos="fade-up" data-aos-delay="300">
          <div class="support-badge">후원 정보</div>
          <p class="support-account">후원계좌 : 1234 -123455 -123 (세모은행)</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.mission-pray {
  position: relative;
  min-height: 100vh;
  padding-top: 80px;
  padding-bottom: 80px;
  padding-left: 15px;
  padding-right: 15px;
  background: linear-gradient(135deg, #0e7490 0%, #0369a1 25%, #0c4a6e 50%, #075985 75%, #0c4a6e 100%);
  overflow: hidden;
  display: flex;
  align-items: center;
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

/* 기도 콘텐츠 스타일 */
.pray-content {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
  color: white;
}

.pray-badge {
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

.pray-title {
  display: flex;
  flex-direction: column;
  margin-bottom: 40px;
  line-height: 1.2;
}

.subtitle {
  font-size: 1.4rem;
  font-weight: 400;
  opacity: 0.9;
  margin-bottom: 10px;
}

.main-title {
  font-size: 3rem;
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

.family-section {
  margin-bottom: 50px;
}

.family-title {
  font-size: 1.8rem;
  font-weight: 600;
  margin-bottom: 30px;
  color: white;
}

.family-content {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 20px;
}

.family-image, .mission-image {
  width: 300px;
  height: 300px;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.family-image:hover, .mission-image:hover {
  transform: translateY(-10px);
}

.family-photo, .mission-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.prayer-items {
  display: flex;
  flex-direction: column;
  gap: 30px;
  margin-bottom: 50px;
}

.prayer-item {
  display: flex;
  gap: 20px;
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  text-align: left;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.prayer-item:hover {
  transform: translateY(-5px);
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

.support-info {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.support-badge {
  display: inline-block;
  background: rgba(255, 255, 255, 0.2);
  padding: 8px 16px;
  border-radius: 50px;
  margin-bottom: 15px;
  font-weight: 600;
}

.support-account {
  font-size: 1.3rem;
  font-weight: 500;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
  .family-content {
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }
  
  .family-image, .mission-image {
    width: 250px;
    height: 250px;
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
  
  .support-account {
    font-size: 1.1rem;
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
  
  .family-image, .mission-image {
    width: 200px;
    height: 200px;
  }
  
  .family-title {
    font-size: 1.5rem;
  }
}
</style>