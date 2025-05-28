<template>
    <!-- Header 컴포넌트 - Remove activeSection and @navigate -->
    <HeaderComponent ref="header" :is-scrolled="isScrolled" @toggle-menu="toggleMenu" />
  
    <!-- Mobile Menu 컴포넌트 - Remove @navigate -->
    <MobileMenu :is-open="isMenuOpen" @close="toggleMenu" @help="onHelp" />
  
    <!-- Restore sequential sections with IDs -->
    <!-- <HeroSection id="home"/> -->
    <NewHeroSection id="home"/>
    <MissionPraySection3 id="mission-pray-section3"/>
    <!-- <PraySection id="pray"/> -->
    <!-- <SafetyGuideSection /> -->
    <!-- <SermonsSection id="sermons"/> -->
    <!-- <EventsSection id="events"/> -->
    <!-- <MinistriesSection id="ministries"/> -->
    <!-- <LocationSection id="location_" /> -->
    <!-- <LocationSection_ id="location" /> -->
    <!-- <ExpectationBoardSection id="expectations" /> -->
    
    <!-- <QnaSection id="qna" /> Add QnA section back here -->
    <!-- <ContactSection id="contact"/> -->
    <FooterComponent />
  
    <!-- Scroll to Top Button -->
    <button
      v-show="showScrollTopButton && !isMenuOpen"
      @click="scrollToTop"
      class="scroll-to-top-button"
    >
      <i class="fas fa-arrow-up"></i>
    </button>
  </template>
  
  <script>
  import NewHeroSection from '@/components/NewHeroSection.vue'
  import HeaderComponent from '@/components/HeaderComponent.vue'
  import MobileMenu from '@/components/MobileMenu.vue'
  import LocationSection from '@/components/LocationSection.vue'
  import ExpectationBoardSection from '@/components/ExpectationBoardSection.vue'
  import QnaSection from '@/components/QnaSection.vue' // Keep import
  import FooterComponent from '@/components/FooterComponent.vue'
  // import VideoSection from '@/components/VideoSection.vue'
  import SafetyGuideSection from '@/components/SafetyGuideSection.vue';
  import PraySection from '@/components/PraySection.vue';
  import MissionPraySection3 from '@/components/MissionPraySection3.vue';
  
  export default {
    components: {
      HeaderComponent,
      NewHeroSection,
      MobileMenu,
      MissionPraySection3,
      LocationSection,
      // LocationSection_,
      ExpectationBoardSection,
      PraySection,
      SafetyGuideSection,
      QnaSection, // Keep registration
      // ContactSection,
      FooterComponent
    },
    data() {
      return {
        isScrolled: false,
        isMenuOpen: false,
        showScrollTopButton: false, // 맨 위로 가기 버튼 표시 여부
      };
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
    beforeUnmount() {
      window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
      handleScroll() {
        this.isScrolled = window.scrollY > 50;
        this.showScrollTopButton = window.scrollY > 400; // 400px 이상 스크롤 시 버튼 표시
      },
      toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
      },
      // Scroll to Top Method
      scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: 'smooth',
        });
      },
      onHelp() {
        this.toggleMenu();
        this.$nextTick(() => {
          this.$refs.header.startTour();
        });
      },
    },
  };
  </script>
  
  <style>
  /* Global styles can go here */
  body {
    font-family: 'KoPubDotum', sans-serif;
    letter-spacing: -0.5px; /* Adjust letter spacing globally */
  }
  
  .hero-bg {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1503951914875-452162b0f3d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
    background-size: cover;
    background-position: center;
  }
  
  .sermon-card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
  }
  
  .nav-link {
    position: relative;
  }
  
  .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #4f46e5;
    transition: width 0.3s ease;
  }
  
  .nav-link:hover::after {
    width: 100%;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  
  .fade-in {
    animation: fadeIn 0.8s ease forwards;
  }
  
  /* LocationSection 배경 그라데이션 수정 */
  
  
  .dark #ministriesmap {
     background: linear-gradient(135deg, #1e3a8a 0%, #065f46 100%); /* 어두운 파란색에서 어두운 녹색으로 */
  }
  
  /* Scroll to Top Button Styles */
  .scroll-to-top-button {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: rgb(28 73 134 / var(--tw-bg-opacity, 1)); 
    color: white;
    width: 2.7rem; /* 48px */
    height: 2.7rem; /* 48px */
    border-radius: 50%;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(32, 88, 143, 0.4);
    z-index: 50;
    transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    opacity: 0.7;
  }
  
  .scroll-to-top-button:hover {
    opacity: 1;
    transform: scale(1.1);
  }
  
  .scroll-to-top-button i {
    font-size: 1.75rem; /* Adjust icon size if needed */
  }
  
  /* Fade in/out transition for the button */
  .v-enter-active,
  .v-leave-active {
    transition: opacity 0.5s ease;
  }
  
  .v-enter-from,
  .v-leave-to {
    opacity: 0;
  }
  </style>