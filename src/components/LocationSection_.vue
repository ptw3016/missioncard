<template>
  <section id="location" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#e0f2f1] via-white to-[#e0f2f1]">
      <div class="absolute inset-0 bg-gradient-to-br from-[#e0f2f1] via-white to-[#e0f2f1]">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- Animated circles -->
          <div v-for="i in 3" :key="i" 
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
               }">
          </div>
        </div>
      </div>
    </div>
    
    <div class="container mx-auto px-2 md:p-4 relative z-10">
      <div>
        <div v-if="selectedRegion">
          <!-- 선택된 지역에 대한 내용 표시 (필요시 구현) -->
        </div>
        <div v-else class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700">
          <!-- Header section with floating elements -->
          <div class="text-center mb-14 relative scroll-reveal fade-up">
            <!-- Floating decorative elements -->
            <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#e0f2f1] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
            <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#c2e9e5] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
            
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-wind text-[#2a9d8f] mr-2"></i>흩어지는 예배 참여교회
            </span>
            
            <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">Spread out!</span>
            </h2>
            
            <div class="relative w-32 h-2 mx-auto mb-8">
              <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full"></div>
              <div class="absolute inset-0 bg-gradient-to-r from-[#2a9d8f] to-[#1e4e8f] rounded-full animate-pulse"></div>
            </div>
            
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
              성령의 바람을 타고 <br class="sm:hidden">전국 각지로 흩어지는 <br class="sm:hidden">예배 참여교회를 확인하세요
            </p>
          </div>

          <!-- 지도 + 네비게이션 바 & 교회 목록 컨테이너 -->
          <div class="mt-1 flex flex-col md:flex-row justify-start">

            <!-- 왼쪽: 지도 + 네비게이션 바 컬럼 -->
            <div class="flex flex-col w-full md:w-1/2 mb-4 md:mb-0 md:mr-2 transition-all duration-300 scroll-reveal fade-right" data-delay="0.2">
              <!-- 도구 모음 - 개선된 컨트롤 패널 -->
              <div class="absolute top-3 left-3 z-20">
                <div class="glass-panel rounded-xl py-2 px-3 flex space-x-2 border border-white border-opacity-40 shadow-lg">
                  <button @click="zoomIn" class="map-control-button p-2 rounded-lg hover:bg-white hover:bg-opacity-30 transition-all duration-300 group">
                    <i class="fas fa-search-plus text-[#1e4e8f] group-hover:text-[#173d72]"></i>
                  </button>
                  <button @click="zoomOut" class="map-control-button p-2 rounded-lg hover:bg-white hover:bg-opacity-30 transition-all duration-300 group">
                    <i class="fas fa-search-minus text-[#1e4e8f] group-hover:text-[#173d72]"></i>
                  </button>
                  <div class="h-8 w-px bg-white bg-opacity-30 mx-1"></div>
                  <button @click="resetMap" class="map-control-button p-2 rounded-lg hover:bg-white hover:bg-opacity-30 transition-all duration-300 group">
                    <i class="fas fa-redo text-[#1e4e8f] group-hover:text-[#173d72]"></i>
                  </button>
                  <button v-if="!showButtons" @click="goBack" class="map-control-button p-2 rounded-lg hover:bg-white hover:bg-opacity-30 transition-all duration-300 group">
                    <i class="fas fa-arrow-left text-[#1e4e8f] group-hover:text-[#173d72]"></i>
                  </button>
                  <button v-if="!showButtons" @click="openEditCoordsModal" class="map-control-button p-2 rounded-lg hover:bg-white hover:bg-opacity-30 transition-all duration-300 group">
                    <i class="fas fa-cog text-[#1e4e8f] group-hover:text-[#173d72]"></i>
                  </button>
                </div>
              </div>
              
              <div class="flex flex-col w-full">
                <div
                  class="h-96 overflow-auto rounded-xl border border-white border-opacity-30 bg-white bg-opacity-20 backdrop-blur-md cursor-grab active:cursor-grabbing custom-scrollbar-transparent relative shadow-xl"
                  ref="imageContainer"
                  style="scrollbar-width: thin; scrollbar-color: transparent transparent; position: relative; touch-action: none;"
                  @mousedown.prevent="startDrag"
                  @mousemove="onDrag"
                  @mouseup="endDrag"
                  @mouseleave="endDrag"
                  @touchstart.prevent="startDrag"
                  @touchmove="onDrag"
                  @touchend="endDrag"
                  @wheel="handleWheelZoom"
                  @dblclick.prevent
                >
                  <!-- 지도+버튼을 감싸는 래퍼 -->
                  <div
                    class="map-inner"
                    :style="mapInnerStyle"
                    @mousedown.prevent="startDrag"
                    @mousemove="onDrag"
                    @mouseup="endDrag"
                    @mouseleave="endDrag"
                    @touchstart.prevent="startDrag"
                    @touchmove="onDrag"
                    @touchend="endDrag"
                  >
                    <!-- 지도 이미지 -->
                    <img
                      :src="currentMap"
                      alt="Korea Map"
                      class="w-auto h-auto max-w-none transition-opacity duration-500"
                      style="user-select: none; -webkit-user-drag: none;"
                      draggable="false"
                      @load="updateFixedListHeight"
                    />
                    
                    <!-- 메인 버튼 -->
                    <transition-group name="map-buttons" tag="div">
                      <button
                        v-if="showButtons"
                        v-for="btn in buttonPositions"
                        :key="btn.id"
                        :class="[
                          'map-button absolute text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 hover:-translate-y-1',
                          selectedButtonId === btn.id ? 'ring-4 ring-white' : ''
                        ]"
                        :style="buttonStyle(btn, 'main')"
                        @mousedown.stop
                        @touchstart.stop
                        @click="onMapButtonClick(btn)"
                      >
                        <span
                          :class="[
                            'flex items-center justify-center w-full h-full rounded-full px-6 md:px-6',
                            btn.id === 'diocese'
                              ? (selectedButtonId === 'diocese'
                                  ? 'bg-gradient-to-br from-yellow-500 to-yellow-300 text-white'
                                  : 'bg-gradient-to-br from-yellow-400 to-yellow-200 text-white')
                              : btn.id === 'frct'
                                ? (selectedButtonId === 'frct'
                                    ? 'bg-gradient-to-br from-green-500 to-lime-400 text-white'
                                    : 'bg-gradient-to-br from-green-400 to-lime-300 text-white')
                                : (selectedButtonId === btn.id
                                    ? 'bg-gradient-to-br from-[#173d72] to-[#1e4e8f] text-white'
                                    : 'bg-gradient-to-br from-[#1e4e8f] to-[#173d8f] text-white')
                          ]"
                        >
                          {{ btn.label }}
                        </span>
                      </button>
                    </transition-group>
                    
                    <!-- 상세 버튼 -->
                    <transition-group name="fade" tag="div">
                      <button
                        v-if="!showButtons"
                        v-for="btn in sortedSubRegions"
                        :key="btn.id"
                        :class="[
                          'region-button absolute text-white rounded-full shadow-lg transition-all duration-300 transform hover:shadow-xl hover:scale-110 hover:-translate-y-1',
                          selectedSubButtonId === btn.id ? 'ring-4 ring-white z-20' : 'opacity-60 hover:opacity-100'
                        ]"
                        :style="buttonStyle(btn, 'detail')"
                        @mousedown.stop
                        @touchstart.stop
                        @click="onSubRegionButtonClick(btn)"
                      >
                        <span class="flex items-center justify-center w-full h-full bg-gradient-to-br from-[#2a9d8f] to-[#217f73] rounded-full px-8 md:px-5">
                          {{ btn.label }}
                        </span>
                      </button>
                    </transition-group>
                  </div>
                </div>
                <!-- Navigation Bar -->
                <div class="relative mt-4 w-full scroll-reveal fade-up" data-delay="0.1">
                  <!-- Navigation Buttons Container - Buttons grow evenly -->
                  <div 
                    ref="mainNavRef" 
                    tabindex="0"
                    class="glass-panel py-3 px-3 flex items-center gap-1 w-full z-10 overflow-x-auto custom-scrollbar-thin transition-all duration-300"
                    :class="selectedButtonId && regionButtons[selectedButtonId] ? 'rounded-t-xl' : 'rounded-xl'"
                  >
                    
                    <!-- '전체' Button -->
                    <button
                      class="nav-button sticky left-0 z-20 rounded-lg shadow-sm transition-all duration-300 whitespace-nowrap px-2 py-1.5 text-sm border border-transparent flex-grow flex-basis-0 text-center"
                      :class="selectedButtonId === null ? 'glass-active-button' : 'bg-blue-200 text-gray-800'"
                      @click="goBack"
                    >
                      전체
                    </button>
                    <!-- Diocese Nav Button -->
                    <button
                      class="nav-button sticky left-[3.25rem] z-10 rounded-lg shadow-sm transition-all duration-300 whitespace-nowrap mr-3 px-2 py-1.5 text-sm flex-grow flex-basis-0 text-center"
                      :class="selectedButtonId === 'diocese'
                        ? 'bg-gradient-to-br from-yellow-500 to-yellow-300 text-white'
                        : 'bg-yellow-100 text-yellow-800'"
                      @click="onMapButtonClick(buttonPositions.find(b => b.id === 'diocese'))"
                    >
                      담당별
                    </button>
                    <!-- Region Buttons -->
                    <button
                      v-for="btn in sortedButtonPositions.filter(b => b.id !== 'diocese')"
                      :key="btn.id"
                      class="nav-button rounded-lg shadow-sm transition-all duration-300 whitespace-nowrap relative px-2 py-1.5 text-sm flex-grow flex-basis-0 text-center"
                      :class="btn.id === 'frct'
                        ? (selectedButtonId === 'frct'
                            ? 'bg-gradient-to-br from-green-500 to-lime-400 text-white'
                            : 'border border-green-500 text-green-500')
                        : (selectedButtonId === btn.id
                            ? 'glass-active-button'
                            : 'bg-gray-100 text-gray-700')"
                      @click="onMapButtonClick(btn)"
                      :data-id="btn.id"
                    >
                      {{ btn.label }}
                    </button>
                  </div>
                  <!-- Dropdown Sub-buttons -->
                  <transition name="dropdown">
                    <div 
                      v-if="selectedButtonId && regionButtons[selectedButtonId]" 
                      ref="dropdownRef"
                      class="w-full glass-panel-light py-3 px-5 rounded-b-xl shadow-glass mt-1 z-0" 
                    >
                      <div class="flex flex-wrap gap-2 mb-4"> 
                        <button
                          v-for="subBtn in sortedSubRegions"
                          :key="subBtn.id + '-sub'" 
                          :class="[
                            'sub-nav-button rounded-full shadow-lg transition-all duration-300 transform hover:shadow-xl hover:scale-110 hover:-translate-y-1 px-2 py-1 text-sm text-white',
                            selectedSubButtonId === subBtn.id
                              ? 'ring-4 ring-white z-20 bg-gradient-to-br from-[#2a9d8f] to-[#217f73]'
                              : 'bg-[#c2e9e5] text-gray-700 hover:bg-[#a5d8d3]'
                          ]"
                          @click="onSubRegionButtonClick(subBtn)"
                          :data-id="subBtn.id" 
                        >
                          {{ subBtn.label }}
                        </button>
                      </div>
                    </div>
                  </transition>
                </div>
              </div>
            </div>

            <!-- 오른쪽: 교회 목록 또는 안내 메시지 -->
            
            <div
               ref="churchListRef"
               tabindex="0"
               :style="{ height: fixedListHeight }"
               class="w-full md:w-1/2 md:ml-2 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl shadow-lg border border-white border-opacity-30 p-6 transition-all duration-300 scroll-reveal fade-left overflow-y-auto"
               data-delay="0.4"
            >
              <!-- 조건부 렌더링: 하위 지역 선택 시 -->
              <div v-if="(selectedSubButtonId || selectedButtonId === 'frct') && !isDioceseListVisible" class="h-full flex flex-col">
                <!-- 헤더 (선택된 지역 이름 표시) -->
                <div class="flex items-center mb-4">
                   <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
                      <i class="fas fa-seedling text-white"></i>
                   </div>
                   <h3 class="text-xl font-bold text-[#1e4e8f]">{{ getSelectedRegionName() }}</h3>
                </div>

                <!-- 인용구 -->
                <div class="mb-6 bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f]">
                  <p class="text-gray-700 italic">
                    <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
                    성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.
                  </p>
                </div>

                <!-- 교회 목록 스크롤 영역 -->
                <div class="overflow-y-auto flex-grow custom-scrollbar-thin" ref="churchListScroll" tabindex="0">
                  <!-- 로딩 중 표시 -->
                  <div v-if="isLoading" class="flex flex-col items-center justify-center h-full">
                      <div class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-[#1e4e8f]"></div>
                      <p class="text-gray-600 mt-4">교회 목록을 불러오는 중...</p>
                  </div>
                  <!-- 에러 발생 시 표시 -->
                  <div v-else-if="errorLoading" class="flex flex-col items-center justify-center h-full">
                       <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-4">
                         <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                       </div>
                       <p class="text-red-600">{{ errorLoading }}</p>
                       <p class="text-gray-500 text-center mt-2">문제가 지속되면 관리자에게 문의해주세요.</p>
                  </div>
                  <!-- 교회 목록 표시 (selectedChurches 사용) -->
                  <div v-else-if="!isLoading && selectedButtonId === 'frct' && selectedChurches.length > 0" class="space-y-6">
                    <!-- 국가별 탭 네비게이션 -->
                    <div class="mb-4 overflow-x-auto custom-scrollbar-thin">
                      <div class="flex space-x-2 pb-2">
                        <button 
                          class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                          :class="selectedCountry === null ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                          @click="selectedCountry = null"
                        >
                          <i class="fas fa-globe mr-2"></i>
                          전체
                        </button>
                        <button 
                          v-for="(churches, country) in groupOverseasChurches" 
                          :key="'tab-'+country" 
                          class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                          :class="selectedCountry === country ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                          @click="selectedCountry = country"
                        >
                          <i class="fas fa-globe-asia mr-2"></i>
                          {{ country }}
                        </button>
                      </div>
                    </div>
                    
                    <div v-for="(churches, country) in filteredOverseasChurches" :key="country" class="bg-white bg-opacity-40 rounded-lg p-5 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200">
                      <div class="flex items-center mb-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-lime-400 flex items-center justify-center mr-3">
                          <i class="fas fa-globe-asia text-white"></i>
                        </div>
                        <h4 class="text-lg font-semibold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-500">{{ country }}</h4>
                      </div>
                      <ul class="space-y-2">
                        <li v-for="church in churches" :key="church.church_id" class="flex items-center py-2 px-3 bg-white bg-opacity-60 rounded-md hover:bg-opacity-80 transition-all duration-300">
                          <i class="fas fa-church text-green-500 mr-3"></i>
                          <span class="text-gray-700">{{ church.church_name }}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div v-else-if="!isLoading && selectedButtonId === 'diocese' && Object.keys(dioceses).length > 0" class="space-y-6">
                    <div v-for="(churches, diocese) in dioceses" :key="diocese" class="bg-white bg-opacity-40 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200">
                      <h4 class="text-lg font-semibold text-yellow-600 mb-2">{{ diocese }}</h4>
                      <ul class="list-disc list-inside text-gray-700">
                        <li v-for="church in churches" :key="church.church_id" class="py-1">{{ church.church_name }}</li>
                      </ul>
                    </div>
                  </div>
                  <div v-else-if="!isLoading && selectedChurches.length > 0" class="space-y-4">
                    <div
                      v-for="church in selectedChurches"
                      :key="church.id"  
                      class="bg-white bg-opacity-40 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200"
                    >
                      <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-[#e0f2f1] flex items-center justify-center mr-3 mt-1">
                          <i class="fas fa-church text-[#1e4e8f]"></i>
                        </div>
                        <div class="flex-grow">
                          <!-- API 필드 이름 사용: church_name, address 등 -->
                          <h4 class="text-lg font-bold text-[#1e4e8f]">{{ church.church_name }}</h4>
                          <p class="text-gray-600 text-sm mb-1"><strong>목사:</strong> {{ church.pastor_name || '정보 없음' }}</p>
                          <p class="text-gray-600 text-sm mb-2"><strong>주소:</strong> {{ church.address || '정보 없음' }}</p>
                          <!-- <p class="text-gray-600 text-sm mb-2"><strong>연락처:</strong> {{ church.pastor_contact || '정보 없음' }}</p> -->
                          <button @click="toggleExpand(church.id)" class="text-sm text-[#1e4e8f] font-medium mt-1">
                            {{ expandedChurchId === church.id ? '접기' : '더보기' }}
                          </button>
                          <div v-if="expandedChurchId === church.id" class="mt-2 space-y-2">
                            <p class="text-gray-600 text-sm mb-2"><strong>담당:</strong> {{ church.diocese || '' }} </p>
                            <p class="text-gray-600 text-sm mb-2"><strong>예배시간:</strong> {{ church.service_time || '정보 없음' }} | <strong>수용인원:</strong> {{ church.capacity || '정보 없음' }}</p>
                            <!-- <p class="text-gray-600 text-sm mb-2"><strong>방문확인:</strong> {{ church.visit_confirmed === 'O' ? '확인됨' : '미확인' }} | <strong>섬지역:</strong> {{ church.is_island === 'O' ? '예' : '아니오' }}</p> -->
                            <p class="text-gray-600 text-sm mb-2"><strong>섬지역:</strong> {{ church.is_island === '섬' ? 'O' : 'X' }}</p>
                            <p class="text-gray-600 text-sm italic mb-2"><strong>*추가정보-</strong>{{ church.parking_info || '' }}</p>
                            <!-- <p class="text-gray-600 text-sm mb-2"><strong>결연/그룹:</strong> {{ church.affiliation_details || '정보 없음' }} / {{ church.group_name || '정보 없음' }}</p> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- 교회 목록 없음 메시지 -->
                  <div v-else class="flex flex-col items-center justify-center h-full">
                    <div class="w-16 h-16 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-4">
                      <i class="fas fa-seedling text-[#1e4e8f] text-2xl"></i>
                    </div>
                    <p class="text-gray-600 text-center">이 지역에는 아직 등록된 교회가 없습니다.</p>
                    <p class="text-[#1e4e8f] text-center mt-2 font-medium">곧 새로운 예배 공동체가 피어날 예정입니다!</p>
                  </div>
                </div>
              </div>

              <!-- 조건부 렌더링: 담당별 목록 선택 시 -->
              <div v-else-if="isDioceseListVisible" class="h-full flex flex-col">
                <!-- 담당별 목록 컨테이너 -->
                <div class="overflow-y-auto flex-grow custom-scrollbar-thin" ref="dioceseListScroll" tabindex="0">
                  <div v-if="isLoading" class="flex flex-col items-center justify-center h-full">
                    <div class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-[#1e4e8f]"></div>
                    <p class="text-gray-600 mt-4">교회 목록을 불러오는 중...</p>
                  </div>
                  <div v-else-if="errorLoading" class="flex flex-col items-center justify-center h-full">
                    <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-4">
                      <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                    </div>
                    <p class="text-red-600">{{ errorLoading }}</p>
                    <p class="text-gray-500 text-center mt-2">문제가 지속되면 관리자에게 문의해주세요.</p>
                  </div>
                  <div v-else-if="!isLoading && Object.keys(filteredDioceses).length > 0" class="space-y-6">
                    <!-- 헤더 (선택된 지역 이름 표시) -->
                <div class="flex items-center mb-4">
                   <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
                      <i class="fas fa-seedling text-white"></i>
                   </div>
                   <h3 class="text-xl font-bold text-[#1e4e8f]">{{ getSelectedRegionName() }}</h3>
                </div>
                    <!-- 인용구 -->
                    <div class="mb-6 bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f]">
                      <p class="text-gray-700 italic">
                        <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
                        성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.
                      </p>
                    </div>
                    <!-- 탭 네비게이션: 전체 / 담당별 -->
                    <div class="mb-4 overflow-x-auto custom-scrollbar-thin">
                      <div class="flex space-x-2 pb-2">
                        <button class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                          :class="selectedDiocese===null ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                          @click="selectedDiocese = null">
                          <i class="fas fa-church mr-2"></i>전체
                        </button>
                        <button
                          v-for="(churches, diocese) in dioceses" 
                          :key="'tab-'+diocese" 
                          class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                          :class="selectedDiocese===diocese ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                          @click="selectedDiocese = diocese">
                          <i class="fas fa-church mr-2"></i>{{ diocese }}
                        </button>
                      </div>
                    </div>
                    
                    <div v-for="(churches, dioceseName) in filteredDioceses" :key="dioceseName" class="bg-white bg-opacity-40 rounded-lg p-5 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200">
                      <div class="flex items-center mb-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#2a9d8f] flex items-center justify-center mr-3">
                          <i class="fas fa-church text-white"></i>
                        </div>
                        <h4 class="text-lg font-semibold bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">{{ dioceseName }} ({{ churches.length }})</h4>
                      </div>
                      <ul class="space-y-2">
                        <li
                          v-for="church in churches"
                          :key="church.id"
                          @click="toggleExpand(church.id)"
                          class="cursor-pointer flex flex-col py-2 px-3 bg-white bg-opacity-60 rounded-md hover:bg-opacity-80 transition-all duration-300"
                        >
                          <div class="flex items-center">
                            <i class="fas fa-church text-[#1e4e8f] mr-3"></i>
                            <button type="button" class="px-3 py-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white text-sm rounded-full shadow hover:shadow-lg transition-all duration-300">
                              {{ church.church_name }}
                            </button>
                          </div>
                          <div v-if="expandedChurchId === church.id" class="mt-2 space-y-2">
                            <p class="text-gray-600 text-sm mb-2"><strong>목사:</strong> {{ church.pastor_name || '정보 없음' }}</p>
                            <p class="text-gray-600 text-sm mb-2"><strong>주소:</strong> {{ church.address || '정보 없음' }}</p>
                            <p class="text-gray-600 text-sm mb-2"><strong>담당:</strong> {{ church.diocese || '' }}</p>
                            <p class="text-gray-600 text-sm mb-2"><strong>예배시간:</strong> {{ church.service_time || '정보 없음' }} | <strong>수용인원:</strong> {{ church.capacity || '정보 없음' }}</p>
                            <p class="text-gray-600 text-sm mb-2"><strong>섬지역:</strong> {{ church.is_island === 'O' ? 'O' : 'X' }}</p>
                            <p class="text-gray-600 text-sm italic mb-2"><strong>*추가정보-</strong>{{ church.parking_info || '' }}</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div v-else class="flex flex-col items-center justify-center h-full">
                    <i class="fas fa-info-circle text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-600">등록된 교구가 없습니다.</p>
                  </div>
                </div>
              </div>

              <!-- 조건부 렌더링: 상위 지역만 선택 시 -->
              <div v-else-if="selectedButtonId" class="h-full flex flex-col">
                  <!-- 헤더 (선택된 지역 이름 표시) -->
                  <div class="flex items-center mb-4">
                     <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
                        <i class="fas fa-map-marked-alt text-white"></i>
                     </div>
                     <h3 class="text-xl font-bold text-[#1e4e8f]">{{ buttonPositions.find(b => b.id === selectedButtonId)?.label || '지역' }} 안내</h3>
                  </div>
                  
                  <!-- 인용구 -->
                  <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#1e4e8f] mb-6">
                    <p class="text-gray-700">
                      원하시는 세부 지역을 선택하시면 해당 지역의 교회 정보를 확인하실 수 있습니다.
                    </p>
                  </div>
                  
                  <!-- 안내 메시지 -->
                  <div class="flex-grow flex flex-col items-center justify-center">
                    <div class="w-20 h-20 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-6 animate-pulse">
                      <i class="fas fa-hand-point-up text-[#1e4e8f] text-3xl"></i>
                    </div>
                    <p class="text-[#1e4e8f] text-center font-medium">지도에서 지역을 선택해주세요</p>
                    <p class="text-gray-600 text-center mt-2">또는 상단 네비게이션에서 선택할 수 있습니다</p>
                  </div>
              </div>

              <!-- 조건부 렌더링: 아무것도 선택 안했을 시 -->
              <div v-else class="h-full flex flex-col">
                  <!-- 헤더 (흩어지는 예배 참여교회) -->
                  <div class="flex items-center mb-4">
                     <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
                        <i class="fas fa-wind text-white"></i>
                     </div>
                     <h3 class="text-xl font-bold text-[#1e4e8f]">흩어지는 예배 참여교회</h3>
                  </div>
                  
                  <!-- 인용구 -->
                  <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f] mb-6">
                    <p class="text-gray-700 italic">
                      <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
                      물리적 확장: 예배가 예배당에 머무르지 않고 삶의 현장, 도시, 이웃의 삶 속으로 흩어짐
                    </p>
                  </div>
                  
                  <!-- 안내 메시지 -->
                  <div class="space-y-4 mb-6">
                    <div class="flex items-start">
                      <div class="w-8 h-8 rounded-full bg-[#e0f2f1] flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-map-marker-alt text-[#1e4e8f]"></i>
                      </div>
                      <div>
                        <h4 class="text-lg font-semibold text-[#1e4e8f]">전국 참여교회</h4>
                        <p class="text-gray-600">지도에서 지역을 선택하여 각 지역의 예배 공동체를 확인하세요.</p>
                      </div>
                    </div>
                    
                    <div class="flex items-start">
                      <div class="w-8 h-8 rounded-full bg-[#c2e9e5] flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-seedling text-[#2a9d8f]"></i>
                      </div>
                      <div>
                        <h4 class="text-lg font-semibold text-[#2a9d8f]">성장하는 공동체</h4>
                        <p class="text-gray-600">성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.</p>
                      </div>
                    </div>
                    
                    <div class="flex items-start">
                      <div class="w-8 h-8 rounded-full bg-[#a5d8d3] flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-heart text-[#57c4aa]"></i>
                      </div>
                      <div>
                        <h4 class="text-lg font-semibold text-[#57c4aa]">함께하는 방법</h4>
                        <p class="text-gray-600">가까운 지역의 예배 공동체에 참여하거나 새로운 공동체를 시작할 수 있습니다.</p>
                      </div>
                    </div>
                  </div>
                  
                  <!-- 버튼 -->
                  <div class="mt-auto text-center">
                    <button class="px-6 py-3 bg-gradient-to-r from-[#1e4e8f] to-[#173d72] text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4e8f] focus:outline-none">
                      <span class="flex items-center justify-center">
                        <i class="fas fa-map-marked-alt mr-2"></i>
                        <span>지역 탐색하기</span>
                      </span>
                    </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 모바일 모달 -->
  <div v-if="isMobile && showMobileModal && (selectedSubButtonId || selectedButtonId === 'frct' || selectedButtonId === 'diocese')" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <!-- 배경 오버레이 -->
    <div class="absolute inset-0 bg-black bg-opacity-50" @click="showMobileModal = false"></div>
    
    <!-- 모달 컨텐츠 -->
    <div class="relative w-full max-w-md max-h-[80vh] bg-white rounded-xl shadow-2xl overflow-hidden z-10 transform transition-all">
      <!-- 모달 헤더 -->
      <div class="px-6 py-4 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white">
        <div class="flex items-center justify-between">
          <h3 class="text-xl font-bold">{{ getSelectedRegionName() }}</h3>
          <button @click="showMobileModal = false" class="text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      
      <!-- 모달 바디 -->
      <div class="p-6 overflow-y-auto" style="max-height: calc(80vh - 60px);">
        <!-- 로딩 중 표시 -->
        <div v-if="isLoading" class="flex flex-col items-center justify-center py-10">
          <div class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-[#1e4e8f]"></div>
          <p class="text-gray-600 mt-4">교회 목록을 불러오는 중...</p>
        </div>
        
        <!-- 에러 발생 시 표시 -->
        <div v-else-if="errorLoading" class="flex flex-col items-center justify-center py-10">
          <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-4">
            <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
          </div>
          <p class="text-red-600 text-center">{{ errorLoading }}</p>
          <p class="text-gray-500 text-center mt-2">문제가 지속되면 관리자에게 문의해주세요.</p>
        </div>
        
        <!-- 교회 목록 표시 -->
        <div v-else-if="!isLoading && selectedButtonId === 'frct' && selectedChurches.length > 0" class="space-y-6">
          
          <!-- 헤더 -->
          <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
              <i class="fas fa-seedling text-white"></i>
            </div>
            <h3 class="text-xl font-bold text-[#1e4e8f]">{{ getSelectedRegionName() }}</h3>
          </div>
          <!-- 인용구 -->
          <div class="mb-6 bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f]">
            <p class="text-gray-700 italic">
              <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
              성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.
            </p>
          </div>
          <!-- 국가별 탭 네비게이션 -->
          <div class="mb-4 overflow-x-auto custom-scrollbar-thin">
            <div class="flex space-x-2 pb-2">
              <button 
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                :class="selectedCountry === null ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                @click="selectedCountry = null"
              >
                <i class="fas fa-globe mr-2"></i>
                전체
              </button>
              <button 
                v-for="(churches, country) in groupOverseasChurches" 
                :key="'tab-'+country" 
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                :class="selectedCountry === country ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                @click="selectedCountry = country"
              >
                <i class="fas fa-globe-asia mr-2"></i>
                {{ country }}
              </button>
            </div>
          </div>
          
          <div v-for="(churches, country) in filteredOverseasChurches" :key="country" class="bg-white bg-opacity-40 rounded-lg p-5 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-lime-400 flex items-center justify-center mr-3">
                <i class="fas fa-globe-asia text-white"></i>
              </div>
              <h4 class="text-lg font-semibold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-500">{{ country }}</h4>
            </div>
            <ul class="space-y-2">
              <li v-for="church in churches" :key="church.church_id" class="flex items-center py-2 px-3 bg-white bg-opacity-60 rounded-md hover:bg-opacity-80 transition-all duration-300">
                <i class="fas fa-church text-green-500 mr-3"></i>
                <span class="text-gray-700">{{ church.church_name }}</span>
              </li>
            </ul>
          </div>
        </div>
        <div v-else-if="!isLoading && selectedButtonId === 'diocese'" class="h-full flex flex-col">
          <div v-if="Object.keys(filteredDioceses).length > 0" class="space-y-6">
          <!-- 헤더 -->
          <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
              <i class="fas fa-seedling text-white"></i>
            </div>
            <h3 class="text-xl font-bold text-[#1e4e8f]">{{ getSelectedRegionName() }}</h3>
          </div>
          <!-- 인용구 -->
          <div class="mb-6 bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f]">
            <p class="text-gray-700 italic">
              <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
              성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.
            </p>
          </div>
          <!-- 탭 네비게이션 -->
          <div class="mb-4 overflow-x-auto custom-scrollbar-thin">
            <div class="flex space-x-2 pb-2">
              <button
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                :class="selectedDiocese===null ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                @click="selectedDiocese = null"
              >
                <i class="fas fa-church mr-2"></i>전체
              </button>
              <button
                v-for="(churches, diocese) in dioceses"
                :key="'tab-'+diocese"
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 whitespace-nowrap flex items-center"
                :class="selectedDiocese===diocese ? 'bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white shadow-md' : 'bg-white bg-opacity-60 text-gray-700 hover:bg-opacity-80'"
                @click="selectedDiocese = diocese"
              >
                <i class="fas fa-church mr-2"></i>{{ diocese }}
              </button>
            </div>
          </div>
          <!-- 담당별 리스트 -->
          <div v-for="(churches, dioceseName) in filteredDioceses" :key="dioceseName" class="bg-white bg-opacity-40 rounded-lg p-5 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#2a9d8f] flex items-center justify-center mr-3">
                <i class="fas fa-church text-white"></i>
              </div>
              <h4 class="text-lg font-semibold bg-clip-text text-transparent bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f]">{{ dioceseName }} ({{ churches.length }})</h4>
            </div>
            <ul class="space-y-2">
              <li
                v-for="church in churches"
                :key="church.id"
                @click="toggleExpand(church.id)"
                class="cursor-pointer flex flex-col py-2 px-3 bg-white bg-opacity-60 rounded-md hover:bg-opacity-80 transition-all duration-300"
              >
                <div class="flex items-center">
                  <i class="fas fa-church text-[#1e4e8f] mr-3"></i>
                  <button type="button" class="px-3 py-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] text-white text-sm rounded-full shadow hover:shadow-lg transition-all duration-300">
                    {{ church.church_name }}
                  </button>
                </div>
                <div v-if="expandedChurchId === church.id" class="mt-2 space-y-2">
                  <p class="text-gray-600 text-sm mb-2"><strong>목사:</strong> {{ church.pastor_name || '정보 없음' }}</p>
                  <p class="text-gray-600 text-sm mb-2"><strong>주소:</strong> {{ church.address || '정보 없음' }}</p>
                  <p class="text-gray-600 text-sm mb-2"><strong>담당:</strong> {{ church.diocese || '' }}</p>
                  <p class="text-gray-600 text-sm mb-2"><strong>예배시간:</strong> {{ church.service_time || '정보 없음' }} | <strong>수용인원:</strong> {{ church.capacity || '정보 없음' }}</p>
                  <p class="text-gray-600 text-sm mb-2"><strong>섬지역:</strong> {{ church.is_island === 'O' ? 'O' : 'X' }}</p>
                  <p class="text-gray-600 text-sm italic mb-2"><strong>*추가정보-</strong>{{ church.parking_info || '' }}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div v-else class="flex flex-col items-center justify-center h-full">
          <i class="fas fa-info-circle text-gray-400 text-4xl mb-4"></i>
          <p class="text-gray-600">등록된 교구가 없습니다.</p>
        </div>
        
        </div>
        <div v-else-if="!isLoading && selectedChurches.length > 0" class="space-y-4">
          <!-- 헤더 -->
          <div class="flex items-center mb-4">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#1e4e8f] to-[#173d72] flex items-center justify-center mr-3">
              <i class="fas fa-seedling text-white"></i>
            </div>
            <h3 class="text-xl font-bold text-[#1e4e8f]">{{ getSelectedRegionName() }}</h3>
          </div>
          <!-- 인용구 -->
          <div class="mb-6 bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-4 shadow-sm border-l-4 border-[#2a9d8f]">
            <p class="text-gray-700 italic">
              <i class="fas fa-quote-left text-[#2a9d8f] mr-2 opacity-50"></i>
              성령의 바람을 타고 전국 각지에서 피어나는 예배 공동체들을 만나보세요.
            </p>
          </div>
          <div
            v-for="church in selectedChurches"
            :key="church.id"  
            class="bg-white bg-opacity-40 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-200"
          >
            <div class="flex items-start">
              <div class="w-8 h-8 rounded-full bg-[#e0f2f1] flex items-center justify-center mr-3 mt-1">
                <i class="fas fa-church text-[#1e4e8f]"></i>
              </div>
              <div class="flex-grow">
                <h4 class="text-lg font-semibold text-[#1e4e8f]">{{ church.church_name }}</h4>
                <p class="text-gray-600 text-sm mb-1"><strong>목사:</strong> {{ church.pastor_name || '정보 없음' }}</p>
                <p class="text-gray-600 text-sm mb-2"><strong>주소:</strong> {{ church.address || '정보 없음' }}</p>
                <!-- <p class="text-gray-600 text-sm mb-2"><strong>연락처:</strong> {{ church.pastor_contact || '정보 없음' }}</p> -->
                <button @click="toggleExpand(church.id)" class="text-sm text-[#1e4e8f] font-medium mt-1">
                  {{ expandedChurchId === church.id ? '접기' : '더보기' }}
                </button>
                <div v-if="expandedChurchId === church.id" class="mt-2 space-y-2">
                  <p class="text-gray-600 text-sm mb-2"><strong>예배시간:</strong> {{ church.service_time || '정보 없음' }} | <strong>수용인원:</strong> {{ church.capacity || '정보 없음' }}</p>
                  <!-- <p class="text-gray-600 text-sm mb-2"><strong>방문확인:</strong> {{ church.visit_confirmed === 'O' ? '확인됨' : '미확인' }} | <strong>섬지역:</strong> {{ church.is_island === 'O' ? '예' : '아니오' }}</p> -->
                  <p class="text-gray-600 text-sm mb-2"><strong>섬지역:</strong> {{ church.is_island === 'O' ? 'O' : 'X' }}</p>
                  <p class="text-gray-600 text-sm italic mb-2"><strong>*추가정보-</strong> {{ church.parking_info || '' }}</p>
                  <!-- <p class="text-gray-600 text-sm mb-2"><strong>결연/그룹:</strong> {{ church.affiliation_details || '정보 없음' }} / {{ church.group_name || '정보 없음' }}</p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 교회 목록 없음 메시지 -->
        <div v-else class="flex flex-col items-center justify-center py-10">
          <div class="w-16 h-16 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-4">
            <i class="fas fa-seedling text-[#1e4e8f] text-2xl"></i>
          </div>
          <p class="text-gray-600 text-center">이 지역에는 아직 등록된 교회가 없습니다.</p>
          <p class="text-[#1e4e8f] text-center mt-2 font-medium">곧 새로운 예배 공동체가 피어날 예정입니다!</p>
        </div>
    </div>
  </div>
</div>
  <!-- 좌표 편집 모달 -->
  <div v-if="showEditModal && !showButtons" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
      <h3 class="text-lg font-bold mb-4">버튼 위치 수정</h3>
      <div class="space-y-2 max-h-64 overflow-y-auto">
        <div v-for="btn in sortedSubRegions" :key="btn.id" class="flex items-center space-x-2">
          <span class="w-16">{{ btn.label }}</span>
          <input type="number" v-model.number="btn.x" class="border rounded p-1 w-20" />
          <input type="number" v-model.number="btn.y" class="border rounded p-1 w-20" />
        </div>
      </div>
      <div class="mt-4 flex justify-end space-x-2">
        <button @click="showEditModal = false" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">취소</button>
        <button @click="saveCoords" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">저장</button>
      </div>
    </div>
  </div>
</template>

<script>
import defaultMapImage from '../assets/clean_full_korea_1.png';
import gangwonMapImage from '../assets/gangwon-do_cut.png';
import gyeonggiMapImage from '../assets/gyeonggi-do_cut.png';
import gyeongsangbukMapImage from '../assets/gyeongsangbuk-do_cut.png';
import gyeongsangnamMapImage from '../assets/gyeongsangnam-do_cut.png';
import chungcheongnamMapImage from '../assets/chungcheongnam-do_cut.png';
import chungcheongbukMapImage from '../assets/chungcheongbuk-do_cut.png';
import jeollanamMapImage from '../assets/jeollanam-do_cut.png';
import jeonbukMapImage from '../assets/jeollabukdo-do_cut.png';
import jejuMapImage from '../assets/jeju-do_cut.png';
import busanMapImage from '../assets/busan_cut.png';
import seoulMapImage from '../assets/seoul_cut.png';
import daeguMapImage from '../assets/daegu_cut.png';
import ulsanMapImage from '../assets/ulsan_cut.png';
import gwangjuMapImage from '../assets/gwangju_cut.png';

export default {
  name: "LocationSection",
  data() {
    return {
      dioceses: {},
      selectedDiocese: null,
      showDiocese: false,
      selectedRegion: null,
      zoomLevel: 1,
      defaultMap: defaultMapImage,
      currentMap: defaultMapImage, 
      showButtons: true, 
      isMapChanged: false, 
      dragging: false,
      dragStart: { x: 0, y: 0 },
      imageOffset: { x: 0, y: 0 },
      lastOffset: { x: 0, y: 0 },
      fixedListHeight: 'auto', 
      dropdownPaddingBottom: 0,
      selectedButtonId: null,
      selectedSubButtonId: null, 
      showMobileModal: false,
      showEditModal: false,
      buttonPositions: [
        { id: 'gg', x: 440, y: 300, label: "경기도", map: gyeonggiMapImage },
        { id: 'gw', x: 620, y: 200, label: "강원도", map: gangwonMapImage },
        { id: 'gb', x: 700, y: 430, label: "경상북도", map: gyeongsangbukMapImage },
        { id: 'cn', x: 400, y: 430, label: "충청남도", map: chungcheongnamMapImage },
        { id: 'cb', x: 550, y: 400, label: "충청북도", map: chungcheongbukMapImage },
        { id: 'jn', x: 420, y: 735, label: "전라남도", map: jeollanamMapImage },
        { id: 'jb', x: 450, y: 575, label: "전라북도", map: jeonbukMapImage },
        { id: 'gn', x: 620, y: 640, label: "경상남도", map: gyeongsangnamMapImage }, 
        { id: 'jj', x: 370, y: 930, label: "제주도", map: jejuMapImage },
        { id: 'bs', x: 790, y: 710, label: "부산", map: busanMapImage }, 
        { id: 'gj', x: 345, y: 654, label: "광주", map: gwangjuMapImage }, 
        { id: 'dg', x: 670, y: 550, label: "대구", map: daeguMapImage }, 
        { id: 'se', x: 420, y: 200, label: "서울", map: seoulMapImage }, 
        { id: 'us', x: 840, y: 610, label: "울산", map: ulsanMapImage }, 
        { id: 'frct', x: 700, y: 900, label: "해외/선교지", map: ulsanMapImage },
        { id: 'diocese', x: 700, y: 1000, label: "담당별", map: ulsanMapImage },  
      ],
      currentRegionId: null,
      regionButtons: { // 하위 지역 데이터
        seoul: [
            { id: 'seoul_sub', label: '서울', x: 200, y: 150 }, 
            { id: 'gyeonggi_sub', label: '경기', x: 300, y: 250 },
            { id: 'incheon_sub', label: '인천', x: 100, y: 250 },
        ],
        gangwon: [
            { id: 'gangwon_sub', label: '강원', x: 250, y: 200 },
        ],
        chungbuk: [
            { id: 'chungbuk_sub', label: '충북', x: 250, y: 200 },
        ],
        chungnam: [
            { id: 'chungnam_sub', label: '충남', x: 250, y: 200 },
            { id: 'daejeon_sub', label: '대전', x: 150, y: 250 },
            { id: 'sejong_sub', label: '세종', x: 200, y: 300 },
        ],
        gyeongbuk: [
            { id: 'gyeongbuk_sub', label: '경북', x: 300, y: 200 },
            { id: 'daegu_sub', label: '대구', x: 250, y: 300 },
        ],
        gyeongnam: [
            { id: 'gyeongnam_sub', label: '경남', x: 300, y: 250 },
            { id: 'busan_sub', label: '부산', x: 400, y: 350 },
            { id: 'ulsan_sub', label: '울산', x: 450, y: 280 },
        ],
        jeonbuk: [
            { id: 'jeonbuk_sub', label: '전북', x: 250, y: 250 },
        ],
        jeonnam: [
            { id: 'jeonnam_sub', label: '전남', x: 200, y: 300 },
            { id: 'gwangju_sub', label: '광주', x: 150, y: 200 },
        ],
        jeju: [
            { id: 'jeju_sub', label: '제주', x: 250, y: 250 },
        ],
      },
      selectedOverseasCountry: null, // 선택된 해외 국가
      dioceses: {}, // Added: Store churches grouped by diocese
      selectedDiocese: null, // Added: Currently selected diocese (if needed for filtering)
      isDioceseListVisible: false, // Added: Flag to show diocese list
      selectedChurches: [],
      isLoading: false,
      errorLoading: null,
      isMapChanged: false,
      expandedItems: {},
      fixedListHeight: '400px', 
      mapWidth: 1200,
      mapHeight: 900,
      resizeObserver: null,
      isMobile: false, 
      isTablet: false,
      dragSpeedFactor: 1.5, 
      firstSlideFade: true,
      currentListType: null, 
      expandedChurchId: null,
      selectedCountry: null, // 선택된 국가를 저장하는 속성 추가
    };
  },
  computed: {
    mapInnerStyle() {
      return {
        position: "absolute",
        left: 0,
        top: 0,
        width: this.mapWidth + "px",
        height: this.mapHeight + "px",
        transform: `translate(${this.imageOffset.x}px, ${this.imageOffset.y}px) scale(${this.zoomLevel})`,
        transformOrigin: "0 0"
      };
    },
    // 메인 버튼 가나다 순 정렬
  sortedButtonPositions() {
    return this.buttonPositions
      .slice()
      .sort((a, b) => a.label.localeCompare(b.label, 'ko'));
  },
    sortedSubRegions() {
      if (!this.selectedButtonId || !this.regionButtons[this.selectedButtonId]) {
        return [];
      }

      // Get the sub-regions for the selected main region
      const subRegions = [...this.regionButtons[this.selectedButtonId]]; // Create a copy

      // Custom sort function
      const customSort = (a, b) => {
        const regex = /^([가-힣]+)(\d+)$/; // Matches "KoreanTextNumber" format
        const matchA = a.label.match(regex);
        const matchB = b.label.match(regex);

        if (matchA && matchB) {
          const textA = matchA[1];
          const numA = parseInt(matchA[2], 10);
          const textB = matchB[1];
          const numB = parseInt(matchB[2], 10);

          // 1. Compare Korean text part (alphabetical)
          const textCompare = textA.localeCompare(textB, 'ko');
          if (textCompare !== 0) {
            return textCompare;
          }

          // 2. If text parts are the same, compare number part (numerical)
          return numA - numB;
        } else {
          // Fallback for labels that don't match the pattern: simple alphabetical sort
          return a.label.localeCompare(b.label, 'ko');
        }
      };

      // Sort the sub-regions
      return subRegions.sort(customSort);
    },
    // 해외 교회 국가별 그룹화
    groupOverseasChurches() {
      return this.selectedChurches.reduce((groups, church) => {
        const country = church.country || '기타';
        if (!groups[country]) groups[country] = [];
        groups[country].push(church);
        return groups;
      }, {});
    },
    // 선택된 국가에 따라 필터링된 해외 교회 목록
    filteredOverseasChurches() {
      if (this.selectedCountry) {
        return { [this.selectedCountry]: this.groupOverseasChurches[this.selectedCountry] };
      } else {
        return this.groupOverseasChurches;
      }
    },
    // 선택된 교구에 따른 필터
    filteredDioceses() {
      if (this.selectedDiocese === null) return this.dioceses;
      return { [this.selectedDiocese]: this.dioceses[this.selectedDiocese] || [] };
    },
    // 담당당별 탭 보이기 조건
    isDioceseListVisible() {
      return this.selectedButtonId === 'diocese';
    },
  },
  watch: {
    selectedButtonId(newVal, oldVal) {
      this.$nextTick(() => {
        this.updateFixedListHeight(); 
        const mainNav = this.$refs.mainNavRef;
        if (mainNav) {
          const selectedButtonElement = mainNav.querySelector(`button[data-id='${newVal}']`);
          if (selectedButtonElement) {
            selectedButtonElement.scrollIntoView({
              behavior: 'smooth',
              inline: 'center',
              block: 'nearest'
            });
          }
        }
      });
    }
  },
  mounted() {
    console.log('Component mounted');
    // 최초 화면 렌더링 시 모바일 여부 체크 및 resetMap 호출
    this.checkDevice();
    window.addEventListener('resize', this.checkDevice);
    this.$nextTick(() => {
      console.log('Mounted - nextTick starts');
      this.updateFixedListHeight();
      console.log('Mounted - setting up ResizeObserver');
      this.setupResizeObserver();
      console.log('Mounted - nextTick ends');
      this.initScrollReveal();
      this.firstSlideFade = false;
      this.fetchRegionButtons();
    });
  },
  beforeUnmount() {
    console.log('Component beforeUnmount'); 
    window.removeEventListener('resize', this.checkDevice); 
    if (this.resizeObserver) {
      this.resizeObserver.disconnect();
    }
  },
  methods: {
    checkDevice() {
      this.isMobile = window.innerWidth < 768;
      this.isTablet = window.innerWidth >= 768 && window.innerWidth < 1024;
      this.resetMap();
    },
    selectItem(item, type) {
      this.selectedRegion = item;
      this.showDiocese = false;
    },
    zoomIn() {
      this.zoomLevel = Math.min(this.zoomLevel + 0.1, 3);
    },
    zoomOut() {
      this.zoomLevel = Math.max(this.zoomLevel - 0.1, 0.2);
    },
    resetMap() {
    if (this.currentMap === gangwonMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.29; this.imageOffset = { x: 10, y: 30 };
      } else if (this.isTablet) {
        // tablet = same as mobile for now
        this.zoomLevel = 0.29; this.imageOffset = { x: 10, y: 30 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === daeguMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.31; this.imageOffset = { x: 10, y: 30 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.31; this.imageOffset = { x: 10, y: 30 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === seoulMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.29; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.29; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === busanMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 30 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 30 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === gwangjuMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 30 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 30 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 10 };
      }
    }
    else if (this.currentMap === gyeongsangbukMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 32 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 32 };
      } else {
        this.zoomLevel = 0.30; this.imageOffset = { x: 190, y: 40 };
      }
    }
    else if (this.currentMap === gyeongsangnamMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.29; this.imageOffset = { x: 0, y: 50 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.29; this.imageOffset = { x: 0, y: 50 };
      } else {
        this.zoomLevel = 0.30; this.imageOffset = { x: 180, y: 40 };
      }
    }
    else if (this.currentMap === chungcheongnamMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === chungcheongbukMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === jeollanamMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === jeonbukMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else if (this.currentMap === jejuMapImage) {
      if (this.isMobile) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.30; this.imageOffset = { x: 0, y: 40 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 130, y: 20 };
      }
    }
    else {
      if (this.isMobile) {
        this.zoomLevel = 0.31; this.imageOffset = { x: 0, y: 20 };
      } else if (this.isTablet) {
        this.zoomLevel = 0.31; this.imageOffset = { x: 0, y: 20 };
      } else {
        this.zoomLevel = 0.36; this.imageOffset = { x: 140, y: -20 };
      }
    }

    this.lastOffset = { ...this.imageOffset };
    },
    startDrag(e) {
      if (e.type === 'mousedown' && e.button !== 0) return;

      this.dragging = true;
      const point = e.touches ? e.touches[0] : e; 
      this.dragStart = {
        x: point.clientX,
        y: point.clientY
      };
      this.lastOffset = { ...this.imageOffset };
      e.preventDefault();
    },
    onDrag(e) {
      if (!this.dragging) return;

      const point = e.touches ? e.touches[0] : e; 
      const dx = (point.clientX - this.dragStart.x) * this.dragSpeedFactor;
      const dy = (point.clientY - this.dragStart.y) * this.dragSpeedFactor;
      this.imageOffset = {
        x: this.lastOffset.x + dx,
        y: this.lastOffset.y + dy
      };
    },
    endDrag() {
      if (!this.dragging) return; 
      this.dragging = false;
    },
    buttonStyle(btn, type = 'main') {
      let baseWidth, baseHeight, baseFontSize;

      if (type === 'detail') {
        if (this.isMobile) {
          baseHeight = 80;
          baseFontSize = 45;
        } else {
          baseHeight = 80;
          baseFontSize = 45;
        }
      } else {
        if (this.isMobile) {
          baseHeight = 84;
          baseFontSize = 38;
        } else {
          baseHeight = 79;
          baseFontSize = 33;
        }
      }

      return {
        left: `${btn.x}px`,
        top: `${btn.y}px`,
        transform: `translate(-50%, -50%)`, 
        transformOrigin: "center center",
        zIndex: 10,
        pointerEvents: "auto",
        height: `${baseHeight}px`,
        fontSize: `${baseFontSize}px`,
        
      };
    },
    async onMapButtonClick(btn) {

      // 담당별 버튼 클릭 시
      if (btn.id === 'diocese') {
        this.selectedDiocese = null;
         this.showButtons = true;
         this.currentMap = this.defaultMap;
         this.currentRegionId = btn.id;
         this.selectedButtonId = btn.id;
         this.selectedSubButtonId = null;
         this.errorLoading = null;
         this.isLoading = true;
         this.dioceses = {};
         this.selectedChurches = [];

        try {
          const response = await fetch('https://spread0608.com/spread0608/api/get_churches.php?type=diocese');
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const result = await response.json();
          if (result.error) throw new Error(result.error);
          
          // Assuming API returns { "Diocese Name": [churches...] }
          this.dioceses = result.data || {}; 
        } catch (error) {
          console.error('Error fetching diocese churches:', error);
          this.errorLoading = '교구 목록을 불러오는 중 오류가 발생했습니다.';
        } finally {
          this.isLoading = false;
          this.$nextTick(() => {
            this.updateFixedListHeight(); 
            if (this.isMobile) {
              this.showMobileModal = true; // Potentially adapt modal for diocese view
            } else {
              const dioceseListElement = this.$refs.dioceseListScroll;
              if (dioceseListElement) {
                dioceseListElement.scrollTop = 0;
                dioceseListElement.classList.add('revealed'); 
              }
            }
          });
        }
        return; // Stop further execution for diocese button
      }

      // 해외/선교지 버튼 클릭 시 기본 지도 표시 및 교회 목록 불러오기
      if (btn.id === 'frct') {
        this.showButtons = true;
        this.currentMap = this.defaultMap; // 메인 지도로 복귀
        this.currentRegionId = btn.id;
        this.selectedButtonId = btn.id;
        this.isMapChanged = true;
        this.selectedSubButtonId = null;
        this.errorLoading = null;
        this.isLoading = true;
        this.selectedChurches = [];
        try {
          const response = await fetch(`https://spread0608.com/spread0608/api/get_churches.php?type=overseas`);
          if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
          const result = await response.json();
          if (result.error) throw new Error(result.error);
          this.selectedChurches = result.data;
        } catch (error) {
          console.error('Error fetching overseas churches:', error);
          this.errorLoading = '교회 목록을 불러오는 중 오류가 발생했습니다.';
        } finally {
          this.isLoading = false;
          this.$nextTick(() => {
            this.updateFixedListHeight();
            if (this.isMobile) {
              this.showMobileModal = true;
            } else {
              const churchListElement = this.$refs.churchListScroll;
              if (churchListElement) {
                churchListElement.scrollTop = 0;
                churchListElement.classList.add('revealed');
              }
            }
          });
        }
        return;
      }
      this.currentRegionId = btn.id;
      this.selectedButtonId = btn.id; 
      this.currentMap = btn.map;
      this.showButtons = false; 
      this.isMapChanged = true; 
      const subButtons = this.regionButtons[btn.id] || [];
      if (subButtons.length > 0 && !this.isMobile) {
       this.onSubRegionButtonClick(subButtons[0]);
      } else {
         this.selectedSubButtonId = null;
         this.selectedChurches = []; 
       }
      this.resetMap();
      this.$nextTick(this.updateFixedListHeight);
    },
    async onSubRegionButtonClick(btn) {
      // 하위 지역(서브리전) 버튼 클릭 시 내비게이션 바로 스크롤 및 포커스
      console.log('Sub Region Button Clicked:', btn.label, btn.id);
      this.selectedSubButtonId = btn.id; 
      this.isLoading = true;           
      this.selectedChurches = [];      
      this.errorLoading = null;        
      this.showChurchList = true;      

      try {
        const response = await fetch(`https://spread0608.com/spread0608/api/get_churches.php?region_id=${btn.id}`);

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        if (data.error) {
          throw new Error(data.error);
        }

        if (Array.isArray(data)) {
          this.selectedChurches = data;
          console.log('Churches loaded:', this.selectedChurches);
        } else {
          console.error('API 응답이 배열 형태가 아닙니다:', data);
          this.selectedChurches = [];
          throw new Error('잘못된 데이터 형식입니다.');
        }
      } catch (error) {
        console.error('Error fetching church data:', error);
        this.errorLoading = '교회 목록을 불러오는 중 오류가 발생했습니다.';
        this.selectedChurches = [];
      } finally {
        this.isLoading = false;
        this.$nextTick(() => {
          this.updateFixedListHeight();
          // 모바일에서만 모달 표시
          if (this.isMobile) {
            this.showMobileModal = true;
          } else {
            const churchListElement = this.$refs.churchListScroll;
            if (churchListElement) {
              churchListElement.scrollTop = 0;
              churchListElement.classList.add('revealed');
            }
          }
        });
      }
    },
    getSelectedRegionName() {
      if (this.selectedSubButtonId) {
          const selectedSubButton = this.regionButtons[this.selectedButtonId].find(subBtn => subBtn.id === this.selectedSubButtonId);
          if (selectedSubButton) {
              const parentButton = this.buttonPositions.find(btn => btn.id === this.selectedButtonId);
              return parentButton ? `${selectedSubButton.label}` : selectedSubButton.label;
          }
      } else if (this.selectedButtonId) {
          const parentButton = this.buttonPositions.find(btn => btn.id === this.selectedButtonId);
          return parentButton ? parentButton.label : '지역' 
      }
      return '지역을 선택해주세요' 
    },
    goBack() {
      this.currentMap = defaultMapImage;
      this.selectedButtonId = null;
      this.showButtons = true;
      this.isMapChanged = false; 
      this.resetMap(); 

      this.selectedRegionId = null;
      this.selectedSubButtonId = null;
      this.selectedChurches = [];
      this.selectedChurchId = null;
      this.$nextTick(() => {
        this.updateFixedListHeight(); 
        const el = this.$refs.churchListRef;
        if (el) el.classList.add('revealed');
      });
    },
    handleWheelZoom(event) {
      if (event.deltaY < 0) {
        this.zoomIn();
      } else if (event.deltaY > 0) {
        this.zoomOut();
      }
    },
    updateFixedListHeight() {
      this.$nextTick(() => {
        const imageContainer = this.$refs.imageContainer;
        const mainNavRef = this.$refs.mainNavRef;
        const dropdownRef = this.$refs.dropdownRef;

        if (imageContainer && mainNavRef) {
          const mapHeight = imageContainer.offsetHeight;
          const navHeight = mainNavRef.offsetHeight;
          const navMarginTop = 16; 

          const totalHeightForListBox = mapHeight + navMarginTop + navHeight;
          this.fixedListHeight = `${totalHeightForListBox}px`;

          let dropdownHeight = 0;
          const dropdownMarginTop = 4; 

          if (this.selectedButtonId && dropdownRef && dropdownRef.offsetHeight > 0) {
             dropdownHeight = dropdownRef.offsetHeight + dropdownMarginTop;
          }

          this.dropdownPaddingBottom = dropdownHeight > 0 ? dropdownRef.offsetHeight + dropdownMarginTop : 0; 
        } else {
          this.fixedListHeight = '500px'; 
          this.dropdownPaddingBottom = 0;
        }
      });
    },
    setupResizeObserver() {
      if (this.resizeObserver) {
          this.resizeObserver.disconnect();
      }
      const imageContainer = this.$refs.imageContainer;
      const mainNavRef = this.$refs.mainNavRef;

      if (imageContainer && mainNavRef) { 
          this.resizeObserver = new ResizeObserver(entries => {
              this.updateFixedListHeight(); 
          });

          this.resizeObserver.observe(imageContainer);
          this.resizeObserver.observe(mainNavRef);
      } else {
          console.warn('ResizeObserver setup failed: Refs not available during setup.'); 
      }
    },
    initScrollReveal() {
      const observerOptions = {
        root: null, 
        rootMargin: '0px',
        threshold: 0.1 
      };

      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const delay = el.dataset.delay || 0;
            
            setTimeout(() => {
              el.classList.add('revealed');
            }, delay * 1000);
            
            if (!el.classList.contains('church-list-persistent')) {
              observer.unobserve(el);
            }
          }
        });
      }, observerOptions);

      document.querySelectorAll('.scroll-reveal').forEach(el => {
        observer.observe(el);
      });
    },
    toggleExpand(id) {
      this.expandedChurchId = this.expandedChurchId === id ? null : id;
    },
    getSubRegionsForRegion(regionId) {
      return this.regionButtons[regionId] || [];
    },
    async fetchRegionButtons() {
      try {
        const response = await fetch('https://spread0608.com/spread0608/api/getRegions.php'); 
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        this.regionButtons = data;
        console.log('Region buttons loaded:', this.regionButtons);
      } catch (error) {
        console.error('Error fetching region buttons:', error);
      }
    },
    openEditCoordsModal() {
      this.showEditModal = true;
    },
    async saveCoords() {
      try {
        const payload = this.sortedSubRegions.map(btn => ({ id: btn.id, x: btn.x, y: btn.y }));
        const response = await fetch('https://spread0608.com/spread0608/api/updateRegionCoords.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ buttons: payload })
        });
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        const data = await response.json();
        if (data.success) {
          this.showEditModal = false;
        } else {
          alert('저장에 실패했습니다');
        }
      } catch (error) {
        console.error('Error saving coords:', error);
        alert('저장 중 오류가 발생했습니다');
      }
    },
  }
};
</script>

