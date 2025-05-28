<template>
  <section id="about" class="scroll-mt-24 py-20 px-4 relative overflow-hidden">
    <!-- 제주도 느낌의 배경 -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-[#66c6ba] via-[#e8f4f3] to-[#ffd485]">
      <!-- 파도 패턴 배경 -->
      <div class="absolute w-full h-full overflow-hidden opacity-15">
        <div class="absolute top-0 left-0 w-full h-full">
          <!-- 파도 애니메이션 요소 -->
          <div v-for="i in 5" :key="i" 
               class="absolute rounded-full mix-blend-multiply animate-float"
               :class="[
                 i % 3 === 0 ? 'bg-[#3d7b99]' : i % 3 === 1 ? 'bg-[#ffa22d]' : 'bg-[#66c6ba]',
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
      <div class="bg-white bg-opacity-25 backdrop-blur-lg p-8 md:p-16 rounded-3xl shadow-2xl border border-white border-opacity-40 transform hover:rotate-x-1 transition-transform duration-700">
        <!-- 제주도 느낌의 헤더 섹션 -->
        <div class="text-center mb-16 relative scroll-reveal fade-up">
          <!-- 제주 감귤과 돌하르방 장식 요소 -->
          <div class="absolute -top-10 left-1/4 w-16 h-16 bg-[#ffa22d] rounded-full opacity-60 animate-float" style="animation-delay: 0.5s; animation-duration: 6s;"></div>
          <div class="absolute -top-5 right-1/4 w-10 h-10 bg-[#66c6ba] rounded-full opacity-60 animate-float" style="animation-delay: 1s; animation-duration: 7s;"></div>
          
          <!-- 돌하르방 아이콘 장식 -->
          <div class="absolute top-0 right-10 opacity-20 hidden md:block">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="animate-float" style="animation-delay: 1.5s;">
              <circle cx="12" cy="8" r="5"></circle>
              <path d="M12 13v8"></path>
              <path d="M9 18h6"></path>
            </svg>
          </div>
          
          <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#66c6ba] to-[#3d7b99] text-white text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
            <i class="fas fa-wind text-[#ffd485] mr-2"></i>흩어지는 예배
          </span>
          
          <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#3d7b99] to-[#ffa22d]">Spread out!<br class="sm:hidden">Bloom again!</span>
          </h2>
          
          <div class="relative w-32 h-2 mx-auto mb-8">
            <div class="absolute inset-0 bg-gradient-to-r from-[#66c6ba] to-[#3d7b99] rounded-full"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#66c6ba] to-[#3d7b99] rounded-full animate-pulse"></div>
          </div>
          
          <p class="text-gray-700 max-w-2xl mx-auto text-lg whitespace-nowrap">
            성령의 바람을 타고, 세상 속에서 다시 피어나는 "흩어지는 예배"
          </p>
        </div>
        
        <!-- 흩어지는 예배 Q&A 섹션 -->
        <div class="mt-18">
          <div class="space-y-6">
            <!-- 질문 1 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#91be5a] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-up" data-delay="0.2">
              <div class="grid grid-cols-[auto,1fr] md:grid-cols-[4rem,1fr] gap-x-4 md:gap-x-0 items-center">
                <div class="bg-[#91be5a] text-white text-3xl font-bold rounded-lg w-12 h-12 flex items-center justify-center">1</div>
                <h3 class="text-xl font-bold text-[#91be5a]">흩어지는 예배란 무엇인가요?</h3>
                <div class="col-span-2 mt-4">
                  <p class="text-gray-700">“흩어지는 예배”는 수영로교회 50주년을 맞아 준비된 “특별한 예배”입니다. 대형 기념예배를 지양하고, 성도들이 전국의 작은교회(농어촌, 미래자립, 고향교회 등) 로 흩어져 예배를 드리며 하나님의 사랑을 다시 꽃피우고 나누는 예배입니다.</p>
                </div>
              </div>
            </div>
            
            <!-- 질문 2 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#40bc90] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-up" data-delay="0.3">
              <div class="grid grid-cols-[auto,1fr] md:grid-cols-[4rem,1fr] gap-x-4 md:gap-x-0 items-center">
                <div class="bg-[#40bc90] text-white text-3xl font-bold rounded-lg w-12 h-12 flex items-center justify-center">2</div>
                <h3 class="text-xl font-bold text-[#40bc90]">흩어지는 예배는 어떻게 진행되나요?</h3>
                <div class="col-span-2 mt-4">
                  <p class="text-gray-700">6월 8일(주일) 수영로교회 모든 성도들은 온 열방으로 흩어져서 예배하게 됩니다. 수영로교회 교구와 기관마다 연결되어 지금까지 기쁨으로 섬겨온 교회들이 있습니다. 50주년으로 기획된 “흩어지는 예배”를 기다리고 있는 교회들입니다. 먼저 그 교회들을 방문하셔서 기쁜 마음으로 예배에 참여해주시기 바랍니다. 또한 교구와 기관마다 연결된 교회가 아니더라도 고향교회나 연약한 이웃교회에 선교적 마음을 품고 함께 예배에 참여가 가능합니다. 신청서로 참여하는 교회를 작성하신 후 어디서든지 예수님의 사랑을 나누어 주세요. “흩어지는 예배”에서 가장 중요한 것은 자발적으로 참여하여 예배의 기쁨을 누리는 것입니다!</p>
                </div>
              </div>
            </div>
            
            <!-- 질문 3 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#21bdbd] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-up" data-delay="0.4">
              <div class="grid grid-cols-[auto,1fr] md:grid-cols-[4rem,1fr] gap-x-4 md:gap-x-0 items-center">
                <div class="bg-[#21bdbd] text-white text-3xl font-bold rounded-lg w-12 h-12 flex items-center justify-center">3</div>
                <h3 class="text-xl font-bold text-[#21bdbd]">왜 흩어져야 하나요?</h3>
                <div class="col-span-2 mt-4">
                  <p class="text-gray-700">수영로교회는 1975년 6월 1일 “선교교회”라는 이름으로 첫 예배를 드렸습니다. 온 열방에 예수 그리스도의 복음과 하나님의 사랑을 전하고자 하나님께서 시작 하셨습니다. 50주년을 맞이하여 “수영로교회만의 잔치”가 아니라 “이웃 교회 와의 연대”가 되는 시간이 되기를 소망합니다. 무엇보다 안에서 밖으로, 교회의 문턱을 넘어 복음의 정신을 실천하는 교회가 되어, 복음의 본질로 돌아가 선교적 교회로서의 사명을 감당하기를 원합니다.</p>
                </div>
              </div>
            </div>
            
            <!-- 질문 4 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#4fa9de] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-up" data-delay="0.5">
              <div class="grid grid-cols-[auto,1fr] md:grid-cols-[4rem,1fr] gap-x-4 md:gap-x-0 items-center">
                <div class="bg-[#4fa9de] text-white text-3xl font-bold rounded-lg w-12 h-12 flex items-center justify-center">4</div>
                <h3 class="text-xl font-bold text-[#4fa9de]">누가, 어떻게 참여할 수 있나요?</h3>
                <div class="col-span-2 mt-4">
                  <p class="text-gray-700">수영로교회 성도라면 누구나 참여 가능합니다. 교구 및 기관별로 연결된 교회에 참여하시거나, 고향교회, 농어촌교회, 미래자립교회, 선교지교회 등 어디든 예배를 드리기 원하는 교회에 참여할 수 있습니다. 부서/기관/교구의 담당교역자 에게 문의하시면 자세하게 안내를 받을 수 있으며 본당 1층 로비에 설치될 “흩어지는 예배” 부스에서도 자세한 내용을 확인하실 수 있습니다.</p>
                </div>
              </div>
            </div>
            
            <!-- 질문 5 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#4d87c6] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-up" data-delay="0.6">
              <div class="grid grid-cols-[auto,1fr] md:grid-cols-[4rem,1fr] gap-x-4 md:gap-x-0 items-center">
                <div class="bg-[#4d87c6] text-white text-3xl font-bold rounded-lg w-12 h-12 flex items-center justify-center">5</div>
                <h3 class="text-xl font-bold text-[#4d87c6]">흩어지는 예배 준비물이 있나요?</h3>
                <div class="col-span-2 mt-4">
                  <p class="text-gray-700">“흩어지는 예배”는 단순한 방문이 아니라, 감사의 마음과 선교적 헌신을 함께 드리는 예배입니다. </p>
                  <div class="mt-4 bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <div class="space-y-2 text-[#4d87c6]">
                      <p class="font-semibold flex items-start">
                        <span class="flex items-center justify-center w-5 h-5 rounded-full bg-[#4d87c6] text-white text-xs mr-2 mt-1">1</span>
                        "흩어지는 예배 감사헌금봉투" 지참
                      </p>
                      <p class="text-sm ml-6">▶ 드려진 헌금은 하나님께서 주신 사랑을 다시 나누는 선교의 실천이 됩니다.</p>
                      
                      <p class="font-semibold flex items-start">
                        <span class="flex items-center justify-center w-5 h-5 rounded-full bg-[#4d87c6] text-white text-xs mr-2 mt-1">2</span>
                        방문교회 주보 1부 제출
                      </p>
                      <p class="text-sm ml-6 font-semibold">예배드린 교회의 주보를 수령하여, 본당 1층, 2층 로비에 설치된 "흩어지는 예배 수거함"에 꼭 넣어 주세요.</p>
                      <p class="text-sm ml-6">▶ 참여 확인과 기록, 다음 섬김을 위한 자료로 사용됩니다.</p>
                      
                      <p class="font-semibold flex items-start">
                        <span class="flex items-center justify-center w-5 h-5 rounded-full bg-[#4d87c6] text-white text-xs mr-2 mt-1">3</span>
                        사진 기록과 공유
                      </p>
                      <p class="text-sm ml-6 font-semibold">예배 모습, 교회 외부, 사랑방 활동, 함께 나눈 은혜의 장면들을 사진으로 남겨 주세요.</p>
                      <p class="text-sm ml-6">▶ 찍은 사진은 교구 교역자에게 카카오톡으로 전송해주세요.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Video Section -->
        <div class="mt-16 relative scroll-reveal fade-up" data-delay="0.5">
          <!-- <div class="text-center mb-12">
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-film text-[#2a9d8f] mr-2"></i>티저 영상
            </span>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-3">흩어지는 예배의 비전</h3>
            <div class="w-16 h-1 bg-[#2a9d8f] mx-auto mb-4"></div>
            <p class="text-gray-600 mx-auto text-lg mb-8">성령의 바람을 타고, <br class="sm:hidden">세상 속에서 다시 피어나는 <br class="sm:hidden">"흩어지는 예배"의 비전을 <br class="sm:hidden">영상으로 만나보세요!</p>
          </div> -->
          
          <!-- Video Container -->
          <!-- <div class="relative group scroll-reveal fade-up mx-auto w-full md:w-1/2" data-delay="0.6">
            <div class="absolute -inset-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video cursor-pointer" ref="videoContainer" @click="goFullscreen">
              <iframe 
                class="w-full h-full"
                src="https://www.youtube.com/embed/MCw6ojvSWrI?rel=0&modestbranding=1"
                title="흩어지는 예배 티저 영상"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
              </iframe>
            </div>
          </div> -->
             

          <!-- Second Video: 흩어지는 예배를 말하다 -->
          <!-- <div class="mt-16 text-center scroll-reveal fade-up" data-delay="0.7">
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-video text-[#2a9d8f] mr-2"></i>인터뷰 영상
            </span>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-3">흩어지는 예배를 말하다</h3>
            <div class="w-16 h-1 bg-[#2a9d8f] mx-auto mb-4"></div>
            <p class="text-gray-600 mx-auto text-lg mb-8">흩어지는 예배의 <br class="sm:hidden">의미와 비전에 대한 <br class="sm:hidden">이야기를 들어보세요!</p>
            
            <div class="relative group scroll-reveal fade-up mx-auto w-full md:w-1/2" data-delay="0.8">
              <div class="absolute -inset-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
              <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video cursor-pointer" @click="goFullscreen">
                <iframe 
                  class="w-full h-full"
                  src="https://www.youtube.com/embed/v2KmW6Vxnz4?rel=0&modestbranding=1"
                  title="흩어지는 예배를 말하다"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          </div> -->

           <!-- Third Video: 최종 흩어지는예배 MV -->
           <!-- <div class="mt-16 text-center scroll-reveal fade-up" data-delay="0.9">
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-video text-[#2a9d8f] mr-2"></i>뮤직비디오
            </span>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-3">모이는 예배 흩어지는 예배</h3>
            <div class="w-16 h-1 bg-[#2a9d8f] mx-auto mb-4"></div>
            <p class="text-gray-600 mx-auto text-lg mb-8">손경민 목사님의 찬양을 <br class="sm:hidden">함께 고백합시다!</p>
            
            <div class="relative group scroll-reveal fade-up mx-auto w-full md:w-1/2" data-delay="0.8">
              <div class="absolute -inset-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
              <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video cursor-pointer" @click="goFullscreen">
                <iframe 
                  class="w-full h-full"
                  src="https://www.youtube.com/embed/D7Dwd2ZAvQI?rel=0&modestbranding=1"
                  title="모이는 예배 흩어지는 예배"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          </div> -->

          <!-- Fourth Video: '흩어지는 예배'로의 초대 - 이규현 담임목사 -->
          <!-- <div class="mt-16 text-center scroll-reveal fade-up" data-delay="1.1">
            <span class="inline-block py-1 px-4 rounded-full bg-gradient-to-r from-[#c2e9e5] to-[#e0f2f1] text-[#1e4e8f] text-sm font-medium mb-4 transform transition-all duration-300 hover:shadow-lg hover:scale-105">
              <i class="fas fa-video text-[#2a9d8f] mr-2"></i>INVITATION
            </span>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-3">흩어지는 예배로 초대합니다!</h3>
            <div class="w-16 h-1 bg-[#2a9d8f] mx-auto mb-4"></div>
            <p class="text-gray-600 mx-auto text-lg mb-8">수영로교회 <br class="sm:hidden">이규현 담임목사</p>
            
            <div class="relative group scroll-reveal fade-up mx-auto w-full md:w-1/2" data-delay="0.8">
              <div class="absolute -inset-1 bg-gradient-to-r from-[#1e4e8f] to-[#2a9d8f] rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
              <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-video cursor-pointer" @click="goFullscreen">
                <iframe 
                  class="w-full h-full"
                  src="https://www.youtube.com/embed/2rDYPpSwj1Q?rel=0&modestbranding=1"
                  title="'흩어지는 예배'로의 초대 - 이규현 담임목사"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
                </iframe>
              </div>
            </div>
          </div> -->
          
        </div>
        
        <!-- Message section -->
        <div class="mt-24">
          <div class="text-center mb-12 scroll-reveal fade-up">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">흩어지는 예배의 메시지</h3>
            <div class="w-16 h-1 bg-[#66c6ba] mx-auto"></div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- <div class="p-6 bg-gradient-to-br from-white to-[#e0f2f1] rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-white border-opacity-60 scroll-reveal fade-up" data-delay="0.1">
              <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#e0f2f1] flex items-center justify-center mb-4">
                  <i class="fas fa-wind text-[#1e4e8f] text-2xl"></i>
                </div>
                <div class="text-[#1e4e8f] text-2xl font-bold mb-2">"Spread out"</div>
                <div class="text-gray-600 text-center">성령에 의한 선교적 확장</div>
              </div>
            </div> -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#1e4e8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-right" data-delay="0.2">
              <h3 class="text-2xl font-bold text-[#1e4e8f] mb-3">"Spread out!" – 널리 퍼져라!</h3>
              <div class="italic text-[#2a9d8f] text-lg mb-4 pl-4 border-l-2 border-[#c2e9e5]">
                <p>예배는 멈추는 것이 아니라, 세상으로 퍼지는 것이다!</p>
              </div>
              <ul class="space-y-3 text-gray-700">
                <li class="flex items-start">
                  <i class="fas fa-church text-[#2a9d8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">물리적 확장:</span> 예배가 예배당에 머무르지 않고 삶의 현장, 도시, 이웃의 삶 속으로 흩어짐</p>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-globe-asia text-[#2a9d8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">선교적 파송:</span> 오순절 이후 제자들이 성령의 바람을 타고 각지로 흩어졌듯, 복음을 들고 나아가는 공동체의 정체성</p>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-heart text-[#2a9d8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">기쁨의 나아감:</span> 예수 그리스도의 마음을 품고 스스로 나아가는 순종의 실천</p>
                </li>
              </ul>
            </div>
            <!-- Bloom again 섹션 -->
            <div class="bg-white bg-opacity-60 backdrop-blur-sm rounded-xl p-6 shadow-sm border-l-4 border-[#2a9d8f] transform transition-all duration-500 hover:shadow-lg hover:-translate-y-1 scroll-reveal fade-right" data-delay="0.4">
              <h3 class="text-2xl font-bold text-[#2a9d8f] mb-3">"Bloom again!" – 다시 피어라!</h3>
              <div class="italic text-[#2a9d8f] text-lg mb-4 pl-4 border-l-2 border-[#c2e9e5]">
                <p>흩어진 자리마다, 성령께서 생명을 회복시키시고 부흥을 일으키신다!</p>
              </div>
              <ul class="space-y-3 text-gray-700">
                <li class="flex items-start">
                  <i class="fas fa-wind text-[#1e4e8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">성령의 생기:</span> 마른 뼈와 같던 곳에 성령의 생기가 불어 다시 살아나는 공동체와 예배</p>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-seedling text-[#1e4e8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">새로운 열매:</span> 한 자리에 머물던 예배가 흩어진 자리마다 열매를 맺고, 꽃을 피우는 부흥의 확장</p>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-leaf text-[#1e4e8f] mt-1 mr-3"></i>
                  <p><span class="font-semibold">회복과 생명:</span> 겨울 같은 침체를 지나, 성령 안에서의 회복과 피어나는 생명</p>
                </li>
              </ul>
            </div>
            <!-- <div class="p-6 bg-gradient-to-br from-white to-[#c2e9e5] rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-white border-opacity-60 scroll-reveal fade-up" data-delay="0.3">
              <div class="flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#c2e9e5] flex items-center justify-center mb-4">
                  <i class="fas fa-seedling text-[#2a9d8f] text-2xl"></i>
                </div>
                <div class="text-[#2a9d8f] text-2xl font-bold mb-2">"Bloom again"</div>
                <div class="text-gray-600 text-center">성령에 의한 거룩한 부흥과 재창조</div>
              </div>
            </div> -->
          </div>
          
          <div class="mt-12 p-8 bg-gradient-to-br from-[#66c6ba] to-white rounded-xl shadow-md border border-white border-opacity-60 text-center scroll-reveal fade-up relative" data-delay="0.5">
            <!-- 제주 오름 실루엣 장식 -->
            <div class="absolute bottom-0 left-0 w-full h-16 opacity-10">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
                <path fill="#3d7b99" d="M0,224L60,213.3C120,203,240,181,360,181.3C480,181,600,203,720,213.3C840,224,960,224,1080,208C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
              </svg>
            </div>
            
            <p class="text-lg text-[#3d7b99] italic font-medium relative z-10">
              제주의 푸른 바다처럼 넓은 마음으로,<br>
              한라산의 웅장함처럼 굳건한 믿음으로,<br>
              우리의 발걸음 하나하나에 <br class="sm:hidden">복음의 향기가 흘러가고,<br>
              함께 모여 드리는 <br class="sm:hidden">"흩어지는 예배"가 <br class="sm:hidden">세상 속에서 다시 피어나는 <br class="sm:hidden">은혜의 역사가 되기를 <br class="sm:hidden">소망합니다!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  mounted() {
    this.$nextTick(() => {
      this.initScrollReveal();
    });
  },
  methods: {
    initScrollReveal() {
      if (typeof ScrollReveal !== 'undefined') {
        const sr = ScrollReveal({
          origin: 'bottom',
          distance: '20px',
          duration: 800,
          delay: 0,
          easing: 'cubic-bezier(0.5, 0, 0, 1)',
          reset: false
        });
        
        const elements = document.querySelectorAll('.scroll-reveal');
        elements.forEach(el => {
          const delay = el.getAttribute('data-delay') || 0;
          const direction = el.classList.contains('fade-left') ? 'left' : 
                           el.classList.contains('fade-right') ? 'right' : 'bottom';
          
          sr.reveal(el, {
            delay: delay * 1000,
            origin: direction
          });
        });
      }
    },
    goFullscreen(event) {
      const iframe = event.currentTarget.querySelector('iframe');
      if (iframe) {
        const src = iframe.src;
        if (src.includes('youtube.com')) {
          window.open(src.replace('embed/', 'watch?v='), '_blank');
        }
      }
    }
  }
}
</script>

<style scoped>
/* 제주도 느낌의 파도 애니메이션 */
@keyframes wave {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.animate-float {
  animation: wave 5s ease-in-out infinite;
}

/* 제주 돌하르방 스타일 */
.dol-harubang {
  position: relative;
}

.dol-harubang::before {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  background-color: #333;
  border-radius: 50%;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
}

.dol-harubang::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 60px;
  background-color: #333;
  border-radius: 10px;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
}

/* 감귤 스타일 */
.tangerine {
  width: 30px;
  height: 30px;
  background-color: #ffa22d;
  border-radius: 50%;
  position: relative;
}

.tangerine::before {
  content: '';
  position: absolute;
  width: 8px;
  height: 10px;
  background-color: #4a7c59;
  border-radius: 50% 50% 0 0;
  top: -5px;
  left: 50%;
  transform: translateX(-50%);
}

/* 제주 현무암 텍스처 */
.basalt-texture {
  background-color: #333;
  background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
  background-size: 10px 10px;
}

/* 제주 오름 스타일 */
.oreum {
  position: relative;
  height: 100px;
  background-color: #4a7c59;
  border-radius: 50% 50% 0 0;
}
</style>
