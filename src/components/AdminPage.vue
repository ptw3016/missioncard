<template>
  <section id="admin" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#e0f2f1] via-white to-[#e0f2f1]">
      <div class="absolute w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
          <div
            v-for="i in 5"
            :key="i"
            class="absolute rounded-full mix-blend-multiply animate-float"
            :class="[
              i % 2 === 0 ? 'bg-[#1e4e8f]' : 'bg-[#2a9d8f]',
              `w-${20 + i * 16} h-${20 + i * 16}`,
              `top-${(i * 15) % 80}`,
              `left-${(i * 20) % 80}`
            ]"
            :style="{
              animationDelay: `${i * 0.5}s`,
              animationDuration: `${8 + i}s`
            }"
          ></div>
        </div>
      </div>
    </div>

    <div class="container mx-auto px-2 md:p-4 relative z-10">
      <div class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700">
        <!-- Header -->
        <div class="text-center mb-16 relative scroll-reveal fade-up" data-delay="0.3">
          <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
            <i class="fas fa-lock text-[#2a9d8f] mr-2"></i>관리자 페이지
          </span>
          <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">관리자 대시보드</span>
          </h2>
          <div class="relative w-32 h-2 mx-auto mb-8">
            <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full animate-pulse"></div>
          </div>
          <p class="text-gray-600 max-w-2xl mx-auto text-lg">
            "흩어지는 예배" 웹사이트 콘텐츠 관리 시스템
          </p>
        </div>

        <!-- 로그인 폼 -->
        <div v-if="!isLoggedIn" class="max-w-md mx-auto scroll-reveal fade-up">
          <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-8 shadow-md border border-[#c2e9e5]">
            <h3 class="text-2xl font-bold text-[#1e4e8f] mb-6 text-center">로그인</h3>
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">아이디</label>
                <input
                  type="text"
                  v-model="username"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-transparent"
                  placeholder="관리자 아이디를 입력하세요"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">비밀번호</label>
                <input
                  type="password"
                  v-model="password"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-transparent"
                  placeholder="비밀번호를 입력하세요"
                />
              </div>
              <div v-if="loginError" class="text-red-500 text-sm text-center">{{ loginError }}</div>
              <button
                @click="login"
                class="w-full py-3 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4e8f] focus:outline-none"
              >
                <i class="fas fa-sign-in-alt mr-2"></i>로그인
              </button>
            </div>
          </div>
        </div>

        <!-- 대시보드 및 관리 -->
        <div v-if="isLoggedIn">
          <!-- 네비게이션 탭 -->
          <div class="flex flex-wrap border-b border-gray-200 mb-8">
            <button
              v-for="tab in tabs"
              :key="tab.id"
              @click="activeTab = tab.id"
              :class="[
                'px-6 py-3 font-medium text-sm rounded-t-lg transition-all duration-200',
                activeTab === tab.id
                  ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md'
                  : 'text-gray-600 hover:text-[#1e4e8f] hover:bg-gray-50'
              ]"
            >
              <i :class="['mr-2', tab.icon]"></i>{{ tab.name }}
            </button>
            <button
              @click="logout"
              class="ml-auto px-6 py-3 font-medium text-sm text-red-500 hover:text-red-700 hover:bg-red-50 rounded-t-lg transition-all duration-200"
            >
              <i class="fas fa-sign-out-alt mr-2"></i>로그아웃
            </button>
          </div>

          <!-- 1. 대시보드 개요 -->
          <div v-if="activeTab === 'dashboard'" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#1e4e8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">총 방문자 수</p>
                    <h4 class="text-3xl font-bold text-[#1e4e8f]">1,234</h4>
                  </div>
                  <div class="w-12 h-12 rounded-full bg-[#e0f2f1] flex items-center justify-center">
                    <i class="fas fa-users text-[#1e4e8f] text-xl"></i>
                  </div>
                </div>
                <div class="mt-4 text-sm text-green-600"><i class="fas fa-arrow-up mr-1"></i>12% 증가</div>
              </div>
              <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#2a9d8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">신규 등록자</p>
                    <h4 class="text-3xl font-bold text-[#2a9d8f]">56</h4>
                  </div>
                  <div class="w-12 h-12 rounded-full bg-[#c2e9e5] flex items-center justify-center">
                    <i class="fas fa-user-plus text-[#2a9d8f] text-xl"></i>
                  </div>
                </div>
                <div class="mt-4 text-sm text-green-600"><i class="fas fa-arrow-up mr-1"></i>8% 증가</div>
              </div>
              <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#1e4e8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-gray-500 text-sm">새 문의</p>
                    <h4 class="text-3xl font-bold text-[#1e4e8f]">12</h4>
                  </div>
                  <div class="w-12 h-12 rounded-full bg-[#e0f2f1] flex items-center justify-center">
                    <i class="fas fa-envelope text-[#1e4e8f] text-xl"></i>
                  </div>
                </div>
                <div class="mt-4 text-sm text-yellow-600"><i class="fas fa-minus mr-1"></i>변동 없음</div>
              </div>
            </div>
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm">
              <h3 class="text-xl font-bold text-[#1e4e8f] mb-4">최근 활동</h3>
              <div class="space-y-4">
                <div v-for="(activity, idx) in recentActivities" :key="idx" class="flex items-start p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                  <div class="w-10 h-10 rounded-full bg-[#e0f2f1] flex items-center justify-center mr-4">
                    <i :class="['text-[#1e4e8f]', activity.icon]"></i>
                  </div>
                  <div>
                    <p class="font-medium text-gray-800">{{ activity.title }}</p>
                    <p class="text-sm text-gray-500">{{ activity.time }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- 2. FAQ 관리 -->
          <div v-if="activeTab === 'faq'" class="space-y-8">
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-[#1e4e8f]">FAQ 관리</h3>
                <button class="px-4 py-2 bg-[#2a9d8f] text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                  <i class="fas fa-plus mr-2"></i>새 FAQ
                </button>
              </div>
              <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">제목</th>
                      <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">내용</th>
                      <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">작성일</th>
                      <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">작업</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tr v-for="(item, idx) in contentItems" :key="idx" class="hover:bg-gray-50 transition-colors duration-200">
                      <td class="py-3 px-4 text-sm text-gray-800">{{ item.title }}</td>
                      <td class="py-3 px-4 text-sm text-gray-600">{{ item.content }}</td>
                      <td class="py-3 px-4 text-sm text-gray-600">{{ item.date }}</td>
                      <td class="py-3 px-4 text-sm">
                        <button class="p-1 text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></button>
                        <button class="p-1 text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- 3. 소망 관리 -->
          <div v-if="activeTab === 'expectations'" class="space-y-8">
            <div class="bg-white p-6 rounded-xl shadow-sm">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-[#1e4e8f]">소망 관리</h3>
                <button class="px-4 py-2 bg-[#2a9d8f] text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                  <i class="fas fa-plus mr-2"></i>새 소망
                </button>
              </div>
              <!-- 검색바 개선 -->
              <div class="bg-white p-4 rounded-xl shadow-sm mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                  <!-- 검색 필드 선택 -->
                  <div class="flex-1 flex flex-col md:flex-row gap-3">
                    <div class="w-full md:w-auto">
                      <label class="block text-sm font-medium text-gray-600 mb-1">검색 필드</label>
                      <select v-model="searchField" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200">
                        <option value="name">이름</option>
                        <option value="message">메시지</option>
                        <option value="date">날짜</option>
                      </select>
                    </div>
                    
                    <!-- 날짜 검색 옵션 -->
                    <div v-if="searchField==='date'" class="flex-1 flex flex-col md:flex-row gap-3">
                      <div class="w-full md:w-auto">
                        <label class="block text-sm font-medium text-gray-600 mb-1">날짜 옵션</label>
                        <select v-model="dateOption" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200">
                          <option value="day">일별</option>
                          <option value="range">기간</option>
                          <option value="month">월별</option>
                        </select>
                      </div>
                      
                      <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">
                          {{ dateOption === 'day' ? '날짜 선택' : dateOption === 'range' ? '기간 선택' : '월 선택' }}
                        </label>
                        <div v-if="dateOption==='day'" class="flex">
                          <input type="date" v-model="dateFilter" class="flex-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-l-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200" />
                          <button @click="search" class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-r-lg hover:shadow-md transition-all duration-300">
                            검색
                          </button>
                        </div>
                        <div v-if="dateOption==='range'" class="flex items-center">
                          <div class="flex-1 flex items-center gap-2">
                            <input type="date" v-model="dateStart" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200" />
                            <span class="text-gray-500">~</span>
                            <input type="date" v-model="dateEnd" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-l-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200" />
                          </div>
                          <button @click="search" class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-r-lg hover:shadow-md transition-all duration-300">
                            검색
                          </button>
                        </div>
                        <div v-if="dateOption==='month'" class="flex">
                          <input type="month" v-model="monthFilter" class="flex-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-l-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200" />
                          <button @click="search" class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-r-lg hover:shadow-md transition-all duration-300">
                            검색
                          </button>
                        </div>
                      </div>
                    </div>
                    
                    <!-- 일반 검색 입력 -->
                    <div v-else class="flex-1">
                      <label class="block text-sm font-medium text-gray-600 mb-1">검색어</label>
                      <div class="relative flex">
                        <div class="relative flex-1">
                          <input v-model="searchQuery" type="text" placeholder="검색어를 입력하세요..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-l-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200" />
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                          </div>
                        </div>
                        <button @click="search" class="px-4 py-2 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white rounded-r-lg hover:shadow-md transition-all duration-300">
                          검색
                        </button>
                      </div>
                    </div>
                  </div>
                  
                  <!-- 페이지 크기 선택 -->
                  <div class="w-full md:w-auto">
                    <label class="block text-sm font-medium text-gray-600 mb-1">표시 개수</label>
                    <select v-model.number="pageSize" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200">
                      <option v-for="n in [5,10,20]" :key="n" :value="n">{{ n }}개씩 보기</option>
                    </select>
                  </div>
                </div>
              </div>
              
              <!-- 필터 옵션과 테이블을 같은 div로 합침 -->
              <div class="bg-white p-6 rounded-xl shadow-sm">
                <!-- 정렬 기준 -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-6">
                  <div class="w-full md:w-auto">
                    <label class="block text-sm font-medium text-gray-600 mb-1">정렬 기준</label>
                    <select 
                      v-model="activeFilter" 
                      @change="setFilter(activeFilter)"
                      class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2a9d8f] focus:border-[#2a9d8f] transition-all duration-200"
                    >
                      <option value="latest">최신순</option>
                      <option value="oldest">오래된순</option>
                      <option value="nameAsc">이름순</option>
                      <option value="nameDesc">이름역순</option>
                    </select>
                  </div>
                  
                  <div class="w-full md:w-auto flex items-center gap-2">
                    <span class="text-sm text-gray-500">총 {{ filteredExpectations.length }}개의 소망</span>
                    <div v-if="filteredExpectations.length > 0" class="h-4 w-px bg-gray-300 mx-2"></div>
                    <span v-if="filteredExpectations.length > 0" class="text-sm text-gray-500">{{ pageNumber }} / {{ totalPages }} 페이지</span>
                  </div>
                </div>
                
                <!-- 테이블 -->
                <div class="overflow-x-auto">
                  <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                      <tr>
                        <th @click="sortBy('name')" class="py-3 px-4 text-left text-sm font-medium text-gray-600 cursor-pointer">이름 <span v-if="sortKey==='name'">{{ sortAsc?'▲':'▼' }}</span></th>
                        <th @click="sortBy('message')" class="py-3 px-4 text-left text-sm font-medium text-gray-600 cursor-pointer">메시지 <span v-if="sortKey==='message'">{{ sortAsc?'▲':'▼' }}</span></th>
                        <th @click="sortBy('date')" class="py-3 px-4 text-left text-sm font-medium text-gray-600 cursor-pointer">작성일 <span v-if="sortKey==='date'">{{ sortAsc?'▲':'▼' }}</span></th>
                        <th class="py-3 px-4 text-left text-sm font-medium text-gray-600">작업</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                      <tr v-for="(exp, idx) in paginatedExpectations" :key="exp.id" class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-3 px-4 text-sm text-gray-800">{{ exp.name }}</td>
                        <td class="py-3 px-4 text-sm text-gray-600">{{ exp.message }}</td>
                        <td class="py-3 px-4 text-sm text-gray-600">{{ exp.date }}</td>
                        <td class="py-3 px-4 text-sm">
                          <button class="p-1 text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></button>
                          <button class="p-1 text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="flex justify-end items-center mt-4 space-x-2">
                  <button @click="prevPage" :disabled="pageNumber===1" class="px-3 py-1 border rounded disabled:opacity-50">이전</button>
                  <span>{{ pageNumber }} / {{ totalPages }}</span>
                  <button @click="nextPage" :disabled="pageNumber===totalPages" class="px-3 py-1 border rounded disabled:opacity-50">다음</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      isLoggedIn: false,
      username: '',
      password: '',
      loginError: '',
      activeTab: 'dashboard',
      tabs: [
        { id: 'dashboard', name: '대시보드', icon: 'fas fa-tachometer-alt' },
        { id: 'expectations', name: '소망 관리', icon: 'fas fa-seedling' },
        { id: 'faq', name: 'FAQ 관리', icon: 'fas fa-question-circle' }
      ],
      recentActivities: [
        { title: '새 방문자 5명이 등록했습니다', time: '10분 전', icon: 'fas fa-user-plus' },
        { title: '콘텐츠가 업데이트되었습니다', time: '1시간 전', icon: 'fas fa-file-alt' },
        { title: '새 문의가 접수되었습니다', time: '3시간 전', icon: 'fas fa-envelope' },
        { title: '시스템 백업이 완료되었습니다', time: '6시간 전', icon: 'fas fa-database' }
      ],
      contentItems: [
        { title: '흩어지는 예배 소개', content: '흩어지는 예배 소개입니다.', date: '2023-04-15' },
        { title: '예배 일정 안내', content: '예배 일정 안내입니다.', date: '2023-04-10' },
        { title: '새 예배 장소 안내', content: '새 예배 장소 안내입니다.', date: '2023-04-05' },
        { title: '자주 묻는 질문', content: '자주 묻는 질문입니다.', date: '2023-03-28' }
      ],
      expectations: [],
      searchField: 'name',
      searchQuery: '', // 입력 필드용
      activeSearchQuery: '', // 실제 검색에 사용
      dateOption: 'day',
      dateFilter: '',
      activeDateFilter: '',
      dateStart: '',
      activeDateStart: '',
      dateEnd: '',
      activeDateEnd: '',
      monthFilter: '',
      activeMonthFilter: '',
      pageNumber: 1,
      pageSize: 10,
      sortKey: 'date',
      sortAsc: true,
      activeFilter: 'latest' // 기본 필터는 최신순
    };
  },
  mounted() {
    this.initScrollReveal();
    this.fetchExpectations();
  },
  methods: {
    initScrollReveal() {
      const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
      const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const delay = el.dataset.delay || 0;
            setTimeout(() => el.classList.add('revealed'), delay * 1000);
            obs.unobserve(el);
          }
        });
      }, observerOptions);
      document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
    },
    fetchExpectations() {
      axios
        .get('https://parktw3016.cafe24.com/spread0608/api/expectations.php', { params: { action: 'fetch_expectations' } })
        .then(res => { if (res.data.success) this.expectations = res.data.expectations.map(x => ({ id: x.id, name: x.name, message: x.message, date: x.created_at })); })
        .catch(err => console.error(err));
    },
    prevPage() { if (this.pageNumber > 1) this.pageNumber--; },
    nextPage() { if (this.pageNumber < this.totalPages) this.pageNumber++; },
    login() {
      if (this.username === 'admin' && this.password === 'asdf') {
        this.isLoggedIn = true;
        this.loginError = '';
        this.$nextTick(() => this.initScrollReveal());
      } else {
        this.loginError = '아이디 또는 비밀번호가 올바르지 않습니다.';
      }
    },
    logout() {
      this.isLoggedIn = false;
      this.username = '';
      this.password = '';
    },
    sortBy(key) {
      if (this.sortKey === key) this.sortAsc = !this.sortAsc;
      else { this.sortKey = key; this.sortAsc = true; }
    },
    search() {
      // 입력된 검색 값을 실제 검색에 사용할 값으로 복사
      this.activeSearchQuery = this.searchQuery;
      this.activeDateFilter = this.dateFilter;
      this.activeDateStart = this.dateStart;
      this.activeDateEnd = this.dateEnd;
      this.activeMonthFilter = this.monthFilter;
      this.pageNumber = 1; // 검색 시 첫 페이지로 이동
    },
    setFilter(filter) {
      this.activeFilter = filter;
      this.pageNumber = 1; // 필터 변경 시 첫 페이지로 이동
      
      // 필터에 따라 정렬 키와 정렬 방향 설정
      switch(filter) {
        case 'latest':
          this.sortKey = 'date';
          this.sortAsc = false;
          break;
        case 'oldest':
          this.sortKey = 'date';
          this.sortAsc = true;
          break;
        case 'nameAsc':
          this.sortKey = 'name';
          this.sortAsc = true;
          break;
        case 'nameDesc':
          this.sortKey = 'name';
          this.sortAsc = false;
          break;
      }
    }
  },
  computed: {
    filteredExpectations() {
      if (this.searchField === 'date') {
        if (this.dateOption === 'day') {
          if (!this.activeDateFilter) return this.expectations;
          return this.expectations.filter(exp => exp.date.slice(0,10) === this.activeDateFilter);
        } else if (this.dateOption === 'range') {
          return this.expectations.filter(exp => {
            const d = exp.date.slice(0,10);
            return (!this.activeDateStart || d >= this.activeDateStart) && (!this.activeDateEnd || d <= this.activeDateEnd);
          });
        } else if (this.dateOption === 'month') {
          if (!this.activeMonthFilter) return this.expectations;
          return this.expectations.filter(exp => exp.date.slice(0,7) === this.activeMonthFilter);
        }
      }
      return this.expectations.filter(exp => {
        const val = exp[this.searchField] || '';
        return val.toString().includes(this.activeSearchQuery);
      });
    },
    sortedExpectations() {
      return [...this.filteredExpectations].sort((a,b) => {
        if (a[this.sortKey] < b[this.sortKey]) return this.sortAsc ? -1 : 1;
        if (a[this.sortKey] > b[this.sortKey]) return this.sortAsc ? 1 : -1;
        return 0;
      });
    },
    totalPages() {
      return Math.ceil(this.filteredExpectations.length / this.pageSize) || 1;
    },
    paginatedExpectations() {
      const start = (this.pageNumber - 1) * this.pageSize;
      return this.sortedExpectations.slice(start, start + this.pageSize);
    }
  },
  watch: {
    activeTab(newTab) { if (newTab === 'expectations') this.fetchExpectations(); },
    pageSize() { this.pageNumber = 1; }
    // searchQuery watch 제거
  }
};
</script>

<style scoped>
@keyframes float {
  0% { transform: translateY(0) translateX(0); }
  50% { transform: translateY(-20px) translateX(10px); }
100% { transform: translateY(0) translateX(0); }
}
.animate-float { animation: float 6s ease-in-out infinite; }

.scroll-reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease, transform 0.8s ease;
}
.scroll-reveal.revealed {
  opacity: 1;
  transform: translateY(0);
}
.fade-up.revealed { animation: fadeUp 0.8s ease forwards; }
.fade-right.revealed { animation: fadeRight 0.8s ease forwards; }
.fade-left.revealed { animation: fadeLeft 0.8s ease forwards; }

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeRight {
  from { opacity: 0; transform: translateX(-30px); }
  to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeLeft {
  from { opacity: 0; transform: translateX(30px); }
  to { opacity: 1; transform: translateX(0); }
}

.hover\:rotate-x-1:hover { transform: rotateX(1deg); }
</style>