<style scoped>
/* Glassmorphism Base Styles */
.glass-panel {
  background-color: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
}

.glass-panel-light {
  background-color: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
}

.glass-button {
  /* 스타일 정의 */
}

.glass-active-button {
  background-color: rgba(30, 78, 143, 0.8); 
  color: white;
  font-weight: bold;
  box-shadow: 0 4px 12px rgba(30, 78, 143, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.4);
  transition: all 0.3s ease;
}

.glass-active-button:hover {
  background-color: rgba(23, 61, 114, 0.9); 
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(30, 78, 143, 0.4);
}

.glass-inactive-button {
  background-color: rgba(255, 255, 255, 0.15);
  color: #475569; 
  border: 1px solid rgba(255, 255, 255, 0.3);
  transition: all 0.3s ease;
}

.glass-inactive-button:hover {
  background-color: rgba(248, 232, 242, 0.2); 
  color: #334155; 
}

/* Custom Scrollbar */
.custom-scrollbar-thin::-webkit-scrollbar {
  width: 5px;
  height: 7px;
}

.custom-scrollbar-thin::-webkit-scrollbar-track {
  background: transparent;
}

.custom-scrollbar-thin::-webkit-scrollbar-thumb {
  background: rgba(30, 78, 143, 0.3); 
  border-radius: 4px;
}

.custom-scrollbar-thin::-webkit-scrollbar-thumb:hover {
  background: rgba(30, 78, 143, 0.5); 
}

/* Dropdown Transition */
.dropdown-enter-active, .dropdown-leave-active {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.dropdown-enter-from, .dropdown-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.dropdown-enter-to, .dropdown-leave-from {
  opacity: 1;
  transform: translateY(0);
}

/* Fade Transition */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

.fade-move {
  transition: transform 0.3s ease;
}

.map-inner {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  transition: transform 0.3s ease-out;
}

.map-button {
  min-width: 40px;
  min-height: 40px;
  padding: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  font-size: 0.875rem;
  z-index: 10;
}

.region-button {
  min-width: 30px;
  min-height: 30px;
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem;
}

.animate-float {
  animation: float 6s infinite;
}

@keyframes float {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
  100% {
    transform: translateY(0);
  }
}

.animate-pulse {
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.map-control-button {
  background-color: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.4);
  transition: all 0.3s ease;
}

.map-control-button:hover {
  background-color: rgba(255, 255, 255, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.5);
}

/* 스크롤 애니메이션 */
.scroll-reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease, transform 0.8s ease;
}

.scroll-reveal.revealed {
  opacity: 1;
  transform: translateY(0);
}

/* 다양한 방향의 애니메이션 */
.fade-up {
  transform: translateY(30px);
}

.fade-down {
  transform: translateY(-30px);
}

.fade-left {
  transform: translateX(-30px);
}

.fade-right {
  transform: translateX(30px);
}

.fade-up.revealed,
.fade-down.revealed,
.fade-left.revealed,
.fade-right.revealed {
  transform: translate(0);
}

/* Slide-Fade Transition */
.slide-fade-enter-active, .slide-fade-leave-active {
  transition: all 0.3s ease;
}

.slide-fade-enter-from, .slide-fade-leave-to {
  opacity: 0;
  transform: translateX(-20px);
}

.slide-fade-enter-to, .slide-fade-leave-from {
  opacity: 1;
  transform: translateX(0);
}
</style>
